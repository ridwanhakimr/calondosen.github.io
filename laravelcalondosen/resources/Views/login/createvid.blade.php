<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Video</title>
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
        .form-control::placeholder {
            color: #f2f2f2;
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://storage.googleapis.com/a1aa/image/vudA2588jCKiJh7nsKVox2N8cNpa7Mqff2M0NvZfnofyRtuPB.jpg"
                                alt="User Avatar" class="rounded-circle me-2" height="40" width="40">
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


    <div class="container">

        <h1 class="mb-5">Tambah Video</h1>

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data"
            class="p-4 rounded shadow" style="background-color: #1f1f1f; color: #e0e0e0;">
            @csrf
            <!-- Judul Video -->
            <div class="mb-3">
                <label for="title" class="form-label"><strong>Judul Video:</strong></label>
                <input type="text" id="title" name="title" class="form-control"
                    style="background-color: #333333; color: #e0e0e0; border: 1px solid #555555;"
                    placeholder="Masukkan judul video" required>
            </div>

            <!-- Deskripsi Video -->
            <div class="mb-3">
                <label for="description" class="form-label"><strong>Deskripsi Video:</strong></label>
                <textarea id="description" name="description" class="form-control"
                    style="background-color: #333333; color: #e0e0e0; border: 1px solid #555555;" rows="4"
                    placeholder="Tulis deskripsi video" required></textarea>
            </div>

            <!-- Kategori -->
            <div class="mb-3">
                <label for="category" class="form-label"><strong>Kategori:</strong></label>
                <select id="category" name="category" class="form-select"
                    style="background-color: #333333; color: #e0e0e0; border: 1px solid #555555;" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category }}">{{ $category }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="duration" class="form-label">Durasi Video (dalam menit)</label>
                <input type="text" id="duration" name="duration" class="form-control text-light border-secondary"
                    placeholder="Masukkan durasi video, misalnya: 5:30"
                    style="background-color: #333333; color: #ffffff; border-color: #555555;" required>
            </div>

            <!-- Unggah Video -->
            <div class="mb-4">
                <label for="video" class="form-label"><strong>Unggah Video:</strong></label>
                <input type="file" id="video" name="video" class="form-control"
                    style="background-color: #333333; color: #e0e0e0; border: 1px solid #555555;" accept="video/*"
                    required>
            </div>

            <div class="row g-3">

                <!-- Kembali ke Profil -->
                <div class="col-12 col-md-6">
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary w-100">Kembali ke Profil</a>
                </div>
                <!-- Tombol Submit -->
                <div class="col-12 col-md-6">
                    <button type="submit" class="btn btn-primary w-100"
                        style="background-color: #007bff; border-color: #007bff;">Tambah Video</button>
                </div>

            </div>


        </form>
    </div>




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
