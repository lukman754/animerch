<section>
    <header style="margin-bottom: 2rem;">
        <h2 style="font-size: 1.25rem; font-weight: 800; color: white; margin-bottom: 0.5rem;">
            Hapus Akun Administrator
        </h2>

        <p style="color: var(--am-text-muted); font-size: 0.875rem;">
            Setelah akun Anda dihapus, semua sumber daya dan data yang terkait akan dihapus secara permanen. Silakan unduh data yang Anda perlukan sebelum melanjutkan.
        </p>
    </header>

    <button class="am-btn" style="background: var(--am-danger); color: white;"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >
        <span class="material-symbols-outlined">delete_forever</span>
        Tutup & Hapus Akun
    </button>

    <div x-data="{ show: @js($errors->userDeletion->isNotEmpty()) }" 
         x-show="show" 
         x-on:open-modal.window="if ($event.detail == 'confirm-user-deletion') show = true"
         x-on:close-modal.window="if ($event.detail == 'confirm-user-deletion') show = false"
         x-on:keydown.escape.window="show = false"
         style="display: none;"
         class="am-modal-overlay">
        
        <div class="am-modal-content" @click.outside="show = false">
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <h2 style="font-size: 1.5rem; font-weight: 900; color: white; margin-bottom: 1rem;">
                    Apakah Anda yakin?
                </h2>

                <p style="color: var(--am-text-muted); font-size: 0.875rem; margin-bottom: 2rem; line-height: 1.6;">
                    Penghapusan ini bersifat permanen. Silakan masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda benar-benar ingin menghapus akun administrator ini.
                </p>

                <div class="am-form-group">
                    <label class="am-label" for="password">Konfirmasi Kata Sandi</label>
                    <input id="password" name="password" type="password" class="am-input" placeholder="••••••••" />
                    @error('password', 'userDeletion') <span style="color: var(--am-danger); font-size: 0.75rem; margin-top: 0.5rem;">{{ $message }}</span> @enderror
                </div>

                <div style="display: flex; justify-content: flex-end; gap: 1rem; margin-top: 2rem;">
                    <button type="button" class="am-btn am-btn-outline" x-on:click="show = false">
                        Batal
                    </button>

                    <button type="submit" class="am-btn" style="background: var(--am-danger); color: white;">
                        Hapus Permanen
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
