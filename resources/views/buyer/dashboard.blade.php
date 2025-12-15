<!DOCTYPE html>
<html lang="id">
<head>
    <title>Buyer Dashboard</title>
    <link rel="stylesheet" href="/css/styles.css">
    <style>body { background-color: #E3F2FD; text-align: center; padding-top: 50px; }</style>
</head>
<body>
    <div style="max-width: 600px; margin: auto; background: white; padding: 40px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
        <h1 style="color: #2196F3;">Selamat Datang, {{ $user->name ?? 'Buyer' }}!</h1>
        <p style="font-size: 1.2em; color: #555;">Ini adalah Dasbor Pembeli Anda (Area Riwayat Pesanan).</p>
        <p>Peran Anda: <strong style="color: #2196F3;">{{ $user->role ?? 'N/A' }}</strong></p>
        <a href="{{ route('home') }}" style="color: #2196F3; text-decoration: none; font-weight: 600;">← Kembali ke Home</a>
        <form action="{{ route('logout') }}" method="POST" style="margin-top: 20px;">
            @csrf
            <button type="submit" style="background: none; border: 1px solid #D81B60; color: #D81B60; cursor: pointer; padding: 10px 20px; border-radius: 5px;">Logout</button>
        </form>
    </div>
</body>
</html>