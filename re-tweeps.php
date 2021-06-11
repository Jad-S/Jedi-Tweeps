<?php

require_once "includes/header.php";
require_once "includes/db.php";

// access control
if (!isset($_SESSION['juname'])) {
    header("Location:index.php?noaccess=1");
    die();
}

?>

<!-- This page displays the user's shared posts and was developed entirely by Jad Bou Said. -->
<main id="pg-main-content">
    <div class="container">


        <section class="space-above-below">
            <div class="posted-content">
                <?php
                if (isset($_GET['noaccess'])) {
                    echo '<p class="noAccessMsg">You do not have access to the resources that you tried to access!</p>';
                }
                if (isset($_GET['post-success'])) {
                    echo '<p id="postSuccessMsg">Your post was submitted successfully!</p>';
                }
                ?>
            </div>
            <h2 class="fw-light"> Your Shared Tweeps </h2>
            <hr>
                <!-- Displaying user's shared posts-->
                <?php
                    $name = $_SESSION['juname'];
                    //retrieve data from jediblog by comparing jedi_post_id in jediblog and jedishares
                    //from the shared posts of the logged in user

                    $querySQL = "SELECT * FROM `jedishares` 
                                RIGHT JOIN `jediblog` 
                                ON `jedishares`.`jedi_post_id` = `jediblog`.`jedi_post_id`
                                WHERE `jedishares`.`jedi_user` = '$name'";

                    $result = mysqli_query($dbconnection, $querySQL);
                    $count = mysqli_num_rows($result);

                    //Citation #3: This code used to retrieve and display blog data has been used with modification from my submission for Assignment 3 in CSCI 2170 (Winter 2021).
					//Jad Bou Said, Assignment 3: CSCI 2170 (Winter 2021), Faculty of Computer Science, Dalhousie University. Available online on Gitlab at https://git.cs.dal.ca/courses/2021-winter/csci-2170/a3/said
					
                    if ($count > 0) {
                        $id = 1;
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<section id="result', $id, '" class="space-above-below">'."\n";
                            echo '<h4 class="fw-light">', $row['jedi_post_title'], '</h4>'."\n";
                            echo '<h6 class = "fw-light">Posted by ', $row['jedi_author'], ' on ', $row['jedi_post_date'], '</h6>'."\n";
                            echo '<p class="text-muted">', substr($row['jedi_post_content'], 0, 200), '</p>';
                            echo '<a href="post.php?post_id=', $row['jedi_post_id'], '" role="button" class="viewButton">View</a>';
                            echo '</section>';
                            echo '<hr>';

                            //auto increment the results using id 
                            $id = $id + 1;
                        }
                    } else {
                        echo 'You havent ReTweeped anything yet!';
                    }

                    //back to top button if there are more than 3 results
                    if ($count > 3) {
                        echo '<br><br>
                        <a href="#" role="button" class="viewButton color">Back to top</a>
                        <br><br>';
                    }
                ?>
                
        </section>

    </div>

</main>

<?php

if (isset($dbconnection)) {
    $dbconnection->close();
}
require_once "includes/footer.php";
?>