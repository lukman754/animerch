<x-guest-layout>
    @section('title', 'Lupa Kata Sandi - AniMerch System')

    <div style="text-align: center; margin-bottom: 2rem;">
        <h2 style="font-weight: 800; font-size: 1.5rem; color: white; margin-bottom: 0.5rem;">Lupa Kata Sandi?</h2>
        <p style="color: var(--am-text-muted); font-size: 0.875rem;">
            Masukkan email Anda dan kami akan mengirimkan link untuk mengatur ulang kata sandi Anda.
        </p>
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div style="background: rgba(171,217,7,0.1); border: 1px solid var(--am-primary); padding: 1rem; border-radius: 0.75rem; color: var(--am-primary); font-size: 0.875rem; margin-bottom: 1.5rem;">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="am-form-group">
            <label class="am-label" for="email">Alamat Email</label>
            <div style="position: relative;">
                <input class="am-input w-100 py-3" style="padding-right: 3rem;"
                       id="email" name="email" type="email" value="{{ old('email') }}" 
                       placeholder="admin@animerch.com" required autofocus />
                <span class="material-symbols-outlined" style="position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); color: var(--am-text-muted); font-size: 1.25rem;">mail</span>
            </div>
            @error('email')
                <p style="color: var(--am-danger); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-top: 2rem;">
            <button type="submit" class="am-btn am-btn-primary w-100 py-3">
                <span class="material-symbols-outlined">send</span>
                Kirim Link Reset
            </button>
        </div>

        <div style="text-align: center; margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--am-border);">
            <a href="{{ route('login') }}" style="color: var(--am-primary); font-weight: 700; text-decoration: none; font-size: 0.875rem;">
                Kembali ke Halaman Masuk
            </a>
        </div>
    </form>
</x-guest-layout>
