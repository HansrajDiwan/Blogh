<?php

    include('connection.php');

    if(!isset($_SERVER['HTTP_REFERER']))
    {
        header("Location: error_page.php");
        die();
    }

    if (!($_SESSION['role'] === "admin"))
    {
        header("Location: error_page.php");
        die();
    }
    else
    {
        $query = "SELECT COUNT(*) AS TOTAL FROM users";

        $result = $conn -> query($query);
        while($obj = $result -> fetch_object())
        {
            $no_of_registered_users = $obj -> TOTAL;
        }
        $result -> free_result();

        $query = "SELECT COUNT(*) AS TOTAL FROM users WHERE is_active=1";

        $result = $conn -> query($query);
        while($obj = $result -> fetch_object())
        {
            $no_of_active_users = $obj -> TOTAL;
        }
        $result -> free_result();

        $query = "SELECT COUNT(*) AS TOTAL FROM blogs";

        $result = $conn -> query($query);
        while($obj = $result -> fetch_object())
        {
            $no_of_blogs = $obj -> TOTAL;
        }
        $result -> free_result();

        $query = "SELECT COUNT(*) AS TOTAL FROM blogs WHERE is_hidden=1";

        $result = $conn -> query($query);
        while($obj = $result -> fetch_object())
        {
            $no_of_hidden_blogs = $obj -> TOTAL;
        }
        $result -> free_result();

        // $query = "SELECT * FROM blogs WHERE is_hidden=0";
        
        // $result = $conn -> query($query);
        // while($obj = $result -> fetch_object())
        // {
        
        // }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>

<body>
    <!-- navigation bar start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">MyBlog</a>
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
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li> -->
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
                                      <a class="nav-link active" href="dashboard.php">Dashboard</a>
                                    </li>';

                          }

                          echo '<li class="nav-item">
                                  <a class="nav-link" href="add_blog.php">Add Blog</a>
                                </li>';

                          echo '<li class="nav-item">
                                  <a class="nav-link" href="logout.php">Logout</a>
                                </li>';

                          echo '<li class="nav-item">
                          <a class="nav-link" href="profile.php">' . ucfirst($_SESSION["name"]) . '</a>
                          </li>'; 
                      }
                  ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navigation bar end  -->

    <!-- Summary start -->
    <div class="container mt-5">
        <div class="row mt-3">
            <div class="col">
                <div class="container">
                    <div class="col">
                        <h5>Total Registered Users</h5>
                    </div>
                    <div class="col">
                        <h2><?php echo $no_of_registered_users - 1 ?></h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="container">
                    <div class="col">
                        <h5>Total Active Users</h5>
                    </div>
                    <div class="col">
                        <h2><?php echo $no_of_active_users - 1 ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <div class="container">
                    <div class="col">
                        <h5>Total number of blogs on website</h5>
                    </div>
                    <div class="col">
                        <h2><?php echo $no_of_blogs ?></h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="container">
                    <div class="col">
                        <h5>Number of hidden blogs</h5>
                    </div>
                    <div class="col">
                        <h2><?php echo $no_of_hidden_blogs ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Summary end -->
</body>

</html>