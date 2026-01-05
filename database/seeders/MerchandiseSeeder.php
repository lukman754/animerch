<?php

namespace Database\Seeders;

use App\Models\Merchandise;
use Illuminate\Database\Seeder;

class MerchandiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $merchandise = [
            [
                'id_barang' => 'MRC-001',
                'nama_barang' => 'T-Shirt Naruto Hokage',
                'event_terkait' => 'Anime Fest 2026',
                'harga' => 150000,
                'stok' => 50,
                'gambar' => null
            ],
            [
                'id_barang' => 'MRC-002',
                'nama_barang' => 'Hoodie One Piece Luffy',
                'event_terkait' => 'Anime Fest 2026',
                'harga' => 250000,
                'stok' => 30,
                'gambar' => null
            ],
            [
                'id_barang' => 'MRC-003',
                'nama_barang' => 'Figure Attack on Titan Eren',
                'event_terkait' => 'Comic Con 2026',
                'harga' => 350000,
                'stok' => 15,
                'gambar' => null
            ],
            [
                'id_barang' => 'MRC-004',
                'nama_barang' => 'Poster Demon Slayer Set',
                'event_terkait' => 'Anime Fest 2026',
                'harga' => 75000,
                'stok' => 100,
                'gambar' => null
            ],
            [
                'id_barang' => 'MRC-005',
                'nama_barang' => 'Tote Bag My Hero Academia',
                'event_terkait' => 'Comic Con 2026',
                'harga' => 85000,
                'stok' => 45,
                'gambar' => null
            ],
            [
                'id_barang' => 'MRC-006',
                'nama_barang' => 'Keychain Jujutsu Kaisen',
                'event_terkait' => 'Anime Fest 2026',
                'harga' => 35000,
                'stok' => 200,
                'gambar' => null
            ],
            [
                'id_barang' => 'MRC-007',
                'nama_barang' => 'Mug Spy x Family',
                'event_terkait' => 'Anime Market 2026',
                'harga' => 65000,
                'stok' => 75,
                'gambar' => null
            ],
            [
                'id_barang' => 'MRC-008',
                'nama_barang' => 'Sticker Pack Chainsaw Man',
                'event_terkait' => 'Anime Market 2026',
                'harga' => 25000,
                'stok' => 150,
                'gambar' => null
            ],
            [
                'id_barang' => 'MRC-009',
                'nama_barang' => 'Dakimakura Kaguya-sama',
                'event_terkait' => 'Comic Con 2026',
                'harga' => 180000,
                'stok' => 8,
                'gambar' => null
            ],
            [
                'id_barang' => 'MRC-010',
                'nama_barang' => 'Nendoroid Hatsune Miku',
                'event_terkait' => 'Anime Fest 2026',
                'harga' => 450000,
                'stok' => 0,
                'gambar' => null
            ],
        ];

        foreach ($merchandise as $item) {
            Merchandise::create($item);
        }
    }
}
