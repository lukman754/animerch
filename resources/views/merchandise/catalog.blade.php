<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Katalog Merchandise - AniMerch</title>
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
                    <img src="{{ asset('assets/images/logo.png') }}" alt="AniMerch Logo" style="height: 32px; width: auto;">
                    <span style="font-weight: bold; font-size: 1.25rem; color: white; letter-spacing: -0.05em;">AniMerch</span>
                </a>

                <div class="am-nav-links d-none d-md-flex">
                    <a class="am-nav-link" href="{{ url('/') }}">Beranda</a>
                    <a class="am-nav-link active" href="{{ route('merchandise.catalog') }}">Katalog</a>
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

                <button id="mobile-menu-button" class="am-btn am-btn-outline d-md-none" style="padding: 0.5rem;">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
        </div>
        
        <div id="mobile-menu" class="am-mobile-menu">
            <a href="{{ url('/') }}" class="am-nav-link d-block py-3">Beranda</a>
            <a href="{{ route('merchandise.catalog') }}" class="am-nav-link active d-block py-3">Katalog</a>
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

    <main style="padding: 8rem 0 5rem;">
        <!-- Background Decor -->
        <div class="hero-blob" style="top: -100px; right: 0; background-color: var(--am-primary); opacity: 0.05;"></div>
        
        <div class="am-container">
            <!-- Header Section -->
            <div class="mb-5">
                <div style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.35rem 0.75rem; border-radius: 999px; border: 1px solid rgba(171, 217, 7, 0.2); background: rgba(171, 217, 7, 0.05); color: var(--am-primary); font-size: 0.75rem; font-weight: 700; margin-bottom: 1rem;">
                    <span style="display: block; width: 0.5rem; height: 0.5rem; border-radius: 50%; background: var(--am-primary);"></span>
                    KATALOG KOLEKSI
                </div>
                <h1 class="display-4 text-white">Merchandise <span class="text-gradient">Terkini</span></h1>
                <p style="color: var(--am-text-muted); font-size: 1.125rem; max-width: 600px;">Telusuri berbagai koleksi merchandise anime langka dan eksklusif dari berbagai event besar.</p>
            </div>

            <!-- Search Section -->
            <div class="am-search-container mb-5">
                <form action="{{ route('merchandise.catalog') }}" method="GET">
                    <p style="color: var(--am-text-muted); font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.75rem;">Cari Barang Impian</p>
                    <div class="am-search-input-group">
                        <div style="display: flex; align-items: center; padding-left: 1rem; color: var(--am-text-muted);">
                            <span class="material-symbols-outlined">search</span>
                        </div>
                        <input name="search" value="{{ request('search') }}" class="am-search-input" placeholder="Nama barang, event, atau kategori..."/>
                        <button type="submit" class="am-btn am-btn-primary px-5" style="border-radius: 0.5rem;">Cari</button>
                    </div>
                </form>
            </div>

            @if($merchandise->count() > 0)
            <div class="am-grid">
                @foreach($merchandise as $item)
                <div class="am-card h-100">
                    <div style="position: relative; aspect-ratio: 1/1; overflow: hidden; background: #1a1e22;">
                        @if($item->gambar)
                            <img src="{{ asset('storage/merchandise/' . $item->gambar) }}" alt="{{ $item->nama_barang }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <div style="width: 100%; height: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center; color: var(--am-text-muted); opacity: 0.3;">
                                <span class="material-symbols-outlined" style="font-size: 3rem;">image</span>
                                <span style="font-size: 0.625rem; text-transform: uppercase; font-weight: 800; margin-top: 0.5rem;">No Image</span>
                            </div>
                        @endif
                        
                        @if($item->kategori)
                        <div style="position: absolute; top: 1rem; left: 1rem; background: rgba(0,0,0,0.8); padding: 0.25rem 0.75rem; border-radius: 1rem; border: 1px solid rgba(255,255,255,0.1);">
                            <span style="color: var(--am-primary); font-size: 0.625rem; font-weight: 900; text-transform: uppercase;">{{ $item->kategori }}</span>
                        </div>
                        @endif

                        @if($item->stok <= 0)
                        <div style="position: absolute; inset: 0; background: rgba(0,0,0,0.7); display: flex; align-items: center; justify-content: center; backdrop-filter: blur(2px);">
                            <span style="background: var(--am-danger); color: white; padding: 0.5rem 1rem; border-radius: 0.5rem; font-weight: 900; text-transform: uppercase; letter-spacing: -0.05em;">Sold Out</span>
                        </div>
                        @endif
                    </div>
                    
                    <div style="padding: 1.5rem; display: flex; flex-direction: column; flex: 1;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                            <span style="color: var(--am-primary); font-size: 0.625rem; font-weight: 900; text-transform: uppercase;">{{ $item->event_terkait }}</span>
                            <span style="color: var(--am-text-muted); font-size: 0.625rem; font-family: monospace;">#{{ $item->id_barang }}</span>
                        </div>
                        <h3 style="font-weight: 800; font-size: 1.125rem; color: white; margin-bottom: 1.5rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; height: 2.8rem;">{{ $item->nama_barang }}</h3>
                        
                        <div style="margin-top: auto; padding-top: 1rem; border-top: 1px solid var(--am-border);">
                            <div class="mb-3">
                                <p style="font-size: 0.625rem; font-weight: 800; color: var(--am-text-muted); text-transform: uppercase; margin: 0;">Harga</p>
                                <p style="font-size: 1.25rem; font-weight: 900; color: white; margin: 0;">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                            </div>
                            <a href="{{ route('merchandise.catalog-show', $item->id) }}" class="am-btn am-btn-outline w-100 py-3" style="font-size: 0.75rem;">
                                <span class="material-symbols-outlined" style="font-size: 1.125rem;">visibility</span>
                                Detail Item
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination Section -->
            @if($merchandise->hasPages())
            <div style="margin-top: 4rem; display: flex; justify-content: center;" class="am-pagination">
                {{ $merchandise->links() }}
            </div>
            @endif
            @else
            <div style="padding: 5rem; text-align: center; background: var(--am-card); border-radius: 2rem; border: 2px dashed var(--am-border);">
                <span class="material-symbols-outlined" style="font-size: 5rem; color: var(--am-text-muted); opacity: 0.2;">inventory_2</span>
                <h3 style="margin-top: 1.5rem; font-weight: 800;">Tidak Menemukan Apapun</h3>
                <p style="color: var(--am-text-muted);">Coba cari dengan kata kunci lain atau cek kembali filter Anda.</p>
                <a href="{{ route('merchandise.catalog') }}" class="am-btn am-btn-primary mt-4">Reset Pencarian</a>
            </div>
            @endif
        </div>
    </main>

    <footer style="background: var(--am-bg-alt); padding: 5rem 0 2rem; border-top: 1px solid var(--am-border);">
        <div class="am-container">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2 mb-4 mb-md-0">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="height: 24px;">
                    <span style="font-weight: 900; font-size: 1.25rem;">AniMerch</span>
                </div>
                <p style="color: var(--am-text-muted); font-size: 0.75rem; margin: 0;">© 2026 AniMerch Katalog. All rights reserved.</p>
                <div class="d-flex gap-4 mt-4 mt-md-0">
                    <a href="{{ url('/') }}" class="am-nav-link" style="font-size: 0.75rem;">Beranda</a>
                    <a href="{{ route('about') }}" class="am-nav-link" style="font-size: 0.75rem;">Tentang</a>
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
