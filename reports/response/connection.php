<?php
/* Database connection start */
$servername = "localhost";
$username = "chacalim_inv";
$password = "4eT;v0qN%rvC";
$dbname = "chacalim_inv_sales";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>