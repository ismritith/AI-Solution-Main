@extends('emails.layouts.app', ['title' => 'Project Review Submitted'])

@section('email_content')
    <h2 class="welcome-text">Thank you!</h2>
    <p class="body-text">
        We have received your project feedback and rating submission for the project node <strong>{{ $review->project->title ?? 'N/A' }}</strong>.
    </p>
    
    <p class="body-text">
        Your submission is currently in the administrator's moderation queue. Once verified and approved, it will be published live on the project showcase page.
    </p>

    <div class="details-box">
        <div class="details-title">Review Submission Summary</div>
        
        <div class="detail-row">
            <div class="detail-label">Project Node</div>
            <div class="detail-value" style="font-weight: bold;">{{ $review->project->title ?? 'N/A' }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Efficacy Rating</div>
            <div class="detail-value" style="color: #fbbf24; font-size: 16px; font-weight: bold;">{{ str_repeat('★', $review->rating) }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Client Name</div>
            <div class="detail-value">{{ $review->client_name }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Professional Role</div>
            <div class="detail-value">{{ $review->client_role }}</div>
        </div>

        <div class="detail-row" style="margin-top: 12px;">
            <div class="detail-label">Review Text</div>
            <div class="detail-value" style="font-style: italic; color: #475569;">"{{ $review->quote_text }}"</div>
        </div>
    </div>

    <p class="body-text" style="font-size: 13px; color: #64748b;">
        This is an automated receipt acknowledgment. You do not need to reply to this email.
    </p>
@endsection
