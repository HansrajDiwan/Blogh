<?php

    include('connection.php');
    if (!isset($_SERVER['HTTP_REFERER']))
    {
        header("Location: index.php");
        die();
    }

?>

<?php

    $err_msg = "";
    $success_msg = "";
    if ($_SERVER["REQUEST_METHOD"] === "POST")
    {
        $username = $_POST["username"];
        $old = $_POST["old_password"];
        $new = $_POST["new_password"];

        $sql = "SELECT * FROM users WHERE username='{$username}' AND password='{$old}'";
        $result = $conn -> query($sql);

        if ($result -> num_rows < 0)
        {
          $err_msg = "Username or password is incorrect.";
        }
        else
        {
          $query = "UPDATE users SET password='{$new}' WHERE username='{$username}'";

          $result1 = $conn -> query($query);

          if ($result1 === TRUE)
          {
              $success_msg = "Password updated successfully!";
          }
          else
          {
              $err_msg = "There is some problem, either username is not found or some other";
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
    <script type="text/javascript">
    function validate(form) {
        var pw = form.floatingNewPassword.value;
        var pw1 = form.floatingNewPassword1.value;

        if (pw !== pw1) {
            alert("Password doesn't match with confirm password");
            return false;
        }
        return true;
    }
    </script>
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
        <form method="post" onsubmit="return validate(this);" action="index.php">
            <h3 class="h3 fw-normal">Change Password</h3>

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
                // header("refresh:5;url=index.php");
              }
            ?>
            <div class="form-floating mt-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                    name="username" required>
                <label for="floatingInput">Email address</label>
            </div>

            <div class="form-floating mt-3">
                <input type="password" class="form-control" id="floatingOldPassword" placeholder="Old Password"
                    name="old_password" required>
                <label for="floatingOldPassword">Old Password</label>
            </div>

            <div class="form-floating mt-3">
                <input type="password" class="form-control" id="floatingNewPassword" placeholder="New Password"
                    name="new_password" required>
                <label for="floatingNewPassword">New Password</label>
            </div>

            <div class="form-floating mt-3">
                <input type="password" class="form-control" id="floatingNewPassword1" placeholder="Confirm New Password"
                    name="new_password1" required>
                <label for="floatingNewPassword1">Confirm New Password</label>
            </div>

            <div class="row">
                <div class="col">
                    <button class="w-100 mt-3 btn btn-lg btn-success" type="submit">Change Password</button>
                </div>
            </div>
            
            
            
        </form>
    </main>
</body>

</html>