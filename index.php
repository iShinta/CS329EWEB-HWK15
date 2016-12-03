<!DOCTYPE html>

<html>
<head>
</head>

<body>
  <?php
    $servername = "fall-2016.cs.utexas.edu";
    $username = "minhtri";
    $password = "EGmf5_qbe1";
    $dbname = "cs329e_minhtri";
    $port = "3306";

    $connect = mysqli_connect ($host, $user, $pwd, $dbs);

    if (empty($connect))
    {
      die("mysqli_connect failed: " . mysqli_connect_error());
    }

    print "Connected to ". mysqli_get_host_info($connect) . "<br /><br />\n";
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

  </table>
</body>
</html>
