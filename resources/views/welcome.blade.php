<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>AniMerch - Arsip Koleksi Merchandise Anime & Event Guide</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1" rel="stylesheet"/>
    
    <!-- Design System (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <!-- Navbar -->
    <nav class="am-nav">
        <div class="am-container">
            <div class="am-nav-content">
                <a class="am-nav-links" style="text-decoration: none;" href="{{ url('/') }}">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="AniMerch Logo" style="height: 32px; width: auto;">
                    <span style="font-weight: bold; font-size: 1.25rem; color: white; letter-spacing: -0.05em;">AniMerch</span>
                </a>

                <div class="am-nav-links d-none d-md-flex">
                    <a class="am-nav-link active" href="{{ url('/') }}">Beranda</a>
                    <a class="am-nav-link" href="{{ route('merchandise.catalog') }}">Katalog</a>
                    <a class="am-nav-link" href="{{ route('about') }}">Tentang Kami</a>
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

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="am-btn am-btn-outline d-md-none" style="padding: 0.5rem;">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="am-mobile-menu">
            <a href="{{ url('/') }}" class="am-nav-link d-block py-3">Beranda</a>
            <a href="{{ route('merchandise.catalog') }}" class="am-nav-link d-block py-3">Katalog</a>
            <a href="{{ route('about') }}" class="am-nav-link d-block py-3">Tentang Kami</a>
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

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-blob" style="top: 0; right: -100px; background-color: var(--am-primary);"></div>
        <div class="hero-blob" style="bottom: 0; left: -100px; background-color: var(--am-danger); animation-delay: 2s;"></div>
        
        <div class="am-container relative">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start">
                    <div style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.375rem 0.75rem; border-radius: 9999px; border: 1px solid rgba(171, 217, 7, 0.2); background: rgba(171, 217, 7, 0.05); color: var(--am-primary); font-size: 0.75rem; font-weight: 600; margin-bottom: 1.5rem;">
                        <span style="width: 0.5rem; height: 0.5rem; border-radius: 50%; background: var(--am-primary);"></span>
                        Sistem v2.0 Aktif
                    </div>
                    <h1 class="display-3 mb-4 text-white">
                        Pantau Item. <br/>
                        Kelola Koleksi. <br/>
                        <span class="text-gradient">Satu Sistem.</span>
                    </h1>
                    <p style="color: var(--am-text-muted); font-size: 1.125rem; margin-bottom: 2.5rem; max-width: 500px; margin-left: auto; margin-right: auto;" class="mx-lg-0">
                        Pusat pengelolaan koleksi merchandise acara anime favorit Anda. Catat setiap koleksi, pantau estimasi harga, dan temukan item incaran dalam arsip profesional.
                    </p>
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center justify-content-lg-start">
                        <a href="{{ route('merchandise.catalog') }}" class="am-btn am-btn-primary py-3 px-4">
                            Lihat Katalog Merch
                            <span class="material-symbols-outlined">shopping_bag</span>
                        </a>
                        <a href="{{ route('login') }}" class="am-btn am-btn-outline py-3 px-4">
                            <span class="material-symbols-outlined">login</span>
                            Masuk Akun
                        </a>
                    </div>
                </div>

                <!-- Hero Image Card -->
                <div class="col-lg-6 mt-5 mt-lg-0">
                    <div class="am-card" style="max-width: 450px; margin: 0 auto; border-radius: 2rem;">
                        <div style="position: relative; aspect-ratio: 4/5; background: #1a1e22; overflow: hidden;">
                            <img src="https://instagram.fcgk15-1.fna.fbcdn.net/v/t39.30808-6/607294925_1343290257842511_1066060199889006511_n.jpg?stp=c0.121.1444.1805a_dst-jpg_e35_s1080x1080_tt6&_nc_cat=103&ig_cache_key=Mzc5OTgwNjc5MDM2MDQ3OTc4Mw%3D%3D.3-ccb7-5&ccb=7-5&_nc_sid=58cdad&efg=eyJ2ZW5jb2RlX3RhZyI6InhwaWRzLjE0NDR4MjA0OC5zZHIuQzMifQ%3D%3D&_nc_ohc=qjoSkGWIYlcQ7kNvwHk3lyO&_nc_oc=AdlhugJs2z56onOoAfljloBKmIEc25x7jQRj9U7GgTouxwols4gFNU9GT3YeYFd-5xo&_nc_ad=z-m&_nc_cid=0&_nc_zt=23&_nc_ht=instagram.fcgk15-1.fna&_nc_gid=wceVim593ALman6fxn-sjQ&oh=00_Afql_RdeQly-0VxNBiqPOFMCMIz4up6DI3Eo6EDCNQ6gAw&oe=696067D7" 
                                 alt="Collection" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.8;">
                            <div style="position: absolute; bottom: 1.5rem; left: 1.5rem; right: 1.5rem; background: rgba(33, 37, 41, 0.6); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 1rem; padding: 1rem; display: flex; align-items: center; gap: 1rem;">
                                <div style="width: 3rem; height: 3rem; background: rgba(255, 204, 0, 0.2); color: var(--am-warning); border-radius: 0.75rem; display: flex; align-items: center; justify-content: center;">
                                    <span class="material-symbols-outlined">hotel_class</span>
                                </div>
                                <div style="flex: 1;">
                                    <p style="font-size: 0.625rem; font-weight: 700; color: var(--am-text-muted); text-transform: uppercase; margin: 0;">Status Terkini</p>
                                    <p style="color: white; font-weight: 700; font-size: 0.875rem; margin: 0;">Eksklusif Event XXI</p>
                                </div>
                                <div style="text-align: right;">
                                    <p style="color: var(--am-primary); font-weight: 900; font-size: 1rem; margin: 0;">+15%</p>
                                    <p style="font-size: 0.75rem; color: var(--am-text-muted); margin: 0;">Value</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section style="background: var(--am-bg-alt); padding: 5rem 0; border-top: 1px solid var(--am-border); border-bottom: 1px solid var(--am-border);">
        <div class="am-container">
            <div class="row text-center g-4">
                <div class="col-6 col-md-3">
                    <h2 style="font-size: 3rem; font-weight: 900; margin-bottom: 0.5rem;">500+</h2>
                    <p style="color: var(--am-text-muted); font-weight: 600; text-transform: uppercase; font-size: 0.75rem;">Event Terdata</p>
                </div>
                <div class="col-6 col-md-3">
                    <h2 style="font-size: 3rem; font-weight: 900; margin-bottom: 0.5rem;">10k+</h2>
                    <p style="color: var(--am-text-muted); font-weight: 600; text-transform: uppercase; font-size: 0.75rem;">Katalog Item</p>
                </div>
                <div class="col-6 col-md-3">
                    <h2 style="font-size: 3rem; font-weight: 900; margin-bottom: 0.5rem;">5k</h2>
                    <p style="color: var(--am-text-muted); font-weight: 600; text-transform: uppercase; font-size: 0.75rem;">Kolektor</p>
                </div>
                <div class="col-6 col-md-3">
                    <h2 style="font-size: 3rem; font-weight: 900; margin-bottom: 0.5rem;">24/7</h2>
                    <p style="color: var(--am-text-muted); font-weight: 600; text-transform: uppercase; font-size: 0.75rem;">Live Sync</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Events Section -->
    <section style="padding: 7rem 0; background: var(--am-bg);">
        <div class="am-container">
            <div class="text-center mb-5">
                <h2 style="font-size: 2.5rem; font-weight: 900; margin-bottom: 1rem;">Event <span class="text-gradient">Populer</span></h2>
                <p style="color: var(--am-text-muted); font-size: 1.125rem; max-width: 600px; margin: 0 auto;">Jelajahi acara anime terbesar dan paling dinanti oleh komunitas kolektor merchandise.</p>
            </div>

            <div class="row g-4">
                <!-- Event Card 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="am-card p-4 h-100">
                        <div style="width: 3rem; height: 3rem; background: rgba(171, 217, 7, 0.1); color: var(--am-primary); border-radius: 0.75rem; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                            <span class="material-symbols-outlined">event</span>
                        </div>
                        <h4 style="font-weight: 800; color: white; margin-bottom: 0.75rem;">Comifuro 17</h4>
                        <p style="color: var(--am-text-muted); font-size: 0.875rem; margin-bottom: 1rem; line-height: 1.6;">Jakarta International Expo, Indonesia</p>
                        <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 1rem; border-top: 1px solid var(--am-border);">
                            <span style="font-size: 0.75rem; color: var(--am-text-muted);">Feb 2026</span>
                            <span style="background: rgba(171, 217, 7, 0.1); color: var(--am-primary); padding: 0.25rem 0.75rem; border-radius: 99px; font-size: 0.625rem; font-weight: 900; text-transform: uppercase;">Upcoming</span>
                        </div>
                    </div>
                </div>

                <!-- Event Card 2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="am-card p-4 h-100">
                        <div style="width: 3rem; height: 3rem; background: rgba(239, 107, 0, 0.1); color: var(--am-danger); border-radius: 0.75rem; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                            <span class="material-symbols-outlined">celebration</span>
                        </div>
                        <h4 style="font-weight: 800; color: white; margin-bottom: 0.75rem;">Anime Expo 2026</h4>
                        <p style="color: var(--am-text-muted); font-size: 0.875rem; margin-bottom: 1rem; line-height: 1.6;">Los Angeles Convention Center, USA</p>
                        <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 1rem; border-top: 1px solid var(--am-border);">
                            <span style="font-size: 0.75rem; color: var(--am-text-muted);">Jul 2026</span>
                            <span style="background: rgba(239, 107, 0, 0.1); color: var(--am-danger); padding: 0.25rem 0.75rem; border-radius: 99px; font-size: 0.625rem; font-weight: 900; text-transform: uppercase;">Hot</span>
                        </div>
                    </div>
                </div>

                <!-- Event Card 3 -->
                <div class="col-md-6 col-lg-3">
                    <div class="am-card p-4 h-100">
                        <div style="width: 3rem; height: 3rem; background: rgba(255, 204, 0, 0.1); color: var(--am-warning); border-radius: 0.75rem; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                            <span class="material-symbols-outlined">storefront</span>
                        </div>
                        <h4 style="font-weight: 800; color: white; margin-bottom: 0.75rem;">Comiket 103</h4>
                        <p style="color: var(--am-text-muted); font-size: 0.875rem; margin-bottom: 1rem; line-height: 1.6;">Tokyo Big Sight, Japan</p>
                        <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 1rem; border-top: 1px solid var(--am-border);">
                            <span style="font-size: 0.75rem; color: var(--am-text-muted);">Dec 2025</span>
                            <span style="background: rgba(255, 255, 255, 0.05); color: var(--am-text-muted); padding: 0.25rem 0.75rem; border-radius: 99px; font-size: 0.625rem; font-weight: 900; text-transform: uppercase;">Past</span>
                        </div>
                    </div>
                </div>

                <!-- Event Card 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="am-card p-4 h-100">
                        <div style="width: 3rem; height: 3rem; background: rgba(171, 217, 7, 0.1); color: var(--am-primary); border-radius: 0.75rem; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                            <span class="material-symbols-outlined">local_activity</span>
                        </div>
                        <h4 style="font-weight: 800; color: white; margin-bottom: 0.75rem;">AFA Indonesia</h4>
                        <p style="color: var(--am-text-muted); font-size: 0.875rem; margin-bottom: 1rem; line-height: 1.6;">ICE BSD City, Tangerang</p>
                        <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 1rem; border-top: 1px solid var(--am-border);">
                            <span style="font-size: 0.75rem; color: var(--am-text-muted);">Sep 2026</span>
                            <span style="background: rgba(171, 217, 7, 0.1); color: var(--am-primary); padding: 0.25rem 0.75rem; border-radius: 99px; font-size: 0.625rem; font-weight: 900; text-transform: uppercase;">Upcoming</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Section -->
    <section style="padding: 7rem 0;">
        <div class="am-container">
            <div class="d-flex flex-column d-md-flex row justify-content-between align-items-center mb-5">
                <div class="col-md-7">
                    {{-- center text --}}
                    <h2 style="font-size: 2.5rem; font-weight: 900; margin-bottom: 1rem; text-align: center;">Platform Koleksi <span class="text-gradient">Profesional.</span></h2>
                    <p style="color: var(--am-text-muted); font-size: 1.125rem; text-align: center;">Kami menyediakan fitur untuk melacak rilis eksklusif, memantau harga pasar, dan mendapatkan update acara terbaru.</p>
                </div>
            </div>

            <div class="row g-4">
                <!-- Card 1 -->
                <div class="col-md-4">
                    <div class="am-card p-5 h-100">
                        <div style="width: 3.5rem; height: 3.5rem; background: rgba(239, 107, 0, 0.1); color: var(--am-danger); border-radius: 1rem; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                            <span class="material-symbols-outlined text-3xl">calendar_month</span>
                        </div>
                        <h3 class="h4 font-bold mb-3">Event Update</h3>
                        <p style="color: var(--am-text-muted); line-height: 1.6;">Dapatkan info konvensi besar Comiket, Anime Expo, hingga pop-up store lokal terupdate.</p>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-md-4">
                    <div class="am-card p-5 h-100">
                        <div style="width: 3.5rem; height: 3.5rem; background: rgba(171, 217, 7, 0.1); color: var(--am-primary); border-radius: 1rem; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                            <span class="material-symbols-outlined text-3xl">inventory_2</span>
                        </div>
                        <h3 class="h4 font-bold mb-3">Community Hub</h3>
                        <p style="color: var(--am-text-muted); line-height: 1.6;">Unggah foto merchandise Anda, bantu lengkapi detail produk dan verifikasi item langka.</p>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-md-4">
                    <div class="am-card p-5 h-100">
                        <div style="width: 3.5rem; height: 3.5rem; background: rgba(255, 204, 0, 0.1); color: var(--am-warning); border-radius: 1rem; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                            <span class="material-symbols-outlined text-3xl">trending_up</span>
                        </div>
                        <h3 class="h4 font-bold mb-3">Price Tracker</h3>
                        <p style="color: var(--am-text-muted); line-height: 1.6;">Analisis tingkat kelangkaan dan estimasi nilai pasar untuk koleksi berharga Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer style="background: var(--am-bg-alt); padding: 5rem 0 2rem; border-top: 1px solid var(--am-border);">
        <div class="am-container">
            <div class="row g-5 mb-5">
                <div class="col-lg-5">
                    <div class="d-flex align-items-center gap-2 mb-4">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="height: 32px;">
                        <span style="font-weight: 900; font-size: 1.5rem;">AniMerch</span>
                    </div>
                    <p style="color: var(--am-text-muted); max-width: 350px;">Platform manajemen koleksi merchandise anime terlengkap untuk para kolektor sejati.</p>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <p style="font-weight: 900; margin-bottom: 2rem; font-size: 0.875rem; text-transform: uppercase; color: white;">Navigasi</p>
                    <ul class="list-unstyled d-grid gap-2">
                        <li><a href="#" class="am-nav-link">Katalog</a></li>
                        <li><a href="#" class="am-nav-link">Event</a></li>
                        <li><a href="#" class="am-nav-link">Blog</a></li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <p style="font-weight: 900; margin-bottom: 2rem; font-size: 0.875rem; text-transform: uppercase; color: white;">Kontribusi</p>
                    <ul class="list-unstyled d-grid gap-2">
                        <li><a href="#" class="am-nav-link">Kontributor</a></li>
                        <li><a href="#" class="am-nav-link">Forum</a></li>
                        <li><a href="#" class="am-nav-link">Discord</a></li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <p style="font-weight: 900; margin-bottom: 2rem; font-size: 0.875rem; text-transform: uppercase; color: white;">Layanan</p>
                    <ul class="list-unstyled d-grid gap-2">
                        <li><a href="#" class="am-nav-link">Tentang</a></li>
                        <li><a href="#" class="am-nav-link">Kontak</a></li>
                        <li><a href="#" class="am-nav-link">Bantuan</a></li>
                    </ul>
                </div>
            </div>
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center pt-4" style="border-top: 1px solid var(--am-border);">
                <p style="color: var(--am-text-muted); font-size: 0.75rem;">© 2026 AniMerch. All rights reserved.</p>
                <div class="d-flex gap-4">
                    <a href="#" class="am-nav-link" style="font-size: 0.75rem;">Privacy Policy</a>
                    <a href="#" class="am-nav-link" style="font-size: 0.75rem;">Terms of Service</a>
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
