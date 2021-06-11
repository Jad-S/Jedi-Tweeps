<!--This code implements login with some modification from my submission for Assignment 3 in CSCI 2170 (Winter 2021).

Nafiz U. Mazumder, Assignment 3: CSCI 2170 (Winter 2021), Faculty of Computer Science,
Date accessed: April 5, 2021
-->

<?php

session_start();
require_once "db.php";

if (!empty($_POST['jedi-uname']) && !empty($_POST['jedi-pswd'])) {
    //Getting values submitted from the login form
    //data sanitization
    $jUname = trim(stripcslashes(htmlspecialchars($_POST['jedi-uname'])));
    $jUpswd = trim(stripcslashes(htmlspecialchars($_POST['jedi-pswd'])));

    //matching login info
    $query1 = "SELECT * FROM jedilogin WHERE jedi_username='$jUname' AND jedi_password='$jUpswd'";
    $result1 = $dbconnection->query($query1);
    $row = $result1->fetch_assoc();
    $jn = $row["jedi_firstname"] . " " . $row["jedi_lastname"];

    //if login info match
    if ($result1->num_rows > 0) {
        //regenerating session is
        session_regenerate_id();
        //storing session variables
        $_SESSION['loggedin'] = 1;
        $_SESSION['juname'] = $jUname;
        $_SESSION['jupswd'] = $jUpswd;
        $_SESSION['jname'] = $jn;
        header("Location: ../jedi-tweeps.php");
    }
    //if login info dont match then redirect
    else {
        header("Location: ../index.php?loginerror=1");
    }
}
