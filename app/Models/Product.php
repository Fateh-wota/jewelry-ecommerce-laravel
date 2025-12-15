<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * TENTUKAN KOLOM MANA YANG BOLEH DIISI SECARA MASAL DARI FORM
     */
    protected $fillable = [
        'name', 
        'description', 
        'price', 
        'image', 
        'category', 
        'is_featured', 
    ];

    // Jika Anda ingin mengizinkan semua kolom untuk diisi secara Mass Assignment (TIDAK disarankan untuk Model penting seperti User):
    // protected $guarded = []; 
}