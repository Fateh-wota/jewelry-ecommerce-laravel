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
        Schema::create('products', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->foreignId('user_id')->constrained()->onDelete('cascade'); // ID Penjual
            $blueprint->string('name'); // Nama Produk
            $blueprint->text('description')->nullable(); // Deskripsi Produk
            $blueprint->decimal('price', 15, 2); // Harga (maksimal 15 digit, 2 angka di belakang koma)
            $blueprint->integer('stock')->default(0); // Jumlah Stok
            $blueprint->string('image')->nullable(); // Path foto produk
            $blueprint->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};