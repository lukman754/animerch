<x-guest-layout>
    @section('title', 'Masuk ke Akun - AniMerch System')

    <div style="text-align: center; margin-bottom: 2rem;">
        <h2 style="font-weight: 800; font-size: 1.5rem; color: white; margin-bottom: 0.5rem;">Akses Administrator</h2>
        <p style="color: var(--am-text-muted); font-size: 0.875rem;">Silakan masuk untuk mengelola katalog item.</p>
    </div>

    @if (session('status'))
        <div style="background: rgba(171,217,7,0.1); border: 1px solid var(--am-primary); padding: 1rem; border-radius: 0.75rem; color: var(--am-primary); font-size: 0.875rem; margin-bottom: 1.5rem;">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="am-form-group">
            <label class="am-label" for="email">Email Admin</label>
            <div style="position: relative;">
                <input class="am-input w-100 py-3" style="padding-right: 3rem;"
                       id="email" name="email" type="email" value="{{ old('email') }}" 
                       placeholder="admin@animerch.com" required autofocus autocomplete="username" />
                <span class="material-symbols-outlined" style="position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); color: var(--am-text-muted); font-size: 1.25rem;">mail</span>
            </div>
            @error('email')
                <p style="color: var(--am-danger); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
            @enderror
        </div>

        <div class="am-form-group">
            <label class="am-label" for="password">Kata Sandi</label>
            <div style="position: relative;">
                <input class="am-input w-100 py-3" style="padding-right: 3rem;"
                       id="password" name="password" type="password" 
                       placeholder="••••••••" required autocomplete="current-password" />
                <span class="material-symbols-outlined" style="position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); color: var(--am-text-muted); font-size: 1.25rem;">lock</span>
            </div>
            @error('password')
                <p style="color: var(--am-danger); font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
            @enderror
        </div>

        <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 2rem;">
            <input id="remember_me" name="remember" type="checkbox" style="accent-color: var(--am-primary);">
            <label for="remember_me" style="font-size: 0.875rem; color: var(--am-text-muted); cursor: pointer;">Ingat sesi saya</label>
        </div>

        <button type="submit" class="am-btn am-btn-primary w-100 py-3" style="font-size: 1rem; margin-bottom: 1.5rem;">
            Masuk ke Dashboard
            <span class="material-symbols-outlined">login</span>
        </button>
        
        <div style="text-align: center; padding-top: 1.5rem; border-top: 1px solid var(--am-border);">
            <p style="font-size: 0.875rem; color: var(--am-text-muted);">
                Belum punya akses? 
                <a href="#" style="color: var(--am-primary); font-weight: 700; text-decoration: none;">Hubungi IT Support</a>
            </p>
        </div>
    </form>
</x-guest-layout>
