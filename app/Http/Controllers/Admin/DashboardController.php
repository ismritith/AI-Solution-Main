<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Event;
use App\Models\Inquiry;
use App\Models\Project;
use App\Models\Registration;
use App\Models\Service;
use App\Models\ProjectReview;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $inquiriesCount = Inquiry::count();
        $eventsCount = Event::count();
        $blogsCount = BlogPost::count();
        $projectsCount = Project::count();
        $servicesCount = Service::count();
        $registrationsCount = Registration::count();
        $testimonialsCount = Testimonial::count();
        $projectReviewsCount = ProjectReview::count();
        $pendingReviewsCount = ProjectReview::where('status', 'pending')->count();

        // Latest data lists
        $latestInquiries = Inquiry::latest()->limit(5)->get();
        $latestRegistrations = Registration::latest()->limit(5)->get();
        $latestTestimonials = Testimonial::latest()->limit(5)->get();
        $latestProjectReviews = ProjectReview::with('project')->latest()->limit(5)->get();

        return view('Front.pages.admin_dashboard', compact(
            'inquiriesCount',
            'eventsCount',
            'blogsCount',
            'projectsCount',
            'servicesCount',
            'registrationsCount',
            'testimonialsCount',
            'projectReviewsCount',
            'pendingReviewsCount',
            'latestInquiries',
            'latestRegistrations',
            'latestTestimonials',
            'latestProjectReviews'
        ));
    }
}
