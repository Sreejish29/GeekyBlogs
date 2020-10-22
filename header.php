<?php include 'sb-admin-2/db.php';?>
<?php ob_start();
session_start();
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="icon" href="Assets/blog.png">
        <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:wght@300;400;500;700;800&family=Dancing+Script:wght@400;500;600;700&family=Economica:wght@400;700&family=Lato:wght@100;300;400;700&family=Montez&family=Open+Sans+Condensed:wght@300;700&family=Satisfy&family=UnifrakturMaguntia&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" href="CSS/login.css">
        <link rel="stylesheet" href="CSS/register.css">

        <title>GeekyBlogs</title>
    </head>

    <body>



                                                    <!-- Top Section -->



        <div class="container-fluid navbar-dark bg-dark">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand nav-logo" href="index.php">geeky | Blogs</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active nav-nav-links">
                    <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item active nav-nav-links">
                    <a class="nav-link" href="register.php">SignUp <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active nav-nav-links">
                    <a class="nav-link" href="login.php">SignIn <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                </div>
            </nav>
        </div>