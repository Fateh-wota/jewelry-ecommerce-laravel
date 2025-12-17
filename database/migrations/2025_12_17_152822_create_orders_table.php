<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ID Pembeli
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // ID Produk
            $table->foreignId('seller_id')->constrained('users')->onDelete('cascade'); // ID Penjual
            $table->integer('quantity');
            $table->decimal('total_price', 15, 2);
            $table->string('status')->default('pending'); // pending, dikemas, dikirim, selesai, dibatalkan
            $table->text('address');
            $table->string('phone');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};