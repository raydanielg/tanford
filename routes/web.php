<?php

use App\Http\Controllers\ProfileController;
use App\Models\Post;
use App\Models\Testimonial;
use App\Models\TeamMember;
use App\Models\MemberOrganization;
use App\Models\AboutBlock;
use App\Models\Service;
use App\Models\FocusArea;
use App\Models\Notification;
use App\Models\FooterSetting;
use App\Models\SecuritySetting;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ForumRegistrationController;
use App\Http\Controllers\UaeResidentController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Admin\MemberOrganizationController as AdminMemberController;
use App\Http\Controllers\Admin\TeamMemberController as AdminTeamMemberController;
use App\Http\Controllers\Admin\MediaItemController as AdminMediaController;
use App\Http\Controllers\Admin\AboutBlockController as AdminAboutController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\FocusAreaController as AdminFocusAreaController;
use App\Http\Controllers\Admin\NotificationController as AdminNotificationController;
use App\Http\Controllers\Admin\FooterController as AdminFooterController;
use App\Http\Controllers\Admin\NewsletterController as AdminNewsletterController;
use App\Http\Controllers\Admin\ForumRegistrationController as AdminForumRegistrationController;
use App\Http\Controllers\Admin\UaeResidentController as AdminUaeResidentController;
use App\Http\Controllers\Admin\GeneralSettingController as AdminGeneralSettingController;
use App\Http\Controllers\Admin\MailSettingController as AdminMailSettingController;
use App\Http\Controllers\Admin\SeoSettingController as AdminSeoSettingController;
use App\Http\Controllers\Admin\SecuritySettingController as AdminSecuritySettingController;

Route::get('/', function () {
    $latestPosts = Post::query()
        ->whereNotNull('published_at')
        ->latest('published_at')
        ->take(3)
        ->get();

    $testimonials = Testimonial::query()
        ->latest('id')
        ->take(6)
        ->get();

    $teamMembers = TeamMember::query()
        ->latest('id')
        ->take(8)
        ->get();

    $memberOrganizations = MemberOrganization::query()
        ->latest('id')
        ->take(12)
        ->get();

    $aboutBlock = AboutBlock::query()->first();

    $focusAreas = FocusArea::query()
        ->orderBy('sort_order')
        ->orderBy('id')
        ->get(['id', 'title', 'description', 'icon', 'sort_order']);

    $notifications = Notification::query()
        ->where('is_published', true)
        ->orderBy('sort_order')
        ->orderBy('id')
        ->get(['id', 'title', 'url', 'sort_order']);

    $footer = FooterSetting::query()->first();

    $securitySetting = SecuritySetting::query()->first();
    $canRegisterSetting = ! $securitySetting || $securitySetting->allow_registration;

    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register') && $canRegisterSetting,
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'posts' => $latestPosts,
        'about' => $aboutBlock,
        'focusAreas' => $focusAreas,
        'notifications' => $notifications,
        'footer' => $footer,
        'testimonials' => $testimonials,
        'teamMembers' => $teamMembers,
        'members' => $memberOrganizations,
    ]);
});

Route::get('/about', function () {
    return Inertia::render('About');
});

Route::get('/contact', function () {
    return Inertia::render('Contact');
});

Route::get('/faq', function () {
    return Inertia::render('FAQ');
});

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

Route::get('/partners', function () {
    return Inertia::render('Partners');
});

Route::get('/events', function () {
    return Inertia::render('Events');
});

Route::get('/resources', function () {
    return Inertia::render('Resources');
});

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

Route::get('/how-it-works', function () {
    return Inertia::render('HowItWorks');
});

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/uaeresidents', function () {
    return Inertia::render('UaeResidents');
})->name('uaeresidents');

Route::post('/uaeresidents', [UaeResidentController::class, 'store'])->name('uaeresidents.store');

Route::get('/forumregster', function () {
    return Inertia::render('ForumRegistration');
});

Route::post('/forumregster', [ForumRegistrationController::class, 'store'])->name('forum.register.store');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    Route::patch('/users/{user}/role', [\App\Http\Controllers\Admin\UserController::class, 'updateRole'])->name('users.update-role');
    Route::post('/users/{user}/reset-password', [\App\Http\Controllers\Admin\UserController::class, 'resetPassword'])->name('users.reset-password');
    Route::post('/users/{user}/ban', [\App\Http\Controllers\Admin\UserController::class, 'ban'])->name('users.ban');
    Route::delete('/users/{user}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');

    // Admin blog management
    Route::get('/admin/posts', [AdminPostController::class, 'index'])->name('admin.posts.index');
    Route::post('/admin/posts', [AdminPostController::class, 'store'])->name('admin.posts.store');
    // Use POST for update and delete to avoid HTTP verb issues
    Route::post('/admin/posts/{post}', [AdminPostController::class, 'update'])->name('admin.posts.update');
    Route::post('/admin/posts/{post}/delete', [AdminPostController::class, 'destroy'])->name('admin.posts.destroy');

    // Admin testimonials management
    Route::get('/admin/testimonials', [AdminTestimonialController::class, 'index'])->name('admin.testimonials.index');
    Route::post('/admin/testimonials', [AdminTestimonialController::class, 'store'])->name('admin.testimonials.store');
    Route::put('/admin/testimonials/{testimonial}', [AdminTestimonialController::class, 'update'])->name('admin.testimonials.update');
    Route::delete('/admin/testimonials/{testimonial}', [AdminTestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');

    // Admin team members management
    Route::get('/admin/team-members', [AdminTeamMemberController::class, 'index'])->name('admin.team-members.index');
    Route::post('/admin/team-members', [AdminTeamMemberController::class, 'store'])->name('admin.team-members.store');
    Route::post('/admin/team-members/{teamMember}', [AdminTeamMemberController::class, 'update'])->name('admin.team-members.update');
    Route::delete('/admin/team-members/{teamMember}', [AdminTeamMemberController::class, 'destroy'])->name('admin.team-members.destroy');

    // Admin members management
    Route::get('/admin/members', [AdminMemberController::class, 'index'])->name('admin.members.index');
    Route::post('/admin/members', [AdminMemberController::class, 'store'])->name('admin.members.store');
    Route::put('/admin/members/{member}', [AdminMemberController::class, 'update'])->name('admin.members.update');
    Route::delete('/admin/members/{member}', [AdminMemberController::class, 'destroy'])->name('admin.members.destroy');

    // Admin media gallery management
    Route::get('/admin/media', [AdminMediaController::class, 'index'])->name('admin.media.index');
    Route::post('/admin/media', [AdminMediaController::class, 'store'])->name('admin.media.store');
    Route::post('/admin/media/{item}/delete', [AdminMediaController::class, 'destroy'])->name('admin.media.destroy');

    // Admin about section management
    Route::get('/admin/about', [AdminAboutController::class, 'index'])->name('admin.about.index');
    Route::post('/admin/about', [AdminAboutController::class, 'update'])->name('admin.about.update');

    // Admin services management
    Route::get('/admin/services', [AdminServiceController::class, 'index'])->name('admin.services.index');
    Route::post('/admin/services', [AdminServiceController::class, 'store'])->name('admin.services.store');
    Route::post('/admin/services/{service}', [AdminServiceController::class, 'update'])->name('admin.services.update');
    Route::post('/admin/services/{service}/delete', [AdminServiceController::class, 'destroy'])->name('admin.services.destroy');

    // Admin focus areas management
    Route::get('/admin/focus-areas', [AdminFocusAreaController::class, 'index'])->name('admin.focus-areas.index');
    Route::post('/admin/focus-areas', [AdminFocusAreaController::class, 'store'])->name('admin.focus-areas.store');
    Route::post('/admin/focus-areas/{focusArea}', [AdminFocusAreaController::class, 'update'])->name('admin.focus-areas.update');
    Route::post('/admin/focus-areas/{focusArea}/delete', [AdminFocusAreaController::class, 'destroy'])->name('admin.focus-areas.destroy');

    // Admin hero notifications management
    Route::get('/admin/notifications', [AdminNotificationController::class, 'index'])->name('admin.notifications.index');
    Route::post('/admin/notifications', [AdminNotificationController::class, 'store'])->name('admin.notifications.store');
    Route::post('/admin/notifications/{notification}', [AdminNotificationController::class, 'update'])->name('admin.notifications.update');
    Route::post('/admin/notifications/{notification}/delete', [AdminNotificationController::class, 'destroy'])->name('admin.notifications.destroy');

    // Admin footer management
    Route::get('/admin/footer', [AdminFooterController::class, 'index'])->name('admin.footer.index');
    Route::post('/admin/footer', [AdminFooterController::class, 'update'])->name('admin.footer.update');

    // Admin newsletter subscriptions
    Route::get('/admin/newsletter', [AdminNewsletterController::class, 'index'])->name('admin.newsletter.index');

    // Admin general settings
    Route::get('/admin/settings/general', [AdminGeneralSettingController::class, 'index'])->name('admin.settings.general');
    Route::post('/admin/settings/general', [AdminGeneralSettingController::class, 'update'])->name('admin.settings.general.update');

    // Admin mail / SMTP settings
    Route::get('/admin/settings/mail', [AdminMailSettingController::class, 'index'])->name('admin.settings.mail');
    Route::post('/admin/settings/mail', [AdminMailSettingController::class, 'update'])->name('admin.settings.mail.update');

    // Admin SEO settings
    Route::get('/admin/settings/seo', [AdminSeoSettingController::class, 'index'])->name('admin.settings.seo');
    Route::post('/admin/settings/seo', [AdminSeoSettingController::class, 'update'])->name('admin.settings.seo.update');

    // Admin security settings
    Route::get('/admin/settings/security', [AdminSecuritySettingController::class, 'index'])->name('admin.settings.security');
    Route::post('/admin/settings/security', [AdminSecuritySettingController::class, 'update'])->name('admin.settings.security.update');

    // Admin forum registrations
    Route::get('/admin/forum-registrations', [AdminForumRegistrationController::class, 'index'])->name('admin.forum-registrations.index');
    Route::get('/admin/forum-registrations/{registration}', [AdminForumRegistrationController::class, 'show'])->name('admin.forum-registrations.show');
    Route::post('/admin/forum-registrations/{registration}/status', [AdminForumRegistrationController::class, 'updateStatus'])->name('admin.forum-registrations.update-status');

    // Admin UAE residents
    Route::get('/admin/uae-residents', [AdminUaeResidentController::class, 'index'])->name('admin.uae-residents.index');
    Route::post('/admin/uae-residents/{resident}/status', [AdminUaeResidentController::class, 'updateStatus'])->name('admin.uae-residents.update-status');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
