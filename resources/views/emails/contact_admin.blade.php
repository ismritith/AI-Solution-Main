@extends('emails.layouts.app', ['title' => '[ALERT] New Contact Inquiry'])

@section('email_content')
    <h2 class="welcome-text" style="color: #ff2e93;">Incoming Transmission Node</h2>
    <p class="body-text">
        A new contact inquiry payload has been transmitted from the public interface. Please find the node metadata specifications below.
    </p>

    <div class="details-box" style="border-left: 4px solid #ff2e93;">
        <div class="details-title" style="color: #ff2e93;">Payload Specifications</div>
        
        <div class="detail-row">
            <div class="detail-label">Sender name</div>
            <div class="detail-value" style="font-weight: bold;">{{ $inquiry->name }}</div>
        </div>
        
        <div class="detail-row">
            <div class="detail-label">Email Interface</div>
            <div class="detail-value"><a href="mailto:{{ $inquiry->email }}" style="color: #a510b4;">{{ $inquiry->email }}</a></div>
        </div>

        @if(!empty($extraData['phone']))
            <div class="detail-row">
                <div class="detail-label">Phone Connection</div>
                <div class="detail-value">{{ $extraData['phone'] }}</div>
            </div>
        @endif

        @if(!empty($extraData['company']))
            <div class="detail-row">
                <div class="detail-label">Organization</div>
                <div class="detail-value">{{ $extraData['company'] }}</div>
            </div>
        @endif

        @if(!empty($extraData['job_title']))
            <div class="detail-row">
                <div class="detail-label">Professional Role</div>
                <div class="detail-value">{{ $extraData['job_title'] }}</div>
            </div>
        @endif

        @if(!empty($extraData['country']))
            <div class="detail-row">
                <div class="detail-label">Geographic Location</div>
                <div class="detail-value">{{ $extraData['country'] }}</div>
            </div>
        @endif
        
        <div class="detail-row">
            <div class="detail-label">Target Department</div>
            <div class="detail-value" style="font-family: monospace; background: #eef2f6; padding: 2px 6px; border-radius: 4px; display: inline-block;">{{ $inquiry->department }}</div>
        </div>
        
        <div class="detail-row" style="margin-top: 16px;">
            <div class="detail-label">Message Payload</div>
            <div class="detail-value" style="background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px; padding: 16px; font-family: monospace; white-space: pre-wrap; font-size: 13px; color: #1e293b;">{{ $inquiry->message }}</div>
        </div>
    </div>

    <div class="btn-container">
        <a href="{{ url('/admin_login') }}" class="btn">Access Control Panel</a>
    </div>
@endsection
