<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactInquiryMail;

class InquiryController extends Controller
{
    public function index()
    {
        $inquiries = Inquiry::latest()->paginate(10);

        return view('Front.pages.admin_inquires', compact('inquiries'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'department' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $extraData = $request->only(['phone', 'company', 'job_title', 'country']);

        DB::beginTransaction();
        try {
            $inquiry = Inquiry::create($validated);

            // 1. Send confirmation email to user
            Mail::to($inquiry->email)->send(new ContactInquiryMail($inquiry, $extraData, false));

            // 2. Send alert email to admin
            $adminEmail = env('ADMIN_EMAIL', 'admin@ai-solutions.tech');
            Mail::to($adminEmail)->send(new ContactInquiryMail($inquiry, $extraData, true));

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Communication failed: We were unable to send confirmation to your email. Check your email or try again. Details: ' . $e->getMessage()
                ], 422);
            }
            return redirect()->back()->withInput()->withErrors([
                'email' => 'Communication failed: We were unable to send confirmation to your email. Check your email or try again. Details: ' . $e->getMessage()
            ]);
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Your message payload has been successfully transmitted.'
            ]);
        }

        return redirect()->back()->with('success', 'Your message payload has been successfully transmitted.');
    }

    public function show(Inquiry $inquiry)
    {
        return view('admin.inquiries.show', compact('inquiry'));
    }

    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();

        return redirect()->route('admin.inquiries')->with('success', 'Inquiry transmission has been purged.');
    }
}
