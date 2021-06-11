<!--This code implements process-blogs with some modification from my submission for Assignment 3 in CSCI 2170 (Winter 2021).

Raham Moghaddam, Assignment 3: CSCI 2170 (Winter 2021), Faculty of Computer Science,
Date accessed: April 5, 2021
-->

<?php
session_start();
//Processing the submitted blog post here.
require_once "db.php";
if (!empty($_POST['blog-title']) && !empty($_POST['blog-category']) && !empty($_POST['blog-content'])) {
    //Getting values submitted from the form
    //data sanitization
    $title = trim(stripcslashes(htmlspecialchars($_POST['blog-title'])));
    $category = trim(stripcslashes(htmlspecialchars($_POST['blog-category'])));
    $content = trim(stripcslashes(htmlspecialchars($_POST['blog-content'])));
    //current date var
    $date = date("Y-m-d");
    $jn = $_SESSION['jname'];

    //sql query to insert blog data in the db
    $query3 = "INSERT INTO `jediblog` (`jedi_author`,`jedi_post_date`,`jedi_post_category`,`jedi_post_title`,`jedi_post_content`)
		VALUES ('$jn', '$date','$category','$title','$content')";
    $result3 = $dbconnection->query($query3);

    //redirecting after successful submittion
    header("Location: ../jedi-tweeps.php?post-success=1");
}