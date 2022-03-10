<?php include('connection.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="static\css\index.css">
    <link rel="stylesheet" href="static\css\all.min.css">
    <title>
        Blog | Home
    </title>
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

    <!-- carousel start -->
    <div class="carol">    
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="static\images\2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="static/images/4.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="static/images/3.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="static/images/4.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>
    <!-- carousel end -->

    <div class="container">
        <h1 class="title mt-5 text-center">Welcome To MyBlog</h1>
    </div>

    <!-- top 10 blogs -->
    <?php 
    //   if (isset($_SESSION['username']))
    //   {

        $sql = "SELECT * FROM blogs LIMIT 10";

        $result = $conn -> query($sql);
  
        echo '<div class="card-body">
                <div class="container">
                    <div class="row">';
        while ($row = $result -> fetch_assoc())
        {
          echo '
                    <div class="card card1">
                        <div class="card-body">
                            <h2 class="card-title">'. $row['headline'] .'</h2>
                            <p class="card-text text-muted text-capitalize h6">'. $row['author'] .'</p>
                            <p class="card-text">'. substr($row['blog_text'], 0, 250) .'</p>
                            <a href="detail_blog.php?bid='. $row['id'] .'" class="btn btn-primary">Read More
                            &rarr;</a>
                        </div>
                    </div>';
        }
        echo '</div>
            </div>
          </div>';
    //   }
    ?>
    <!-- top 10 blogs end -->

    <!-- footer -->
    <?php require "footer.php"?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
</body>

</html>

