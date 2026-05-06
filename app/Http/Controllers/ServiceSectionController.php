<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ServiceSectionController extends Controller
{

    public function index(Service $service)
    {
        $sections = $service->sections;
        $existingSections = $sections->pluck('type')->toArray();
        $serviceType = $service->type;

        $all = collect(config('sections'))
            ->filter(
                fn($section, $key) =>
                in_array($serviceType, $section['allowed_for']) &&
                    !in_array($key, $existingSections)
            );

        $availableSections = $all->where('system', false);
        $availableSystemSections = $all->where('system', true);

        return view('dashboard.services.sections.list', compact(
            'service',
            'sections',
            'availableSections',
            'availableSystemSections'
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

        $exists = $service->sections()->where('type', $type)->exists();

        if ($exists) {
            return response()->json([
                'status' => false,
                'message' => 'Section already exists'
            ], 409);
        }

        if ($sectionConfig['system'] ?? false) {
            $data = null;
        } else {
            $this->cleanNestedPoints($request);

            $validator = Validator::make(
                $request->all(),
                $sectionConfig['rules'] ?? [],
                $sectionConfig['messages'] ?? []
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            $data = $validator->validated();
        }

        $section = $service->sections()->create([
            'type'  => $type,
            'data'  => $data,
            'order' => $service->sections()->count() + 1,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Section created successfully',
            'section' => $section
        ]);
    }

    public function show(Service $service, $sectionId)
    {
        $section = $service->sections()->findOrFail($sectionId);
        $sectionConfig = config('sections')[$section->type];

        return response()->json([
            'status'  => true,
            'section' => [
                'id'     => $section->id,
                'type'   => $section->type,
                'system' => $sectionConfig['system'] ?? false,
                'data'   => $section->data,
            ]
        ]);
    }

    public function destroy(Service $service, $sectionId)
    {
        $section = $service->sections()->findOrFail($sectionId);

        $section->delete();

        return response()->json([
            'status' => true,
            'message' => 'Section deleted successfully'
        ]);
    }


    public function update(Request $request, Service $service, $sectionId)
    {
        $section = $service->sections()->findOrFail($sectionId);
        $sectionConfig = config('sections')[$section->type];

        if ($sectionConfig['system'] ?? false) {
            return response()->json([
                'status'  => false,
                'message' => 'System sections cannot be edited'
            ], 403);
        }

        $this->cleanNestedPoints($request);
        $validator = Validator::make(
            $request->all(),
            $sectionConfig['rules']    ?? [],
            $sectionConfig['messages'] ?? []
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $section->update([
            'data' => $validator->validated(),
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Section updated successfully',
            'section' => $section
        ]);
    }

    public function getForm(Request $request, string $type)
    {
        $sectionConfig = config('sections')[$type] ?? null;

        if (!$sectionConfig) {
            return response('Invalid section type', 400);
        }

        if ($sectionConfig['system'] ?? false) {
            return response('', 204);
        }

        $viewPath = "service-section.forms.$type";

        if (!view()->exists($viewPath)) {
            return response('Form not found', 404);
        }

        $existing = $request->existing
            ? json_decode($request->existing, true)
            : null;

        return view($viewPath, compact('existing'));
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

    private function cleanNestedPoints(Request $request): void
    {
        if (!$request->has('items')) return;

        $items = $request->input('items');

        foreach ($items as &$item) {
            if (isset($item['points']) && is_array($item['points'])) {
                $item['points'] = array_values(
                    array_filter($item['points'], fn($p) => trim($p) !== '')
                );
            }
        }

        $request->merge(['items' => $items]);
    }
}
