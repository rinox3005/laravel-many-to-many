<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Guest\PageController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('welcome');
});


Route::get('/projects', [PageController::class, 'index'])->name('projects');
Route::get('/projects/{project:slug}', [PageController::class, 'show'])->name('projects.show');


Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {

        // admin dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        //technologies
        Route::resource('projects/technologies', TechnologyController::class)->parameters([
            'technologies' => 'technology:slug',
        ]);

        //types
        Route::resource('projects/types', TypeController::class)->parameters([
            'types' => 'type:slug',
        ]);

        //projects
        Route::resource('projects', ProjectController::class)->parameters([
            'projects' => 'project:slug',
        ]);
    });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
