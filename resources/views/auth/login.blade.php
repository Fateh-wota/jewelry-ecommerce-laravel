<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Jewelry Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #2d3436; /* Warna Sidebar Gelap */
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
        }
        .btn-magenta {
            background-color: #d63384;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 10px;
            width: 100%;
            font-weight: 600;
            transition: 0.3s;
        }
        .btn-magenta:hover {
            background-color: #b92a6e;
            color: white;
        }
        .text-magenta { color: #d63384; }
        .form-control:focus {
            border-color: #d63384;
            box-shadow: 0 0 0 0.25 cold rgba(214, 51, 132, 0.25);
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-magenta"><i class="fas fa-gem me-2"></i>JEWELRY</h2>
            <p class="text-muted">Silakan masuk ke akun Anda</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger py-2 small">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label small fw-bold">Email Address</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="mb-3">
                <label class="form-label small fw-bold">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                <label class="form-check-label small" for="remember">Ingat Saya</label>
            </div>

            <button type="submit" class="btn btn-magenta mb-3">LOG IN</button>
            
            <div class="text-center">
                <a href="/" class="text-decoration-none small text-muted">Kembali ke Beranda</a>
            </div>
        </form>
    </div>

</body>
</html>