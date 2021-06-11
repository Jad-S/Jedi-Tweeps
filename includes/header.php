<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JediTweeps</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header id="pg-header">
        <?php
        //Hide navigation if not logged in
        if (isset($_SESSION['juname']) && isset($_SESSION['jupswd'])) {
        ?>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a class="navbar-brand" href="jedi-tweeps.php">JediTweeps</a>

                    <form class="search-form" method="get" action="">
                        <!-- Postback and perform search here in this file -->
                        <input class="form-control" type="text" placeholder="Search" aria-label="Search" name="search-keywords">

                    </form>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                            
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="jedi-tweeps.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="re-tweeps.php">Re-Tweeps</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="submit-blog.php">Tweep</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="profile.php">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="includes/logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        <?php
        }
        ?>
    </header>