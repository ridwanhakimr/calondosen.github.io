<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertanyaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
        }

        .navbar {
            background-color: #1f1f1f;
        }

        .navbar a {
            color: #d1d1d1;
        }

        .navbar a:hover {
            color: #4e9fd1;
        }

        .card {
            background-color: #2c2c2c;
            border: none;
            color: #e0e0e0;
            border-radius: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        input,
        textarea,
        select {
            background-color: rgba(255, 255, 255, 0.1);
            color: #e0e0e0;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 5px;
        }

        input::placeholder,
        textarea::placeholder {
            color: #bbbbbb;
        }

        .form-label {
            color: #e0e0e0;
        }

        footer {
            background-color: #1f1f1f;
            color: #e0e0e0;
        }

        footer a {
            color: #e0e0e0;
        }

        footer a:hover {
            color: #4e9fd1;
        }

        .form-control::placeholder {
            color: #ffffff;
            opacity: 1;
            /* Menghilangkan transparansi default pada placeholder */
        }
    </style>
</head>

<body>
     <!-- Navbar -->
     <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Logo and Text -->
            <div class="d-flex align-items-center">
                <img src="https://github.com/ridwanhakimr/gambar/blob/main/image/Logo.png?raw=true"
                    alt="LearningX Academy Logo" height="50" width="50" class="me-2" />
                <div>
                    <h1 class="h5 fw-bold mb-0">Calon Dosen</h1>
                    <p class="small text-secondary mb-0">Belajar bersama Calon Dosen.</p>
                </div>
            </div>

            <!-- Navbar Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a href="{{ url('dashboard') }}" class="nav-link text-primary">Video</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('questions') }}" class="nav-link text-primary">Pertanyaan</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://storage.googleapis.com/a1aa/image/vudA2588jCKiJh7nsKVox2N8cNpa7Mqff2M0NvZfnofyRtuPB.jpg" alt="User Avatar" class="rounded-circle me-2" height="40" width="40">
                            {{ session('user')->nama_lengkap }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ url('/profile') }}">Profile</a></li>
                            <li><a class="dropdown-item text-danger" href="{{ url('/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="pt-5"></div>
    <div class="pt-5"></div>

    <div class="container mt-5 pt-5">
        <h1 class="mb-4">Tambah Pertanyaan</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('questions.store') }}" method="POST" class="card p-4"
            style="background-color: #2c2c2c; color: #e0e0e0; border: none; border-radius: 10px;">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label" style="color: #e0e0e0;">Judul Pertanyaan:</label>
                <input type="text" id="title" name="title" class="form-control" placeholder="Masukkan judul"
                    style="background-color: rgba(255, 255, 255, 0.1); color: #e0e0e0; border: 1px solid rgba(255, 255, 255, 0.3); border-radius: 5px;"
                    required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label" style="color: #e0e0e0;">Isi Pertanyaan:</label>
                <textarea id="content" name="content" class="form-control" rows="5" placeholder="Masukkan isi pertanyaan"
                    style="background-color: rgba(255, 255, 255, 0.1); color: #e0e0e0; border: 1px solid rgba(255, 255, 255, 0.3); border-radius: 5px;"
                    required></textarea>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label" style="color: #e0e0e0;">Kategori:</label>
                <select id="category" name="category" class="form-select"
                    style="background-color: rgba(255, 255, 255, 0.1); color: #e0e0e0; border: 1px solid rgba(255, 255, 255, 0.3); border-radius: 5px;"
                    required>
                    @foreach ($categories as $category)
                        <option value="{{ $category }}" style="background-color: #2c2c2c; color: #e0e0e0;">
                            {{ $category }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary"
                style="background-color: #007bff; border-color: #007bff;">Tambah Pertanyaan</button>
        </form>


        <a href="{{ route('questions.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Pertanyaan</a>
    </div>

    <!-- Footer -->
    <footer class="text-center py-4 mt-5">
        <p>© 2025 Calon Dosen. Semua Hak Dilindungi.</p>
        <a href="#" class="text-light me-2"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="text-light me-2"><i class="fab fa-twitter"></i></a>
        <a href="#" class="text-light"><i class="fab fa-instagram"></i></a>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
