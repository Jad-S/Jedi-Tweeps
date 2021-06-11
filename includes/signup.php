
<?php
//this code was written by Raham Moghaddam
session_start();
require_once "db.php";

if (!empty($_POST['jedi-uname']) && !empty($_POST['jedi-pswd'])) {
    //Getting values submitted from the login form
    //data sanitization
    $jUname = trim(stripcslashes(htmlspecialchars($_POST['jedi-uname'])));
    $jUpswd = trim(stripcslashes(htmlspecialchars($_POST['jedi-pswd'])));
    
    
    
    $querySQL12 = "INSERT into jedilogin (jedi_id, jedi_username, jedi_password, jedi_firstname, jedi_lastname) VALUES (NULL, '$jUname', '$jUpswd',NULL,NULL)";
    echo $dbconnection->error;

    $result12 = $dbconnection->query($querySQL12);
    //matching login info
    // $query1 = "SELECT * FROM jedilogin WHERE jedi_username='$jUname' AND jedi_password='$jUpswd'";
    // $result1 = $dbconnection->query($query1);
    // $row = $result1->fetch_assoc();
    // $jn = $row["jedi_firstname"] . " " . $row["jedi_lastname"];

    //if login info match
//     if ($result1->num_rows > 0) {
//         //regenerating session is
//         session_regenerate_id();
//         //storing session variables
//         $_SESSION['loggedin'] = 1;
//         $_SESSION['juname'] = $jUname;
//         $_SESSION['jupswd'] = $jUpswd;
//         $_SESSION['jname'] = $jn;
//         header("Location: ../jedi-tweeps.php");
//     }
//     //if login info dont match then redirect
//     else {
//         header("Location: ../index.php?loginerror=1");
//     }
 }
