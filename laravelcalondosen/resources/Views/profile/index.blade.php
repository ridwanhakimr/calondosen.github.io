<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROFILE</title>
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
                        <a class="nav-link d-flex align-items-center" href="#" id="navbarScrollingDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://storage.googleapis.com/a1aa/image/vudA2588jCKiJh7nsKVox2N8cNpa7Mqff2M0NvZfnofyRtuPB.jpg"
                                alt="User Avatar" class="rounded-circle me-2" height="40" width="40" />
                            <p class="fw-bold mb-0">{{ session('user')->nama_lengkap }}</p>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarScrollingDropdown">
                            <li>
                                <a class="dropdown-item text-primary" href="{{ url('/profile') }}">Profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item text-danger" href="{{ url('/logout') }}">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="pt-5"></div>
    <div class="pt-5"></div>

    <!-- Main Content -->
    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <!-- Informasi Akun -->
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" value="{{ $user->username }}" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="{{ $user->email }}" required><br><br>

        <label for="password">Password (Opsional - untuk mengganti):</label><br>
        <input type="password" id="password" name="password"><br><br>

        <label for="nama_lengkap">Nama Lengkap:</label><br>
        <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ $user->nama_lengkap }}" required><br><br>

        <button type="submit">Perbarui Profil</button>
    </form>

    <hr>

    <!-- Video yang Diunggah -->
    <h2>Video Saya</h2>
    <a href="{{ route('videos.create') }}">
        <button>Tambah Video</button>
    </a>
    @foreach ($videos as $video)
        <div>
            <h3>{{ $video->title }}</h3>
            <p>{{ $video->description }}</p>
            <p>Kategori: {{ $video->category }}</p>
            <video width="300" controls>
                <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
            </video><br>
            <a href="{{ route('videos.show', $video->id) }}">Tampilkan Video Besar</a><br>
            <a href="{{ route('videos.edit', $video->id) }}">Edit</a>
            <form action="{{ route('videos.destroy', $video->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </div>
    @endforeach

    <hr>

    <!-- Pertanyaan yang Diunggah -->
    <h2>Pertanyaan Saya</h2>
        <a href="{{ route('questions.create') }}">
            <button>Tambah Pertanyaan</button>
        </a>
    @foreach ($questions as $question)
        <div>
            <h3>{{ $question->title }}</h3>
            <p>Kategori: {{ $question->category }}</p>
            <a href="{{ route('questions.show', $question->id) }}">Lihat Jawaban</a>
            <a href="{{ route('questions.edit', $question->id) }}">Edit</a>
            <form action="{{ route('questions.destroy', $question->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </div>
    @endforeach

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
