@extends('emails.layouts.app', ['title' => '[ALERT] New Event Booking Registered'])

@section('email_content')
    <h2 class="welcome-text" style="color: #a510b4;">Event Booking Received</h2>
    <p class="body-text">
        A new pass reservation registration has been written to the event database nodes. Here are the booking details.
    </p>

    <div class="details-box" style="border-left: 4px solid #a510b4;">
        <div class="details-title" style="color: #a510b4;">Booking Details</div>
        
        <div class="detail-row">
            <div class="detail-label">Target Event</div>
            <div class="detail-value" style="font-weight: bold;">{{ $registration->event_name }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Type</div>
            <div class="detail-value" style="text-transform: capitalize;">{{ $registration->registration_type }}</div>
        </div>

        @if($registration->registration_type === 'team')
            <div class="detail-row">
                <div class="detail-label">Team Name</div>
                <div class="detail-value">{{ $registration->team_name }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Team Size</div>
                <div class="detail-value">{{ $registration->team_size }} Members</div>
            </div>
        @else
            <div class="detail-row">
                <div class="detail-label">Attendee Name</div>
                <div class="detail-value">{{ $registration->full_name }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Pass Tier</div>
                <div class="detail-value" style="font-family: monospace; background: #eef2f6; padding: 2px 6px; border-radius: 4px; display: inline-block;">{{ $registration->pass_type ?? 'Standard Delegate' }}</div>
            </div>
        @endif

        <div class="detail-row">
            <div class="detail-label">Lead Contact</div>
            <div class="detail-value"><a href="mailto:{{ $registration->email }}" style="color: #a510b4;">{{ $registration->email }}</a></div>
        </div>

        @if($registration->registration_type === 'team' && !empty($registration->members))
            <div class="detail-row" style="margin-top: 16px;">
                <div class="detail-label" style="margin-bottom: 6px;">Team Registry</div>
                <div class="detail-value" style="background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px; padding: 12px; font-size: 13px;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="border-bottom: 1px solid #e2e8f0; text-align: left; font-size: 11px; text-transform: uppercase; color: #64748b;">
                                <th style="padding-bottom: 6px;">Name</th>
                                <th style="padding-bottom: 6px;">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($registration->members as $member)
                                <tr style="border-bottom: 1px solid #f1f5f9;">
                                    <td style="padding: 6px 0; color: #1e293b;">{{ $member['name'] ?? 'N/A' }}</td>
                                    <td style="padding: 6px 0; color: #475569;">{{ $member['email'] ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>

    <div class="btn-container">
        <a href="{{ url('/admin/registrations') }}" class="btn">Manage Bookings</a>
    </div>
@endsection
