<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JAWABAN SOAL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
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
            border-radius: 10px;
            color: #e0e0e0;
        }

        .form-control,
        .form-select {
            background-color: #333333;
            color: #f0f0f0;
            border-color: #555555;
        }

        .form-control::placeholder {
            color: #aaaaaa;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
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
    <div class="container my-5">
        <div class="card p-4">
            <h1 class="card-title">{{ $question->title }}</h1>
            <h3>Pertanyaan : {{ $question->content }}</h3>
            <div class="row">
                <!-- Kategori -->
                <div class="col-12 mb-3">
                    <div class="p-3" style="background-color: #333333; border-radius: 8px;">
                        <p class="mb-0 text-light">
                            <strong>Kategori:</strong> {{ $question->category }}
                        </p>
                    </div>
                </div>

                <!-- Dibuat oleh -->
                <div class="col-12">
                    <div class="p-3" style="background-color: #333333; border-radius: 8px;">
                        <p class="mb-0 text-light">
                            <strong>Dibuat oleh:</strong> {{ $question->user->nama_lengkap }}
                        </p>
                    </div>
                </div>
            </div>

            <h2 class="mt-4 text-warning">Jawaban:</h2>
            @foreach ($question->answers as $answer)
                <div class="card my-3 p-3">
                    <p>{{ $answer->content }}</p>
                    <p><strong>Dijawab oleh:</strong> {{ $answer->user->nama_lengkap }}</p>
                </div>
            @endforeach

            <form action="{{ route('answers.store', $question->id) }}" method="POST" class="mt-4">
                @csrf
                <label for="content" class="form-label">Jawaban Anda:</label>
                <textarea name="content" id="content" class="form-control mb-3" rows="4" placeholder="Masukkan jawaban Anda..."
                    required></textarea>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between">
                            <!-- Tombol Kirim Jawaban -->
                            <button type="submit" class="btn btn-primary">Kirim Jawaban</button>
                    
                            <!-- Tombol Kembali -->
                            <a href="{{ url('questions') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                    
            </form>
        </div>


    </div>

    <!-- Footer -->
    <footer class="footer py-4 text-center">
        <p class="mb-0">© 2025 Calon Dosen. Semua Hak Dilindungi.</p>
        <div class="mt-2">
            <a href="#" class="text-light me-2"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-light me-2"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-light"><i class="fab fa-instagram"></i></a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
