<?php 

    include('connection.php');

    if (!isset($_SERVER['HTTP_REFERER']))
    {
        header("Location: index.php");
    }

    $success = "";
    $error = "";

    if ($_SERVER['REQUEST_METHOD'] === "POST")
    {
        $name = $_SESSION['name'];
        $headline = $_POST['headline'];
        $data = $_POST['data'];

        $query = "INSERT INTO blogs (author, headline, blog_text) VALUES ('{$name}', '{$headline}', '{$data}')";

        $result = $conn -> query($query);

        if ($result === TRUE)
        {
            $success = "Blog added Successfully";
        }
        else
        {
            $error = "There is some problem";
        }

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
    <title>Blog | Write Your Ideas...</title>
    <style>
        body{
        margin: 0;
        padding: 0;
        scroll-behavior: smooth;
        }
    </style>
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
                                      <a class="nav-link" href="dashboard.php">Dashboard</a>
                                    </li>';

                          }

                          echo '<li class="nav-item">
                                  <a class="nav-link  active" href="add_blog.php">Add Blog</a>
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
    <div class="container">
        <?php   
            if ($success !== "" && $error === "")
            {
                echo '<div class="m-3 alert alert-success" role="alert">';
                echo $success;
                echo '</div>';
            }
            if ($success === "" && $error !== "")
            {
                echo '<div class="alert alert-danger" role="alert">';
                echo $error;
                echo '</div>';
            }
        ?>

        <form method="post">
            <div class="m-3">
                <label for="headline" class="form-label">Headline</label>
                <input type="text" class="form-control" id="headline" placeholder="Headline of your blog..."
                    name="headline" required>
            </div>
            <div class="m-3">
                <label for="data" class="form-label">Blog Text</label>
                <textarea class="form-control" id="data" rows="8" name="data" required></textarea>
            </div>
            <div class="m-3">
                <button class="btn btn-outline-success" type="submit">Confirm</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
</body>

</html>