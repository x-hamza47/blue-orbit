<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceSectionController;
use App\Http\Controllers\ViewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


// ! Static Routes HERE
Route::get('/', [ViewController::class, 'index'])->name('home');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// ? Temporary Routes HERE
Route::get('/service', function () {
    return view('servicetemp');
});
Route::get('/digital-marketing-services', [ViewController::class, 'digitalmarketing'])->name('digitalmarketing');


// ! Guest Routes HERE
Route::middleware('guest')->group(function () {
    Route::get('/login', [ViewController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginUser'])->name('loginUser');
});

// ! Dashboard Routes HERE
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// ! Always in the end because of the redirect fallback in controller
Route::prefix('dashboard')->group(function () {

    Route::prefix('services')->controller(ServiceController::class)->group(function () {
        // ? Service CRUD
        Route::get('/', 'index')->name('service.index');
        Route::post('/toggle/{id}', 'toggle')->name('service.home.toggle');
        Route::post('/reorder', 'reorder')->name('service.reorder');
        Route::post('/', 'store')->name('service.store');
        Route::put('/{id}', 'update')->name('service.update');
        Route::delete('/{id}', 'destroy')->name('service.destroy');

        // ? Sub Service CRUD
        Route::get('/{id}/sub-services', 'subIndex')->name('service.sub.index');
        Route::post('/{id}/sub-services', 'subStore')->name('service.sub.store');
        Route::put('/{parentId}/sub-services/{id}', 'subUpdate')->name('service.sub.update');
        Route::delete('/sub-services/{id}', 'subDestroy')->name('service.sub.destroy');
        Route::post('/{id}/sub-services/reorder', 'reorder')->name('service.sub.reorder');
    });
    Route::get('/sections/form/{type}', [ServiceSectionController::class, 'getForm'])->name('service.sections.form');
    Route::get('/services/{service}/sections', [ServiceSectionController::class, 'index'])
        ->name('service.sections.index');
    Route::delete('/services/{service}/sections/{id}', [ServiceSectionController::class, 'destroy'])
        ->name('service.sections.destroy');
    Route::post('/services/{service}/sections', [ServiceSectionController::class, 'store'])
        ->name('service.sections.store');   

    Route::post('/services/{service}/sections/reorder', [ServiceSectionController::class, 'reorder'])->name('service.sections.reorder');
});



// !Sub Services Crud


Route::get('/getSlug', function (Request $request) {

    abort_if(!$request->name, 400, 'Name is required');

    $slug = Str::slug($request->name);

    $originalSlug = $slug;
    $count = 1;

    while (\App\Models\Service::where('slug', $slug)->exists()) {
        $slug = $originalSlug . '-' . $count++;
    }

    return response()->json([
        'status' => true,
        'slug' => $slug,
    ]);
})->name('getSlug');
Route::get('/{parentSlug}/{childSlug?}', [ServiceController::class, 'service'])
    ->name('service');
