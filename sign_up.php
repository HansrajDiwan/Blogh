<?php

// Getting connection from database
include('connection.php');

$err_msg = "";
$success_msg = "";

// Checking if form has been submitted or not.
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
  // Storing values of form data
  $name = $_POST['name'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Query for checking if same username exists in database or not
  $query = "SELECT * FROM users WHERE username='{$username}'";

  $result = $conn -> query($query);

  // If no rows exists with same username then add it to the database
  if ($result -> num_rows === 0) 
  {
      // Now insert data in database
      $sql = "INSERT INTO users (name, username, password) VALUES ('{$name}', '{$username}', '{$password}')";

      // This will return boolean value
      $result1 = $conn -> query($sql);

      if ($result1 === TRUE)
      {
         $success_msg = "You're registered successfully!. You'll be redirected to login page shortly.";
         header("refresh:5;url=index.php");
      }
      else
      {
         $err_msg = "Could not insert data into the databse"; 
      }
  }
  else
  {
      $err_msg = "Username already exists, try another one.";
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Blog | Register
    </title>

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

<body>
    <main class="form-signin">
        <form method="post" onsubmit="return validate(this)">
            <h3 class="h3 fw-normal">Create new account</h3>

            <?php
            if ($err_msg !== "")
            {
                echo '<div class="alert alert-danger" role="alert">';
                echo $err_msg;
                echo '</div>';
            }
            if ($success_msg !== "")
            {
                echo '<div class="alert alert-success" role="alert">';
                echo $success_msg;
                echo '</div>';
            }
            ?>

            <div class="form-floating mt-3">
                <input type="text" class="form-control" id="floatingName" placeholder="John Doe" name="name" required>
                <label for="floatingName">Name</label>
            </div>

            <div class="form-floating mt-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@domain.com"
                    name="username" required>
                <label for="floatingInput">Email address</label>
            </div>

            <div class="form-floating mt-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password"
                    required>
                <label for="floatingPassword">Password</label>
            </div>

            <div class="form-floating mt-3">
                <input type="password" class="form-control" id="floatingPassword1" placeholder="Confirm Password"
                    name="password1" required>
                <label for="floatingPassword1">Confirm Password</label>
            </div>

            <button class="w-100 mt-3 btn btn-lg btn-success" type="submit">Sign in</button>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
    function validate(form) {
        var pw = form.floatingPassword.value;
        var pw1 = form.floatingPassword1.value;

        if (pw !== pw1) {
            alert("Password doesn't match with confirm password");
            return false;
        }
        return true;
    }
    </script>
</body>

</html>