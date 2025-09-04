<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opening {{ config('app.name') }} App...</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            margin: 0;
            padding: 20px;
            background: #f8f9fa;
            text-align: center;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .logo {
            width: 60px;
            height: 60px;
            background: #ED3237;
            border-radius: 12px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }
        .spinner {
            border: 3px solid #f3f3f3;
            border-top: 3px solid #ED3237;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 1s linear infinite;
            margin: 20px auto;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .fallback-btn {
            background: #ED3237;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            margin: 15px 0;
            font-weight: bold;
        }
        .fallback-btn:hover {
            background: #c82227;
        }
        .email-display {
            background: #e9ecef;
            padding: 10px;
            border-radius: 6px;
            font-family: monospace;
            word-break: break-all;
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">{{ substr(config('app.name'), 0, 1) }}</div>

        <h2>Opening {{ config('app.name') }} App...</h2>
        <div class="spinner"></div>

        <p>Redirecting you to reset your password for:</p>
        <div class="email-display">{{ $email }}</div>

        <p><small>If the app doesn't open automatically:</small></p>

        <a href="{{ $deepLink }}" class="fallback-btn" id="deepLinkBtn">
            Open Mobile App
        </a>

        <br><br>

        <a href="{{ $webFallback }}" class="fallback-btn">
            Continue in Browser
        </a>

        <p><small style="color: #6c757d;">
            Don't have the app?
            <a href="{{ $webFallback }}" style="color: #ED3237;">Reset password in browser</a>
        </small></p>
    </div>

    <script>
        // Attempt automatic redirect to app
        window.location.href = '{{ $deepLink }}';

        // Fallback: if still on page after 3 seconds, show options
        setTimeout(function() {
            document.querySelector('.spinner').style.display = 'none';
            document.querySelector('h2').innerHTML = 'Choose how to continue:';
        }, 3000);

        // Handle deep link button click
        document.getElementById('deepLinkBtn').addEventListener('click', function(e) {
            e.preventDefault();
            window.location.href = '{{ $deepLink }}';

            // Fallback to web after 2 seconds if app doesn't open
            setTimeout(function() {
                window.location.href = '{{ $webFallback }}';
            }, 2000);
        });
    </script>
</body>
</html>