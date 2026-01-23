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
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\EventCeadaController;
use App\Http\Controllers\Admin\WorkshopCeadaController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\ContactMethodController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\PricingPlanController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\SpeakerController;
use App\Http\Controllers\Admin\HeroCarouselController;
use App\Http\Controllers\Admin\WelcomeSectionController;
use App\Http\Controllers\Admin\TimelineEventController;
use App\Http\Controllers\Admin\FeaturedEventController;
use App\Http\Controllers\Admin\ContactCeadaController;
use App\Http\Controllers\Admin\LeaderTeamController;
use App\Http\Controllers\Admin\ValueBenefitController;
use App\Http\Controllers\Admin\GoalController;
use App\Http\Controllers\Admin\StrategyController;
use App\Http\Controllers\Admin\ProjectOverviewController;
use App\Http\Controllers\Admin\VisionMissionController;
use App\Http\Controllers\Admin\AccreditationController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ImpactStoryController;
use App\Http\Controllers\Admin\DonorController;
use App\Http\Controllers\Admin\MenuCategoryController;
use App\Http\Controllers\Admin\MilestoneController;
use App\Http\Controllers\Admin\AwardController;
use App\Http\Controllers\Admin\SuccessStoryController;
use App\Http\Controllers\Admin\HeroAchievementController;
use App\Http\Controllers\Admin\ProgressMetricsController;
use App\Http\Controllers\Admin\UpcomingWorkshopController;
use App\Http\Controllers\Admin\WorkshopBenefitController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\WhyChooseUsController;
use App\Http\Controllers\Admin\OrderStepController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\FeaturedMenuController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\MemberCompanyController;
use App\Http\Controllers\Admin\FinalCtaController;


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
Route::get('/programs/{program:slug}', [ProgramController::class, 'show'])->name('programs.show');
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

Route::middleware(['auth', \App\Http\Middleware\AdminTokenMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    // Admin Profile
    Route::get('/profile', [\App\Http\Controllers\Admin\AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [\App\Http\Controllers\Admin\AdminProfileController::class, 'update'])->name('profile.update');

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Notifications
    Route::get('notifications', [\App\Http\Controllers\Admin\NotificationController::class, 'index'])->name('notifications.index');
    Route::post('notifications/{id}/read', [\App\Http\Controllers\Admin\NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('notifications/read-all', [\App\Http\Controllers\Admin\NotificationController::class, 'markAllAsRead'])->name('notifications.read_all');
    Route::delete('notifications/{id}', [\App\Http\Controllers\Admin\NotificationController::class, 'destroy'])->name('notifications.destroy');

    // Activity (Recent Activity listing)
    Route::get('activities', [\App\Http\Controllers\Admin\ActivityController::class, 'index'])->name('activity.index');



    // Home Page Management
    Route::middleware('permission:home_page')->group(function () {
        Route::resource('hero_carousels', HeroCarouselController::class);
        Route::resource('welcome_sections', WelcomeSectionController::class);
        Route::resource('features', FeatureController::class);
        Route::resource('footer', FooterController::class);
    });

    // About Page Management
    Route::middleware('permission:about_page')->group(function () {
        Route::get('/about', [AboutAdminController::class, 'index'])->name('about.index');
        Route::resource('faculties', FacultyAdminController::class);
        Route::resource('team-members', TeamMemberAdminController::class);
        Route::resource('core-values', CoreValueAdminController::class);
    });

    // Accreditations
    // Route::get('/accreditations', [AccreditationAdminController::class, 'index'])->name('accreditations.index');

    // Office Managers
    Route::resource('office-managers', OfficeManagerController::class);

    // Programs Management
    Route::middleware('permission:programs')->group(function () {
        Route::resource('programs', ProgramCaedaController::class);
    });

    // Staff
    Route::resource('staff', StaffController::class)->middleware('permission:staff');

    // News Management
    Route::middleware('permission:news')->group(function () {
        Route::resource('news', NewsAdminController::class);
    });

    // User Management
    Route::middleware('permission:users')->group(function () {
        Route::resource('users', UserAdminController::class);
    });

    // Membership Page Management
    Route::middleware('permission:membership_page')->group(function () {
        Route::resource('partners', PartnerController::class);
        Route::resource('pricing', PricingPlanController::class);
        Route::resource('member-companies', MemberCompanyController::class);
        Route::resource('final-cta', FinalCtaController::class, [
            'parameters' => ['final-cta' => 'finalCta']
        ]);
        Route::patch('final-cta/{finalCta}/toggle', [FinalCtaController::class, 'toggle'])
            ->name('final-cta.toggle');
    });

    // Events Management
    Route::middleware('permission:events')->group(function () {
        Route::resource('events', EventCeadaController::class);
        Route::resource('featured_events', FeaturedEventController::class);
        Route::resource('speakers', SpeakerController::class);
        Route::resource('timeline_events', TimelineEventController::class);
    });

    // Donation Management
    Route::middleware('permission:donation_page')->group(function () {
        Route::resource('heroes', HeroController::class);
        Route::resource('stories', ImpactStoryController::class);
        Route::resource('recent-donors', DonorController::class);
    });

    // Achievement Management
    Route::middleware('permission:achieve_page')->group(function () {
        Route::resource('milestones', MilestoneController::class);
        Route::resource('awards', AwardController::class);
        Route::resource('hero-achievements', HeroAchievementController::class);
        Route::resource('progress-metrics', ProgressMetricsController::class);
        Route::resource('success-stories', SuccessStoryController::class);
    });

    // Contact Page Management
    Route::middleware('permission:contact_page')->group(function () {
        Route::resource('contacts', ContactCeadaController::class);
        Route::resource('social', SocialLinkController::class);
        Route::resource('contact-information', ContactMethodController::class);
        Route::resource('faqs', FaqController::class);
    });

    // Workshop Page Management
    Route::middleware('permission:workshop_page')->group(function () {
        Route::resource('workshops', WorkshopCeadaController::class);
        Route::resource('upcoming_workshops', UpcomingWorkshopController::class);
        Route::resource('workshop_benefits', WorkshopBenefitController::class);
        Route::resource('testimonials', TestimonialController::class);
    });

    // Caffe Page Management
    Route::middleware('permission:caffe_page')->group(function () {
        Route::resource('menu-categories', MenuCategoryController::class);
        Route::resource('menu_items', \App\Http\Controllers\Admin\MenuItemController::class);
        Route::resource('featured_menus', FeaturedMenuController::class);
        Route::resource('why_choose_us', WhyChooseUsController::class);
        Route::resource('order_steps', OrderStepController::class);
        Route::resource('locations', LocationController::class);
    });

    // Team Page Management
    Route::middleware('permission:team_page')->group(function () {
        Route::resource('leader-teams', LeaderTeamController::class);
        Route::resource('value-benefits', ValueBenefitController::class);
        Route::resource('goals', GoalController::class);
        Route::resource('strategies', StrategyController::class);
        Route::resource('project-overviews', ProjectOverviewController::class);
        Route::resource('vision-missions', VisionMissionController::class);
        Route::resource('accreditations', AccreditationController::class);
    });

    // Backup Management
    Route::get('backup', [\App\Http\Controllers\Admin\BackupController::class, 'index'])->name('backup.index');
    Route::post('backup/create', [\App\Http\Controllers\Admin\BackupController::class, 'create'])->name('backup.create');

});
