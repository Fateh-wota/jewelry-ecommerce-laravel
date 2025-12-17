<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk - Jewelry Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #fcfcfc; color: #333; }
        .breadcrumb { font-size: 0.9rem; }
        .product-main-img { width: 100%; border-radius: 12px; border: 1px solid #eee; }
        .text-magenta { color: #d63384; }
        .btn-magenta { background-color: #d63384; color: white; border: none; transition: 0.3s; }
        .btn-magenta:hover { background-color: #b92a6e; color: white; }
        .section-title { font-size: 1.1rem; font-weight: 600; border-bottom: 2px solid #f0f0f0; padding-bottom: 8px; margin-bottom: 15px; }
        .info-label { color: #888; width: 100px; display: inline-block; font-size: 0.9rem; }
        .info-value { font-weight: 500; font-size: 0.9rem; }
        .card-custom { border: 1px solid #eee; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.03); }
    </style>
</head>
<body>

<div class="container py-4">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Produk</li>
        </ol>
    </nav>

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card card-custom p-2">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="product-main-img" alt="Product Image">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center" style="height: 300px; border-radius: 10px;">
                        <i class="fas fa-image fa-4x text-muted"></i>
                    </div>
                @endif
            </div>
        </div>

        <div class="col-lg-4">
            <div class="mb-4">
                <span class="text-magenta fw-bold small"><i class="fas fa-store me-1"></i> {{ $product->user->name ?? 'Toko Perhiasan' }}</span>
                <h2 class="fw-bold mt-1">{{ $product->name }}</h2>
                <h3 class="text-magenta fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>
            </div>

            <div class="detail-section">
                <h6 class="section-title">Detail Produk</h6>
                <div class="mb-2">
                    <span class="info-label">Kondisi</span>
                    <span class="info-value text-success">Baru</span>
                </div>
                <div class="mb-2">
                    <span class="info-label">Stok</span>
                    <span class="info-value">{{ $product->stock }} Pcs</span>
                </div>
                <div class="mb-2">
                    <span class="info-label">Kategori</span>
                    <span class="info-value">Perhiasan Mewah</span>
                </div>
            </div>

            <div class="mt-4">
                <h6 class="section-title">Deskripsi</h6>
                <p class="text-muted small" style="line-height: 1.6;">
                    {{ $product->description ?? 'Tidak ada deskripsi untuk produk ini.' }}
                </p>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card card-custom p-4 sticky-top" style="top: 20px;">
                <h6 class="fw-bold mb-3"><i class="fas fa-shopping-cart me-2"></i>Atur jumlah dan catatan</h6>
                
                @auth
                <form action="{{ route('order.store', $product->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="small fw-bold mb-1">Jumlah Pembelian</label>
                        <div class="input-group input-group-sm">
                            <input type="number" name="quantity" class="form-control text-center" value="1" min="1" max="{{ $product->stock }}" required>
                            <span class="input-group-text">Stok: {{ $product->stock }}</span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="small fw-bold mb-1">No. WhatsApp</label>
                        <input type="text" name="phone" class="form-control form-control-sm" placeholder="Contoh: 0812..." required>
                    </div>

                    <div class="mb-3">
                        <label class="small fw-bold mb-1">Alamat Pengiriman</label>
                        <textarea name="address" class="form-control form-control-sm" rows="3" placeholder="Alamat lengkap..." required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="small fw-bold mb-1">Catatan (Opsional)</label>
                        <input type="text" name="notes" class="form-control form-control-sm" placeholder="Ukuran jari, warna, dll">
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-magenta fw-bold">Beli Sekarang</button>
                        <a href="https://wa.me/{{ $product->user->phone ?? '62812345678' }}" target="_blank" class="btn btn-outline-secondary btn-sm">
                            <i class="fab fa-whatsapp me-1"></i> Chat Seller
                        </a>
                    </div>
                </form>
                @else
                <div class="text-center py-3">
                    <p class="small text-muted mb-3">Login untuk mulai belanja perhiasan impianmu.</p>
                    <a href="{{ route('login') }}" class="btn btn-magenta btn-sm px-4">Login</a>
                </div>
                @endauth
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>