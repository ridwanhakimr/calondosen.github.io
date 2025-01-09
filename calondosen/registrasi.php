<?php
include 'koneksi.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password
    $email = $_POST['email'];
    $namalengkap = $_POST['namalengkap'];

    $query = "INSERT INTO tb_login (username, password, email, nama_lengkap) VALUES ('$username', '$password', '$email', '$namalengkap')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Registrasi berhasil. <a href='login.html'>Login di sini</a>";
    } else {
        echo "Registrasi gagal: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="aset/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
<title>registrasi</title>
</head>

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body bg-light">
                        <div class="text-center">
                            <h5>Sign Up</h5>
                        </div>
                        <form action="#" method="post">
                            <div>
                                <label class="form-label" for="">Username</label>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                            <div>
                                <label class="form-label" for="">password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>

                            <div>
                                <label class="form-label" for="">email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div>
                                <label class="form-label" for="">nama lengkap</label>
                                <input type="text" name="namalengkap" id="namalengkap" class="form-control" required>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary" name="register">Registration</button>

                            </div>
                            <hr>
                            <p>have an account ?<a href="login.html""> Sign In</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>