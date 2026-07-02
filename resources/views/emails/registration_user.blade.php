@extends('emails.layouts.app', ['title' => 'Event Registration Confirmed'])

@section('email_content')
    <h2 class="welcome-text">Congratulations!</h2>
    <p class="body-text">
        Your registration credentials for <strong>{{ $registration->event_name }}</strong> have been successfully verified. An active seat pass has been assigned to your profile.
    </p>

    <div class="details-box">
        <div class="details-title">Pass Specifications</div>
        
        <div class="detail-row">
            <div class="detail-label">Event Node</div>
            <div class="detail-value" style="font-weight: 750;">{{ $registration->event_name }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Registration Type</div>
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
            <div class="detail-label">Contact Interface</div>
            <div class="detail-value">{{ $registration->email }}</div>
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

    <p class="body-text">
        We look forward to seeing you at the summit. Please bring a digital copy of this transmission email for check-in validation.
    </p>
@endsection
