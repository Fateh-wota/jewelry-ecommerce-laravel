<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="/css/styles.css"> 
    <style>
        .admin-layout { display: flex; }
        .sidebar { width: 250px; background-color: #333; color: white; min-height: 100vh; padding: 20px; }
        .content { flex-grow: 1; padding: 40px; }
    </style>
</head>
<body>
    <div class="admin-layout">
        <aside class="sidebar">
            <h3>Admin Panel</h3>
            <p>Halo, {{ Auth::user()->name ?? 'Admin' }}</p>
            <ul style="list-style: none; padding: 0;">
                <li style="margin-bottom: 10px;"><a href="{{ route('admin.dashboard') }}" style="color: #FCE4EC;">Dashboard</a></li>
                <li style="margin-bottom: 10px;"><a href="#" style="color: #FCE4EC;">Kelola Produk</a></li>
                <li style="margin-bottom: 10px;"><a href="#" style="color: #FCE4EC;">Kelola Kategori</a></li>
            </ul>
            <form action="{{ route('logout') }}" method="POST" style="margin-top: 50px;">
                @csrf
                <button type="submit" style="background-color: #D81B60; color: white; padding: 8px 15px; border-radius: 5px;">Logout</button>
            </form>
        </aside>
        <main class="content">
            <h1 style="color: #D81B60;">Selamat Datang di Dashboard Admin!</h1>
            <p>Ini adalah halaman yang seharusnya hanya bisa diakses setelah login berhasil.</p>
        </main>
    </div>
</body>
</html>