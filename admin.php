<?php
include_once 'databaseCon.php';
$ref      = @$_GET['q'];
$username = $_POST['uname'];
$password = $_POST['password'];

$username = stripslashes($username);
$username = addslashes($username);
$password = stripslashes($password);
$password = addslashes($password);

$result = mysqli_query($con, "SELECT * FROM Admin WHERE adminid = '$username' and password = '$password'") or die('Error');
// echo mysqli_num_rows($result);

$count = mysqli_num_rows($result);

if ($count == 1) {
    session_start();
    // echo $username;
    if (isset($_SESSION['adminid'])) {
        session_unset();
    }
    $_SESSION["name"]     = 'Admin';
    $_SESSION["key"]      = '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39';
    $_SESSION["username"] = $username;
    header("location:dash.php?q=0");
} else
    header("location:$ref?w=Warning : Access denied");
?>