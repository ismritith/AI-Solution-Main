<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProjectReviewController;
use App\Http\Controllers\Admin\RegistrationController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\Front\PageController;
use Illuminate\Support\Facades\Route;

// USERS
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/insights', [PageController::class, 'insights'])->name('insights');
Route::get('/insights1', [PageController::class, 'insights1'])->name('insights.detail');
Route::get('/events', [PageController::class, 'events'])->name('events');
Route::get('/event1', [PageController::class, 'event1'])->name('events.detail');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/service-details', [PageController::class, 'serviceDetail'])->name('services.detail');
Route::get('/projects', [PageController::class, 'projects'])->name('projects');
Route::get('/projects1', [PageController::class, 'projects1'])->name('projects.detail');

// ADMIN REDIRECTS to actual dynamic CRUD
Route::redirect('/admin_dashboard', '/admin/dashboard');
Route::redirect('/admin_cms', '/admin/blogs');
Route::redirect('/admin_inquires', '/admin/inquiries');
Route::get('/admin_login', [PageController::class, 'admin_login'])->name('admin.login');
Route::post('/admin_login', [PageController::class, 'login'])->name('admin.login.submit');
Route::post('/admin_logout', [PageController::class, 'logout'])->name('admin.logout');

// FORMS
Route::get('/register_form', [PageController::class, 'register_form'])->name('register');
Route::post('/contact/submit', [InquiryController::class, 'store'])->name('contact.submit');
Route::post('/event/register', [RegistrationController::class, 'publicStore'])->name('event.register');
Route::post('/projects/review', [PageController::class, 'submitReview'])->name('project.review');

// ADMIN CRUD GROUP (SSR)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin.timeout'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/inquiries', [InquiryController::class, 'index'])->name('inquiries');
    Route::get('/inquiries/{inquiry}', [InquiryController::class, 'show'])->name('inquiries.show');
    Route::delete('/inquiries/{inquiry}', [InquiryController::class, 'destroy'])->name('inquiries.destroy');

    Route::resource('gallery', GalleryController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('events', EventController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('testimonials', TestimonialController::class);
    // Event Bookings
    Route::get('/registrations', [RegistrationController::class, 'index'])->name('registrations.index');
    Route::get('/registrations/{registration}', [RegistrationController::class, 'show'])->name('registrations.show');
    Route::delete('/registrations/{registration}', [RegistrationController::class, 'destroy'])->name('registrations.destroy');
    Route::resource('reviews', RegistrationController::class);

    // Project Reviews
    Route::get('/project-reviews', [ProjectReviewController::class, 'index'])->name('project-reviews.index');
    Route::patch('/project-reviews/{review}/approve', [ProjectReviewController::class, 'approve'])->name('project-reviews.approve');
    Route::patch('/project-reviews/{review}/reject', [ProjectReviewController::class, 'reject'])->name('project-reviews.reject');
    Route::delete('/project-reviews/{review}', [ProjectReviewController::class, 'destroy'])->name('project-reviews.destroy');
});

Route::post('/chatbot/stream', [ChatbotController::class, 'stream'])
    ->name('chatbot.stream')
    ->middleware('web');

Route::get('/test-clean', function () {
    return clean('<script>alert("test")</script><p>Hello</p>');
});
