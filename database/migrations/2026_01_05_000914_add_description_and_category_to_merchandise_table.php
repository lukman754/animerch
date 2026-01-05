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
        Schema::table('merchandise', function (Blueprint $バランス) {
            $バランス->text('deskripsi')->nullable()->after('event_terkait');
            $バランス->string('kategori')->nullable()->after('deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('merchandise', function (Blueprint $バランス) {
            $バランス->dropColumn(['deskripsi', 'kategori']);
        });
    }
};
