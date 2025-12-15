@extends('layouts.admin')

@section('title', 'Manajemen Produk')

@section('content')
    <h1 style="color: #1a1a1a; padding-bottom: 10px; border-bottom: 3px solid #ffd700;"><i class="fas fa-box"></i> Manajemen Produk</h1>
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; margin-top: 30px;">
        <h2 style="font-size: 1.5rem; color: #2c3e50;">Daftar Produk Toko Perhiasan</h2>
        <a href="{{ route('admin.products.create') }}" class="btn"><i class="fas fa-plus"></i> Tambah Produk Baru</a>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Featured</th>
                <th style="width: 150px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category }}</td>
                    <td>Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>
                        {{ $product->is_featured ? 'Ya' : 'Tidak' }}
                    </td>
                    <td>
                        <a href="{{ route('admin.products.show', $product->id) }}" class="action-link">Lihat</a> |
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="action-link">Edit</a> |
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus produk ini?')" class="action-link delete" style="background: none; border: none; cursor: pointer; padding: 0;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Belum ada produk yang tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection