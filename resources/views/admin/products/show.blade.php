@extends('layouts.admin')

@section('title', 'Detail Produk: ' . $product->name)

@section('content')
    <h1 style="color: #e91e63; padding-bottom: 10px; border-bottom: 3px solid #f8bbd0;"><i class="fas fa-eye"></i> Detail Produk</h1>
    
    <div class="product-detail-card card" style="border-left: 5px solid #e91e63; padding: 30px; margin-top: 30px; cursor: default;">
        
        <h2 style="margin-bottom: 20px;">{{ $product->name }}</h2>

        <div style="display: flex; gap: 40px; flex-wrap: wrap;">
            
            <div style="flex-shrink: 0; width: 250px; height: 250px; background-color: #f5f5f5; border: 1px dashed #f8bbd0; border-radius: 4px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                @if ($product->image)
                    {{-- Menggunakan asset('storage/...') untuk mengakses file yang di-link --}}
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                @else
                    {{-- Tampilkan placeholder jika image path kosong/null --}}
                    <span style="color: #e91e63; text-align: center; padding: 10px;"><i class="fas fa-image fa-3x"></i><br>Gambar Belum Tersedia</span>
                @endif
            </div>

            <div style="flex-grow: 1;">
                
                <p><strong>ID Produk:</strong> <span style="font-weight: 600;">{{ $product->id }}</span></p>
                <p><strong>Kategori:</strong> <span style="background-color: #fce4ec; padding: 4px 8px; border-radius: 4px; color: #e91e63; font-weight: 600;">{{ $product->category }}</span></p>
                <p><strong>Harga:</strong> <strong style="font-size: 1.3rem; color: #c2185b;">Rp{{ number_format($product->price, 0, ',', '.') }}</strong></p>
                <p><strong>Status Featured:</strong> <span style="color: {{ $product->is_featured ? '#2ecc71' : '#e74c3c' }}; font-weight: 600;">{{ $product->is_featured ? 'Ya' : 'Tidak' }}</span></p>
                
                <h3 style="margin-top: 25px; color: #e91e63;"><i class="fas fa-info-circle"></i> Deskripsi Produk:</h3>
                <p style="white-space: pre-wrap; margin-top: 10px;">{{ $product->description }}</p>

                <h3 style="margin-top: 25px; color: #e91e63;"><i class="fas fa-link"></i> Image Path (Data Mentah):</h3>
                <p style="font-family: monospace; background-color: #eee; padding: 5px; border-radius: 3px; font-size: 0.9rem;">{{ $product->image ?? 'N/A' }}</p>

                <div style="margin-top: 30px;">
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn" style="background-color: #007bff; color: white; margin-right: 15px;">Edit Produk</a>
                    <a href="{{ route('admin.products.index') }}" style="color: #555; text-decoration: none;">← Kembali ke Daftar</a>
                </div>
            </div>
        </div>

    </div>
@endsection