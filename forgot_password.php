<?php

    include('connection.php');
    if (!isset($_SERVER['HTTP_REFERER']))
    {
        header("location: index.php");
        die();
    }

?>

<?php

    $err_msg = "";
    $success_msg = "";
    if ($_SERVER["REQUEST_METHOD"] === "POST")
    {
        $username = $_POST["username"];
        
        $sql = "SELECT * FROM users WHERE username='{$username}'";
        $result = $conn -> query($sql);

        if ($result -> num_rows < 0)
        {
          $err_msg = "Username does not exists.";
        }
        else
        {
          if ($result -> num_rows === 1)
          {
              $obj = $result -> fetch_object();
              $password = $obj -> password;
              $success_msg = "Your password is {$password}";
              header("refresh:3;url=index.php");

          }
          else
          {
              $err_msg = "Something unexpected happned";
          }
        }
        $result -> free_result();
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <meta name="theme-color" content="#7952b3">
    <title>Blog | Profile</title>
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
    </style>
</head>

<body class="text-center">
    <main class="form-signin">
        <form method="post">
            <h3 class="h3 fw-normal">Forgot Password</h3>

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
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                    name="username" required>
                <label for="floatingInput">Email address</label>
            </div>

            <div class="row">
                <div class="col">
                    <button class="w-100 mt-3 btn btn-lg btn-success" type="submit">Get Password</button>
                </div>
            </div>

        </form>
    </main>
</body>

</html>