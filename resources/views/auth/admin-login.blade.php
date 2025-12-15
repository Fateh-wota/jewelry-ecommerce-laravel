<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Jewelry Store</title>
    
    <link rel="stylesheet" href="/css/styles.css"> 
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        /* CSS KHUSUS UNTUK FORM LOGIN (Pink/Magenta) */
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #FFF0F5; 
            padding: 20px;
        }
        .login-card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .login-card h2 {
            color: #D81B60; 
            margin-bottom: 25px;
            font-size: 1.8em;
        }
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }
        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1em;
            box-sizing: border-box;
        }
        .login-btn {
            background-color: #D81B60;
            color: white;
            padding: 12px 0;
            width: 100%;
            font-weight: 700;
            margin-top: 10px;
            border-radius: 8px;
            transition: background-color 0.3s;
            border: none;
            cursor: pointer;
        }
        .error-message {
            color: #E53935;
            font-size: 0.9em;
            margin-top: 5px;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="login-card">
            <h2>Admin Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    {{-- @error('email') Jika Laravel versi lama, ini mungkin perlu penyesuaian --}}
                        {{-- <span class="error-message">{{ $message }}</span> --}}
                    {{-- @enderror --}}
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required>
                    {{-- @error('password') --}}
                        {{-- <span class="error-message">{{ $message }}</span> --}}
                    {{-- @enderror --}}
                </div>

                <button type="submit" class="login-btn">
                    Log In
                </button>
            </form>
            <p style="margin-top: 20px; font-size: 0.9em;"><a href="{{ route('home') }}" style="color: #D81B60; font-weight: 600;">← Kembali ke Home</a></p>
        </div>
    </div>

</body>
</html>