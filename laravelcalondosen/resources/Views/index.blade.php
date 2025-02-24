<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="https://github.com/ridwanhakimr/gambar/blob/main/image/Logo.png?raw=true" type="image">
  <title>Calon Dosen</title>
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <!-- Icons -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />

  <style>
    body {
      background-color: #1a202c; /* Dark blue background */
      color: #f1f1f1;
    }

    .navbar {
      background-color: #14181f;
    }

    .navbar-brand,
    .nav-link {
      color: #f1f1f1 !important;
    }

    .btn {
      background-color: #005e94;
      border: none;
      color: #f1f1f1;
    }

    .carousel-inner img {
      filter: brightness(0.85);
    }

    .card {
      background-color: #1e1e1e;
      color: #f1f1f1;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5);
    }

    .card .text-primary {
      color: #ffa500 !important;
    }

    .form-control {
      background-color: #14181f;
      color: #f1f1f1;
      border: 1px solid #555;
    }

    .form-control:focus {
      background-color: #14181f;
      color: #f1f1f1;
      border-color: #005e94;
      box-shadow: none;
    }

    .modal-content {
      background-color: #14181f;
      color: #f1f1f1;
    }

    footer {
      background-color: #14181f;
      color: #f1f1f1;
    }

    a {
      color: #005e94;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }

    .btn-arrow-left,
    .btn-arrow-right {
      background-color: #005e94;
      color: white;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">CALON DOSEN</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item mx-2">
            <a class="nav-link ms-auto" href="{{ url('login') }}">
              <button class="btn d-flex">Sign In</button>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="pt-5"></div>
  <div class="pt-5"></div>

  <!-- Slider -->
  <div class="container pt-5 pb-4">
    <div class="row">
      <div class="col">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="https://github.com/ridwanhakimr/gambar/blob/main/image/carousel2.png?raw=true"
                class="d-block w-100 rounded" alt="...">
            </div>
            <div class="carousel-item">
              <img src="https://github.com/ridwanhakimr/gambar/blob/main/image/carousel3.png?raw=true"
                class="d-block w-100 rounded" alt="...">
            </div>
            <div class="carousel-item">
              <img src="https://github.com/ridwanhakimr/gambar/blob/main/image/carousel1.png?raw=true"
                class="d-block w-100 rounded" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Hero Section -->
  <section class="py-5">
    <div class="container h-100 text-center mb-5 my-5">
      <h1 class="display-5">Selamat Datang di <strong>CALON DOSEN</strong> </h1>
      <p class="lead">Tempat Belajar Menuntut Ilmu</p>
    </div>
  </section>

  <!-- Footer -->
  <footer class="pt-5 pb-4">
    <div class="container text-center text-md-start">
      <div class="row text-center text-md-start">
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
          <img class="img-fluid" width="200" src="https://github.com/ridwanhakimr/gambar/blob/main/image/Logo.png?raw=true" alt="Logo Bimbel">
        </div>
        <div class="col-md-4 mb-3 mt-3">
          <h5 class="text-uppercase mb-4 font-weight-bold">Tentang Kami</h5>
          <p>Bimbel Terbaik menyediakan layanan pembelajaran berkualitas untuk membantu siswa meraih prestasi terbaik.</p>
        </div>
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
          <h5 class="text-uppercase mb-4 font-weight-bold">Content</h5>
          <ul class="list-unstyled">
            <li><a href="/">Home</a></li>
            <li><a href="/about">About Us</a></li>
            <li><a href="/menu">Menu</a></li>
            <li><a href="/gallery">Gallery</a></li>
          </ul>
        </div>
        <div class="col-md-3 col-lg-2 col-md-3 mx-auto mt-3">
          <h5 class="text-uppercase mb-4 font-weight-bold">Contacts</h5>
          <ul class="list-unstyled">
            <li><a href="tel:02220458359">022-2045976876</a></li>
            <li><a href="mailto:sanscoworking@gmail.com">calondosen@gmail.com</a></li>
          </ul>
        </div>
      </div>
      <hr class="mt-4 mb-4 border-white">
      <div class="row text-md-center">
        <div class="col-md-12">
          <p>&copy; 2024 CALON DOSEN. All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>
