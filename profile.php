<?php

    include('connection.php');
    if (!isset($_SERVER['HTTP_REFERER']))
    {
        header("Location: index.php");
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
    <title>Blog | Profile</title>
</head>

<body>
    <!-- navigation bar start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">My Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
            
                    <?php 
                      if (!isset($_SESSION['username']) || !isset($_SESSION['role']))
                      {
                          echo '<li class="nav-item">
                                  <a class="nav-link" href="login.php">Login</a>
                                </li>';
                      }
                      else 
                      {
                          if ($_SESSION['role'] === "admin")
                          {
                              echo '<li class="nav-item">
                                      <a class="nav-link" href="dashboard.php">Dashboard</a>
                                    </li>';

                          }

                          echo '<li class="nav-item">
                                  <a class="nav-link" href="add_blog.php">Add Blog</a>
                                </li>';

                          echo '<li class="nav-item">
                                  <a class="nav-link" href="logout.php">Logout</a>
                                </li>';

                          echo '<li class="nav-item">
                          <a class="nav-link active" href="profile.php">' . ucfirst($_SESSION["name"]) . '</a>
                          </li>';  
                      }
                  ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navigation bar end  -->

    <div class="container">
        <?php
            if (isset($_SESSION['username']) && isset($_SESSION['name']))
            {
                $name = $_SESSION['name'];
                $username = $_SESSION['username'];
                echo "<br><br>";
                echo "Name : $name";
                echo "<br><br>";
                echo "Username : $username";
                echo "<br><br>";
            }
        ?>
        <a href="change_password.php" class="align-center btn btn-info">Change Password</a>
    </div>
</body>

</html>