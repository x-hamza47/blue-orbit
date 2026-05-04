<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceSectionController extends Controller
{

    public function index(Service $service)
    {
        $sections = $service->sections;

        $existingSections = $sections->pluck('type')->toArray();

        $serviceType = $service->type;

        $availableSections = collect(config('sections'))
            ->filter(function ($section, $key) use ($existingSections, $serviceType) {

                return in_array($serviceType, $section['allowed_for'])
                    && !in_array($key, $existingSections);
            });

        return view('dashboard.services.sections.list', compact(
            'service',
            'sections',
            'availableSections'
        ));
    }
    public function store(Request $request, Service $service)
    {
        $type = $request->type;

        if (!array_key_exists($type, config('sections'))) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid section type'
            ], 400);
        }

        $sectionConfig = config('sections')[$type];

        $validator = Validator::make($request->all(), $sectionConfig['rules'] ?? [], $sectionConfig['messages'] ?? []);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $exists = $service->sections()->where('type', $type)->exists();

        if ($exists) {
            return response()->json([
                'status' => false,
                'message' => 'Section already exists'
            ], 409);
        }

        $validated = $validator->validated();

        $section = $service->sections()->create([
            'type' => $type,
            'data' => $validated,
            'order' => $service->sections()->count() + 1,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Section created successfully',
            'section' => $section
        ]);
    }
    public function destroy($serviceId, $id)
    {
        $section = ServiceSection::where('id', $id)
            ->where('service_id', $serviceId)
            ->firstOrFail();

        $section->delete();

        return response()->json([
            'status' => true,
            'message' => 'Section deleted successfully'
        ]);
    }

    public function getForm($type)
    {
        $viewPath = "service-section.forms.$type";

        if (!view()->exists($viewPath)) {
            return response('Form not found', 404);
        }

        return view($viewPath);
    }

    public function reorder(Request $request, Service $service)
    {
        foreach ($request->order as $item) {
            $service->sections()
                ->where('id', $item['id'])
                ->update(['order' => $item['order']]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Order updated successfully'
        ]);
    }
    public function toggle(Service $service, int $sectionId)
    {
        $section = $service->sections()->findOrFail($sectionId);

        $section->update([
            'is_active' => !$section->is_active
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Section status updated successfully',
        ]);
    }
}
