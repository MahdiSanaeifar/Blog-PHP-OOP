<?php

$servername = 'localhost';
$username = 'domain';
$password = 'q6gfC%52';
$dbname = "domain";
$conn = mysqli_connect($servername, $username, $password, "$dbname");
if (!$conn) {
    die('Could not Connect MySql Server:');
}
$query = "SELECT * FROM `users` WHERE (`idcode` = {$_REQUEST['req']})";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($user = mysqli_fetch_array($result)) {
            //echo $user['id'] . "<br/>";
			echo "<p class='badge bg-danger'>کدملی قبلا ثبت شده است!</p>";
        }
    } else {
			echo "<p class='badge bg-success'>کدملی صحیح</p>";
	}							
