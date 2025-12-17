<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - Jewelry Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        *, ::after, ::before { box-sizing: border-box !important; }
        body { font-family: 'Poppins', sans-serif !important; background-color: #f4f7f6 !important; }
        .sidebar { min-height: 100vh !important; background: #2d3436 !important; width: 260px !important; position: fixed !important; color: white !important; }
        .sidebar .nav-link { color: #dfe6e9 !important; padding: 15px 25px !important; text-decoration: none !important; display: block !important; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { background: #d63384 !important; }
        .main-content { margin-left: 260px !important; padding: 40px !important; width: calc(100% - 260px) !important; }
        .card-custom { border: none !important; border-radius: 15px !important; box-shadow: 0 5px 15px rgba(0,0,0,0.05) !important; background: white !important; padding: 30px !important; max-width: 800px; }
        .btn-magenta { background-color: #d63384 !important; color: white !important; border-radius: 10px !important; border: none !important; padding: 12px 25px !important; font-weight: 600 !important; }
        .current-img { width: 100px; border-radius: 10px; margin-bottom: 10px; border: 1px solid #ddd; }
    </style>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar shadow">
            <div class="p-4 text-center"><h4 class="fw-bold"><i class="fas fa-gem me-2"></i>SELLER</h4></div>
            <nav class="nav flex-column">
                <a class="nav-link" href="{{ route('seller.dashboard') }}"><i class="fas fa-box me-2"></i> Produk Saya</a>
                <a class="nav-link text-warning" href="{{ route('seller.dashboard') }}"><i class="fas fa-arrow-left me-2"></i> Batal</a>
            </nav>
        </div>

        <div class="main-content">
            <h2 class="fw-bold mb-4">Edit Produk</h2>
            <div class="card-custom">
                <form action="{{ route('seller.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Harga (Rp)</label>
                            <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jumlah Stok</label>
                            <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ganti Foto Produk (Kosongkan jika tidak ingin diganti)</label><br>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="current-img" alt="Current">
                        @endif
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-magenta">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>