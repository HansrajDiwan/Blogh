<?php 
    include('connection.php');

    if (!isset($_SERVER['HTTP_REFERER']))
    {
        header("Location: error_page.php");
        die();
    }

    $row = [];
    // if (isset($_SESSION['username']))
    {
        $id = $_GET['bid'];
        
        $sql = "SELECT * FROM blogs WHERE id=$id";
        $result = $conn -> query($sql);

        $row = $result -> fetch_assoc();
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="static\css\detail_blog.css">

    <title>
        Blog | Home
    </title>
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
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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
                          <a class="nav-link" href="profile.php">' . ucfirst($_SESSION["name"]) . '</a>
                          </li>';  
                      }
                  ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navigation bar end  -->

    <?php 

    if (empty($row))
    {
        echo '<div class="alert alert-danger" role="alert">
                Something unexpected happned
            </div>';
    }
    else
    {
    echo '<div class="container">
        <div class="row">
            <div class="col-md-8 card card1">
                <div class="card-body1">
                    <h1>'. $row['headline'] .'</h1>
                    <p class=" text-muted">'. $row['author'] .'</p>
                    <p class="card-text ">'. $row['blog_text'] .'</p>
                </div>
            </div>
        </div>
    </div>';
    }
    ?>
</body>
