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
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; margin: 0; }
        .sidebar { min-height: 100vh; background: #2d3436; width: 260px; position: fixed; color: white; }
        .sidebar .nav-link { color: #dfe6e9; padding: 15px 25px; text-decoration: none; display: block; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { background: #d63384; color: white; }
        .main-content { margin-left: 260px; padding: 40px; width: calc(100% - 260px); }
        .card-custom { border: none; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); background: white; padding: 25px; margin-bottom: 30px; }
        .text-magenta { color: #d63384; }
        .btn-magenta { background-color: #d63384; color: white; border-radius: 8px; border: none; }
        .btn-magenta:hover { background-color: #b92a6e; color: white; }
        .badge-pending { background-color: #fff3cd; color: #856404; border: 1px solid #ffeeba; }
    </style>
</head>
<body>

    <div class="d-flex">
        <div class="sidebar shadow">
            <div class="p-4 text-center">
                <h4 class="fw-bold"><i class="fas fa-gem me-2 text-magenta"></i>SELLER</h4>
                <hr style="opacity: 0.1">
            </div>
            <nav class="nav flex-column">
                <a class="nav-link active" href="#"><i class="fas fa-home me-2"></i> Dashboard</a>
                <a class="nav-link" href="{{ route('seller.product.create') }}"><i class="fas fa-plus-circle me-2"></i> Tambah Produk</a>
                <hr class="mx-3" style="opacity: 0.1">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-link bg-transparent border-0 w-100 text-start text-danger">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                    </button>
                </form>
            </nav>
        </div>

        <div class="main-content">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold m-0">Halo, {{ Auth::user()->name }}!</h2>
                    <p class="text-muted">Pantau stok produk dan pesanan perhiasanmu di sini.</p>
                </div>
                <a href="{{ route('seller.product.create') }}" class="btn btn-magenta px-4 py-2 shadow-sm">
                    <i class="fas fa-plus me-2"></i> Produk Baru
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success border-0 shadow-sm mb-4">{{ session('success') }}</div>
            @endif

            <div class="card-custom">
                <h5 class="fw-bold mb-4"><i class="fas fa-shopping-bag me-2 text-magenta"></i> Pesanan Masuk</h5>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Pembeli</th>
                                <th>Produk</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th>Alamat</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                            <tr>
                                <td>
                                    <span class="fw-bold d-block">{{ $order->user->name }}</span>
                                    <small class="text-muted"><i class="fab fa-whatsapp"></i> {{ $order->phone }}</small>
                                </td>
                                <td>{{ $order->product->name ?? 'Produk Dihapus' }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td class="fw-bold text-magenta">Rp{{ number_format($order->total_price, 0, ',', '.') }}</td>
                                <td><small>{{ Str::limit($order->address, 30) }}</small></td>
                                <td>
                                    <span class="badge badge-pending">{{ ucfirst($order->status) }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted small">Belum ada pesanan yang masuk.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-custom">
                <h5 class="fw-bold mb-4"><i class="fas fa-box me-2 text-magenta"></i> Koleksi Produk</h5>
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th>Foto</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Kondisi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" width="60" class="rounded shadow-sm">
                                    @else
                                        <div class="bg-light rounded p-2"><i class="fas fa-image text-muted"></i></div>
                                    @endif
                                </td>
                                <td class="text-start fw-bold">{{ $product->name }}</td>
                                <td>Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>
                                    <span class="badge {{ $product->condition == 'Baru' ? 'bg-success' : 'bg-warning text-dark' }}">
                                        {{ $product->condition }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('seller.product.edit', $product->id) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('seller.product.destroy', $product->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus produk ini?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>