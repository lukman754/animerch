<x-guest-layout>
    @section('title', 'Atur Ulang Kata Sandi - AniMerch System')

    <div style="text-align: center; margin-bottom: 2rem;">
        <h2 style="font-weight: 800; font-size: 1.5rem; color: white; margin-bottom: 0.5rem;">Reset Kata Sandi</h2>
        <p style="color: var(--am-text-muted); font-size: 0.875rem;">Silakan buat kata sandi baru untuk akun Anda.</p>
    </div>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="am-form-group">
            <label class="am-label" for="email">Email</label>
            <input id="email" class="am-input w-100" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" />
            @error('email') <span style="color: var(--am-danger); font-size: 0.75rem;">{{ $message }}</span> @enderror
        </div>

        <!-- Password -->
        <div class="am-form-group">
            <label class="am-label" for="password">Kata Sandi Baru</label>
            <input id="password" class="am-input w-100" type="password" name="password" required autocomplete="new-password" />
            @error('password') <span style="color: var(--am-danger); font-size: 0.75rem;">{{ $message }}</span> @enderror
        </div>

        <!-- Confirm Password -->
        <div class="am-form-group">
            <label class="am-label" for="password_confirmation">Konfirmasi Kata Sandi</label>
            <input id="password_confirmation" class="am-input w-100" type="password" name="password_confirmation" required autocomplete="new-password" />
            @error('password_confirmation') <span style="color: var(--am-danger); font-size: 0.75rem;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-top: 2rem;">
            <button type="submit" class="am-btn am-btn-primary w-100 py-3">
                <span class="material-symbols-outlined">restart_alt</span>
                Reset Kata Sandi
            </button>
        </div>
    </form>
</x-guest-layout>
