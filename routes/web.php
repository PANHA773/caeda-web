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
// PROTECTED ADMIN ROUTES
// ==============================
Route::middleware(['auth', \App\Http\Middleware\AdminTokenMiddleware::class])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/', [AboutAdminController::class, 'index'])->name('dashboard');
    
    // Activity (Recent Activity listing)
    Route::get('activities', [\App\Http\Controllers\Admin\ActivityController::class, 'index'])->name('activity.index');
  


    //Hero Carousel
    Route::resource('hero_carousels', HeroCarouselController::class);

    // About
    Route::get('/about', [AboutAdminController::class, 'index'])->name('about.index');

    // Faculties
    Route::resource('faculties', FacultyAdminController::class);

    // Team Members
    Route::resource('team-members', TeamMemberAdminController::class);

    // Core Values
    Route::resource('core-values', CoreValueAdminController::class);

    // Accreditations
    // Route::get('/accreditations', [AccreditationAdminController::class, 'index'])->name('accreditations.index');

    // Office Managers
    Route::resource('office-managers', OfficeManagerController::class);

    // Staff
    Route::resource('staff', StaffController::class);

    // Programs
    Route::resource('programs', ProgramCaedaController::class);

    // Events
    Route::resource('events', EventCeadaController::class);

    // Partners
    Route::resource('partners', PartnerController::class);

    // Workshops
    Route::resource('workshops', WorkshopCeadaController::class);

    // Menu Items (admin CRUD)
    Route::resource('menu_items', \App\Http\Controllers\Admin\MenuItemController::class);

    // Social Links
    Route::resource('social', SocialLinkController::class);

    // Contact Methods
    Route::resource('contact-information', ContactMethodController::class);

    // FAQs
    Route::resource('faqs', FaqController::class);

    // Pricing Plans
    Route::resource('pricing', PricingPlanController::class);

    //FeatureController 
    Route::resource('features', FeatureController::class);

    //FooterController
    Route::resource('footer', FooterController::class);

    // Speakers
    Route::resource('speakers', SpeakerController::class);

    // Welcome Section
    Route::resource('welcome_sections', WelcomeSectionController::class);

    // Timeline Events
    Route::resource('timeline_events', TimelineEventController::class);

    // Featured Events
    Route::resource('featured_events', FeaturedEventController::class);

    // Contacts from users
    Route::resource('contacts', ContactCeadaController::class);

    // Leader Teams
    Route::resource('leader-teams', LeaderTeamController::class);

    // Value Benefits
    Route::resource('value-benefits', ValueBenefitController::class);

    // Goals
    Route::resource('goals', GoalController::class);

    // Strategies
    Route::resource('strategies', StrategyController::class);

    // Project-Based
    Route::resource('project-overviews', ProjectOverviewController::class);

    // Vision & Mission
    Route::resource('vision-missions', VisionMissionController::class);

    // accreditations
    Route::resource('accreditations', AccreditationController::class);

    // heroes
    Route::resource('heroes', HeroController::class);

    // stories
    Route::resource('stories', ImpactStoryController::class);

    // recent-donors
    Route::resource('recent-donors', DonorController::class);

    Route::resource('menu-categories', MenuCategoryController::class);

    Route::resource('milestones', MilestoneController::class);

    Route::resource('awards', AwardController::class);

    Route::resource('success-stories', SuccessStoryController::class);

    Route::resource('hero-achievements', HeroAchievementController::class);

    Route::resource('progress-metrics', ProgressMetricsController::class);
    

    Route::resource('upcoming_workshops', UpcomingWorkshopController::class);

    Route::resource('workshop_benefits', WorkshopBenefitController::class);

    Route::resource('testimonials', TestimonialController::class);

    Route::resource('why_choose_us', WhyChooseUsController::class);

    Route::resource('order_steps', OrderStepController::class);

    Route::resource('locations', LocationController ::class);

    Route::resource('featured_menus', FeaturedMenuController::class);
    // News (Admin CRUD)
    Route::resource('news', NewsAdminController::class);

    // User Management
    Route::resource('users', UserAdminController::class);

    // member companies
    Route::resource('member-companies', MemberCompanyController::class);

});
