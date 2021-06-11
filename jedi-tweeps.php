<?php
require_once "includes/header.php";
require_once "includes/db.php";


// access control
if (!isset($_SESSION['juname'])) {
    header("Location:index.php?noaccess=1");
    die();
}
//Cong's
$querySQL = "SELECT * FROM `follow`";
$followDB = $dbconnection->query($querySQL);
$fetchedFollow = $followDB->fetch_all();

$followerList = "";
$followList ="";

for ($i =0, $iMax = count($fetchedFollow); $i < $iMax; $i++){
    if ($fetchedFollow[$i][0] == $_SESSION['juname']) {
        $followList = $fetchedFollow[$i][1];
        $followerList = $fetchedFollow[$i][2];
    }
}
function followNew($name,&$followList) {
    if (strpos($followList,",".$name.",") === false){
        $followList .= $name.",";
        $username = $_SESSION['juname'];
        $followQuery = "UPDATE `follow` SET `follow` = '$followList' WHERE `follow`.`username` = '$username'";
        $GLOBALS["dbconnection"]->query($followQuery);
    }
}


if (isset($_GET['addFollow'])) {
    followNew($_GET['addFollow'],$followList);
}
$_SESSION["follow"] = $GLOBALS["followList"];
$_SESSION["follower"] = $GLOBALS["followerList"];
$followArray = explode(",", $followList);
$followArray = array_filter($followArray);
$_SESSION["followArray"] = $followArray;
//Cong's end
?>

<main id="pg-main-content">
    <div class="container">


        <section class="space-above-below">

            <!--This code to implement blog data retrieval, display and search has been used with some
					modification from my submission for Assignment 2 in CSCI 2170 (Winter 2021).

					Nafiz U. Mazumder, Assignment 2: CSCI 2170 (Winter 2021), Faculty of Computer Science,
					Dalhousie University. Available online on Gitlab at [URL]: https://git.cs.dal.ca/courses/2021-winter/csci-2170/a2/mazumder.git.
					Date accessed: 14 March 2021

					this code here implements functionality using data from the database -->
           <div class= "posted-content">
            <?php
        if (isset($_GET['noaccess'])) {
            echo '<p class="noAccessMsg">You do not have access to the resources that you tried to access!</p>';
        }
        if (isset($_GET['post-success'])){
            echo '<p id="postSuccessMsg">Your post was submitted successfully!</p>';
        }

        ?>
        </div>
        <?php


            //condition to check and store search parameters
            if (isset($_GET['search-keywords'])) {
                $searchedtxt = $_GET['search-keywords'];
            }
            //return all recent post if search type not set
            if (empty($searchedtxt)) {
                ?>
                <h2 class="posted-content fw-light ">Recent Blogs</h2>
                <?php
                $querySQL = "SELECT * FROM `jediblog`";
                $result = $dbconnection->query($querySQL);
                if ($result->num_rows > 0) {
                    $idnum = 1;
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <hr>
                        <section id="result<?php echo $idnum++; ?> " class="space-above-below">
                            <h4 class="fw-light"><?php echo $row["jedi_post_title"] ?></h4>
                            <h5 class="fw-light"><?php echo "Posted by " . $row["jedi_author"] . " on " . $row["jedi_post_date"] ?></h4>
                                <p class="text-muted"><?php echo substr($row['jedi_post_content'], 0, 200) ?> </p>

                            <?php
                            //postID to generate detailed content
                            $postID = $row['jedi_post_id'];
                            ?>
                                <a href="post.php?post_id=<?php echo $postID ?>" role="button" class="viewButton">View</a>

                                <?php
                                //Cong's follow addition code
                                    if (strpos($followList,",".$row["jedi_author"].",") !== false ||strpos($followList,",".$row["jedi_author"]." ,") !== false) {
                                        echo "<a href=\"#\" class=\"text-success\" role=\"button\" class=\"viewButton\">Following</a>";

                                    } else {
                                        echo "<a href=\"?addFollow=${row["jedi_author"]}\" role=\"button\" class=\"viewButton\">Follow</a>";
                                    }
                                //Cong's end
                                ?>
                        </section>
                        <?php
                    }
                    ?>
                    <br><br>
                    <a href="#" role="button" class="viewButton color">Back to top</a>
                    <br><br>

                <?php
                }
            }
            else {
                //query for search result by author name
                $querySQL = "SELECT * FROM `jediblog` WHERE `jedi_author` LIKE '%$searchedtxt%' OR `jedi_post_title` LIKE '%$searchedtxt%' OR `jedi_post_category` LIKE '%$searchedtxt%'";
                $result = $dbconnection->query($querySQL);
                //dynamic display of data
                if ($result->num_rows > 0) {
                    $idnum = 1;
                    ?>
                    <h2 class="posted-content fw-light ">Search results</h2>
                    <?php

                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <hr>
                        <section id="result<?php echo $idnum++; ?> " class="space-above-below">
                            <h4 class="fw-light"><?php echo $row["jedi_post_title"] ?></h4>
                            <h5 class="fw-light"><?php echo "Posted by " . $row["jedi_author"] . " on " . $row["jedi_post_date"] ?></h4>
                            <p class="text-muted"><?php echo substr($row['jedi_post_content'], 0, 200) ?> </p>
                            <?php
                            //postID to generate detailed content
                            $postID = $row['jedi_post_id'];
                            ?>
                                <a href="post.php?post_id=<?php echo $postID ?>" role="button" class="viewButton">View</a>
                                <?php
                                //Cong's follow addition code
                                if (strpos($followList,",".$row["jedi_author"].",") !== false) {
                                    echo "<a href=\"#\" class=\"text-success\" role=\"button\" class=\"viewButton\">Following</a>";
                                } else {
                                    echo "<a href=\"?addFollow=${row["jedi_author"]}\" role=\"button\" class=\"viewButton\">Follow</a>";
                                }
                                //Cong's end
                                ?>



                        </section>
                        <?php
                    }


                    //display back button when display exceeds vh
                    if($idnum>3){
                    ?>
                    <br><br>
                    <a href="#" role="button" class="viewButton color">Back to top</a>
                    <br><br>
                    <?php
                    }

                }
                //if search result not found
                else {
                    ?>
                    <hr>
                    <?php
                    echo "Sorry, no blogs available for your search. Try searching with another keyword.";
                }
            }
            ?>
            <!--Modification from Assignment 2 ends here.-->
        </section>

    </div>

</main>

<?php
//closing databse connection
if (isset($dbconnection)) {
    $dbconnection->close();
}
require_once "includes/footer.php";
?>