<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <style>
        * {
            font-family: "Poppins", sans-serif;
        }
        body {
            background: url('BCpic.jpg');
            background-size: cover;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .welcome-container {
            position: relative;
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            padding: 40px;
            text-align: center;
            border-radius: 15px;
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.8);
            animation: fadeIn 1.5s ease-in-out;
        }

        .welcome-text {
            font-size: 3rem;
            font-weight: bold;
            margin: 0;
            animation: textSlideIn 2s ease forwards;
        }

        .btn {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1.2rem;
            border-radius: 8px;
            animation: fadeIn 1.1s ease-in-out forwards;
        }

        #loginModal {
            display: none;
            position: fixed;
            z-index: 10;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.3); 
            justify-content: center;
            align-items: center;
        }

        .login-container {
    background-color: #ffff;
    color: black;
    padding: 40px;
    text-align: center;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    width: 100%;
    max-width: 400px;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
}
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
        .container-fluid ul {
            padding: 15px;
            gap: 8rem;
        }
        img {
            height: 50px;
            width: 50px;
            border-radius: 30px;
        }
        .container-fluid a {
            color: white;
        }
        .login-container .close {
            position: absolute;
            top: 0;
            right: 0;
            width: 45px;
            height: 45px;
            background: aqua;
            font-size: 2em;
            color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            border-bottom-left-radius: 20px;
            cursor: pointer;
            z-index: 1;
        }
        .login-container h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #1877F2;
        }
        .btn-login {
    border-radius: 12px;
    padding: 8px 20px;
    font-size: 1.2rem;
    background-color: #1877F2;
    width: 95%;
    margin-top: 12px;
}
        .social-btns {
            margin-top: 20px;
        }

        .social-btn {
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 1.5rem;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            background-color: #333;
            color: white;
            margin: 0 10px;
        }
        .error-message {
    color: red;
    font-size: 0.9em;
    margin-top: 0.5em;
    min-height: 5px; /* Ensure the error message area takes up space */
}
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <img src="logo_inven.jpg"/>
            <a class="navbar-brand" href="#">Inventory System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">`
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                    <form method="POST" action="{{route('index')}}">
                        @csrf
                        <a class="nav-link" href="#">Home</a>
                        </form>
                    </li> 
                    <li class="nav-item">
                    <form method="POST" action="{{ route('contact') }}">
                    @csrf
                        <a class="nav-link" href="contact">Contact</a>
                    </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="login-btn">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="welcome-container">
        <h1 class="welcome-text">Welcome to the Inventory System</h1>
        <p>Manage your inventory efficiently and effortlessly</p>
        <button class="btn btn-light btn-lg" id="dashboard-btn">Go to Dashboard</button>
    </div>

    <div id="loginModal">
        <div class="login-container">
            <span class="close" id="closeModal">&times;</span>
            <h1>Login</h1>
            <form id="loginForm" method="POST">
    @csrf
    <div class="mb-3">
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
                <div id="username-error" class="error-message"></div>
            </div>

            <div class="mb-3">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                <div id="password-error" class="error-message"></div>
            </div>

            <button type="submit" class="btn btn-dark btn-login">Login</button>
</form>
<div class="social-btns">
            <a href="#" class="social-btn"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social-btn"><i class="fab fa-google"></i></a>
            <a href="#" class="social-btn"><i class="fab fa-twitter"></i></a>
        </div>
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
     var modal = document.getElementById("loginModal");
        var dashboardBtn = document.getElementById("dashboard-btn");
        var loginBtn = document.getElementById("login-btn");
        var closeModal = document.getElementById("closeModal");

        dashboardBtn.onclick = loginBtn.onclick = function() {
            modal.style.display = "flex";
        }

        closeModal.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    $(document).ready(function() {
        $('#loginForm').on('submit', function(e) {
            e.preventDefault();
            $('#username-error').text('');
            $('#password-error').text('');

            $.ajax({
                url: "{{ route('login') }}",
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        window.location.href = "{{ route('dashboard') }}";
                    }
                },
                error: function(response) {
                    let errors = response.responseJSON.errors;
                    if (errors.username) {
                        $('#username-error').text(errors.username[0]);
                    }
                    if (errors.password) {
                        $('#password-error').text(errors.password[0]);
                    }
                }
            });
        });
    });
</script>
</body>
</html>
