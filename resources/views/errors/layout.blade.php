<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error - @yield('code')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #212529;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .error-container {
            background: #fff;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }
        .error-container h1 {
            font-size: 120px;
            font-weight: 700;
            color: #dc3545;
        }
        .error-container h3 {
            font-size: 28px;
            margin-top: 15px;
            font-weight: 600;
        }
        .error-container p {
            margin-top: 10px;
            font-size: 16px;
            color: #6c757d;
        }
        .btn-custom {
            margin-top: 20px;
            border-radius: 30px;
            padding: 10px 25px;
            font-size: 16px;
            font-weight: 500;
        }
    </style>
</head>
<body>
<div class="error-container">
    <h1>@yield('code')</h1>
    <h3>@yield('message')</h3>
    <p>@yield('description')</p>

    @php
        $homeUrl = url('/'); // default for guest
        if (Auth::guard('admin')->check()) {
            $homeUrl = route('admin.dashboard');
        } elseif (Auth::guard('web')->check()) {
            $homeUrl = route('user.dashboard');
        }
    @endphp

    <a href="{{ $homeUrl }}" class="btn btn-primary btn-custom">Go to Home</a>
</div>
</body>
</html>
