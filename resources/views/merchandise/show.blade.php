@extends('layouts.app')

@section('title', 'Detail Merchandise - AniMerch System')
@section('page_title', 'Rincian Koleksi')

@section('content')
<!-- Header Area -->
<div style="margin-bottom: 2.5rem; display: flex; justify-content: space-between; align-items: flex-end; gap: 2rem; flex-wrap: wrap;">
    <div>
        <nav style="display: flex; gap: 0.5rem; margin-bottom: 1.5rem; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; color: var(--am-text-muted);">
            <a href="{{ route('merchandise.index') }}" style="color: var(--am-text-muted); text-decoration: none;">Inventaris</a>
            <span>/</span>
            <span style="color: white; opacity: 1;">Detail Produk</span>
        </nav>
        <h1 style="font-size: 2.5rem; font-weight: 900; color: white; margin-bottom: 0.5rem; letter-spacing: -0.05em;">Detail <span class="text-gradient">Barang Terdata</span></h1>
        <p style="color: var(--am-text-muted); font-size: 1rem;">Laporan lengkap mengenai spesifikasi, unit tersisa, dan riwayat rilis item.</p>
    </div>
    <div style="display: flex; gap: 1rem;">
        <a href="{{ route('merchandise.edit', $merchandise->id) }}" class="am-btn am-btn-outline" style="border-color: var(--am-warning); color: var(--am-warning);">
            <span class="material-symbols-outlined">edit</span>
            Ubah Data
        </a>
        <button onclick="confirmDelete()" class="am-btn am-btn-outline" style="border-color: var(--am-danger); color: var(--am-danger);">
            <span class="material-symbols-outlined">delete</span>
            Hapus Item
        </button>
        <form id="delete-form" action="{{ route('merchandise.destroy', $merchandise->id) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>
</div>

<div class="product-show-grid" style="grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));">
    <!-- Left: Image Section -->
    <div>
        <div class="am-card p-3 shadow-lg h-100" style="background: var(--am-admin-surface);">
            <div style="position: relative; aspect-ratio: 1/1; border-radius: 1.5rem; overflow: hidden; background: #1a1e22;">
                @if($merchandise->gambar)
                    <img src="{{ asset('storage/merchandise/' . $merchandise->gambar) }}" 
                         alt="{{ $merchandise->nama_barang }}"
                         style="width: 100%; height: 100%; object-fit: cover;">
                @else
                    <div style="width: 100%; height: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center; color: var(--am-text-muted); opacity: 0.2;">
                        <span class="material-symbols-outlined" style="font-size: 5rem;">image_not_supported</span>
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
        <div class="am-card p-5 h-100 d-flex flex-column gap-4" style="background: var(--am-admin-surface);">
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
                <h1 class="display-6 text-white mb-2" style="font-weight: 900;">{{ $merchandise->nama_barang }}</h1>
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
            <div style="margin-top: auto; background: var(--am-admin-bg); border-radius: 1.25rem; padding: 1.5rem; border: 1px solid var(--am-border);">
                <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 0.75rem; border-bottom: 1px solid var(--am-border); margin-bottom: 0.75rem;">
                    <span style="font-size: 0.875rem; color: var(--am-text-muted); font-weight: 500;">Identity Tag</span>
                    <span style="font-family: monospace; color: white; font-weight: 700;">#{{ $merchandise->id_barang }}</span>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 0.75rem; border-bottom: 1px solid var(--am-border); margin-bottom: 0.75rem;">
                    <span style="font-size: 0.875rem; color: var(--am-text-muted); font-weight: 500;">System ID</span>
                    <span style="color: white; font-weight: 700;">#{{ $merchandise->id }}</span>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span style="font-size: 0.875rem; color: var(--am-text-muted); font-weight: 500;">Tanggal Rilis Sistem</span>
                    <span style="color: white; font-weight: 700;">{{ $merchandise->created_at->format('d M Y') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function confirmDelete() {
        Swal.fire({
            title: 'Hapus Item Permanen?',
            text: "Data ini akan dihapus dari sistem dan tidak dapat dipulihkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EF6B00',
            cancelButtonColor: '#333333',
            confirmButtonText: 'Ya, Hapus Sekarang',
            cancelButtonText: 'Batal',
            background: '#1E1E1E',
            color: '#fff'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form').submit();
            }
        })
    }
</script>
@endpush
