@extends('emails.layouts.app', ['title' => '[ALERT] New Project Review Pending'])

@section('email_content')
    <h2 class="welcome-text" style="color: #ff2e93;">Review Awaiting Moderation</h2>
    <p class="body-text">
        A new project review submission is pending moderation before it can be displayed publicly. Details are listed below.
    </p>

    <div class="details-box" style="border-left: 4px solid #ff2e93;">
        <div class="details-title" style="color: #ff2e93;">Review Details</div>
        
        <div class="detail-row">
            <div class="detail-label">Project Node</div>
            <div class="detail-value" style="font-weight: bold;">{{ $review->project->title ?? 'N/A' }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Efficacy Rating</div>
            <div class="detail-value" style="color: #fbbf24; font-size: 16px; font-weight: bold;">{{ str_repeat('★', $review->rating) }} ({{ $review->rating }}/5)</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Client Name</div>
            <div class="detail-value" style="font-weight: bold;">{{ $review->client_name }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Email Interface</div>
            <div class="detail-value"><a href="mailto:{{ $review->email }}" style="color: #a510b4;">{{ $review->email }}</a></div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Professional Role</div>
            <div class="detail-value">{{ $review->client_role }}</div>
        </div>

        @if(!empty($review->phone))
            <div class="detail-row">
                <div class="detail-label">Phone Connection</div>
                <div class="detail-value">{{ $review->phone }}</div>
            </div>
        @endif

        <div class="detail-row" style="margin-top: 16px;">
            <div class="detail-label">Review Quote</div>
            <div class="detail-value" style="background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px; padding: 16px; font-family: monospace; white-space: pre-wrap; font-size: 13px; color: #1e293b;">{{ $review->quote_text }}</div>
        </div>
    </div>

    <div class="btn-container">
        <a href="{{ url('/admin/project-reviews') }}" class="btn">Manage Reviews</a>
    </div>
@endsection
