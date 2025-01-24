<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Dark Mode</title>
    <!-- Link ke CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link ke Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Kustomisasi Dark Mode -->
    <style>
        body {
            background-color: #121212;
            color: #f0f0f0;
        }

        .sidebar {
            background-color: #2f2f2f;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            padding-top: 20px;
            z-index: 1000;
        }

        .sidebar a {
            color: #b8b8b8;
        }

        .sidebar a:hover {
            color: #ffffff;
        }

        .sidebar .nav-link.active {
            background-color: #4c4c4c;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            background-color: #1e1e1e;
            min-height: 100vh;
        }

        .card {
            background-color: #333333;
            border: none;
        }

        .card-header,
        .card-body {
            background-color: #333333;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        /* Tabel */
        .table {
            color: #f0f0f0;
        }

        .table thead {
            background-color: #444444;
        }

        .table tbody tr:nth-child(odd) {
            background-color: #333333;
        }

        .table tbody tr:nth-child(even) {
            background-color: #2b2b2b;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="sidebar">
                <div class="d-flex flex-column">
                    <div class="row">
                        <div class="col-10">
                            <h4 class="text-white mb-5">Calon Dosen</h4> 

                        </div>
                        <div class="col-2">
                            <i class="fa-solid fa-bars fs-5" style="cursor: pointer;"></i>
                        </div>
                    </div>
                    <ul class="nav flex-column ">
                        <li class="nav-item">
                            <a class="nav-link text-white active" href="#">
                                <i class="fas fa-users me-2"></i> Pengguna
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="fa-solid fa-video me-2"></i> Video
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="fas fa-cogs me-2"></i> Pengaturan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="fas fa-sign-out-alt me-2"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Konten Utama -->
            <div class="col-md-9 col-lg-10 p-4 main-content">
                <h1 class="text-white">CREATE USER</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.users.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select id="role" name="role" class="form-select" required>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Tambah Akun</button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard Admin</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

        <!-- Script JS Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>