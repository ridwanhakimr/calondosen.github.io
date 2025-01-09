<?php
include 'koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM tb_login WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            echo "Login berhasil. Selamat datang, " . $row['nama_lengkap'];
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Username tidak ditemukan!";
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
    <title>LOGIN</title>

    <style>
    body{
        background-size: cover;
        background-repeat: no-repeat;
        background-image: url(./asset/image/bg.jpg);
        
    }
 
</style>
</head>

<body>
    <div class="container py-5 mt-5 mx-auto">
        <div class="row">
           
            <div class="col">
                <div class="row justify-content-center">
                    <div class="col-md-5 mt-5">
                        <div class="card">
                            <div class="card-body ">
                                <div class="text-center">
                                    <h5>Sign In</h5>
                                </div>
                                <form action="#" method="post">

                                    <div>
                                        <label class="form-label" for="">Username</label>
                                        <input type="text" name="username" id="username" class="form-control" required>
                                    </div>
                                    <div>
                                        <label class="form-label" for="">password</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            required>
                                    </div>
                                    <div class="d-grid mt-2">
                                    
                                        <button type="submit" class="btn btn-primary" name="login">Sign In</button>

                                    </div>
                                    <hr>
                                    <p>Dont have account? <a href="registrasi.html"> Sign Up</a></p>
                                </form>
                            </div>
                        </div>
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