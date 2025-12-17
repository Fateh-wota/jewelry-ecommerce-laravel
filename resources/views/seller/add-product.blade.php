<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - Jewelry Store</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        *,
        ::after,
        ::before {
            box-sizing: border-box !important;
        }

        body {
            font-family: 'Poppins', sans-serif !important;
            background-color: #f4f7f6 !important;
            margin: 0 !important;
        }

        .sidebar {
            min-height: 100vh !important;
            background: #2d3436 !important;
            width: 260px !important;
            position: fixed !important;
            color: white !important;
            z-index: 1000 !important;
        }

        .sidebar .nav-link {
            color: #dfe6e9 !important;
            padding: 15px 25px !important;
            text-decoration: none !important;
            display: block !important;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: #d63384 !important;
            color: white !important;
        }

        .main-content {
            margin-left: 260px !important;
            padding: 40px !important;
            width: calc(100% - 260px) !important;
        }

        .card-custom {
            border: none !important;
            border-radius: 15px !important;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05) !important;
            background: white !important;
            padding: 30px !important;
            max-width: 800px;
        }

        .text-magenta {
            color: #d63384 !important;
        }

        .btn-magenta {
            background-color: #d63384 !important;
            color: white !important;
            border-radius: 10px !important;
            border: none !important;
            padding: 12px 25px !important;
            font-weight: 600 !important;
        }

        .btn-magenta:hover {
            background-color: #b92a6e !important;
        }

        .form-label {
            font-weight: 500 !important;
            color: #2d3436 !important;
        }

        .form-control:focus {
            border-color: #d63384 !important;
            box-shadow: 0 0 0 0.25rem rgba(214, 51, 132, 0.1) !important;
        }
    </style>
</head>

<body>

    <div class="d-flex">
        <div class="sidebar shadow">
            <div class="p-4 text-center">
                <h4 class="fw-bold"><i class="fas fa-gem me-2"></i>SELLER</h4>
                <hr style="opacity: 0.1">
            </div>
            <nav class="nav flex-column">
                <a class="nav-link" href="{{ route('seller.dashboard') }}"><i class="fas fa-box me-2"></i> Produk
                    Saya</a>
                <a class="nav-link active" href="{{ route('seller.product.create') }}"><i
                        class="fas fa-plus-circle me-2"></i> Tambah Produk</a>
                <hr class="mx-3" style="opacity: 0.1">
                <a href="{{ route('seller.dashboard') }}" class="nav-link text-warning"><i
                        class="fas fa-arrow-left me-2"></i> Kembali</a>
            </nav>
        </div>

        <div class="main-content">
            <div class="mb-4">
                <h2 class="fw-bold">Tambah Koleksi Baru</h2>
                <p class="text-muted">Masukkan detail perhiasan yang ingin Anda jual.</p>
            </div>

            <div class="card-custom">
                <form action="{{ route('seller.product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" name="name" class="form-control" placeholder="Contoh: Cincin Berlian 24K"
                            required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Harga (Rp)</label>
                            <input type="number" name="price" class="form-control" placeholder="0" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jumlah Stok</label>
                            <input type="number" name="stock" class="form-control" placeholder="0" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto Produk</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                        <small class="text-muted">Format: JPG, PNG, WEBP (Maks 2MB)</small>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Deskripsi Produk</label>
                        <textarea name="description" class="form-control" rows="4"
                            placeholder="Ceritakan detail keindahan produk ini..."></textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-magenta">
                            <i class="fas fa-save me-2"></i> Simpan Produk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>