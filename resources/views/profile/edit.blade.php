@extends('layouts.app')

@section('title', 'Pengaturan Profil - AniMerch System')
@section('page_title', 'Manajemen Akun')

@section('content')
<div style="margin-bottom: 2.5rem;">
    <h1 style="font-size: 2.5rem; font-weight: 900; color: white; margin-bottom: 0.5rem; letter-spacing: -0.05em;">Pengaturan <span class="text-gradient">Profil Admin</span></h1>
    <p style="color: var(--am-text-muted); font-size: 1rem;">Kelola informasi autentikasi dan keamanan akun Anda.</p>
</div>

<div style="display: flex; flex-direction: column; gap: 2rem;">
    <!-- Profile Info -->
    <div class="am-card" style="padding: 2.5rem; background: var(--am-admin-surface);">
        <div style="max-width: 600px;">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    <!-- Password Update -->
    <div class="am-card" style="padding: 2.5rem; background: var(--am-admin-surface);">
        <div style="max-width: 600px;">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    <!-- Danger Zone: Delete Account -->
    <div class="am-card" style="padding: 2.5rem; background: var(--am-admin-surface); border-color: rgba(239, 107, 0, 0.2);">
        <div style="max-width: 600px;">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection
