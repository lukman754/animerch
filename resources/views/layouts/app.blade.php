<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'AniMerch System')</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1" rel="stylesheet"/>
    
    <!-- Design System -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('head')
</head>
<body>
    <div class="am-admin-layout">
        <div id="sidebar-overlay" class="am-sidebar-overlay"></div>
        <!-- Sidebar -->
        <aside id="admin-sidebar" class="am-sidebar d-none d-md-flex">
            <div style="padding: 2.5rem 1.5rem; border-bottom: 1px solid var(--am-border); margin-bottom: 1.5rem;">
                <a href="{{ url('/') }}" style="text-decoration: none; display: flex; align-items: center; gap: 0.75rem;">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="height: 40px; width: auto;">
                    <div>
                        <span style="display: block; color: white; font-weight: 900; font-size: 1.25rem; tracking-tighter; line-height: 1;">AniMerch</span>
                        <span style="display: block; color: var(--am-primary); font-size: 0.625rem; font-weight: 700; text-transform: uppercase; margin-top: 0.25rem; letter-spacing: 0.1em;">Sistem V2.0</span>
                    </div>
                </a>
            </div>

            <nav class="am-sidebar-nav">
                <a href="{{ url('/') }}" class="am-sidebar-link">
                    <span class="material-symbols-outlined">home</span>
                    Beranda Halaman
                </a>
                <a href="{{ route('merchandise.index') }}" class="am-sidebar-link {{ Request::is('merchandise*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined">shopping_bag</span>
                    Inventaris Merch
                </a>
                <a href="#" class="am-sidebar-link" style="opacity: 0.3; cursor: not-allowed;">
                    <span class="material-symbols-outlined">calendar_month</span>
                    Manajemen Event
                </a>
                <a href="#" class="am-sidebar-link" style="opacity: 0.3; cursor: not-allowed;">
                    <span class="material-symbols-outlined">monitoring</span>
                    Statistik & Laporan
                </a>
                <a href="{{ route('profile.edit') }}" class="am-sidebar-link {{ Request::is('profile*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined">account_circle</span>
                    Pengaturan Profil
                </a>
            </nav>

            <div style="margin-top: auto; padding: 1.5rem; border-top: 1px solid var(--am-border);">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="am-btn am-btn-outline w-100" style="color: var(--am-danger); border-color: rgba(239, 107, 0, 0.2);">
                        <span class="material-symbols-outlined">logout</span>
                        Keluar Sistem
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Workspace -->
        <div class="am-admin-main">
            <!-- Header -->
            <header class="am-admin-header">
                <div class="d-flex align-items-center gap-3">
                    <button id="admin-burger" class="am-btn am-btn-outline d-md-none" style="padding: 0.5rem;">
                        <span class="material-symbols-outlined">menu</span>
                    </button>
                    <div style="font-size: 0.875rem; color: var(--am-text-muted);">
                        Portal Admin / <span style="color: white; font-weight: 600;">@yield('page_title', 'Dashboard')</span>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-3">
                    <div style="text-align: right; line-height: 1.2;" class="d-none d-sm-block">
                        <span style="display: block; color: white; font-weight: 700; font-size: 0.875rem;">{{ Auth::user()->name }}</span>
                        <span style="display: block; color: var(--am-text-muted); font-size: 0.75rem;">Administrator</span>
                    </div>
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=ABD907&color=121212" 
                         alt="Avatar" style="height: 40px; width: 40px; border-radius: 50%; border: 1px solid var(--am-border);">
                </div>
            </header>

            <!-- Scrollable Content Area -->
            <main class="am-admin-content">
                <div style="max-width: 1200px; margin: 0 auto;">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script>
        const burger = document.getElementById('admin-burger');
        const sidebar = document.getElementById('admin-sidebar');
        const overlay = document.getElementById('sidebar-overlay');

        if (burger && sidebar && overlay) {
            const toggleSidebar = () => {
                sidebar.classList.toggle('active');
                overlay.classList.toggle('active');
            };

            burger.addEventListener('click', toggleSidebar);
            overlay.addEventListener('click', toggleSidebar);
        }
    </script>
    @stack('scripts')
</body>
</html>
