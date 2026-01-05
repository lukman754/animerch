<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('merchandise', function (Blueprint $table) {
            $table->id(); // Auto increment primary key
            $table->string('id_barang')->unique(); // ID Barang (custom)
            $table->string('gambar')->nullable(); // Path gambar
            $table->string('nama_barang'); // Nama Barang
            $table->string('event_terkait'); // Event Terkait
            $table->decimal('harga', 10, 2); // Harga (10 digit, 2 decimal)
            $table->integer('stok')->default(0); // Stok
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchandise');
    }
};
