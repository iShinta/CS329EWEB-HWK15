<!DOCTYPE html>

<?php
function start() {
  showTable();
}

function showTable() {
  $servername = "fall-2016.cs.utexas.edu";
  $username = "minhtri";
  $password = "EGmf5_qbe1";
  $dbname = "cs329e_minhtri";
  $port = "3306";

  $connect = mysqli_connect ($servername, $username, $password, $dbname);

  if (empty($connect))
  {
    die("mysqli_connect failed: " . mysqli_connect_error());
  }

  print "Connected to ". mysqli_get_host_info($connect) . "<br /><br />\n";
  ?>
  <?php
  mysqli_close($connect);
?>


<html>
<head>
<title> INSERT INTO TABLE </title>
</head>
<body>
<h3> INSERT INTO TABLE </h3>
<?php start(); ?>

</body>
</html>
