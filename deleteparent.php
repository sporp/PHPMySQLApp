<?php
$p_id=$_POST['parent_id'];

$servername = "rds-mysql-4job.cph0mepwrt4r.us-east-2.rds.amazonaws.com";
$username = "SQLadmin";
$password = "aws_4job";
$db_name = "thor_db";

$db = mysqli_connect($servername,$username,$password,$db_name)
or die('Error connecting to MySQL server.');

$query = "DELETE FROM child WHERE parent_id = '$p_id'";
mysqli_query($db, $query) or die('Error querying database.');
$query2 = "DELETE FROM parent WHERE id = '$p_id'";
mysqli_query($db, $query2) or die('Error querying database.');
header('Location:index.php');
?>