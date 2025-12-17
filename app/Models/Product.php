<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    /**
     * Kolom yang boleh diisi (WAJIB ADA user_id DI SINI)
     */
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'price',
        'stock',
        'image',
        'condition',
    ];

    /**
     * Relasi ke User (Penjual).
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}