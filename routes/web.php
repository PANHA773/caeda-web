<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\SpeakersController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AchieveController;
use App\Http\Controllers\CoffeeController;

// Admin Controllers
use App\Http\Controllers\Admin\AboutAdminController;
use App\Http\Controllers\Admin\FacultyAdminController;
use App\Http\Controllers\Admin\TeamMemberAdminController;
use App\Http\Controllers\Admin\CoreValueAdminController;
use App\Http\Controllers\Admin\OfficeManagerController;
use App\Http\Controllers\Admin\ProgramCaedaController;
use App\Http\Controllers\Admin\StaffController;

// ==============================
// ADMIN ROUTES
// ==============================
// Faculties (Admin)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    // Admin Dashboard
    Route::get('/', [AboutAdminController::class, 'index'])->name('dashboard');

    // About Page
    Route::get('/about', [AboutAdminController::class, 'index'])->name('about.index');

    // Faculties
    Route::get('/faculties', [FacultyAdminController::class, 'index'])->name('faculties.index');
    Route::get('/faculties/create', [FacultyAdminController::class, 'create'])->name('faculties.create');
    Route::post('/faculties', [FacultyAdminController::class, 'store'])->name('faculties.store');
    Route::get('/faculties/{faculty}/edit', [FacultyAdminController::class, 'edit'])->name('faculties.edit');
    Route::put('/faculties/{faculty}', [FacultyAdminController::class, 'update'])->name('faculties.update');
    Route::delete('/faculties/{faculty}', [FacultyAdminController::class, 'destroy'])->name('faculties.destroy');
    Route::get('/faculties/{faculty}', [FacultyAdminController::class, 'show'])->name('faculties.show');


    // Team Members
    Route::resource('/team-members', TeamMemberAdminController::class);

    // Core Values
    Route::resource('core-values', CoreValueAdminController::class);

    // Accreditations
    Route::get('/accreditations', [AccreditationAdminController::class, 'index'])->name('accreditations.index');

    Route::resource('office-managers', OfficeManagerController::class);
    Route::resource('staff', StaffController::class);
    // Note: admin programs are handled by ProgramCaedaController below.
    // Removed duplicate registration of the non-admin ProgramController here
    // to avoid route/name conflicts with the admin resource controller.
    Route::resource('programs', ProgramCaedaController::class);
});




// ==============================
// PUBLIC ROUTES
// ==============================

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Static Pages
Route::view('/psbu-vison', 'psbu-vison')->name('psbu-vison');
Route::view('/psbu-weekly-news', 'psbu-weekly-news')->name('psbu-weekly-news');
Route::view('/psbu-youth', 'psbu-youth')->name('psbu-youth');
Route::view('/donation', 'donation')->name('donation');
Route::view('/volunteer', 'volunteer')->name('volunteer.signup');
Route::view('/resources', 'resources')->name('resources.download');
Route::view('/achieve', 'achieve')->name('achieve');
Route::view('/contact', 'contact')->name('contact');
// Route::view('/coffee', 'coffee')->name('coffee');

// Dynamic Pages
Route::get('/workshop', [WorkshopController::class, 'index'])->name('workshop');
Route::get('/programs', [ProgramController::class, 'view'])->name('programs');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/project', [ProjectController::class, 'index'])->name('project');
Route::get('/our-team', [TeamController::class, 'index'])->name('our-team');
Route::get('/partners', [PartnersController::class, 'index'])->name('partners');
Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::get('/coffee', [CoffeeController::class, 'index'])->name('coffee');




Route::get('/achieve', [AchieveController::class, 'index'])
    ->name('achieve');



Route::get('/speakers', [SpeakersController::class, 'index'])->name('speakers.index');
Route::get('/speakers/{speaker}', [SpeakersController::class, 'show'])->name('speakers.show');

Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{news:slug}', [NewsController::class, 'show'])->name('news.show');


// News interactions
Route::post('/news/{news}/comments', [\App\Http\Controllers\CommentController::class, 'store'])->name('news.comments.store');
Route::post('/news/{news}/like', [\App\Http\Controllers\NewsController::class, 'toggleLike'])->name('news.like');



// web.php
Route::get('/donation', [DonationController::class, 'show'])->name('donation.show');
Route::post('/donation', [DonationController::class, 'submit'])->name('donation.submit');



// Courses
Route::get('/courses', [CourseController::class, 'index'])->name('courses');

// Contact & Newsletter
Route::post('/contact', [ContactController::class, 'store'])->name('contact.submit');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');


Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::post('/newsletter', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');


// Language Switcher
Route::post('/switch-language', [LanguageController::class, 'switch'])->name('language.switch');

// ==============================
// AUTH ROUTES
// ==============================

// User Auth
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'submit'])->name('login.submit');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin Auth
Route::get('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'adminSubmit'])->name('admin.login.submit');

// ==============================
// PROTECTED USER ROUTES
// ==============================
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// ==============================
// COURSES
// ==============================
Route::get('/courses', [CourseController::class, 'index'])->name('courses');

// ==============================
// LANGUAGE SWITCHER
// ==============================
Route::post('/switch-language', [LanguageController::class, 'switch'])->name('language.switch');

// ==============================
// CONTACT FORM
// ==============================
Route::post('/contact', [ContactController::class, 'store'])->name('contact.submit');

// ==============================
// NEWSLETTER
// ==============================
Route::post('/newsletter', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// load admin.php
require __DIR__ . '/admin.php';

require __DIR__.'/auth.php';

require __DIR__.'/auth.php';
