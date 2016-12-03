<!DOCTYPE html>

<?php
  $servername = "fall-2016.cs.utexas.edu";
  $username = "minhtri";
  $password = "EGmf5_qbe1";
  $dbname = "cs329e_minhtri";
  $port = "3306";

  function connect(){
    $connect = mysqli_connect ($servername, $username, $password, $dbname);

    if (empty($connect))
    {
      die("mysqli_connect failed: " . mysqli_connect_error());
    }

    print "Connected to ". mysqli_get_host_info($connect) . "<br /><br />\n";
  }

  function showTable(){
    connect();
    ?>
    <table>
      <tr>
        <th>
          ID
        </th>
        <th>
          Last
        </th>
        <th>
          First
        </th>
        <th>
          Major
        </th>
        <th>
          GPA
        </th>
      </tr>
    <?php
    //Get data from table
    $table = "hwk15_students";
    $result = mysqli_query($connect, "SELECT * FROM $table");

    while($row = $result->fetch_row()){
      ?>
      <tr>
        <td>
          <?php echo $row[0]; ?>
        </td>
        <td>
          <?php echo $row[1]; ?>
        </td>
        <td>
          <?php echo $row[2]; ?>
        </td>
        <td>
          <?php echo $row[3]; ?>
        </td>
        <td>
          <?php echo $row[4]; ?>
        </td>
      </tr>
      <?php
    }
    $result->free();
    ?>
    </table>
    <?php
  }
?>


<html>
<head>
</head>

<body>
  <?php showTable(); ?>
</body>
</html>
