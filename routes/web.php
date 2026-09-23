<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\PortfolioController;

Route::get(
    '/',
    [PortfolioController::class, 'index']
)->name('home');
    Route::post(
    '/contact',
    [ContactController::class, 'store']
)->name('contact.store');

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::middleware('guest')->group(function () {

            Route::get('/login', [AuthController::class, 'showLogin'])
                ->name('login');

            Route::post('/login', [AuthController::class, 'login'])
                ->name('login.submit');
        });

       Route::middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
        // Skills
Route::get('/skills', [SkillController::class, 'index'])
    ->name('skills.index');

Route::post('/skills', [SkillController::class, 'store'])
    ->name('skills.store');

Route::put('/skills/{skill}', [SkillController::class, 'update'])
    ->name('skills.update');

Route::delete('/skills/{skill}', [SkillController::class, 'destroy'])
    ->name('skills.destroy');
// Projects

Route::get(
    '/projects',
    [ProjectController::class, 'index']
)->name('projects.index');


Route::post(
    '/projects',
    [ProjectController::class, 'store']
)->name('projects.store');


Route::put(
    '/projects/{project}',
    [ProjectController::class, 'update']
)->name('projects.update');


Route::delete(
    '/projects/{project}',
    [ProjectController::class, 'destroy']
)->name('projects.destroy');

// Education
Route::get('/education', [EducationController::class, 'index'])
    ->name('education.index');

Route::post('/education', [EducationController::class, 'store'])
    ->name('education.store');

Route::put('/education/{education}', [EducationController::class, 'update'])
    ->name('education.update');

Route::delete('/education/{education}', [EducationController::class, 'destroy'])
    ->name('education.destroy');
    // Messages

Route::get(
    '/messages',
    [MessageController::class, 'index']
)->name('messages.index');

Route::get(
    '/messages/{message}',
    [MessageController::class, 'show']
)->name('messages.show');

Route::delete(
    '/messages/{message}',
    [MessageController::class, 'destroy']
)->name('messages.destroy');


// Social Links
Route::get('/social-links', [SocialLinkController::class, 'index'])
    ->name('socials.index');

Route::post('/social-links', [SocialLinkController::class, 'store'])
    ->name('socials.store');

Route::put('/social-links/{socialLink}', [SocialLinkController::class, 'update'])
    ->name('socials.update');

Route::delete('/social-links/{socialLink}', [SocialLinkController::class, 'destroy'])
    ->name('socials.destroy');
});
    });