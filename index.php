<!DOCTYPE html>

<style>
    html{
        color: #eaeced;
        font-family: Helvetica;
    }
    body{
        background-color: #006c7a;
    }
    .noborder{
      border:none;
    }
      
    h4{
        padding: 0px;
        margin: 0px;
    }
    #form-descript{
        padding: 0px;
        margin: 0px;
    }
    #form-block {
        width:50%; 
        margin:auto;
    }
    #form-inner {
      display:inline-block;
      width:45%;
      text-align:center;
    }
    #centerer {
        text-align:center;
        align:center;
    }
</style>

<html>
 <head>
 </head>
 <body>
 <h1 id="centerer">MVC DB App</h1>

 <h2 id="centerer">Care to edit a value? You may edit a row from either the parent or child array, or delete a row</h2>

 <div id="form-block">
  <div id="form-inner">
        <form action="editparent.php" method="post">
            <h4>Edit A Parent Row</h4>
            Parent Id: <input type="text" name="parent_id"><br>
            Desired String: <input type="text" name="parent_str"><br>
            <button type="submit" value="Submit">Edit Parent</button>
        </form>
  </div>
        <div id="form-inner">
            <form action="deleteparent.php" method="post">
                <h4>Delete a parent</h4>
                <h5 id="form-descript">(Warning, also deletes all children)</h5>
                Parent Id: <input type="text" name="parent_id"><br>
                <button type="submit" value="Submit">Delete Parent</button>
            </form>
        </div>
 </div>
 
 <br />
 
 <div id="form-block">
    <div id="form-inner">
        <form action="editchild.php" method="post">
        <h4>Edit A Child Row</h4>
        <h5 id="form-descript">You can either change the child's stored string, change its parent, or both</h5>
        Child Id: <input type="text" name="child_id"><br>
        New Parent Id:  <input type="text" name="new_parent_id"><br>
        Desired String: <input type="text" name="child_str"><br>
        <button type="submit" value="Submit">Edit Child</button>
        </form>
    </div>
    <div id="form-inner">
        <h4>Delete a child</h4>
        <form action="deletechild.php" method="post">
        Child Id: <input type="text" name="child_id"><br>
        <button type="submit" value="Submit">Delete Child</button>
        </form>
    </div>
 </div>
 
 <br />
 
 <?php
    $servername = "rds-mysql-4job.cph0mepwrt4r.us-east-2.rds.amazonaws.com";
    $username = "SQLadmin";
    $password = "aws_4job";
    $db_name = "thor_db";

    $db = mysqli_connect($servername,$username,$password,$db_name)
    or die('Error connecting to MySQL server.');
    
    $query = "SELECT * FROM parent";
    $db;
    mysqli_query($db, $query) or die('Error querying database.');

    $result = mysqli_query($db, $query);

     echo '<table border="1" cellpadding="4" align="center">';
     echo "<tr><th>Parent ID</th><th>Parent String</th><th>Child Id</th><th>Child String</th></tr>";
    while ($row = mysqli_fetch_array($result)) {
     echo "<tr>";
     echo "<td>" . $row['id'] . "</td><td>" . $row['parent_str'] .  "</td>";
     echo "<tr>";
     $query2 = "SELECT * FROM child WHERE parent_id = " . $row['id'];
     $result2 = mysqli_query($db, $query2);
     while ($row2 = mysqli_fetch_array($result2)) {
         echo "<tr>";
         echo "<td>". $row2['parent_id'] . "</td><td></td><td>" . $row2['id'] . "</td><td>" . $row2['child_str'] . "</td>";
         echo "</tr>";
     }
     echo '<td class = "noborder"> </td>';
    }
    echo "</table>";
 ?>

</body>
</html>

?>