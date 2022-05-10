<!DOCTYPE html>
<html>
<head>
    <title>Trivento | Login</title>
    <link rel="icon" type="image/jpg" href="img/logo.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="https://kit.fontawesome.com/55d9cce45b.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap" rel="stylesheet">
</head>

<body>
<img class="blob" src="img/blob-scene-haikei.svg">

<div class="container">
    <div class="img">
        <img src="img/undraw_teamwork_hpdk.svg">
    </div>

    

    <div class="login-content">
        <form action="/" method="POST" autocomplete="off">
        @csrf
        <img src="img/avatar.svg">
        <h2 class="title">Welcome to Trivento</h2>

        @if(session()->has('loginerror'))
            <div class="alert">
                <span class="fas fa-exclamation-circle"></span>
                {{ session('loginerror') }}
            </div>
        @endif

        @error('email')
        <div class="alert">
        <span class="fas fa-exclamation-circle"></span>
            {{ $message }}
        </div>
        @enderror

        <div class="input-div">
            <div class="i">
                <i class = "fas fa-envelope"></i>
            </div>

            <div class="div">
                <h5>Email Address</h5>
                <input class="input @error('email') is-invalid @enderror" type="email" name="email" id="email" required>
                
            </div>
        </div>

        <div class="input-div pass">
            <div class="i">
                <i class = "fas fa-key"></i>
            </div>

            <div class="div">
                <h5>Password</h5>
                <input type="password" class="input" name="password" id="password" required>

            </div>
        </div>

        <!--Gak perlu bkin ini karena kita tidak mau pake function register
            <a href="#">Don't have an account? Register here</a>-->
            
        <input type="submit" class="btn" name="btnlogin" value="Sign In">
        
        </form>
    </div>
</div>

    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>