<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Tamu - Toko Online FILKOM</title>
    
    <link rel="stylesheet" href="{{ asset('css/guest.css') }}">
</head>
<body>

    <header class="main-header">
        <div class="logo">FILKOM</div>
        
        <nav class="category-nav">
            <a href="#" class="category-link">Kategori</a>
        </nav>
        
        <div class="search-bar-container">
            <input type="text" class="search-input" placeholder="Cari Produk di Sini yee">
        </div>
        
        <div class="auth-links">
            <a href="{{ route('login') }}" class="btn btn-login">Login</a>
            <a href="{{ route('register') }}" class="btn btn-register">Register</a>
        </div>
    </header>

    <div class="main-content-grid">
        
        @for ($i = 1; $i <= 12; $i++)
        <div class="product-card">
            
            <div class="product-image-placeholder">
                <img src="{{ asset('path/to/placeholder/image-' . $i . '.jpg') }}" alt="Gambar Produk {{ $i }}" class="product-image">
            </div>
            
            <div class="product-details">
                <h3 class="product-name">[PRODUK BAGUS GEYS]</h3>
                <div class="product-price">Rp{{ number_format(50000 * $i, 0, ',', '.') }}</div>
                
                <div class="product-rating">
                    <span>⭐ 5.0</span>
                    <span class="sold-count">{{ rand(1, 100) }}+ terjual</span>
                </div>
                
                <div class="seller-info">
                    TokoSengDodol
                </div>
            </div>
        </div>
        @endfor
        
    </div>

</body>
</html>