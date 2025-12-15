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
        Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Nama produk (misal: Gold Diamond Ring)
        $table->text('description')->nullable(); // Deskripsi detail
        $table->decimal('price', 10, 2); // Harga (misal: 10 total digit, 2 desimal)
        $table->string('image')->nullable(); // Path gambar produk (akan disimpan di storage)
        $table->string('category'); // Kategori (Rings, Necklaces, Bracelets)
        $table->boolean('is_featured')->default(false); // Untuk ditampilkan di Featured Collection di Dashboard
        $table->timestamps();
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
