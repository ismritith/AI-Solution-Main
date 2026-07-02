<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\EventRegistrationMail;

class RegistrationController extends Controller
{
    /**
     * Display a listing of all event bookings.
     */
    public function index()
    {
        $registrations = Registration::with('event')->latest()->paginate(15);

        return view('admin.registration.index', compact('registrations'));
    }

    /**
     * Display the specified booking record.
     */
    public function show(Registration $registration)
    {
        $registration->load('event');

        return view('admin.registration.show', compact('registration'));
    }

    /**
     * Remove the specified booking from storage.
     */
    public function destroy(Registration $registration)
    {
        $registration->delete();

        return redirect()
            ->route('admin.registrations.index')
            ->with('success', 'Booking record has been purged successfully.');
    }

    /**
     * Handle public-facing event registration form submission.
     */
    public function publicStore(Request $request)
    {
        $validated = $request->validate([
            'registration_type' => 'required|in:team,individual',
            'team_name' => 'nullable|string|max:255',
            'full_name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'event_name' => 'required|string|max:255',
            'event_id' => 'nullable|exists:events,id',
            'team_size' => 'nullable|integer|min:1|max:20',
            'pass_type' => 'nullable|string|max:255',
            'members' => 'nullable|array',
        ]);

        DB::beginTransaction();
        try {
            $registration = Registration::create($validated);

            // 1. Send confirmation email to user
            Mail::to($registration->email)->send(new EventRegistrationMail($registration, false));

            // 2. Send alert email to admin
            $adminEmail = env('ADMIN_EMAIL', 'admin@ai-solutions.tech');
            Mail::to($adminEmail)->send(new EventRegistrationMail($registration, true));

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Registration aborted: We were unable to send confirmation to your email. Check your email or try again. Details: ' . $e->getMessage()
                ], 422);
            }
            return redirect()->back()->withInput()->withErrors([
                'email' => 'Registration aborted: We were unable to send confirmation to your email. Check your email or try again. Details: ' . $e->getMessage()
            ]);
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Your registration has been successfully submitted.'
            ]);
        }

        return redirect()->route('events')->with('success', 'Your registration has been successfully submitted.');
    }
}
