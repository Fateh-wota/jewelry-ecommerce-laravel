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
        Schema::create('order_items', function (Blueprint $table) {
        $table->id();
        $table->foreignId('order_id')->constrained()->onDelete('cascade');
        // Product_id nullable jika produk dihapus dari sistem
        $table->foreignId('product_id')->nullable()->constrained()->onDelete('set null'); 
        $table->unsignedBigInteger('price_at_purchase'); // Harga produk saat dibeli (untuk riwayat)
        $table->integer('quantity');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
