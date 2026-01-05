<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    protected $table = 'merchandise';
    
    protected $fillable = [
        'id_barang',
        'gambar',
        'nama_barang',
        'event_terkait',
        'deskripsi',
        'kategori',
        'harga',
        'stok'
    ];
    
    protected $casts = [
        'harga' => 'decimal:2',
        'stok' => 'integer'
    ];
}
