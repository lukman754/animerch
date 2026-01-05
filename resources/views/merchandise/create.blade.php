@extends('layouts.app')

@section('title', 'Tambah Merchandise Baru - AniMerch System')
@section('page_title', 'Registrasi Item Baru')

@section('content')
<!-- Header Area -->
<div style="margin-bottom: 2.5rem;">
    <nav style="display: flex; gap: 0.5rem; margin-bottom: 1.5rem; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: var(--am-text-muted);">
        <a href="{{ route('merchandise.index') }}" style="color: var(--am-text-muted); text-decoration: none;">Inventaris</a>
        <span>/</span>
        <span style="color: white;">Registrasi Item</span>
    </nav>
    <h1 style="font-size: 2.5rem; font-weight: 900; color: white; margin-bottom: 0.5rem; letter-spacing: -0.05em;">Tambah <span class="text-gradient">Barang Baru</span></h1>
    <p style="color: var(--am-text-muted); font-size: 1rem;">Lengkapi formulir registrasi di bawah untuk menambahkan koleksi merchandise baru ke sistem.</p>
</div>

<form action="{{ route('merchandise.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="row g-4">
        <!-- Left Column: Form Details -->
        <div class="col-lg-8">
            <div class="am-card" style="padding: 2.5rem; background: var(--am-admin-surface);">
                <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 2rem; padding-bottom: 1rem; border-bottom: 1px solid var(--am-border);">
                    <span class="material-symbols-outlined" style="color: var(--am-primary);">edit_note</span>
                    <h3 style="font-weight: 800; font-size: 1.25rem; color: white; margin: 0;">Spesifikasi Item</h3>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="am-form-group">
                            <label class="am-label">Identitas / ID Barang <span style="color: var(--am-danger);">*</span></label>
                            <input name="id_barang" value="{{ old('id_barang') }}" required class="am-input" placeholder="Misal: MERCH-A01">
                            @error('id_barang') <span style="color: var(--am-danger); font-size: 0.75rem;">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="am-form-group">
                            <label class="am-label">Acara Terkait <span style="color: var(--am-danger);">*</span></label>
                            <input name="event_terkait" value="{{ old('event_terkait') }}" required class="am-input" placeholder="Misal: Comifuro 17">
                            @error('event_terkait') <span style="color: var(--am-danger); font-size: 0.75rem;">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="am-form-group">
                    <label class="am-label">Nama Lengkap Barang <span style="color: var(--am-danger);">*</span></label>
                    <input name="nama_barang" value="{{ old('nama_barang') }}" required class="am-input" placeholder="Misal: Acrylic Standee - Hololive JP Gen 3">
                    @error('nama_barang') <span style="color: var(--am-danger); font-size: 0.75rem;">{{ $message }}</span> @enderror
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="am-form-group">
                            <label class="am-label">Kategori</label>
                            <input name="kategori" value="{{ old('kategori') }}" class="am-input" placeholder="Misal: Aksesoris">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="am-form-group">
                            <label class="am-label">Harga Satuan <span style="color: var(--am-danger);">*</span></label>
                            <div style="position: relative;">
                                <span style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: var(--am-text-muted); font-size: 0.875rem; font-weight: 700;">Rp</span>
                                <input name="harga" value="{{ old('harga') }}" type="number" required class="am-input w-100" style="padding-left: 2.75rem;" placeholder="0">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="am-form-group">
                            <label class="am-label">Stok Awal <span style="color: var(--am-danger);">*</span></label>
                            <input name="stok" value="{{ old('stok', 0) }}" type="number" required class="am-input" placeholder="0">
                        </div>
                    </div>
                </div>

                <div class="am-form-group" style="margin-bottom: 0;">
                    <label class="am-label">Catatan / Deskripsi Tambahan</label>
                    <textarea name="deskripsi" class="am-input" style="min-height: 120px;" placeholder="Lengkapi dengan detail spesifikasi atau keterangan lainnya...">{{ old('deskripsi') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Right Column: Media Upload -->
        <div class="col-lg-4">
            <div class="am-card" style="padding: 2.5rem; background: var(--am-admin-surface); position: sticky; top: 1.5rem;">
                <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 2rem; padding-bottom: 1rem; border-bottom: 1px solid var(--am-border);">
                    <span class="material-symbols-outlined" style="color: var(--am-primary);">image</span>
                    <h3 style="font-weight: 800; font-size: 1.25rem; color: white; margin: 0;">Media Visual</h3>
                </div>

                <div style="position: relative; aspect-ratio: 1/1; border: 2px dashed var(--am-border); border-radius: 1.5rem; overflow: hidden; background: var(--am-admin-bg); display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: pointer;"
                     onclick="document.getElementById('gambar_input').click();">
                    
                    <img id="preview_frame" src="#" alt="Preview" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; display: none; z-index: 10;">
                    
                    <div style="text-align: center; color: var(--am-text-muted); padding: 2rem;">
                        <span class="material-symbols-outlined" style="font-size: 3rem; margin-bottom: 1rem;">add_photo_alternate</span>
                        <p style="font-size: 0.875rem; font-weight: 700; margin-bottom: 0.5rem; color: white;">Klik untuk Pilih Foto</p>
                        <p style="font-size: 0.75rem; opacity: 0.6;">Rekomendasi rasio 1:1<br>Maksimal 2 MB</p>
                    </div>
                    <input id="gambar_input" name="gambar" type="file" style="display: none;" accept="image/*" onchange="previewImage(this);">
                </div>
                @error('gambar') <div style="color: var(--am-danger); font-size: 0.75rem; margin-top: 1rem; text-align: center;">{{ $message }}</div> @enderror

                <div style="margin-top: 3rem; display: flex; flex-direction: column; gap: 1rem;">
                    <button type="submit" class="am-btn am-btn-primary py-3 w-100">
                        <span class="material-symbols-outlined">save</span>
                        Simpan ke Sistem
                    </button>
                    <a href="{{ route('merchandise.index') }}" class="am-btn am-btn-outline py-3 w-100">
                        Batalkan
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                const previewFrame = document.getElementById('preview_frame');
                previewFrame.src = e.target.result;
                previewFrame.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
