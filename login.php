<?php

// Getting connection from database
include('connection.php');

$err_msg = "";

// Checking if form has been submitted or not.
if ($_SERVER['REQUEST_METHOD'] === "POST")
{
  // Storing values of form data
  $username = $_POST['username'];
  $password = $_POST['password'];

  // forming SQL query
  $query = "SELECT name FROM users WHERE username='{$username}' AND password='{$password}'";

  // Running query
  $result = $conn -> query($query);

  // Validating user and storing values in session
  if ($result -> num_rows === 1)
  {
    while ($obj = $result -> fetch_object()) {
      $name = $obj -> name;
    }

    $_SESSION['name'] = $name;
    $_SESSION['username'] = $username;
    
    $sql = "UPDATE users SET is_active=1 WHERE username='{$username}'";
    $result1 = $conn -> query($sql);

    if ($username === "admin@gmail.com" && $password === "admin")
    {
      $_SESSION['role'] = "admin";
    }
    else
    {
      $_SESSION['role'] = "user";
    }

    $result -> free_result();
    header("Location: index.php");
    die();
  }
  else
  {
    $err_msg = "Username/Password is wrong!";
  }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Blog | Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <meta name="theme-color" content="#7952b3">

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    html,
    body {
        height: 100%;
    }

    body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
    }

    .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
    </style>
</head>

<body class="text-center">
    <main class="form-signin">
        <form method="post">
            <h3 class="h3 fw-normal">Log in to your account</h3>

            <?php
              if ($err_msg !== "")
              {
                echo '<div class="alert alert-danger" role="alert">';
                echo $err_msg;
                echo '</div>';
              }
            ?>
            <div class="form-floating mt-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                    name="username" required>
                <label for="floatingInput">Email address</label>
            </div>

            <div class="form-floating mt-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password"
                    required>
                <label for="floatingPassword">Password</label>
            </div>

            <div class="row">
                <div class="col">
                    <a href="forgot_password.php" class="w-100 mt-3 btn btn-lg btn-outline-danger">Forgot Password</a>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <button class="w-100 mt-3 btn btn-lg btn-success" type="submit">Log in</button>
                </div>
                <div class="col">
                    <a class="w-100 mt-3 btn btn-lg btn-outline-success" href="sign_up.php">Sign in</a>
                </div>
            </div>

        </form>
    </main>
</body>

</html>