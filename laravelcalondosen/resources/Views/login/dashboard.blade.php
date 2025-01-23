<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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

        .card-title {
            color: #ffffff;
        }

        .card-img-top {
            border-bottom: 2px solid #444444;
        }

        .bg-primary {
            background: linear-gradient(45deg, #007bff, #c278ff);
        }

        .footer {
            background-color: #1f1f1f;
            color: #e0e0e0;
        }

        .footer a {
            color: #e0e0e0;
        }

        .footer a:hover {
            color: #4e9fd1;
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
            color: #f0f0f0;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 5px;
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
        <div class="bg-primary text-white py-5 rounded">
            <h2 class="h4 fw-bold">VIDEO PEMBELAJARAN</h2>
            <p class="mb-0">Temukan mata pelajaran yang ingin kamu pelajari</p>
        </div>

        <section id="video" class="mt-4">
            <div class="text-end">
                <a href="{{ route('videos.create') }}">
                    <button class="btn btn-primary mb-3">Tambah Video</button>
                </a>
            </div>
            <form method="GET" action="{{ route('dashboard') }}" class="d-flex align-items-center mb-3">
                <label for="genreSelect" class="form-label me-3 text-light"><strong>Pilih Genre/Mata Pelajaran:</strong></label>
                <select name="category" id="category" class="form-select" style="background-color: #333333; color: #e0e0e0; border: 1px solid #555555;" onchange="this.form.submit()" class="form-select">
                    @foreach ($categories as $cat)
                        <option value="{{ $cat }}" {{ $cat === $category ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </form>

            <div class="row g-4 mt-4 mb-5">
                @forelse ($videos as $video)
                    <div class="col-md-4">
                        <div class="card">
                            <a href="{{ route('videos.show', $video->id) }}" class="text-decoration-none text-dark">
                                <video class="card-img-top" controls>
                                    <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
                                </video>
                                <div class="card-body">
                                    <h5 class="card-title text-start fs-3">{{ $video->title }}</h5>
                                </div>
                            </a>
                            <div class="card-body">
                                <p class="card-text text-start"><strong>Kategori:</strong> {{ $video->category }}</p>
                                <p class="card-text text-start"><strong>Pengirim:</strong> {{ $video->user->nama_lengkap }}</p>
                                {{-- @if (session('user')->id_user == $video->user_id)
                                    <div class="row">
                                        <div class="col text-start">
                                            <a href="{{ route('videos.edit', $video->id) }}" class="btn btn-outline-warning btn-sm">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                        </div>
                                        <div class="col text-end">
                                            <form action="{{ route('videos.destroy', $video->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endif --}}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center">Tidak ada video untuk kategori ini.</p>
                    </div>
                @endforelse
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-center py-4 mt-auto">
        <p class="mb-0 text-light">© 2025 Calon Dosen. Semua Hak Dilindungi.</p>
        <div class="mt-2">
            <a href="#" class="text-light me-2"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-light me-2"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-light"><i class="fab fa-instagram"></i></a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
