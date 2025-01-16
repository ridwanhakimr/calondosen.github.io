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
        background-image: url(https://github.com/ridwanhakimr/gambar/blob/main/image/bg.jpg?raw=true);
        
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
                                <form action="{{ route('login') }}" method="post">
                                    @csrf

                                    @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif

                                    @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif

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
                                    <p>Dont have account? <a href="{{url('/register')}}"> Sign Up</a></p>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</body>

</html>