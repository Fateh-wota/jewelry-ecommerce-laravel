<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Jewelry Store</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* RESET SEMUA ATURAN TAILWIND YANG MERUSAK BOOTSTRAP */
        *, ::after, ::before { 
            box-sizing: border-box !important; 
        }

        html, body {
            font-family: 'Poppins', sans-serif !important;
            background-color: #f4f7f6 !important;
            font-size: 16px !important;
            line-height: 1.5 !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        /* PERBAIKI SIDEBAR (WARNA GELAP) */
        .sidebar { 
            min-height: 100vh !important; 
            background: #2d3436 !important; 
            width: 260px !important; 
            position: fixed !important; 
            left: 0 !important;
            top: 0 !important;
            color: white !important;
            z-index: 1000 !important;
            display: block !important;
        }

        .sidebar .nav-link { 
            color: #dfe6e9 !important; 
            padding: 15px 25px !important; 
            display: flex !important;
            align-items: center !important;
            text-decoration: none !important;
            transition: 0.3s !important;
        }

        .sidebar .nav-link:hover, .sidebar .nav-link.active { 
            background: #d63384 !important; /* PINK MAGENTA */
            color: white !important; 
        }

        /* PERBAIKI AREA CONTENT */
        .main-content { 
            margin-left: 260px !important; 
            padding: 40px !important; 
            width: calc(100% - 260px) !important;
            min-height: 100vh !important;
            display: block !important;
        }

        /* PERBAIKI CARD & TYPOGRAPHY (BIAR GAK GEPENG) */
        .card-custom { 
            border: none !important; 
            border-radius: 15px !important; 
            box-shadow: 0 5px 15px rgba(0,0,0,0.05) !important; 
            background: white !important;
            padding: 25px !important;
            margin-bottom: 25px !important;
            display: block !important;
        }

        h2, h3, h4, h5, h6 { 
            font-weight: 600 !important; 
            margin-bottom: 0.5rem !important;
            color: #2d3436 !important;
        }

        .text-magenta { color: #d63384 !important; }
        .bg-magenta { background-color: #d63384 !important; color: white !important; }

        /* KEMBALIKAN FUNGSI BOOTSTRAP YANG DIHAPUS TAILWIND */
        .d-flex { display: flex !important; }
        .justify-content-between { justify-content: space-between !important; }
        .align-items-center { align-items: center !important; }
        .row { display: flex !important; flex-wrap: wrap !important; margin-right: -15px !important; margin-left: -15px !important; }
        .col-md-4 { flex: 0 0 auto !important; width: 33.33333333% !important; padding: 0 15px !important; }
        
        /* TABLE FIX */
        .table { width: 100% !important; margin-bottom: 1rem !important; vertical-align: top !important; border-color: #dee2e6 !important; }
    </style>
</head>
<body>

<div class="d-flex">
    <div class="sidebar shadow">
        <div class="p-4 text-center">
            <h4 class="fw-bold text-white"><i class="fas fa-gem me-2"></i>ADMIN</h4>
            <hr class="bg-secondary">
        </div>
        <nav class="nav flex-column">
            <a class="nav-link active" href="{{ route('admin.dashboard') }}"><i class="fas fa-chart-line me-2"></i> Dashboard</a>
            <a class="nav-link" href="{{ route('admin.buyers') }}"><i class="fas fa-users me-2"></i> Data Buyer</a>
            <a class="nav-link" href="#"><i class="fas fa-store me-2"></i> Data Seller</a>
            <a class="nav-link" href="#"><i class="fas fa-exchange-alt me-2"></i> Request Seller</a>
            <hr class="mx-3 bg-secondary">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link bg-transparent border-0 w-100 text-start text-danger">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </button>
            </form>
        </nav>
    </div>

    <div class="main-content w-100">
        <header class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold">Overview</h2>
                <p class="text-muted">Halo, Admin {{ Auth::user()->name }}. Selamat datang kembali!</p>
            </div>
            <div class="bg-white p-2 rounded-pill shadow-sm px-4">
                <i class="fas fa-user-circle me-2 text-magenta"></i> Admin Mode
            </div>
        </header>

        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card card-stat p-4 bg-white text-center">
                    <h6 class="text-muted small">TOTAL BUYER</h6>
                    <h3 class="fw-bold mb-0 text-primary">{{ $totalBuyer }}</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-stat p-4 bg-white text-center">
                    <h6 class="text-muted small">TOTAL SELLER</h6>
                    <h3 class="fw-bold mb-0 text-magenta">{{ $totalSeller }}</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-stat p-4 bg-white text-center">
                    <h6 class="text-muted small">REQUEST SELLER</h6>
                    <h3 class="fw-bold mb-0 text-warning">0</h3>
                </div>
            </div>
        </div>

        <div class="card card-stat p-4 bg-white border-0">
            <h5 class="fw-bold mb-4">Aktivitas Pengguna Terkini</h5>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge {{ $user->role == 'seller' ? 'bg-magenta' : 'bg-info text-dark' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="text-center">
                                @if($user->role == 'buyer')
                                    <form action="{{ route('admin.makeSeller', $user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-success rounded-pill">Jadikan Seller</button>
                                    </form>
                                @else
                                    <span class="text-muted small">Aktif</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>