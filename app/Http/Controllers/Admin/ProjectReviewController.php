<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectReview;
use Illuminate\Http\Request;

class ProjectReviewController extends Controller
{
    /**
     * Display a listing of project reviews.
     */
    public function index()
    {
        $reviews = ProjectReview::with('project')->latest()->paginate(15);

        return view('admin.project_reviews.index', compact('reviews'));
    }

    /**
     * Approve/accept a project review.
     */
    public function approve(ProjectReview $review)
    {
        $review->update(['status' => 'approved']);

        return redirect()->back()->with('success', 'Project review has been accepted.');
    }

    /**
     * Reject/disapprove a project review.
     */
    public function reject(ProjectReview $review)
    {
        $review->update(['status' => 'rejected']);

        return redirect()->back()->with('success', 'Project review has been rejected.');
    }

    /**
     * Remove the specified project review from storage.
     */
    public function destroy(ProjectReview $review)
    {
        $review->delete();

        return redirect()->back()->with('success', 'Project review has been deleted.');
    }
}
