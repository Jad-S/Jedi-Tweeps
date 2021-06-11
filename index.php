<!--This code implements login with some modification from my submission for Assignment 3 in CSCI 2170 (Winter 2021).

Nafiz U. Mazumder, Assignment 3: CSCI 2170 (Winter 2021), Faculty of Computer Science,
Date accessed: April 5, 2021
-->

<?php
/*
 * Page to login to the website
 */

require_once "includes/header.php";
require_once "includes/db.php";

if (isset($_SESSION['juname'])) {
    // access control
    header("Location: jedi-tweeps.php?noaccess=1");

    die();
}

?>

<main>
    <div id="banner">
        <div class="container">
        <a class="navbar-brand" href="jedi-tweeps.php">JediTweeps</a>
        </div>
    </div>
    <div class ="content-position">
        <div class="py-5 text-center container">

        <?php
        //message if login lnfo wrong
        if (!isset($_GET['loginerror'])) {
            echo "<h5>Welcome!</h5>";
            echo "<h5>Log in or sign up to create an account.</h5><br>";
        }
        if (isset($_GET['loginerror'])) {
            echo "<h5>User info not found!</h5>";
            echo "<h5>Try to log in again or sign up to create an account instead.</h5><br>";
        }
        if (isset($_GET['noaccess'])) {
            echo '<p class="noAccessMsg">You do not have access to the resources that you tried to access!</p>';
        }

        ?>
            <div class="row">
                <div class="col-lg-4 col-md-6 mx-auto">
                
                    <form class="form-signin" method="post" action="includes/login.php">
                        <!-- Bootstrap Login form used from example on getbootstrap.com,
                                available here: https://getbootstrap.com/docs/4.0/examples/sign-in/
                                Date accessed: 16 Feb 2021
                            -->
                        <input type="text" name="jedi-uname" id="input-uname" class="form-control" placeholder="Username"
                            required autofocus>
                        <br>
                        <input type="password" name="jedi-pswd" id="input-password" class="form-control"
                            placeholder="Password" required>
                        <br>
                        <input type="submit" name="submit-jedi-login" class="viewButton"
                            value="Log in">
                        <input type="submit" name="submit-jedi-signup" action="signup.php" class="viewButton color"
                            value="Sign up">
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
require_once "includes/footer.php";
?>