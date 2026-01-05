<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'AniMerch System'))</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1" rel="stylesheet"/>

    <!-- Design System -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .guest-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            background-color: var(--am-bg-alt);
        }
        .guest-card-wrapper {
            width: 100%;
            max-width: 450px;
        }
    </style>
</head>
<body>
    <div class="guest-container">
        <!-- Background Glows -->
        <div class="hero-blob" style="top: -10%; left: -10%; background: var(--am-primary); opacity: 0.05;"></div>
        <div class="hero-blob" style="bottom: -10%; right: -10%; background: var(--am-danger); opacity: 0.05;"></div>

        <div class="guest-card-wrapper">
            <!-- Logo area -->
            <div style="text-align: center; margin-bottom: 2.5rem;">
                <a href="{{ url('/') }}" style="text-decoration: none; display: inline-flex; align-items: center; gap: 1rem;">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="AniMerch Logo" style="height: 48px; width: auto;">
                    <span style="font-weight: 900; font-size: 1.75rem; color: white; letter-spacing: -0.05em;">AniMerch</span>
                </a>
            </div>

            <!-- Content Card -->
            <div class="am-card" style="padding: 2.5rem; border-radius: 2rem;">
                {{ $slot }}
            </div>

            <!-- Footer Small -->
            <p style="margin-top: 2rem; text-align: center; color: var(--am-text-muted); font-size: 0.75rem; opacity: 0.5;">
                © 2026 AniMerch System Management. All rights reserved.
            </p>
        </div>
    </div>
</body>
</html>
