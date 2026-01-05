@extends('layouts.app')

@section('title', 'Dashboard - AniMerch System')
@section('page_title', 'Ringkasan Sistem')

@section('content')
<div style="margin-bottom: 2.5rem;">
    <h1 style="font-size: 2.5rem; font-weight: 900; color: white; margin-bottom: 0.5rem; letter-spacing: -0.05em;">Selamat Datang, <span class="text-gradient">{{ Auth::user()->name }}</span></h1>
    <p style="color: var(--am-text-muted); font-size: 1rem;">Anda telah berhasil masuk ke sistem manajemen AniMerch.</p>
</div>

<div class="row g-4">
    <div class="col-md-4">
        <div class="am-card" style="padding: 2rem; background: var(--am-admin-surface);">
            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                <div style="width: 3rem; height: 3rem; background: rgba(171, 217, 7, 0.1); color: var(--am-primary); border-radius: 0.75rem; display: flex; align-items: center; justify-content: center;">
                    <span class="material-symbols-outlined">inventory_2</span>
                </div>
                <div>
                    <p style="color: var(--am-text-muted); font-size: 0.75rem; font-weight: 700; text-transform: uppercase; margin: 0;">Total Produk</p>
                    <h3 style="color: white; font-weight: 900; font-size: 1.5rem; margin: 0;">{{ \App\Models\Merchandise::count() }} Item</h3>
                </div>
            </div>
            <a href="{{ route('merchandise.index') }}" class="am-btn am-btn-outline w-100" style="font-size: 0.75rem;">Kelola Inventaris</a>
        </div>
    </div>

    <div class="col-md-8">
        <div class="am-card" style="padding: 2rem; background: var(--am-admin-surface); height: 100%; display: flex; flex-direction: column; justify-content: center;">
            <div style="display: flex; align-items: center; gap: 1.5rem;">
                <div style="width: 4rem; height: 4rem; background: rgba(239, 107, 0, 0.1); color: var(--am-danger); border-radius: 1rem; display: flex; align-items: center; justify-content: center;">
                    <span class="material-symbols-outlined" style="font-size: 2rem;">verified_user</span>
                </div>
                <div>
                    <h3 style="color: white; font-weight: 800; margin-bottom: 0.25rem;">Status Akun Terverifikasi</h3>
                    <p style="color: var(--am-text-muted); margin: 0;">Sesi Anda aktif sebagai administrator utama sistem.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
