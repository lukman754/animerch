<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>{{ $merchandise->nama_barang }} - AniMerch</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1" rel="stylesheet"/>
    
    <!-- Design System -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        .wa-btn {
            background-color: #25D366;
            color: white !important;
            padding: 1.25rem;
            border-radius: 1rem;
            font-weight: 900;
            font-size: 1.125rem;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            transition: all 0.2s;
            box-shadow: 0 10px 20px rgba(37, 211, 102, 0.2);
        }
        .wa-btn:hover {
            filter: brightness(1.1);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="am-nav">
        <div class="am-container">
            <div class="am-nav-content">
                <a class="am-nav-links" style="text-decoration: none;" href="{{ url('/') }}">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="AniMerch Logo" style="height: 32px;">
                    <span style="font-weight: 800; font-size: 1.25rem; color: white;">AniMerch</span>
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
            <!-- Breadcrumbs -->
            <nav style="display: flex; gap: 0.5rem; margin-bottom: 2rem; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; color: var(--am-text-muted);">
                <a href="{{ url('/') }}" class="am-nav-link">Beranda</a>
                <span>/</span>
                <a href="{{ route('merchandise.catalog') }}" class="am-nav-link">Katalog</a>
                <span>/</span>
                <span style="color: white; opacity: 1;">Detail Produk</span>
            </nav>

            <div class="product-show-grid">
                <!-- Left: Image Section -->
                <div>
                    <div class="am-card p-3 shadow-lg h-100">
                        <div style="position: relative; aspect-ratio: 1/1; border-radius: 1.5rem; overflow: hidden; background: #1a1e22;">
                            @if($merchandise->gambar)
                                <img src="{{ asset('storage/merchandise/' . $merchandise->gambar) }}" 
                                     alt="{{ $merchandise->nama_barang }}"
                                     style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                                <div style="width: 100%; height: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center; color: var(--am-text-muted); opacity: 0.2;">
                                    <p style="text-transform: uppercase; font-weight: 900; font-size: 0.625rem; margin-top: 1rem;">Item Tidak Tersedia</p>
                                </div>
                            @endif
                            
                            @if($merchandise->stok <= 0)
                            <div style="position: absolute; inset: 0; background: rgba(0,0,0,0.7); display: flex; align-items: center; justify-content: center; backdrop-filter: blur(2px);">
                                <span style="background: var(--am-danger); color: white; padding: 1rem 2rem; border-radius: 0.75rem; font-weight: 900; font-size: 1.5rem; text-transform: uppercase;">Habis Terjual</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Right: Content Section -->
                <div class="h-100">
                    <div class="am-card p-5 h-100 d-flex flex-column gap-4">
                        <!-- Top Meta -->
                        <div>
                            <div class="d-flex gap-2 mb-3">
                                <span style="background: rgba(171, 217, 7, 0.1); color: var(--am-primary); padding: 0.25rem 0.75rem; border-radius: 1rem; border: 1px solid rgba(171, 217, 7, 0.2); font-size: 0.625rem; font-weight: 900; text-transform: uppercase;">
                                    {{ $merchandise->event_terkait }}
                                </span>
                                @if($merchandise->kategori)
                                <span style="background: rgba(255, 255, 255, 0.05); color: white; padding: 0.25rem 0.75rem; border-radius: 1rem; border: 1px solid rgba(255, 255, 255, 0.1); font-size: 0.625rem; font-weight: 900; text-transform: uppercase; opacity: 0.6;">
                                    {{ $merchandise->kategori }}
                                </span>
                                @endif
                            </div>
                            <h1 class="display-5 text-white mb-2">{{ $merchandise->nama_barang }}</h1>
                            <div class="d-flex align-items-baseline gap-3">
                                <span style="font-size: 3rem; font-weight: 900; color: var(--am-primary); letter-spacing: -0.05em;">Rp {{ number_format($merchandise->harga, 0, ',', '.') }}</span>
                                <span style="color: var(--am-text-muted); text-decoration: line-through; font-size: 1.125rem;">Rp {{ number_format($merchandise->harga * 1.2, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <!-- Stock Indicator -->
                        <div style="padding: 1.5rem 0; border-top: 1px solid var(--am-border); border-bottom: 1px solid var(--am-border);">
                            <div class="d-flex align-items-center gap-3">
                                <div style="width: 3rem; height: 3rem; background: rgba(171, 217, 7, 0.1); color: var(--am-primary); border-radius: 0.75rem; display: flex; align-items: center; justify-content: center;">
                                    <span class="material-symbols-outlined">inventory_2</span>
                                </div>
                                <div>
                                    <p style="font-size: 0.625rem; font-weight: 900; color: var(--am-text-muted); text-transform: uppercase; margin: 0; letter-spacing: 0.1em;">Status Ketersediaan</p>
                                    <p style="font-size: 1.125rem; font-weight: 800; color: white; margin: 0;">{{ $merchandise->stok }} Unit Ready Stock</p>
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div>
                            <h3 style="font-size: 1.25rem; font-weight: 800; color: white; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                                <span class="material-symbols-outlined text-primary">description</span>
                                Deskripsi Produk
                            </h3>
                            <div style="color: var(--am-text-muted); line-height: 1.7; font-size: 1.125rem; white-space: pre-line;">
                                @if($merchandise->deskripsi)
                                    {{ $merchandise->deskripsi }}
                                @else
                                    <p style="font-style: italic; opacity: 0.5;">Item eksklusif dengan kualitas terjaga. Deskripsi lebih lanjut mengenai item ini belum ditambahkan, namun keaslian item dijamin terdata di sistem kami.</p>
                                @endif
                            </div>
                        </div>

                        <!-- Meta Info Box -->
                        <div style="margin-top: auto; background: var(--am-bg-alt); border-radius: 1.25rem; padding: 1.5rem; border: 1px solid var(--am-border);">
                            <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 0.75rem; border-bottom: 1px solid var(--am-border); margin-bottom: 0.75rem;">
                                <span style="font-size: 0.875rem; color: var(--am-text-muted); font-weight: 500;">Identity Tag</span>
                                <span style="font-family: monospace; color: white; font-weight: 700;">#{{ $merchandise->id_barang }}</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span style="font-size: 0.875rem; color: var(--am-text-muted); font-weight: 500;">Tanggal Rilis Sistem</span>
                                <span style="color: white; font-weight: 700;">{{ $merchandise->created_at->format('d M Y') }}</span>
                            </div>
                        </div>

                        <!-- CTA Button -->
                        <div style="padding-top: 1rem;">
                            @php
                                $waMessage = "Halo AniMerch! Saya ingin pesan:\n\n" . 
                                             "*Nama:* " . $merchandise->nama_barang . "\n" .
                                             "*ID Produk:* #" . $merchandise->id_barang . "\n" .
                                             "*Harga:* Rp " . number_format($merchandise->harga, 0, ',', '.') . "\n\n" .
                                             "Cek stok ready ya!";
                                $waUrl = "https://wa.me/6281234567890?text=" . urlencode($waMessage);
                            @endphp
                            
                            @if($merchandise->stok > 0)
                            <a href="{{ $waUrl }}" target="_blank" class="wa-btn">
                                <svg style="width: 1.75rem; height: 1.75rem;" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.67-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                </svg>
                                Pesan Langsung via WhatsApp
                            </a>
                            @else
                            <button disabled style="width: 100%; border-radius: 1rem; padding: 1.25rem; background: var(--am-border); color: var(--am-text-muted); border: none; font-weight: 800; cursor: not-allowed; text-transform: uppercase;">
                                Item Sold Out
                            </button>
                            @endif
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
                <p style="color: var(--am-text-muted); font-size: 0.75rem; margin: 0;">© 2026 AniMerch Katalog. All rights reserved.</p>
                <div class="d-flex gap-4 mt-4 mt-md-0">
                    <a href="{{ url('/') }}" class="am-nav-link" style="font-size: 0.75rem;">Beranda</a>
                    <a href="{{ route('merchandise.catalog') }}" class="am-nav-link active" style="font-size: 0.75rem;">Katalog</a>
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
