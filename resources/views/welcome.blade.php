<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jewelry Store - Timeless Elegance</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root { 
            --magenta-primary: #d63384; 
            --pink-soft: #fff2f2; 
        }
        
        body { 
            font-family: 'Poppins', sans-serif; 
            background-color: #ffffff; 
            margin: 0; 
            overflow-x: hidden; 
        }
        
        /* Navbar Styling */
        .navbar { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            padding: 15px 8%; 
            background: white; 
        }
        .logo { 
            font-weight: 700; 
            color: var(--magenta-primary); 
            font-size: 1.5rem; 
            text-decoration: none; 
        }
        .nav-links a { 
            margin: 0 15px; 
            text-decoration: none; 
            color: #333; 
            font-weight: 500; 
        }
        .sign-in-btn { 
            background: var(--magenta-primary); 
            color: white; 
            padding: 8px 20px; 
            border-radius: 8px; 
            text-decoration: none; 
            transition: 0.3s;
        }
        .sign-in-btn:hover {
            background: #b92a6e;
            color: white;
        }

        /* Hero Section Styling */
        .hero-section { 
            background-color: var(--pink-soft); 
            padding: 60px 8%; 
            display: flex; 
            align-items: center; 
            min-height: 500px;
        }
        .hero-text { flex: 1; }
        .hero-text h1 { 
            font-size: 3.5rem; 
            font-weight: 800; 
            color: #222; 
            line-height: 1.2;
        }
        
        .hero-image-container { 
            flex: 1; 
            display: flex; 
            justify-content: flex-end; 
        }
        .hero-image-container img { 
            width: 100%; 
            max-width: 450px; 
            height: auto; 
            border-radius: 20px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        /* Product Card Styling */
        .product-card {
            border: none;
            border-radius: 15px;
            transition: 0.3s;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            height: 100%;
        }
        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }
        .product-img {
            height: 250px;
            object-fit: cover;
            width: 100%;
        }
        .text-magenta {
            color: var(--magenta-primary) !important;
        }
        .btn-magenta {
            background-color: var(--magenta-primary);
            color: white;
            border-radius: 10px;
            border: none;
            padding: 10px;
            transition: 0.3s;
        }
        .btn-magenta:hover {
            background-color: #b92a6e;
            color: white;
        }
    </style>
</head>
<body>

    <nav class="navbar shadow-sm sticky-top">
        <a href="/" class="logo"><i class="fas fa-gem me-2"></i>JEWELRY STORE</a>
        <div class="nav-links d-none d-lg-block">
            <a href="#home">Home</a>
            <a href="#koleksi">Collections</a>
            <a href="#">About</a>
        </div>
        <div class="nav-actions d-flex align-items-center gap-3">
            @auth
                <a href="{{ url('/dashboard') }}" class="sign-in-btn">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="sign-in-btn">Sign In</a>
            @endauth
        </div>
    </nav>

    <header class="hero-section" id="home">
        <div class="hero-text">
            <h1>Discover Timeless Elegance</h1>
            <p class="text-muted fs-5 mt-3">Explore our exquisite collection of fine jewelry, crafted with precision and passion.</p>
            <div class="mt-4">
                <a href="#koleksi" class="btn btn-danger px-4 py-2" style="background-color: var(--magenta-primary); border: none; border-radius: 8px;">Shop Now</a>
                <button class="btn btn-outline-secondary px-4 py-2 ms-2" style="border-radius: 8px;">Collections</button>
            </div>
        </div>
        
        <div class="hero-image-container d-none d-md-flex">
            <img src="https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?q=80&w=800" alt="Jewelry Collection">
        </div>
    </header>

    <main class="container py-5" id="koleksi">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Our Collections</h2>
            <p class="text-muted">Pilih perhiasan terbaik untuk melengkapi momen spesialmu</p>
        </div>

        <div class="row g-4">
            @forelse($products as $product)
                <div class="col-md-4 col-lg-3">
                    <div class="card product-card">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="product-img" alt="{{ $product->name }}">
                        @else
                            <div class="product-img bg-light d-flex align-items-center justify-content-center">
                                <i class="fas fa-image fa-3x text-muted"></i>
                            </div>
                        @endif
                        
                        <div class="card-body p-4">
                            <small class="text-muted uppercase fw-bold" style="font-size: 10px;">{{ $product->user->name ?? 'Jewelry Shop' }}</small>
                            <h5 class="fw-bold mb-2">{{ $product->name }}</h5>
                            <h5 class="text-magenta fw-bold mb-3">Rp {{ number_format($product->price, 0, ',', '.') }}</h5>
                            
                            <div class="d-grid">
                                <a href="https://wa.me/628123456789?text=Halo, saya ingin memesan {{ $product->name }}" target="_blank" class="btn btn-magenta">
                                    <i class="fab fa-whatsapp me-2"></i>Beli Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="text-muted">
                        <i class="fas fa-box-open fa-4x mb-3"></i>
                        <h4>Belum Ada Produk</h4>
                        <p>Silakan kembali lagi nanti untuk koleksi terbaru kami.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </main>

    <footer class="bg-light py-4 mt-5">
        <div class="container text-center">
            <p class="text-muted mb-0">&copy; 2024 Jewelry Store. Crafted with ❤️ for Timeless Elegance.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>