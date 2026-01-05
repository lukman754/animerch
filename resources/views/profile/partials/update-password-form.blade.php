<section>
    <header style="margin-bottom: 2rem;">
        <h2 style="font-size: 1.25rem; font-weight: 800; color: white; margin-bottom: 0.5rem;">
            Perbarui Kata Sandi
        </h2>

        <p style="color: var(--am-text-muted); font-size: 0.875rem;">
            Pastikan akun Anda menggunakan kata sandi yang panjang dan acak untuk menjaga keamanan.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" style="display: flex; flex-direction: column; gap: 1.5rem;">
        @csrf
        @method('put')

        <div class="am-form-group">
            <label class="am-label" for="update_password_current_password">Kata Sandi Saat Ini</label>
            <input id="update_password_current_password" name="current_password" type="password" class="am-input" autocomplete="current-password" />
            @error('current_password', 'updatePassword') <span style="color: var(--am-danger); font-size: 0.75rem;">{{ $message }}</span> @enderror
        </div>

        <div class="am-form-group">
            <label class="am-label" for="update_password_password">Kata Sandi Baru</label>
            <input id="update_password_password" name="password" type="password" class="am-input" autocomplete="new-password" />
            @error('password', 'updatePassword') <span style="color: var(--am-danger); font-size: 0.75rem;">{{ $message }}</span> @enderror
        </div>

        <div class="am-form-group">
            <label class="am-label" for="update_password_password_confirmation">Konfirmasi Kata Sandi Baru</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="am-input" autocomplete="new-password" />
            @error('password_confirmation', 'updatePassword') <span style="color: var(--am-danger); font-size: 0.75rem;">{{ $message }}</span> @enderror
        </div>

        <div style="display: flex; align-items: center; gap: 1rem;">
            <button type="submit" class="am-btn am-btn-primary" style="background: var(--am-danger); color: white;">
                <span class="material-symbols-outlined">security</span>
                Perbarui Keamanan
            </button>

            @if (session('status') === 'password-updated')
                <p style="color: var(--am-primary); font-size: 0.875rem; margin: 0; font-weight: 600;">Berhasil diperbarui.</p>
            @endif
        </div>
    </form>
</section>
