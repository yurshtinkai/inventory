<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Inventory System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        footer {
            text-align: center;
            margin-top: 50px;
        }
        .contact-form {
            margin-top: 30px;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .map-img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .contact-details {
            margin-bottom: 30px;
        }

        .navbar-nav {
            margin-left: auto;
        }

        /* Hide the modal by default */
        #loginModal {
            display: none;
            position: fixed;
            z-index: 10;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); 
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
.btn {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1.2rem;
            border-radius: 8px;
            animation: fadeIn 1.1s ease-in-out forwards;
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
        .btn-login {
    border-radius: 12px;
    padding: 8px 20px;
    font-size: 1.2rem;
    background-color: #1877F2;
    width: 95%;
    margin-top: 12px;
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
        .close {
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
        
        .error-message {
            color: red;
            font-size: 0.9em;
            margin-top: 0.5em;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
        <img src="logo_inven.jpg"/>
            <a class="navbar-brand" href="index.html">Inventory System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                    <form action="{{route('index') }}" method="GET">
                      <a class="nav-link" href="index">Home</a>
                    </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="login-btn">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row contact-details">
            <div class="col-md-6">
                <h3>Contact Information</h3>
                <p><strong>Address:</strong> A. S. Fortuna St., Mandaue City, Cebu. PH</p>
                <p><strong>Email:</strong> group3t@inventorysystem.com</p>
                <p><strong>Phone:</strong> 09912345678</p>
            </div>
            <div class="col-md-6">
                <img src="map.jpg" alt="Map" class="map-img">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="contact-form">
                    <h4>Send Us a Message</h4>
                    <form id="contactForm">
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" id="name" class="form-control" placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" id="email" class="form-control" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Your Message</label>
                            <textarea id="message" class="form-control" rows="5" placeholder="Write your message here" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
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

    <script>
        var modal = document.getElementById("loginModal");
        var loginBtn = document.getElementById("login-btn");
        var closeModal = document.getElementById("closeModal");

        loginBtn.onclick = function() {
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
    </script>

    <footer class="bg-dark text-white p-3 mt-5">
        <p>&copy; 2024 Inventory System. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            event.preventDefault();
            alert('Thank you for reaching out! We will get back to you shortly.');
            document.getElementById('contactForm').reset();
        });
    </script>

</body>
</html>
