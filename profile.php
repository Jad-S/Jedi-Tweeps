<?php
	/*
	* CSCI 2170: ONLINE EDITION, WINTER 2021
	* STARTER CODE FOR ASSIGNMENT 3
	* 
	* This code was developed by Dr. Raghav V. Sampangi (raghav@cs.dal.ca)
	*
	* User profile page
	*/

	require_once "includes/header.php";
	require_once "includes/db.php";

	// access control
	if (!isset($_SESSION['juname'])) {
		header("Location:index.php?noaccess=1");
		die();
	}
?>
<?php
    $followList = substr($_SESSION['follow'], 1, -1);
    $followerList = substr($_SESSION['follower'], 1, -1);
	
?>
<main id="pg-main-content">
    <div class="container">


        <section class="space-above-below">
		<div class= "posted-content">
				<h2 class="posted-content fw-light ">Jedi Profile:  <?php echo $_SESSION['jname']; ?></h2>
				<hr>
				</div>
		</section>	
			<?php //profile info generated here ?>	
				<p>Username: <?php echo $_SESSION['juname']; ?></p>		
				<p>Jedi you follow:  <?php echo $followList;?>
				<?php
				if(empty($followList)){
					echo "You don't follow anyone.";
				}
				?>
				</p>
				<p>Jedi who follow you: <?php echo $followerList;?>
				<?php
				if(empty($followerList)){
					echo "No one follows you yet.";
				}
				?>
				</p>		
				<div>
				<h2 class="posted-content fw-light ">Tweeps by you</h2>
<?php
				//query for search result by author name
                $querySQLr = "SELECT * FROM `jediblog` WHERE `jedi_author` LIKE '{$_SESSION['jname']}'";
                $resultr = $dbconnection->query($querySQLr);
                //dynamic display of data
                if ($resultr->num_rows > 0) {
                    $idnum = 1;
                    while ($row = $resultr->fetch_assoc()) {
                        ?>
                        <hr>
                        <section id="result<?php echo $idnum++; ?> " class="space-above-below">
                            <h4 class="fw-light"><?php echo $row["jedi_post_title"] ?></h4>
                            <?php
                            //postID to generate detailed content
                            $postID = $row['jedi_post_id'];
                            ?>
                                <a href="post.php?post_id=<?php echo $postID ?>" role="button" class="viewButton">View</a>
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
                    echo "You haven't posted any tweeps. Make your very first tweep now.";
                }
?>

				</div>
		</main>

<?php
	require_once "includes/footer.php";
?>