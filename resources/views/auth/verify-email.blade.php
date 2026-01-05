<x-guest-layout>
    @section('title', 'Verifikasi Email - AniMerch System')

    <div style="text-align: center; margin-bottom: 2rem;">
        <h2 style="font-weight: 800; font-size: 1.5rem; color: white; margin-bottom: 0.5rem;">Verifikasi Email</h2>
        <p style="color: var(--am-text-muted); font-size: 0.875rem;">
            Terima kasih telah bergabung! Silakan verifikasi email Anda dengan mengeklik link yang baru saja kami kirimkan.
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div style="background: rgba(171,217,7,0.1); border: 1px solid var(--am-primary); padding: 1rem; border-radius: 0.75rem; color: var(--am-primary); font-size: 0.875rem; margin-bottom: 1.5rem;">
            Link verifikasi baru telah dikirim ke alamat email Anda.
        </div>
    @endif

    <div style="display: flex; flex-direction: column; gap: 1rem;">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="am-btn am-btn-primary w-100 py-3">
                <span class="material-symbols-outlined">mark_email_read</span>
                Kirim Ulang Email Verifikasi
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}" style="text-align: center; margin-top: 1rem;">
            @csrf
            <button type="submit" class="am-nav-link" style="background: none; border: none; cursor: pointer; font-weight: 700; text-decoration: underline;">
                Keluar (Log Out)
            </button>
        </form>
    </div>
</x-guest-layout>
