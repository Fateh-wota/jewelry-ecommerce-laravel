<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard - Jewelry Store</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

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
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05) !important;
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
        
        /* Merapikan Search Bar DataTables */
        .dataTables_filter input {
            border-radius: 10px !important;
            padding: 5px 15px !important;
            border: 1px solid #ddd !important;
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
                <a href="{{ route('seller.product.create') }}" class="btn btn-magenta shadow-sm">
                    <i class="fas fa-plus me-2"></i> Tambah Produk Baru
                </a>
            </header>

            @if(session('success'))
                <div class="alert alert-success border-0 shadow-sm mb-4" id="success-alert">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                </div>
            @endif

            <div class="card-custom">
                <div class="table-responsive">
                    <table id="productTable" class="table table-hover align-middle">
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
                                            <img src="{{ asset('storage/' . $product->image) }}" class="product-img shadow-sm" alt="Product">
                                        @else
                                            <div class="product-img bg-light d-flex align-items-center justify-content-center border">
                                                <i class="fas fa-image text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="fw-bold">
                                        <a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal" data-bs-target="#detailModal{{ $product->id }}">
                                            {{ $product->name }} <i class="fas fa-eye ms-1 text-muted" style="font-size: 12px;"></i>
                                        </a>
                                    </td>
                                    <td class="text-magenta fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                    <td>
                                        @if($product->stock <= 5)
                                            <span class="badge bg-danger">Hampir Habis: {{ $product->stock }}</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $product->stock }} Pcs</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('seller.product.edit', $product->id) }}" class="btn btn-sm btn-outline-primary shadow-sm" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('seller.product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger shadow-sm" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>

                                        <div class="modal fade text-start" id="detailModal{{ $product->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content border-0 shadow" style="border-radius: 15px;">
                                                    <div class="modal-header border-0 pb-0">
                                                        <h5 class="modal-title fw-bold">Detail Produk</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body p-4">
                                                        <div class="text-center mb-4">
                                                            @if($product->image)
                                                                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded shadow" style="max-height: 250px; width: 100%; object-fit: cover;">
                                                            @else
                                                                <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 200px;">
                                                                    <i class="fas fa-image fa-4x text-muted"></i>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <h4 class="fw-bold mb-1">{{ $product->name }}</h4>
                                                        <h5 class="text-magenta fw-bold mb-3">Rp {{ number_format($product->price, 0, ',', '.') }}</h5>
                                                        <hr style="opacity: 0.1">
                                                        <div class="mb-3">
                                                            <label class="fw-bold text-muted small">STOK TERSEDIA:</label>
                                                            <p class="mb-0 fw-medium">{{ $product->stock }} Pcs</p>
                                                        </div>
                                                        <div class="mb-0">
                                                            <label class="fw-bold text-muted small">DESKRIPSI:</label>
                                                            <p class="text-secondary" style="white-space: pre-line;">{{ $product->description ?? 'Tidak ada deskripsi.' }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer border-0">
                                                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Tutup</button>
                                                        <a href="{{ route('seller.product.edit', $product->id) }}" class="btn btn-magenta rounded-pill px-4 shadow-sm">Edit Produk</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inisialisasi DataTables (Search & Sorting otomatis)
            $('#productTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json"
                },
                "pageLength": 10,
                "ordering": true, // Aktifkan sorting
                "columnDefs": [
                    { "orderable": false, "targets": [0, 4] } // Foto dan Aksi tidak usah bisa disortir
                ]
            });

            // Menghilangkan alert sukses otomatis setelah 3 detik
            setTimeout(function() {
                $('#success-alert').fadeOut('slow');
            }, 3000);
        });
    </script>
</body>
</html>