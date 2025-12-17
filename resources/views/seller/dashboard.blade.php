<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard - Jewelry Store</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        *, ::after, ::before { box-sizing: border-box !important; }
        body { font-family: 'Poppins', sans-serif !important; background-color: #f4f7f6 !important; margin: 0 !important; }
        
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

        .sidebar .nav-link:hover, .sidebar .nav-link.active { 
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
            box-shadow: 0 5px 15px rgba(0,0,0,0.05) !important; 
            background: white !important;
            padding: 25px !important;
        }

        .product-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #eee;
        }

        .text-magenta { color: #d63384 !important; }
        .bg-magenta { background-color: #d63384 !important; color: white !important; }
        .btn-magenta { background-color: #d63384 !important; color: white !important; border-radius: 10px !important; border: none !important; padding: 10px 20px !important; }
        .btn-magenta:hover { background-color: #b92a6e !important; }
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
                <a class="nav-link active" href="{{ route('seller.dashboard') }}"><i class="fas fa-box me-2"></i> Produk Saya</a>
                <a class="nav-link" href="{{ route('seller.product.create') }}"><i class="fas fa-plus-circle me-2"></i> Tambah Produk</a>
                <a class="nav-link" href="#"><i class="fas fa-shopping-bag me-2"></i> Pesanan Masuk</a>
                <hr class="mx-3" style="opacity: 0.1">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link bg-transparent border-0 w-100 text-start text-danger">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                    </button>
                </form>
            </nav>
        </div>

        <div class="main-content">
            <header class="d-flex justify-content-between align-items-center mb-5">
                <div>
                    <h2 class="fw-bold">Manajemen Produk</h2>
                    <p class="text-muted">Halo, <strong>{{ Auth::user()->name }}</strong>. Kelola perhiasan jualanmu di sini.</p>
                </div>
                <a href="{{ route('seller.product.create') }}" class="btn btn-magenta">
                    <i class="fas fa-plus me-2"></i> Tambah Produk Baru
                </a>
            </header>

            @if(session('success'))
                <div class="alert alert-success border-0 shadow-sm mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card-custom">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Foto</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                            <tr>
                                <td>
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" class="product-img" alt="Product">
                                    @else
                                        <div class="product-img bg-light d-flex align-items-center justify-content-center">
                                            <i class="fas fa-image text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="fw-bold">{{ $product->name }}</td>
                                <td class="text-magenta fw-medium">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td><span class="badge bg-secondary">{{ $product->stock }} Pcs</span></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('seller.product.edit', $product->id) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('seller.product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="fas fa-box-open fa-3x mb-3 d-block"></i>
                                    Belum ada produk. Yuk, tambah produk pertamamu!
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>