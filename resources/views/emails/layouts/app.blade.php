<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Notification' }}</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #f6f9fc;
            color: #333333;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
        }
        .wrapper {
            width: 100%;
            background-color: #f6f9fc;
            padding: 40px 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: 1px solid #eef2f6;
        }
        .header {
            background: linear-gradient(135deg, #a510b4 0%, #ff2e93 100%);
            padding: 32px;
            text-align: center;
        }
        .header h1 {
            color: #ffffff;
            margin: 0;
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }
        .header p {
            color: rgba(255, 255, 255, 0.8);
            margin: 8px 0 0 0;
            font-size: 11px;
            font-family: monospace;
            letter-spacing: 1px;
        }
        .content {
            padding: 40px 32px;
        }
        .welcome-text {
            font-size: 18px;
            font-weight: 700;
            color: #1e1b4b;
            margin-top: 0;
            margin-bottom: 16px;
        }
        .body-text {
            font-size: 15px;
            line-height: 1.6;
            color: #4b5563;
            margin-bottom: 24px;
        }
        .details-box {
            background-color: #f8fafc;
            border-radius: 12px;
            padding: 24px;
            border: 1px solid #e2e8f0;
            margin-bottom: 24px;
        }
        .details-title {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #64748b;
            margin-top: 0;
            margin-bottom: 16px;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 8px;
        }
        .detail-row {
            margin-bottom: 12px;
            font-size: 14px;
            line-height: 1.5;
        }
        .detail-row:last-child {
            margin-bottom: 0;
        }
        .detail-label {
            font-weight: 700;
            color: #475569;
            margin-bottom: 2px;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .detail-value {
            color: #0f172a;
            word-break: break-word;
        }
        .btn-container {
            text-align: center;
            margin: 32px 0 16px 0;
        }
        .btn {
            background: linear-gradient(135deg, #a510b4 0%, #ff2e93 100%);
            color: #ffffff !important;
            text-decoration: none;
            padding: 12px 32px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 700;
            display: inline-block;
            box-shadow: 0 4px 10px rgba(165, 16, 180, 0.2);
        }
        .footer {
            text-align: center;
            padding: 24px 32px 40px 32px;
            background-color: #fafafa;
            border-top: 1px solid #f0f0f0;
        }
        .footer p {
            font-size: 12px;
            color: #94a3b8;
            margin: 0 0 8px 0;
        }
        .footer a {
            color: #a510b4;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="header">
                <h1>AI-Solutions</h1>
                <p>NEXUS SYSTEM TRANSMISSION</p>
            </div>
            <div class="content">
                @yield('email_content')
            </div>
            <div class="footer">
                <p>&copy; {{ date('Y') }} AI-Solutions Inc. Quantum Plaza, San Francisco, CA.</p>
                <p>Advancing Intelligence Through Innovation. <a href="{{ url('/') }}">Visit Platform</a></p>
            </div>
        </div>
    </div>
</body>
</html>
