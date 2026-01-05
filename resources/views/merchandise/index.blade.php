@extends('layouts.app')

@section('title', 'Manajemen Merchandise - AniMerch System')
@section('page_title', 'Inventaris Barang')

@section('content')
<!-- Header Area -->
<div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2.5rem; gap: 2rem;">
    <div>
        <h1 style="font-size: 2.5rem; font-weight: 900; color: white; margin-bottom: 0.5rem; letter-spacing: -0.05em;">Inventaris <span class="text-gradient">Merchandise</span></h1>
        <p style="color: var(--am-text-muted); font-size: 1rem; max-width: 600px;">Kelola stok, harga, dan asosiasi produk eksklusif Anda secara terpusat.</p>
    </div>
    <div style="display: flex; gap: 1rem;">
        <a href="{{ route('merchandise.export-pdf') }}" target="_blank" class="am-btn am-btn-outline py-3 px-4">
            <span class="material-symbols-outlined">picture_as_pdf</span>
            Ekspor PDF
        </a>
        <a href="{{ route('merchandise.create') }}" class="am-btn am-btn-primary py-3 px-4">
            <span class="material-symbols-outlined">add_box</span>
            Tambah Barang Baru
        </a>
    </div>
</div>

<!-- Search and Filters -->
<div class="am-card" style="padding: 1.25rem; margin-bottom: 2rem; background: var(--am-admin-surface);">
    <form action="{{ route('merchandise.index') }}" method="GET" style="width: 100%;">
        <div class="am-search-input-group" style="background: var(--am-admin-bg);">
            <div style="padding-left: 1rem; display: flex; align-items: center; color: var(--am-text-muted);">
                <span class="material-symbols-outlined">search</span>
            </div>
            <input name="search" value="{{ request('search') }}" class="am-search-input" placeholder="Cari berdasarkan nama, event, atau ID barang..." style="font-size: 0.875rem;">
        </div>
    </form>
</div>

<!-- Alert Success -->
@if(session('success'))
    <div style="background: rgba(171,217,7,0.1); border: 1px solid var(--am-primary); color: var(--am-primary); padding: 1rem 1.5rem; border-radius: 0.75rem; margin-bottom: 2rem; display: flex; align-items: center; gap: 0.75rem;">
        <span class="material-symbols-outlined">check_circle</span>
        <span style="font-weight: 600;">{{ session('success') }}</span>
    </div>
@endif

<!-- Table -->
<div class="am-table-container">
    <table class="am-table">
        <thead>
            <tr>
                <th style="width: 80px; text-align: center;">Media</th>
                <th style="width: 120px;">ID Barang</th>
                <th>Nama Produk</th>
                <th>Event Meluncur</th>
                <th>Harga Satuan</th>
                <th style="width: 150px;">Status Stok</th>
                <th style="width: 120px; text-align: center;">Tindakan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($merchandise as $item)
            <tr>
                <td style="text-align: center;">
                    <div style="width: 48px; height: 48px; border-radius: 0.5rem; overflow: hidden; background: var(--am-bg-alt); display: inline-block; border: 1px solid var(--am-border);">
                        @if($item->gambar)
                            <img src="{{ asset('storage/merchandise/' . $item->gambar) }}" alt="{{ $item->nama_barang }}" style="width: 100%; height: 100%; object-fit: cover; cursor: pointer;"
                                 onclick="Swal.fire({imageUrl: '{{ asset('storage/merchandise/' . $item->gambar) }}', imageAlt: '{{ $item->nama_barang }}', showConfirmButton: false, background: '#1E1E1E'})">
                        @else
                            <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: var(--am-text-muted); opacity: 0.3;">
                                <span class="material-symbols-outlined">image</span>
                            </div>
                        @endif
                    </div>
                </td>
                <td><code style="color: var(--am-primary); font-weight: 700;">#{{ $item->id_barang }}</code></td>
                <td class="product-name">
                    <div style="font-weight: 800; color: white;">{{ $item->nama_barang }}</div>
                    <div style="font-size: 0.625rem; color: var(--am-text-muted); text-transform: uppercase; margin-top: 0.25rem;">Reg ID: {{ $item->id }}</div>
                </td>
                <td>
                    <span style="background: rgba(171, 217, 7, 0.05); color: var(--am-primary); padding: 0.25rem 0.625rem; border-radius: 0.375rem; font-size: 0.75rem; font-weight: 700; border: 1px solid rgba(171, 217, 7, 0.1);">
                        {{ $item->event_terkait }}
                    </span>
                </td>
                <td style="font-weight: 700; color: white;">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                <td>
                    <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.25rem;">
                        @php
                            $stokColor = $item->stok > 10 ? 'var(--am-primary)' : ($item->stok > 0 ? 'var(--am-warning)' : 'var(--am-danger)');
                            $stokLabel = $item->stok > 10 ? 'Aman' : ($item->stok > 0 ? 'Menipis' : 'Habis');
                        @endphp
                        <span style="width: 8px; height: 8px; border-radius: 50%; background: {{ $stokColor }}; box-shadow: 0 0 10px {{ $stokColor }};"></span>
                        <span style="font-weight: 800; color: white;">{{ $item->stok }} Unit</span>
                    </div>
                    <span style="font-size: 0.625rem; text-transform: uppercase; font-weight: 700; color: var(--am-text-muted);">{{ $stokLabel }}</span>
                </td>
                <td>
                    <div style="display: flex; gap: 0.25rem; justify-content: center;">
                        <a href="{{ route('merchandise.show', $item->id) }}" class="am-btn" style="padding: 0.5rem; background: rgba(255,255,255,0.05); color: white;" title="Cek Detail">
                            <span class="material-symbols-outlined" style="font-size: 1.25rem;">visibility</span>
                        </a>
                        <a href="{{ route('merchandise.edit', $item->id) }}" class="am-btn" style="padding: 0.5rem; background: rgba(255,204,0,0.1); color: var(--am-warning);" title="Ubah Data">
                            <span class="material-symbols-outlined" style="font-size: 1.25rem;">edit</span>
                        </a>
                        <button onclick="deleteItem({{ $item->id }})" class="am-btn" style="padding: 0.5rem; background: rgba(239, 107, 0, 0.1); color: var(--am-danger);" title="Hapus Permanen">
                            <span class="material-symbols-outlined" style="font-size: 1.25rem;">delete</span>
                        </button>
                    </div>
                    <form id="delete-form-{{ $item->id }}" action="{{ route('merchandise.destroy', $item->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Pagination Area -->
@if($merchandise->hasPages())
<div style="margin-top: 2rem; display: flex; justify-content: space-between; align-items: center; background: var(--am-admin-surface); padding: 1rem 1.5rem; border-radius: 1rem; border: 1px solid var(--am-border);">
    <div style="color: var(--am-text-muted); font-size: 0.875rem;">
        Menampilkan <span style="color: white; font-weight: 600;">{{ $merchandise->firstItem() ?? 0 }}</span> - <span style="color: white; font-weight: 600;">{{ $merchandise->lastItem() ?? 0 }}</span> dari <span style="color: white; font-weight: 600;">{{ $merchandise->total() }}</span> produk
    </div>
    <div class="am-pagination">
        {{ $merchandise->links() }}
    </div>
</div>
@endif

@if($merchandise->count() == 0)
    <div style="padding: 5rem; text-align: center; background: var(--am-admin-surface); border-radius: 1rem; border: 2px dashed var(--am-border); margin-top: 1rem;">
        <span class="material-symbols-outlined" style="font-size: 4rem; color: var(--am-text-muted); opacity: 0.2;">search_off</span>
        <p style="color: var(--am-text-muted); margin-top: 1rem;">Tidak ada barang yang ditemukan.</p>
    </div>
@endif
@endsection

@push('scripts')
<script>
    function deleteItem(id) {
        Swal.fire({
            title: 'Hapus Item Terdata?',
            text: "Koleksi akan dihapus dari sistem secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EF6B00',
            cancelButtonColor: '#333333',
            confirmButtonText: 'Ya, Hapus Saja',
            cancelButtonText: 'Batal',
            background: '#1E1E1E',
            color: '#fff'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
</script>
@endpush
