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
            /* Dark background for body */
            color: #e0e0e0;
            /* Light text color for dark mode */
        }

        .navbar {
            background-color: #1f1f1f;
            /* Dark background for navbar */
        }

        .navbar a {
            color: #d1d1d1;
            /* Light text color for navbar links */
        }

        .navbar a:hover {
            color: #4e9fd1;
            /* Blue accent on hover */
        }

        .card {
            background-color: #2c2c2c;
            /* Dark card background */
            border: none;
            /* Remove border for cards */
            color: #e0e0e0;
            /* Light text inside cards */
            border-radius: 10px;
        }

        .card-title {
            color: #ffffff;
            /* White title for the card */
        }

        .card-img-top {
            border-bottom: 2px solid #444444;
            /* Dark border below video */
        }

        .bg-primary {
            background: linear-gradient(45deg, #007bff, #c278ff);
        }

        .footer {
            background-color: #1f1f1f;
            /* Dark background for footer */
            color: #e0e0e0;
            /* Light text color for footer */
        }

        .footer a {
            color: #e0e0e0;
        }

        .footer a:hover {
            color: #4e9fd1;
            /* Blue accent on hover */
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .form-select {
            background-color: rgba(255, 255, 255, 0.2);
            /* Slightly dark inputs */
            color: #f0f0f0;
            /* Light text inside inputs */
            border: 1px solid rgba(255, 255, 255, 0.3);
            /* Light border */
            border-radius: 5px;
        }

        .form-select option {
            background-color: rgba(255, 255, 255, 0.2);
            /* Slightly dark inputs */
            color: #f0f0f0;
            /* Light text inside inputs */
            border: 1px solid rgba(255, 255, 255, 0.3);
            /* Light border */
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .modal-content {
            background-color: #333333;
            color: #f0f0f0;
        }

        .modal-header {
            border-bottom: 1px solid #444444;
        }

        .modal-footer {
            border-top: 1px solid #444444;
        }

        .btn-close {
            background-color: #444444;
            border: none;
        }

        .btn-close:hover {
            background-color: #666666;
        }

        .modal-title {
            color: #f0f0f0;
        }

        .modal-body p {
            color: #d3d3d3;
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

    <!-- Main Content -->
    <main class="container text-center mt-4">
        <div class="bg-primary text-white py-5 rounded" style="background: linear-gradient(45deg, #007bff, #c278ff);">
            <h2 class="text-center mb-4">Pertanyaan</h2>
            <p class="mb-0">Tanyakan apapun</p>
        </div>
        <!-- Main Content -->
        <div class="container mt-5">
            <!-- Row dengan 2 Form -->
            <div class="row g-4">
                <!-- Kolom Form 1 -->
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h2 class="mb-3 text-left">Jawaban</h2>
                            <!-- Daftar Pertanyaan -->
                            <div class="col">
                                <form method="GET" action="{{ route('questions.index') }}">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-12 col-md-4">
                                            <label for="category" class="form-label text-light">Filter
                                                Kategori:</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <select name="category" id="category" class="form-select"
                                                style="background-color: #333333; color: #ffffff; border-color: #555555;"
                                                onchange="this.form.submit()">
                                                @foreach ($categories as $cat)
                                                    <option value="{{ $cat }}"
                                                        {{ $cat === $category ? 'selected' : '' }}>
                                                        {{ $cat }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </form>

                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <!-- Container Scrollable -->
                                        <div class="overflow-auto gap-4 text-start" style="max-height: 350px;">
                                            @foreach ($questions as $question)
                                                <!-- Card for Each Question -->
                                                <div class="card mb-3 text-light border-secondary"
                                                    style="background-color: #333333; color: #ffffff; border-color: #555555;">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $question->title }}</h5>
                                                        <p class="card-text mb-1">
                                                            <strong>Kategori:</strong> {{ $question->category }}
                                                        </p>
                                                        <p class="card-text mb-1">
                                                            <strong>Dibuat oleh:</strong>
                                                            {{ $question->user->nama_lengkap }}
                                                        </p>
                                                        <a href="{{ route('questions.show', $question->id) }}"
                                                            class="btn btn-primary btn-sm">
                                                            Lihat Pertanyaan
                                                        </a>
                                                        {{-- @if (session('user')->id_user == $question->user_id)
                                                            <form
                                                                action="{{ route('questions.destroy', $question->id) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm">
                                                                    Hapus
                                                                </button>
                                                            </form>
                                                        @endif --}}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom Form 2 -->
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body ">
                            <h2 class="mb-3 text-left">Tambah Pertanyaan Baru</h2>
                            <form action="{{ route('questions.store') }}" method="POST"
                                class=" text-light p-4 rounded text-start">
                                @csrf

                                <!-- Judul Pertanyaan -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">Judul Pertanyaan</label>
                                    <input type="text" id="title" name="title"
                                        class="form-control  text-light border-secondary"
                                        placeholder="Masukkan judul pertanyaan"
                                        style="background-color: #333333; color: #ffffff; border-color: #555555;"
                                        required>
                                </div>

                                <!-- Isi Pertanyaan -->
                                <div class="mb-3">
                                    <label for="content" class="form-label">Isi Pertanyaan</label>
                                    <textarea id="content" name="content" class="form-control  text-light border-secondary" rows="5"
                                        placeholder="Jelaskan pertanyaan Anda" style="background-color: #333333; color: #ffffff; border-color: #555555;"
                                        required></textarea>
                                </div>

                                <!-- Kategori -->
                                <div class="mb-3">
                                    <label for="category" class="form-label">Kategori</label>
                                    <select id="category" name="category"
                                        class="form-select  text-light border-secondary"
                                        style="background-color: #333333; color: #ffffff; border-color: #555555;"required>
                                        @foreach ($categories as $category)
                                            @if ($category !== 'Semua') <!-- Sembunyikan kategori "Semua" -->
                                                <option value="{{ $category }}">{{ $category }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Tombol -->
                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-success">Tambah Pertanyaan</button>
                                    {{-- <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a> --}}
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- Main Content -->
    {{-- <main class="container text-center mt-4">
        <div class="bg-primary text-white py-5 rounded" style="background: linear-gradient(45deg, #007bff, #c278ff);">
            <h2 class="text-center mb-4">Pertanyaan</h2>
            <p class="mb-0">Tanyakan apapun</p>
        </div>



        <!-- Main Content -->
        <div class="container mt-5">
            <!-- Row dengan 2 Form -->
            <div class="row g-4">
                <h1>Daftar Pertanyaan</h1>
                <!-- Tombol Tambah Pertanyaan -->
                <a href="{{ route('questions.create') }}">
                    <button>Tambah Pertanyaan</button>
                </a>



            </div>
        </div>
    </main> --}}
    <!-- Footer -->
    <footer class="bg-dark text-center py-4 mt-5">
        <p class="mb-0 text-light">© 2025 Calon Dosen. Semua Hak Dilindungi.</p>
        <div class="mt-2">
            <a href="#" class="text-light me-2"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-light me-2"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-light"><i class="fab fa-instagram"></i></a>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
