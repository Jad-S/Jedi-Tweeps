<?php
/*
 * CSCI 2170: ONLINE EDITION, WINTER 2021
 * STARTER CODE FOR ASSIGNMENT 3
 *
 * This code was developed by Dr. Raghav V. Sampangi (raghav@cs.dal.ca)
 *
 * Website homepage
 */

require_once "includes/header.php";
require_once "includes/db.php";

?>

<main id="pg-main-content">
<div class ="content-position">
    <div class="container">
        <section class="space-above-below">
        <?php
        //using postID to retrieve detailed content for the selected post
        $postID = $_GET['post_id'];
        $query1 = "SELECT * FROM jediblog WHERE jedi_post_id='$postID'";
        $result1 = $dbconnection->query($query1);
        $row = $result1->fetch_assoc();
        ?>
            <h2 class="fw-light"><?php echo $row["jedi_post_title"] ?></h2>
            <hr>
            <h5 class="fw-light"><?php echo "Posted by " . $row["jedi_author"] . " on " . $row["jedi_post_date"] ?></h5>
            <p class="text-muted"><?php echo $row["jedi_post_content"] ?></p>
            <form method="POST">
            <input type="submit" class="viewButton" name ="like" value="Like" role="button">

            <!-- Like button implementation developed by Jad Bou Said -->
            <?php
                //check if like button was pressed
                if (isset($_POST["like"])) {
                    $name = $_SESSION['juname'];
                    //create a new column with user id matching logged in user
                    // and post id matching the current post
                    $sql = "INSERT INTO `jedilikes` (`jedi_user`, `jedi_post_id`)
                            VALUES ('$name', '$postID')";
                    $result = mysqli_query($dbconnection, $sql);
                }

                 /**The code to count and display the number of rows was originally posted by "Jimithus" and has been
                  * modified for the purposes of counting the number of likes on this website. It can be found
                  * at https://stackoverflow.com/questions/6655628/mysql-count-total-number-of-rows-in-php 
                  * Accessed: Apr 6, 2021 
                  */
                
                 $likesquery = mysqli_query($dbconnection, "SELECT COUNT(*) FROM `jedilikes` WHERE `jedi_post_id` = $postID");
                 $query = mysqli_fetch_array($likesquery);

                 $numberOfLikes = $query[0];
            ?>
            <input type="submit" class="viewButton" name="share" value="Share" role="button">

            <!-- Share button implementation developed by Jad Bou Said -->
            <?php
                if (isset($_POST['share'])) {
                    $name = $_SESSION['juname'];
                    $sql = "INSERT INTO `jedishares` (`jedi_user`, `jedi_post_id`)
                            VALUES ('$name', '$postID')";
                    $result = mysqli_query($dbconnection, $sql);
                    //if data was successfully inserted, print the following
                    if ($result) {
                        echo '<br> <p class = "text-muted"> You have successfully shared this post! </p>';
                    } else {
                        echo '<br> <p class = "text-muted"> You have already shared this post. </p>';
                    }
                }
            ?>
            <p class = "text-muted"><?php 
                //if no one liked the post, display "0", else display number of likes
                if ($numberOfLikes > 0) { echo $numberOfLikes; }
                else { echo 0;} ?> Jedi liked this.</p>
            </form>
        </section>
    </div>
    </div>
</main>

<?php
require_once "includes/footer.php";
?>