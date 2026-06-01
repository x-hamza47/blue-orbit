<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceSectionController;
use App\Http\Controllers\ViewController;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

// ! Static Routes HERE
Route::get('/', [ViewController::class, 'index'])->name('home');
Route::get('/blogs', [ViewController::class, 'blogs'])->name('blog.index');
Route::get('/blog/{slug}', [ViewController::class, 'show'])->name('blog.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/sitemap.xml', function () {
    $posts = Post::where('is_published', true)
        ->select('slug', 'updated_at')
        ->get();

    $services = Service::where('show_on_home', true)
        ->with(['parent' => fn($q) => $q->where('show_on_home', true)->select('id', 'slug')])
        ->select('id', 'slug', 'parent_id', 'updated_at')
        ->get()
        ->filter(fn($service) => 
            $service->parent_id === null || $service->parent !== null
        );

    return response()
        ->view('sitemap', compact('posts', 'services'))
        ->header('Content-Type', 'application/xml');
});
// ? Temporary Routes
Route::get('/service', function () {
    return view('servicetemp');
});

// ! Guest Routes
Route::middleware(['guest', 'throttle:5,1'])->group(function () {
    Route::get('/login', [ViewController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginUser'])->name('loginUser');
});

// ! Dashboard Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('auth')->prefix('dashboard')->group(function () {

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
    Route::post('/services/{service}/sections/{section}/toggle', [ServiceSectionController::class, 'toggle'])
        ->name('service.sections.toggle');
    Route::get('{service}/sections/{section}/show', [ServiceSectionController::class, 'show'])
        ->name('service.sections.show');
    Route::post('{service}/sections/{section}', [ServiceSectionController::class, 'update'])
        ->name('service.sections.update');

    Route::post('/services/{service}/sections/reorder', [ServiceSectionController::class, 'reorder'])->name('service.sections.reorder');

    Route::post('/posts/upload-image', [PostController::class, 'uploadImage'])
        ->name('posts.upload-image');
    Route::delete('/posts/temp-image', [PostController::class, 'deleteTempImage'])
        ->name('posts.temp-image.delete');

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::patch('/authors/{author}/toggle-status', [AuthorController::class, 'toggleStatus']);
    Route::resource('author', AuthorController::class);
});

// !Sub Services Crud

Route::get('/get-slug', function (Request $request) {

    abort_if(! $request->name, 400, 'Name is required');

    $slug = Str::slug($request->name);

    // $originalSlug = $slug;
    // $count = 1;

    // while (Service::where('slug', $slug)->exists()) {
    //     $slug = $originalSlug.'-'.$count++;
    // }

    return response()->json([
        'status' => true,
        'slug' => $slug,
    ]);
})->name('getSlug');

Route::get('/{parentSlug}/{childSlug?}', [ServiceController::class, 'service'])
    ->name('service');

