<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jewelry Store - Timeless Elegance</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root { --magenta-primary: #d63384; --pink-soft: #fff2f2; }
        body { font-family: 'Poppins', sans-serif; background-color: #ffffff; margin: 0; overflow-x: hidden; }
        
        .navbar { display: flex; justify-content: space-between; align-items: center; padding: 15px 8%; background: white; }
        .logo { font-weight: 700; color: var(--magenta-primary); font-size: 1.5rem; text-decoration: none; }
        .nav-links a { margin: 0 15px; text-decoration: none; color: #333; font-weight: 500; }
        .sign-in-btn { background: var(--magenta-primary); color: white; padding: 8px 20px; border-radius: 8px; text-decoration: none; }

        .hero-section { 
            background-color: var(--pink-soft); 
            padding: 60px 8%; 
            display: flex; 
            align-items: center; 
            min-height: 500px;
        }
        .hero-text { flex: 1; }
        .hero-text h1 { font-size: 3rem; font-weight: 800; color: #222; }
        
        /* FIX GAMBAR DISINI */
        .hero-image-container { 
            flex: 1; 
            display: flex; 
            justify-content: flex-end; 
        }
        .hero-image-container img { 
            width: 100%; 
            max-width: 450px; /* Kita batasi ukurannya biar gak menutupi teks */
            height: auto; 
            border-radius: 20px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            display: block !important; /* Paksa tampil */
        }
    </style>
</head>
<body>

    <nav class="navbar shadow-sm sticky-top">
        <a href="/" class="logo"><i class="fas fa-gem me-2"></i>JEWELRY STORE</a>
        <div class="nav-links d-none d-lg-block">
            <a href="#">Dashboard</a>
            <a href="#">Collections</a>
            <a href="#">About</a>
        </div>
        <div class="nav-actions d-flex align-items-center gap-3">
            <i class="fas fa-search"></i>
            <i class="fas fa-shopping-cart"></i>
            <a href="{{ route('login') }}" class="sign-in-btn">Sign In</a>
        </div>
    </nav>

    <header class="hero-section">
        <div class="hero-text">
            <h1>Discover Timeless Elegance</h1>
            <p class="text-muted">Explore our exquisite collection of fine jewelry, crafted with precision and passion.</p>
            <div class="mt-4">
                <button class="btn btn-danger px-4 py-2" style="background-color: var(--magenta-primary); border: none;">Shop Now</button>
                <button class="btn btn-outline-secondary px-4 py-2 ms-2">Collections</button>
            </div>
        </div>
        
        <div class="hero-image-container">
            <img src="{{ asset('images/hero-jewelry.jpg') }}" onerror="this.src='https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?q=80&w=800'" alt="Jewelry Collection">
        </div>
    </header>

    <div class="container text-center py-5">
        <h2 class="fw-bold">Shop by Category</h2>
    </div>

</body>
</html>