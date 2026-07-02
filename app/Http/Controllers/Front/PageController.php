<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\ContactInquiry;
use App\Models\Event;
use App\Models\GalleryAsset;
use App\Models\Project;
use App\Models\ProjectReview;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProjectReviewMail;

class PageController extends Controller
{
    /**
     * Render the Home / Welcome page.
     */
    public function home()
    {
        $services = Service::latest()->take(6)->get();
        $posts = BlogPost::where('status', 'published')->latest()->take(3)->get();
        $events = Event::latest()->take(3)->get();
        $projects = Project::latest()->take(3)->get();
        
        $testimonials = Testimonial::latest()->get();
        $projectReviews = ProjectReview::with('project')->where('status', 'approved')->latest()->get();
        $combinedTestimonials = $testimonials->concat($projectReviews)->sortByDesc('created_at');

        return view('welcome', compact('services', 'posts', 'events', 'projects', 'combinedTestimonials'));
    }

    /**
     * Render the About Us & Capabilities page.
     */
    public function about()
    {
        $testimonials = Testimonial::latest()->get();
        $services = Service::latest()->get();

        return view('Front.pages.about', compact('testimonials', 'services'));
    }

    /**
     * Render the Visual Neural Gallery page.
     */
    public function gallery(Request $request)
    {
        // Collect all distinct categories for each media type
        $imageCategories = GalleryAsset::where('media_type', 'image')
            ->distinct()->pluck('category')->filter()->sort()->values();
        $videoCategories = GalleryAsset::where('media_type', 'video')
            ->distinct()->pluck('category')->filter()->sort()->values();

        // Apply optional category filter per type
        $imgCatFilter = $request->query('img_cat');
        $vidCatFilter = $request->query('vid_cat');

        $imagesQuery = GalleryAsset::where('media_type', 'image')->latest();
        if ($imgCatFilter) {
            $imagesQuery->where('category', $imgCatFilter);
        }

        $videosQuery = GalleryAsset::where('media_type', 'video')->latest();
        if ($vidCatFilter) {
            $videosQuery->where('category', $vidCatFilter);
        }

        $images = $imagesQuery->paginate(9, ['*'], 'img_page');
        $videos = $videosQuery->paginate(9, ['*'], 'vid_page');

        return view('Front.pages.gallery', compact('images', 'videos', 'imageCategories', 'videoCategories', 'imgCatFilter', 'vidCatFilter'));
    }

    /**
     * Render the Insights / Blog Hub page.
     */
    public function insights()
    {
        $posts = BlogPost::where('status', 'published')->latest()->paginate(9);

        return view('Front.pages.insights', compact('posts'));
    }

    /**
     * Render the single Insight/Blog Detail page.
     */
    public function insights1(Request $request)
    {
        $id = $request->query('id');
        $post = BlogPost::find($id) ?? BlogPost::where('status', 'published')->first();

        $recentPosts = [];
        if ($post) {
            $recentPosts = BlogPost::where('status', 'published')
                ->where('id', '!=', $post->id)
                ->latest()
                ->take(3)
                ->get();
        }

        return view('Front.pages.insight-details', compact('post', 'recentPosts'));
    }

    /**
     * Render the Global AI Events page.
     */
    public function events(Request $request)
    {
        $events = Event::latest()->paginate(9);

        return view('Front.pages.events', compact('events'));
    }

    /**
     * Render the single Event Detail page.
     */
    public function event1(Request $request)
    {
        $id = $request->query('id');
        $event = $id ? Event::find($id) : null;

        return view('Front.pages.event-detail', compact('event'));
    }

    /**
     * Render the registration form.
     */
    public function register_form()
    {
        return view('Front.pages.register_form');
    }

    /**
     * Render the Contact Form & direct nodes page.
     */
    public function contact()
    {
        return view('Front.pages.contact');
    }


    

    /**
     * Render the Services index page.
     */
    public function services()
    {
        $allServices = Service::latest()->get();
        $infrastructureServices = $allServices->where('category', 'infrastructure');
        $verticalServices = $allServices->where('category', 'vertical');
        $stepServices = $allServices->where('category', 'step')->sortBy('step_number');

        return view('Front.pages.services', compact('allServices', 'infrastructureServices', 'verticalServices', 'stepServices'));
    }

    /**
     * Render the single Service Detail page.
     */
    public function serviceDetail(Request $request)
    {
        $id = $request->query('id');
        $service = $id ? Service::find($id) : null;

        // Fetch other services for "Related Services" section (exclude current)
        $relatedServices = collect();
        if ($service) {
            $relatedServices = Service::where('id', '!=', $service->id)->latest()->take(3)->get();
        }

        return view('Front.pages.service-details', compact('service', 'relatedServices'));
    }

    public function projects(Request $request)
    {
        $presentProjects  = Project::whereIn('classification', ['present', 'featured'])->latest()->paginate(9, ['*'], 'pres_page');
        $legacyProjects   = Project::where('classification', 'legacy')->latest()->paginate(9, ['*'], 'leg_page');
        $horizonProjects  = Project::where('classification', 'horizon')->latest()->paginate(9, ['*'], 'hor_page');
        $testimonials     = Testimonial::latest()->get();

        return view('Front.pages.projects', compact('presentProjects', 'legacyProjects', 'horizonProjects', 'testimonials'));
    }

    /**
     * Render the single Project Detail page.
     */
    public function projects1(Request $request)
    {
        $id = $request->query('id');
        $project = $id ? Project::find($id) : null;
        
        $approvedReviews = [];
        if ($project) {
            $approvedReviews = $project->approvedReviews()->latest()->get();
        }

        return view('Front.pages.projects-detail', compact('project', 'approvedReviews'));
    }

    public function admin_login()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('Front.pages.admin_login');
    }

    /**
     * Handle admin login request.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            session(['admin_last_activity' => time()]);

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Handle admin logout request.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->forget(['admin_last_activity']);

        return redirect()->route('admin.login');
    }

    public function submitReview(Request $request)
    {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'client_name' => 'required|string|max:255',
            'client_role' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'rating' => 'required|integer|min:1|max:5',
            'quote_text' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (str_word_count($value) > 200) {
                        $fail('The review description must not exceed 200 words.');
                    }
                },
            ],
        ]);

        $validated['status'] = 'pending';

        DB::beginTransaction();
        try {
            $review = ProjectReview::create($validated);
            // Load project relationship so email template can reference title
            $review->load('project');

            // 1. Send confirmation email to user
            Mail::to($review->email)->send(new ProjectReviewMail($review, false));

            // 2. Send alert email to admin
            $adminEmail = env('ADMIN_EMAIL', 'admin@ai-solutions.tech');
            Mail::to($adminEmail)->send(new ProjectReviewMail($review, true));

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Feedback submission aborted: We were unable to send confirmation to your email. Check your email or try again. Details: ' . $e->getMessage()
                ], 422);
            }
            return redirect()->back()->withInput()->withErrors([
                'email' => 'Feedback submission aborted: We were unable to send confirmation to your email. Check your email or try again. Details: ' . $e->getMessage()
            ]);
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Your review was successfully submitted and is pending administrator moderation.'
            ]);
        }

        return redirect()->back()->with('success', 'Your review was successfully submitted and is pending administrator moderation.');
    }
}
