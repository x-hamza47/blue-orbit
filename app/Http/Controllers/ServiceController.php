<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
// use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    // public static function getFiles()
    // {
    //     return collect(File::files(resource_path('views/service-section')))
    //         ->map(fn($file) => pathinfo($file->getFilename(), PATHINFO_FILENAME));
    // }
    public function service(string $parentSlug, ?string $childSlug = null): \Illuminate\View\View
    {
        // dd(ServiceController::getFiles());
        if (!$childSlug) {

            $service = Service::where('slug', $parentSlug)
                ->whereNull('parent_id')
                ->firstOrFail();

            $service->load('sections');

            return view('service', compact('service'));
        }

        $parent = Service::where('slug', $parentSlug)
            ->whereNull('parent_id')
            ->firstOrFail();

        $service = Service::where('slug', $childSlug)
            ->where('parent_id', $parent->id)
            ->firstOrFail();

        $service->load('sections');

        return view('front.services.main', compact('service', 'parent'));
    }


    public function index(Request $request)
    {
        $query = Service::parents()->withCount('children');

        if ($request->filter === 'home') {
            $query->where('show_on_home', 1);
        }


        $services = $query
            ->orderBy('home_order')
            ->get();

        $totalServices   = Service::count();
        $homeServices    = Service::showOnHome()->count();
        $activeServices  = Service::active()->count();
        $parentServices  = Service::parents()->count();
        // $childServices   = Service::subServices()->count();

        return view('dashboard.services.list', compact(
            'services',
            'totalServices',
            'homeServices',
            'activeServices',
            'parentServices'
        ));
    }

    public function reorder(Request $request, $parentId = null)
    {
        try {
            foreach ($request->order as $item) {
                Service::where('id', $item['id'])
                    ->where('parent_id', $parentId)
                    ->update(['home_order' => $item['order']]);
            }
            return response()->json(['status' => true, 'message' => 'Order updated successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' =>  'Failed to update order'], 500);
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'slug'        => 'required|string|max:255|unique:services,slug',
            'icon'        => 'nullable|string|max:50',
            'color'       => 'nullable|string|max:20',
            'desc'        => 'required|string|max:90',
        ]);

        $service = Service::create([
            'title'       => $validated['title'],
            'slug'        => $validated['slug'],
            'icon'        => $validated['icon'] ?? null,
            'color'       => $validated['color'] ?? null,
            'desc'        => $validated['desc'] ?? null,
            'is_active'   => true,
            'show_on_home' => false,
            'home_order'  => 0,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Service created successfully',
            'data' => $service
        ]);
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug'  => 'required|string|max:255|unique:services,slug,' . $id,
            'icon'  => 'nullable|string|max:50',
            'color' => 'nullable|string|max:20',
            'desc'  => 'nullable|string|max:120',
        ]);

        $service->update($validated);

        return response()->json([
            'status' => true,
            'data' => $service
        ]);
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return response()->json([
            'status' => true,
            'message' => 'Service deleted successfully'
        ]);
    }
    public function toggle(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $service->update([
            'show_on_home' => $request->show_on_home
        ]);
        Cache::forget('nav_services');

        return response()->json(['success' => true]);
    }
    // ? ======================================================================================
    //                              Info: Sub Services Methods
    // ? ======================================================================================

    public function subIndex(Request $request, $id)
    {
        $service = Service::parents()
            ->select('id', 'title', 'icon', 'color')
            ->findOrFail($id);

        $subServices = Service::subservices()
            ->where('parent_id', $id)
            ->select('id', 'parent_id', 'title', 'slug', 'icon', 'color', 'show_on_home', 'home_order')
            ->when($request->filter === 'home', function ($q) {
                $q->where('show_on_home', 1);
            })
            ->orderBy('home_order')
            ->withCount('sections')
            ->get();

        return view('dashboard.services.sub-services.list', compact('service', 'subServices'));
    }

    public function subStore(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug'  => 'required|string|max:255|unique:services,slug',
            'icon'  => 'nullable|string|max:50',
            'color' => 'nullable|string|max:20',
            'desc'  => 'nullable|string|max:90',
        ]);

        $subService = Service::create([
            'parent_id'    => $id,
            'title'        => $validated['title'],
            'slug'         => $validated['slug'],
            'icon'         => $validated['icon'] ?? null,
            'color'        => $validated['color'] ?? null,
            'desc'         => $validated['desc'] ?? null,
            'is_active'    => true,
            'show_on_home' => false,
            'home_order'   => 0,
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Sub service created successfully',
            'data'    => $subService
        ]);
    }

    public function subDestroy($id)
    {
        $service = Service::where('id', $id)
            ->whereNotNull('parent_id')
            ->firstOrFail();

        $service->delete();

        return response()->json([
            'status' => true,
            'message' => 'Sub service deleted successfully'
        ]);
    }

    public function subUpdate(Request $request, $parentId, $id)
    {

        $service = Service::where('id', $id)
            ->where('parent_id', $parentId)
            ->firstOrFail();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug'  => 'required|string|max:255|unique:services,slug,' . $id,
            'icon'  => 'nullable|string|max:50',
            'color' => 'nullable|string|max:20',
            'desc'  => 'nullable|string|max:120',
        ]);

        $service->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Sub service updated successfully',
            'data' => $service
        ]);
    }
}
