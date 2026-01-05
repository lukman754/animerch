<x-guest-layout>
    @section('title', 'Konfirmasi Keamanan - AniMerch System')

    <div style="text-align: center; margin-bottom: 2rem;">
        <h2 style="font-weight: 800; font-size: 1.5rem; color: white; margin-bottom: 0.5rem;">Konfirmasi Akses</h2>
        <p style="color: var(--am-text-muted); font-size: 0.875rem;">
            Ini adalah area aman. Silakan konfirmasi kata sandi Anda sebelum melanjutkan.
        </p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div class="am-form-group">
            <label class="am-label" for="password">Kata Sandi</label>
            <input id="password" class="am-input w-100" type="password" name="password" required autocomplete="current-password" />
            @error('password') <span style="color: var(--am-danger); font-size: 0.75rem;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-top: 2rem;">
            <button type="submit" class="am-btn am-btn-primary w-100 py-3">
                <span class="material-symbols-outlined">verified</span>
                Konfirmasi Kata Sandi
            </button>
        </div>
    </form>
</x-guest-layout>
