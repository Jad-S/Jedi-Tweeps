

<?php

//this code is written by Raham
//this code doesnt work because the querry wasnt working

//here Im putting the search key word inside a variable called $search

//    $querySQL = "SELECT * FROM `jediblog` WHERE jedi_author LIKE 'follower_list' FROM `jedi_login` ";
//$querySQL = "SELECT * FROM 'follow' RIGHT JOIN 'jediblog' ON $_SESSION['followArray'] = 'jediblog'.'jedi_author' WHERE 'follow'.'username' = $_SESSION['juname'];
$name = $_SESSION['juname'];

$name = $_SESSION['juname'];

$querySQL = "SELECT * FROM `jediblog` WHERE `jedi_author` LIKE '%$searchedtxt%' OR `jedi_post_title` LIKE '%$searchedtxt%' OR `jedi_post_category` LIKE '%$searchedtxt%'";
// here Im putting the stuff of $querySQL inside $result and then create arrays for each thing inside the data base then add then element of $row inside each array
$result = $dbconnection->query($querySQL);
$jedi_post_title = array();
$jedi_author = array();
$jedi_post_content = array();
$jedi_post_id = array();
$jedi_post_date = array();
$jedi_post_category = array();

// this line of code "->num_rows > 0": I leart it from somewhere else, (not in class) But I cannot remember where it was!
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $jedi_post_id[] = $row['jedi_post_id'];
        $jedi_post_title[] = $row['jedi_post_title'];
        $jedi_author[] = $row['jedi_author'];
        $jedi_post_content[] = $row['jedi_post_content'];
        $jedi_post_date[] = $row['jedi_post_date'];
        $jedi_post_category[] = $row['jedi_post_category'];
    }
}
// for the dinamic id="result*" Im creating $j=1 then add one to it each time something is created and added to array word.
$j = 1;

for ($i = 0; $i < count($jedi_post_id); $i++) {
    // take from https://www.php.net/manual/en/function.substr.php for limiting characters
    //access march 15,2021
    $jedi_post_content_limit = substr($jedi_post_content[$i], 0, 199);

    $word[] = <<<END
<section id="result$j" class="space-above-below">
		<h4 class="fw-light">I am $jedi_author[$i]</h4>
		<h6 class="fw-light">Posted by $jedi_author[$i] on $jedi_post_date[$i]</h6>
		<p class="text-muted">$jedi_post_content_limit</p>
		<a href="post.php" role="button" class="btn btn-primary" onclick="return checkfunction(this)">More details &raquo;</a>
	</section>
END;
    $j++;
}

?>
	<section class="space-above-below">
					<h2 class="fw-light">follower Blogs</h2>
					<hr>

					<?php
// here Im echoing the word array
for ($i = 0; $i < count($jedi_post_id); $i++) {

    echo $word[$i];
}
?>
				</section>
