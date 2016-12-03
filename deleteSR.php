<!DOCTYPE html>

<?php
function start() {
  showTable();
  $host = "fall-2016.cs.utexas.edu";
  $user = "minhtri";
  $pwd = "EGmf5_qbe1";
  $dbs = "cs329e_minhtri";
  $port = "3306";

  $connect = mysqli_connect ($host, $user, $pwd, $dbs, $port);

  if (empty($connect))
  {
    die("mysqli_connect failed: " . mysqli_connect_error());
  }

  print "Connected to ". mysqli_get_host_info($connect) . "<br /><br />\n";

  $table = "hwk15_students";


  // $result = mysqli_query($connect, "SELECT * from $table");
  // while ($row = $result->fetch_row())
  // {
  //   print "LastName = " . $row[0] . " FirstName = " . $row[1].
  // 	" Major = " . $row[2] . " Birthday = " . $row[3] . "<br /><br />\n";
  // }
  //
  // $result->free();

  $id = $_POST["ID"];
  $last = $_POST["LAST"];
  $first = $_POST["FIRST"];
  $major = $_POST["MAJOR"];
  $gpa = $_POST["GPA"];

  if ($id != "") {

    mysqli_query($connect, "DELETE FROM $table WHERE id= $id");
    echo("deleted\n\n");

    // $result = mysqli_query($connect, "SELECT * from $table");
    // while ($row = $result->fetch_row())
    // {
    //   print "LastName = " . $row[0] . " FirstName = " . $row[1].
    // 	" Major = " . $row[2] . " Birthday = " . $row[3] . "<br /><br />\n";
    // }
    //
    // $result->free();

    ?><a href="index.php"> Back to the homepage </a><?php

  }
  if($last != "" && $first != "") {
    echo("empty field(s)");
  }
}

function showTable() {?>
  <form method="post">
  <table border="0">
  <tr><td>ID</td>
  <td><input type="text" name="ID" /></td>
  </tr>
  <tr><td><input type="submit" name="submit" value="Delete"/></td>
  <td><input type="reset" name="reset" value="Reset" /></td>
  </tr>
  </table>
  </form>
<?php
}
// Close connection to the database
mysqli_close($connect);
?>


<html>
<head>
<title> DELETE </title>
</head>
<body>
<h3> DELETE </h3>
<?php start(); ?>

</body>
</html>
