<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Tentang Kami - AniMerch</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1" rel="stylesheet"/>
    
    <!-- Design System -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <!-- Navbar -->
    <nav class="am-nav">
        <div class="am-container">
            <div class="am-nav-content">
                <a class="am-nav-links" style="text-decoration: none;" href="{{ url('/') }}">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="AniMerch Logo" style="height: 32px;">
                    <span style="font-weight: bold; font-size: 1.25rem; color: white; letter-spacing: -0.05em;">AniMerch</span>
                </a>

                <div class="am-nav-links d-none d-md-flex">
                    <a class="am-nav-link" href="{{ url('/') }}">Beranda</a>
                    <a class="am-nav-link" href="{{ route('merchandise.catalog') }}">Katalog</a>
                    <a class="am-nav-link active" href="{{ route('about') }}">Tentang Kami</a>
                    @auth
                        <a class="am-nav-link" href="{{ route('merchandise.index') }}">Dashboard</a>
                        <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                            @csrf
                            <button type="submit" class="am-btn am-btn-primary">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="am-btn am-btn-primary">Masuk</a>
                    @endauth
                </div>

                <button id="mobile-menu-button" class="am-btn am-btn-outline d-md-none" style="padding: 0.5rem;">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
        </div>
        
        <div id="mobile-menu" class="am-mobile-menu">
            <a href="{{ url('/') }}" class="am-nav-link d-block py-3">Beranda</a>
            <a href="{{ route('merchandise.catalog') }}" class="am-nav-link d-block py-3">Katalog</a>
            <a href="{{ route('about') }}" class="am-nav-link active d-block py-3">Tentang Kami</a>
            <hr style="border-color: var(--am-border);">
            @auth
                <a href="{{ route('merchandise.index') }}" class="am-nav-link d-block py-3">Dashboard</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="am-btn am-btn-primary w-100">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="am-btn am-btn-primary w-100">Masuk</a>
            @endauth
        </div>
    </nav>

    <main style="padding: 8rem 0 5rem;">
        <!-- Background Decor -->
        <div class="hero-blob" style="top: -100px; right: 0; background-color: var(--am-primary); opacity: 0.05;"></div>
        <div class="hero-blob" style="bottom: 0; left: -100px; background-color: var(--am-danger); opacity: 0.05; animation-delay: 2s;"></div>

        <div class="am-container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.35rem 0.75rem; border-radius: 999px; border: 1px solid rgba(171, 217, 7, 0.2); background: rgba(171, 217, 7, 0.05); color: var(--am-primary); font-size: 0.75rem; font-weight: 700; margin-bottom: 1.5rem;">
                        <span style="display: block; width: 0.5rem; height: 0.5rem; border-radius: 50%; background: var(--am-primary);"></span>
                        MENGENAL LEBIH DEKAT
                    </div>
                    
                    <h1 class="display-3 text-white mb-4">Apa itu <span class="text-gradient">AniMerch?</span></h1>
                    
                    <p style="color: var(--am-text-muted); font-size: 1.25rem; line-height: 1.6; margin-bottom: 4rem;">
                        AniMerch adalah pusat koleksi merchandise anime paling komprehensif di Indonesia. Kami lahir dari kecintaan terhadap budaya pop Jepang dan kebutuhan kolektor akan sistem pendataan yang profesional dan terorganisir.
                    </p>

                    <div class="row g-4 mb-5">
                        <div class="col-md-6">
                            <div class="am-card p-5 h-100">
                                <div style="width: 3.5rem; height: 3.5rem; background: rgba(171, 217, 7, 0.1); color: var(--am-primary); border-radius: 1rem; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                                    <span class="material-symbols-outlined text-3xl">visibility</span>
                                </div>
                                <h3 class="h4 font-bold mb-3 text-white">Visi Kami</h3>
                                <p style="color: var(--am-text-muted); line-height: 1.7;">Menjadi pusat informasi dan ekosistem merchandise anime terbesar yang menghubungkan kolektor, kreator, dan event organizer di seluruh nusantara.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="am-card p-5 h-100">
                                <div style="width: 3.5rem; height: 3.5rem; background: rgba(239, 107, 0, 0.1); color: var(--am-danger); border-radius: 1rem; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                                    <span class="material-symbols-outlined text-3xl">verified</span>
                                </div>
                                <h3 class="h4 font-bold mb-3 text-white">Misi Kami</h3>
                                <p style="color: var(--am-text-muted); line-height: 1.7;">Memberikan kemudahan bagi kolektor untuk melacak inventaris mereka serta menyediakan etalase publik yang estetik untuk berbagi hobi.</p>
                            </div>
                        </div>
                    </div>

                    <div style="text-align: center; padding-top: 5rem; border-top: 1px solid var(--am-border); margin-top: 5rem;">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="height: 80px; opacity: 0.3; filter: grayscale(1); margin-bottom: 2rem;">
                        <p style="font-style: italic; color: var(--am-text-muted); font-size: 1.25rem; max-width: 600px; margin: 0 auto 3rem;">
                            "Setiap item memiliki cerita, setiap koleksi adalah identitas. Biarkan sistem kami mengabadikan perjalanan hobi Anda."
                        </p>
                        <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
                            <a href="{{ route('merchandise.catalog') }}" class="am-btn am-btn-primary px-5 py-3">Jelajahi Katalog</a>
                            <a href="{{ url('/') }}" class="am-btn am-btn-outline px-5 py-3">Kembali Beranda</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer style="background: var(--am-bg-alt); padding: 5rem 0 2rem; border-top: 1px solid var(--am-border);">
        <div class="am-container">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2 mb-4 mb-md-0">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="height: 24px;">
                    <span style="font-weight: 900; font-size: 1.25rem;">AniMerch</span>
                </div>
                <p style="color: var(--am-text-muted); font-size: 0.75rem; margin: 0;">© 2026 AniMerch. All rights reserved.</p>
                <div class="d-flex gap-4 mt-4 mt-md-0">
                    <a href="{{ url('/') }}" class="am-nav-link" style="font-size: 0.75rem;">Beranda</a>
                    <a href="{{ route('merchandise.catalog') }}" class="am-nav-link" style="font-size: 0.75rem;">Katalog</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('active');
        });
    </script>
</body>
</html>
