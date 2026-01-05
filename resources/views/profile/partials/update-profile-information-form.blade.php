<section>
    <header style="margin-bottom: 2rem;">
        <h2 style="font-size: 1.25rem; font-weight: 800; color: white; margin-bottom: 0.5rem;">
            Informasi Profil
        </h2>

        <p style="color: var(--am-text-muted); font-size: 0.875rem;">
            Perbarui nama dan alamat email akun administrator Anda.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" style="display: flex; flex-direction: column; gap: 1.5rem;">
        @csrf
        @method('patch')

        <div class="am-form-group">
            <label class="am-label" for="name">Nama Lengkap</label>
            <input id="name" name="name" type="text" class="am-input" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            @error('name') <span style="color: var(--am-danger); font-size: 0.75rem;">{{ $message }}</span> @enderror
        </div>

        <div class="am-form-group">
            <label class="am-label" for="email">Email</label>
            <input id="email" name="email" type="email" class="am-input" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            @error('email') <span style="color: var(--am-danger); font-size: 0.75rem;">{{ $message }}</span> @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div style="margin-top: 1rem;">
                    <p style="font-size: 0.875rem; color: var(--am-text-muted);">
                        Alamat email Anda belum diverifikasi.
                        <button form="send-verification" style="background: none; border: none; padding: 0; color: var(--am-primary); text-decoration: underline; cursor: pointer; font-size: 0.75rem;">
                            Klik di sini untuk mengirim ulang email verifikasi.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p style="margin-top: 0.5rem; color: var(--am-primary); font-size: 0.75rem; font-weight: 600;">
                            Link verifikasi baru telah dikirim ke alamat email Anda.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div style="display: flex; align-items: center; gap: 1rem;">
            <button type="submit" class="am-btn am-btn-primary">
                <span class="material-symbols-outlined">save</span>
                Simpan Perubahan
            </button>

            @if (session('status') === 'profile-updated')
                <p style="color: var(--am-primary); font-size: 0.875rem; margin: 0; font-weight: 600;">Berhasil diperbarui.</p>
            @endif
        </div>
    </form>
</section>
