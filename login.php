<?php
session_start();
include 'connection.php';
include 'functions.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $user_name = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        //read from database
        $query = $db->query("SELECT * FROM users WHERE user_name = '{$user_name}'")->fetch(PDO::FETCH_ASSOC);

        if ($query) {
            if ($query['password'] === $password) {
                $_SESSION['user_id'] = $query['user_id'];
                header("Location: index.php");
                die;
            }
        }
    } else {
        echo "Please enter valid information";
    };
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <meta name="theme-color" content="#7952b3">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="assets/login.css">
</head>
<body class="text-center">

<main class="form-signin container">
    <header class="mb-auto">
        <div>
            <h3 class="float-md-start mb-0">Cover</h3>
            <nav class="nav nav-masthead justify-content-center float-md-end">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
            </nav>
        </div>
    </header>
    <form method="post">
        <img class="mb-4" src="assets/witch-hat.jpg" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
            <input type="text" class="form-control" id="nameInput" name="username" placeholder="Enter your name...">
            <label for="nameInput">Name</label>
        </div>
        <br>
        <div class="form-floating">
            <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Password">
            <label for="passwordInput">Password</label>
        </div>
        <br>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit" value="login">Sign in</button>
        <br><br>
        <a href="signup.php">Create an account. Sign up!</a>
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
    </form>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>
