@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
    <div class="form-container" style="max-width: 600px; margin: 0;">
        <h1><i class="fas fa-edit"></i> Edit Produk: {{ $product->name }}</h1>

        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf 
            @method('PATCH') 

            <div class="form-group">
                <label for="name">Nama Produk:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required>
            </div>

            <div class="form-group">
                <label for="category">Kategori:</label>
                <select id="category" name="category" required>
                    <option value="Rings" {{ old('category', $product->category) == 'Rings' ? 'selected' : '' }}>Rings</option>
                    <option value="Necklaces" {{ old('category', $product->category) == 'Necklaces' ? 'selected' : '' }}>Necklaces</option>
                    <option value="Bracelets" {{ old('category', $product->category) == 'Bracelets' ? 'selected' : '' }}>Bracelets</option>
                    <option value="Earrings" {{ old('category', $product->category) == 'Earrings' ? 'selected' : '' }}>Earrings</option>
                    <option value="Others" {{ old('category', $product->category) == 'Others' ? 'selected' : '' }}>Others</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="description">Deskripsi:</label>
                <textarea id="description" name="description" rows="4" required>{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Harga (IDR):</label>
                <input type="number" id="price" name="price" step="1000" value="{{ old('price', $product->price) }}" required>
            </div>

            <div class="form-group">
                <label for="image">Gambar Produk (Biarkan kosong jika tidak ingin diubah):</label>
                
                <div style="margin-bottom: 10px; width: 150px; height: 150px; background-color: #f5f5f5; border: 1px solid #f8bbd0; border-radius: 4px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Gambar Lama" style="width: 100%; height: 100%; object-fit: cover;">
                    @else
                        <span style="color: #999; font-size: 0.8rem; text-align: center;">Tidak ada Gambar<br>Saat Ini</span>
                    @endif
                </div>
                <p style="font-size: 0.8rem; color: #555; margin-bottom: 10px;">Path saat ini: {{ $product->image ?? 'N/A' }}</p>
                
                <input type="file" id="image" name="image" accept="image/*">
                <input type="hidden" name="old_image" value="{{ $product->image }}">
            </div>

            <div class="form-group">
                <label for="is_featured">Tampilkan di Featured:</label>
                <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}> 
            </div>

            <button type="submit" class="btn" style="background-color: #007bff;">Update Produk</button>
        </form>

        <a href="{{ route('admin.products.index') }}" class="back-link" style="display: block; margin-top: 15px;">← Kembali ke Daftar Produk</a>
    </div>
@endsection