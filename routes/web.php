<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(route('admin.login'));
});

Route::prefix('admin-panel')->group(function () {
    Route::get('/login', App\Livewire\AdminPanel\Auth\Login::class)->name('admin.login');

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', \App\Livewire\AdminPanel\Dashboard\Index::class)->name('admin.dashboard');

        // Roles
        Route::get('/roles', \App\Livewire\AdminPanel\Roles\Index::class)->name('admin.roles.index');

        // Users
        Route::get('/users', App\Livewire\AdminPanel\Users\Index::class)->name('admin.users.index');
        Route::get('/users/create', \App\Livewire\AdminPanel\Users\Form::class)->name('admin.users.create');
        Route::get('/users/edit/{user}', \App\Livewire\AdminPanel\Users\Form::class)->name('admin.users.edit');

        // News
        Route::get('/news', \App\Livewire\AdminPanel\News\Index::class)->name('admin.news.index');
        Route::get('/news/create', \App\Livewire\AdminPanel\News\Form::class)->name('admin.news.create');
        Route::get('/news/edit/{news}', \App\Livewire\AdminPanel\News\Form::class)->name('admin.news.edit');

        // Events
        Route::get('/events', \App\Livewire\AdminPanel\Events\Index::class)->name('admin.events.index');
        Route::get('/events/create', \App\Livewire\AdminPanel\Events\Form::class)->name('admin.events.create');
        Route::get('/events/edit/{event}', \App\Livewire\AdminPanel\Events\Form::class)->name('admin.events.edit');

        // Categories
        Route::get('/categories', \App\Livewire\AdminPanel\Categories\Index::class)->name('admin.categories.index');

        // Regulations
        Route::get('/regulations', \App\Livewire\AdminPanel\Administrations\Regulations\Index::class)->name('admin.administrations.regulations.index');

        // Statistics
        Route::prefix('statistics')->name('admin.statistics.')->group(function () {
            Route::get('/population', \App\Livewire\AdminPanel\Statistics\Population::class)->name('population');
            Route::get('/education', \App\Livewire\AdminPanel\Statistics\Education::class)->name('education');
            Route::get('/religion', \App\Livewire\AdminPanel\Statistics\Religion::class)->name('religion');
        });

        // Identity
        Route::get('/identity', \App\Livewire\AdminPanel\Identity\Index::class)->name('admin.identity.index');
        Route::get('/identity/vision-mission', \App\Livewire\AdminPanel\Identity\VisionMission::class)->name('admin.identity.vision-mission');
        Route::get('/identity/display-message', \App\Livewire\AdminPanel\Identity\DisplayMessage::class)->name('admin.identity.display-message');

        Route::post('/logout', \App\Http\Controllers\Auth\LogoutController::class)->name('logout');
    });
});
