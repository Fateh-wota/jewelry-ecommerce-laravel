@extends('layouts.guest')

@section('title', 'Toko Perhiasan Mewah - Homepage')

@section('content')
    
    <div class="banner-home" style="background-image: url('{{ asset('images/banner_bg.jpg') }}'); padding: 100px 0; text-align: center; background-size: cover; background-position: center;">
        <div class="container">
            <h1 style="color: white; font-size: 3rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Temukan Kilauan Sempurna Anda</h1>
            <p style="color: white; font-size: 1.2rem; margin-top: 10px;">Koleksi Perhiasan Emas dan Berlian Terbaik</p>
            <a href="#featured" class="btn-primary" style="margin-top: 30px;">Lihat Koleksi</a>
        </div>
    </div>

    <div id="featured" class="container" style="padding: 60px 0;">
        <h2 style="text-align: center; color: #e91e63; margin-bottom: 40px; border-bottom: 2px solid #f8bbd0; padding-bottom: 10px;">Produk Unggulan</h2>

        <div class="products-grid">
            @forelse ($featuredProducts as $product)
                <a href="{{ route('product.show', $product->id) }}" class="product-card">
                    <div class="product-card-image" style="background-color: #fce4ec; height: 250px; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <i class="fas fa-gem fa-4x" style="color: #c2185b;"></i>
                        @endif
                    </div>
                    <div class="product-card-info" style="padding: 15px; text-align: center;">
                        <h3 style="color: #333; margin-bottom: 5px;">{{ $product->name }}</h3>
                        <p style="color: #e91e63; font-weight: 600;">{{ $product->category }}</p>
                        <p class="price" style="font-size: 1.2rem; color: #c2185b; font-weight: 700;">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>
                </a>
            @empty
                <p style="grid-column: 1 / -1; text-align: center; color: #555;">Belum ada produk unggulan yang tersedia saat ini.</p>
            @endforelse
        </div>
    </div>

@endsection