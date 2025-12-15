<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title') | Jewelry Store</title>
    
    <link rel="stylesheet" href="{{ asset('styles.css') }}"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        /* CSS Tambahan Admin agar tampilan terpisah dari Guest dan menggunakan warna pink */
        body { 
            padding-top: 70px; /* Jarak dari Navbar Fixed */
            background-color: #f8f8ff; /* Latar belakang Admin */
        } 
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 20; 
        }
        .admin-container {
            padding: 30px 50px;
            max-width: 1200px; 
            margin: 0 auto;
        }
        .admin-title {
            color: #D81B60; /* Pink/Magenta Utama */
            margin-bottom: 20px;
            border-bottom: 2px solid #FCE4EC;
            padding-bottom: 10px;
        }
        .navbar .nav-links {
            flex-grow: 1; 
            margin-left: 20px;
            display: flex;
            gap: 15px;
        }
        .navbar .nav-links a.active {
            color: #D81B60;
            border-bottom: 2px solid #D81B60;
            padding-bottom: 3px;
        }
        /* Style untuk Tombol Logout agar konsisten dengan Sign-In Button */
        .logout-btn {
            background-color: #90A4AE; /* Abu-abu, berbeda dari Guest pink */
            color: white;
            padding: 8px 18px;
            border-radius: 8px;
            font-weight: 600;
        }
    </style>
</head>
<body>

    <header class="navbar">
        <div class="logo">
            <i class="fas fa-gem"></i> ADMIN PANEL
        </div>
        <nav class="nav-links">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">Produk</a>
            <a href="#">Kategori</a>
            <a href="{{ route('home') }}" style="color: #D81B60;">Frontend</a>
        </nav>
        <div class="nav-actions">
             @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            @endauth
        </div>
    </header>

    <main class="admin-container">
        <h1 class="admin-title">@yield('title')</h1>
        @yield('content')
    </main>
</body>
</html>