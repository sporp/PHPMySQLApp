<?php
    $servername = "rds-mysql-4job.cph0mepwrt4r.us-east-2.rds.amazonaws.com";
    $username = "SQLadmin";
    $password = "aws_4job";
    $db_name = "thor_db";

    $db = mysqli_connect($servername,$username,$password,$db_name)
    or die('Error connecting to MySQL server.');
    
    function printDBcontent(){
        $query = "SELECT * FROM parent";
        global $db;
        mysqli_query($db, $query) or die('Error querying database.');

        $result = mysqli_query($db, $query);

        echo "<table border='1' cellpadding='12'>";
        echo "<tr><th>Parent</th><th>Child</th><th>Child</th><th>Child</th><th>Child</th></tr>";
        while ($row = mysqli_fetch_array($result)) {
         echo "<tr>";
         echo "<td>" . $row['id'] . ' ' . $row['parent_str'] . "</td>";
         $query2 = "SELECT * FROM child WHERE parent_id = " . $row['id'];
         $result2 = mysqli_query($db, $query2);
         while ($row2 = mysqli_fetch_array($result2)) {
             echo "<td>" . $row2['parent_id'] . ' ' . $row2['id'] . ' ' . $row2['child_str'] . "</td>";
         }
         echo "<tr>";
        }
    }
?>
