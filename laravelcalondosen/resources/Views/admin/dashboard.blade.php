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
div class="container-fluid">
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
                            <a class="nav-link text-white" href="{{ route('admin.videos.index') }}">
                                <i class="fa-solid fa-video me-2"></i> Video
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('admin.questions.index') }}">
                                <i class="fa-solid fa-question me-2"></i> Pertanyaan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('admin.logout') }}">
                                <i class="fas fa-sign-out-alt me-2"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Konten Utama -->
            <div class="col-md-9 col-lg-10 p-4 main-content">
                <h1 class="text-white">Dashboard Admin</h1>
                <p class="text-secondary">Selamat datang di dashboard admin. Pilih menu di sidebar untuk mengelola aplikasi.</p>

                <!-- Card Stats -->
                <table class="table table-dark table-striped mt-4">
                    <a href="{{ route('admin.users.create') }}">
                        <button class="btn btn-primary">Tambah Akun</button>
                    </a>
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Role</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id_user }}</th>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->nama_lengkap }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user->id_user) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                                <form action="{{ route('admin.users.destroy', $user->id_user) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus akun ini?')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
