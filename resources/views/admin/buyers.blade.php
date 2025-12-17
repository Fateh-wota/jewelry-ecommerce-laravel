<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buyer - Admin Jewelry</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            background-color: #f8f9fa; 
        }

        /* Sidebar Styling */
        .sidebar { 
            min-height: 100vh; 
            background: #2d3436; 
            color: white; 
            width: 250px; 
            position: fixed; 
            z-index: 100;
        }
        .sidebar .nav-link { 
            color: #dfe6e9; 
            padding: 15px 25px; 
            transition: 0.3s; 
        }
        .sidebar .nav-link:hover, 
        .sidebar .nav-link.active { 
            background: #d63384; 
            color: white; 
        }

        /* Main Content Layout */
        .main-content { 
            margin-left: 250px; 
            padding: 30px; 
            width: calc(100% - 250px); 
        }

        /* Card/Table Styling */
        .card-table { 
            border: none; 
            border-radius: 15px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.05); 
        }
        
        .bg-magenta {
            background-color: #d63384 !important;
            color: white;
        }

        .text-magenta {
            color: #d63384 !important;
        }
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
                <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-chart-line me-2"></i> Dashboard</a>
                <a class="nav-link active" href="{{ route('admin.buyers') }}"><i class="fas fa-users me-2"></i> Data Buyer</a>
                <a class="nav-link" href="#"><i class="fas fa-store me-2"></i> Data Seller</a>
                <a class="nav-link" href="#"><i class="fas fa-exchange-alt me-2"></i> Request Seller</a>
                <hr class="mx-3 bg-secondary">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link bg-transparent border-0 w-100 text-start text-danger" onclick="return confirm('Yakin ingin logout?')">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                    </button>
                </form>
            </nav>
        </div>

        <div class="main-content">
            <header class="mb-4 d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="fw-bold">Manajemen Data Buyer</h2>
                    <p class="text-muted">Total terdaftar: <span class="badge bg-primary">{{ $buyers->count() }} Pengguna</span></p>
                </div>
                <div class="user-profile bg-white p-2 rounded-pill shadow-sm px-4">
                    <i class="fas fa-user-circle me-2 text-magenta"></i> Admin Mode
                </div>
            </header>
            
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-radius: 12px;">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            <div class="card card-table p-4 bg-white">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Tanggal Join</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($buyers as $buyer)
                                <tr>
                                    <td class="fw-medium">{{ $buyer->name }}</td>
                                    <td>{{ $buyer->email }}</td>
                                    <td>{{ $buyer->created_at->format('d M Y') }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.makeSeller', $buyer->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Jadikan {{ $buyer->name }} sebagai Seller?')">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-success rounded-pill px-3">
                                                <i class="fas fa-arrow-up me-1"></i> Jadi Seller
                                            </button>
                                        </form>
                                        <button class="btn btn-sm btn-light rounded-pill px-3 text-danger border ms-2">
                                            <i class="fas fa-user-slash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">
                                        Tidak ada data buyer saat ini.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>