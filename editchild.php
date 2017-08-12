<?php
$c_id=$_POST['child_id'];
$c_str=$_POST['child_str'];
$new_p_id=$_POST['new_parent_id'];

echo $c_id;
echo $c_str;
echo $og_p_id;
echo $new_p_id;

$servername = "rds-mysql-4job.cph0mepwrt4r.us-east-2.rds.amazonaws.com";
$username = "SQLadmin";
$password = "aws_4job";
$db_name = "thor_db";

$db = mysqli_connect($servername,$username,$password,$db_name)
or die('Error connecting to MySQL server.');

if(empty($new_p_id)){ //if no new parent is given, try to change stringe
    echo "here";
    $query = "UPDATE child SET child_str = '$c_str' WHERE id = '$c_id'";
    mysqli_query($db, $query) or die('Error querying database.');
}else if(empty($c_str)){ //if no new string is given, try to change parent 
    $query = "UPDATE child SET parent_id = '$new_p_id' WHERE id = '$c_id'";
    mysqli_query($db, $query) or die('Error querying database.');
}else{ //else try to do both
    $query = "UPDATE child SET child_str = '$c_str', parent_id = '$new_p_id' WHERE id = '$c_id'";
    mysqli_query($db, $query) or die('Error querying database.');
}

header('Location:index.php');
?>