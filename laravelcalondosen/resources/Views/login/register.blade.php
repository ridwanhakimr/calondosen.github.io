<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #1a202c; /* Dark blue background */
            margin: 0;
            font-family: Arial, sans-serif;
            color: #f0f0f0; /* Light text for contrast */
        }
        .form-container {
            background: rgba(255, 255, 255, 0.1); /* Transparent background for glass effect */
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 400px;
            max-width: 100%;
            backdrop-filter: blur(10px); /* Glass effect */
            padding: 2rem;
            color: #f0f0f0; /* Light text color */
        }
        .form-header {
            text-align: center;
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            color: #ffffff; /* White text for header */
        }
        .form-toggle {
            color: #005e94; /* Blue accent for links */
            cursor: pointer;
            text-decoration: none;
        }
        .form-toggle:hover {
            text-decoration: underline;
        }
        .form input[type="email"],
        .form input[type="password"],
        .form input[type="text"] {
            background-color: rgba(255, 255, 255, 0.2); /* Slightly dark inputs */
            color: #f0f0f0; /* Light text inside inputs */
            border: 1px solid rgba(255, 255, 255, 0.3); /* Light border */
            border-radius: 5px;
        }
        .form button {
            background-color: #005e94; /* Blue button */
            border: none;
            color: white;
            font-size: 1rem;
            border-radius: 5px;
            padding: 0.8rem;
        }
        .form button:hover {
            background-color: #3c7f9f; /* Darker blue on hover */
        }
        .text-center {
            color: #d0d0d0; /* Light color for text */
        }
        
        .btn {
        background-color: #005e94;
        border: none;
        color: #f1f1f1;
        }
    </style>
    <script>
        function validateForm() {
            const password = document.getElementById('password').value;
            if (password.length < 5) {
                alert('Password harus minimal 5 karakter!');
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="form-container">
    <div id="register-form" class="form">
            <div class="form-header">Register</div>
            @if ($errors->any())
                <div style="color: red;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('/register') }}" method="POST" onsubmit="return validateForm();">
            @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" placeholder="Enter your username">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email"  name="email" value="{{ old('email') }}"placeholder="Enter your email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                </div>
                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="Enter your Full Name">
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
                <div class="text-center mt-3">
                    Already have an account? <a class="form-toggle" href="{{ url('login') }}">Login</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>