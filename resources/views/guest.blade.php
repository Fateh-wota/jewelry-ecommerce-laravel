<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jewelry Store - E-commerce</title>
    
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <header class="navbar">
        <div class="logo">
            <i class="fas fa-gem"></i> JEWELRY STORE
        </div>
        <nav class="nav-links">
            <a href="{{ url('/') }}">Home</a>
            <a href="#">Collections</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
        </nav>
        <div class="nav-actions">
            <i class="fas fa-search"></i>
            <i class="fas fa-heart"></i>
            <div class="cart-icon">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-badge">0</span>
            </div>
            
            <a href="{{ route('login') }}" class="sign-in-btn">Sign In</a>
        </div>
    </header>

    <section class="hero-section">
        <div class="hero-content">
            <h1>Discover Timeless Elegance</h1>
            <p>Explore our exquisite collection of fine jewelry, crafted with precision and passion for those who appreciate luxury.</p>
            <div class="hero-buttons">
                <button class="btn btn-primary">Shop Now</button>
                <button class="btn btn-secondary">View Collections</button>
            </div>
        </div>
        <div class="hero-image-placeholder">
            <img src="{{ asset('images/hero-jewelry.jpg') }}" 
            class="img-fluid rounded-3 shadow" 
            alt="Jewelry Collection">
        </div>
    </section>

    <section class="category-section">
        <h2>Shop by Category</h2>
        <div class="categories-grid">
            <div class="category-card" style="background-color: #fce4ec;">
                <span class="emoji-icon">💍</span>
                <h3>Rings</h3>
            </div>
            <div class="category-card" style="background-color: #fce4ec;">
                <span class="emoji-icon">📿</span>
                <h3>Necklaces</h3>
            </div>
            <div class="category-card" style="background-color: #fce4ec;">
                <span class="emoji-icon">⚜</span>
                <h3>Bracelets</h3>
            </div>
            <div class="category-card" style="background-color: #fce4ec;">
                <span class="emoji-icon">💎</span>
                <h3>Earrings</h3>
            </div>
        </div>
    </section>

    <section class="featured-products">
        <div class="section-header">
            <h2>Featured Collection</h2>
            <a href="#">View All →</a>
        </div>
        <div class="products-grid">
            <div class="product-card">
                <img src="https://via.placeholder.com/300x200/F5F5F5/888888?text=Ring+Image" alt="Gold Diamond Ring">
                <h4>Rings</h4>
                <p class="title">Gold Diamond Ring</p>
                <div class="product-footer">
                    <span class="price">$2,499</span>
                    <button class="add-to-cart-btn">Add to Cart</button>
                </div>
            </div>
            
            <div class="product-card">
                <img src="https://via.placeholder.com/300x200/F5F5F5/888888?text=Necklace+Image" alt="Pearl Necklace">
                <h4>Necklaces</h4>
                <p class="title">Pearl Necklace</p>
                <div class="product-footer">
                    <span class="price">$1,899</span>
                    <button class="add-to-cart-btn">Add to Cart</button>
                </div>
            </div>

            <div class="product-card">
                <img src="https://via.placeholder.com/300x200/F5F5F5/888888?text=Bracelet+Image" alt="Diamond Bracelet">
                <h4>Bracelets</h4>
                <p class="title">Diamond Bracelet</p>
                <div class="product-footer">
                    <span class="price">$3,299</span>
                    <button class="add-to-cart-btn">Add to Cart</button>
                </div>
            </div>
        </div>
    </section>

</body>
</html>