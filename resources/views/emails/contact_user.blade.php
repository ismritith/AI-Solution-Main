@extends('emails.layouts.app', ['title' => 'Transmission Acknowledged'])

@section('email_content')
    <h2 class="welcome-text">Hello {{ $inquiry->name }},</h2>
    <p class="body-text">
        We have successfully received your inquiry transmission. A system architect at AI-Solutions has queued your request and will establish a connection shortly.
    </p>

    <div class="details-box">
        <div class="details-title">Transmission Details</div>
        
        <div class="detail-row">
            <div class="detail-label">Identity</div>
            <div class="detail-value">{{ $inquiry->name }}</div>
        </div>
        
        <div class="detail-row">
            <div class="detail-label">Department</div>
            <div class="detail-value">{{ $inquiry->department }}</div>
        </div>
        
        <div class="detail-row">
            <div class="detail-label">Payload Message</div>
            <div class="detail-value" style="font-style: italic; color: #475569;">"{{ $inquiry->message }}"</div>
        </div>
    </div>

    <p class="body-text" style="font-size: 13px; color: #64748b;">
        This is an automated transmission acknowledgment. You do not need to reply to this email.
    </p>
@endsection
