@extends('layouts.admin')

@section('title', 'Tambah Produk Baru')

@section('content')
    <div class="form-container" style="max-width: 600px; margin: 0;">
        <h1><i class="fas fa-plus-circle"></i> Tambah Produk Baru</h1>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf 

            <div class="form-group">
                <label for="name">Nama Produk:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="category">Kategori:</label>
                <select id="category" name="category" required>
                    <option value="Rings" {{ old('category') == 'Rings' ? 'selected' : '' }}>Rings</option>
                    <option value="Necklaces" {{ old('category') == 'Necklaces' ? 'selected' : '' }}>Necklaces</option>
                    <option value="Bracelets" {{ old('category') == 'Bracelets' ? 'selected' : '' }}>Bracelets</option>
                    <option value="Earrings" {{ old('category') == 'Earrings' ? 'selected' : '' }}>Earrings</option>
                    <option value="Others" {{ old('category') == 'Others' ? 'selected' : '' }}>Others</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="description">Deskripsi:</label>
                <textarea id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Harga (IDR):</label>
                <input type="number" id="price" name="price" step="1000" value="{{ old('price') }}" required>
            </div>

            <div class="form-group">
                <label for="image">Gambar Produk (Max 2MB):</label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>

            <div class="form-group">
                <label for="is_featured">Tampilkan di Featured:</label>
                <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}> (Centang jika ingin ditampilkan di homepage)
            </div>

            <button type="submit" class="btn">Simpan Produk</button>
        </form>

        <a href="{{ route('admin.products.index') }}" class="back-link" style="display: block; margin-top: 15px;">← Kembali ke Daftar Produk</a>
    </div>
@endsection