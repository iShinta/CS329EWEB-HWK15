<!DOCTYPE html>

<?php
  function begin(){
    //not in a session
    if(!isset($_COOKIE["id"])){
      session_start();

      if($_SERVER['REQUEST_METHOD'] === 'POST'){
        print("It's a POST");
        //Check credentials
        if(isset($_POST["username"])){
          $username = $_POST["username"];
          $password = $_POST["password"];

          $fh = fopen("./dbase/passwd", "r");
          //Check if username is already taken
          $userlist = Array();
          while(!feof($fh)){
            //Read Line
            $line = fgets($fh);
            $line_pieces = explode(":", $line);
            $userlist[$line_pieces[0]] = $line_pieces[1];
          }
          fclose($fh);

          //Check if name is authorized
          if(array_key_exists($username, $userlist) && strcmp($userlist[$username], $password)){
            echo "Login Succeeded. Welcome ".$username. ".<br />";
            setcookie("id", $username, time()+900);
            setcookie("timeloggedin", time(), time()+900);
          }else{
            echo "Login Failed.<br />Bad username or password";
            echo "<br />You entered username: ".$username;
            echo "<br />and Password: ".$password;
            echo "<br /><a href=\"index.php\"> Back to the homepage </a>";
          }
        }

        //Check Menu choice
        if(isset($_POST["action"])){
          $choice = $_POST["action"];
          print($choice);

          if($choice == "insert"){

          }else if($choice == "update"){

          }else if($choice == "delete"){

          }else if($choice == "view"){
            showTable();
          }else if($choice == "logout"){

          }
        }
      }else{ //GET
        logIn();
      }
    }
    //not logged in - Show sign in
    else{
      showMenu();
    }
  }

  function connect(){
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
  }

  function showTable(){
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

  function showMenu(){
    ?>
    <form method="post" action="#">
      <input type="radio" name="action" value="insert" checked> Insert Student Record<br />
      <input type="radio" name="action" value="update"> Update Student Record<br />
      <input type="radio" name="action" value="delete">Delete Student Record<br />
      <input type="radio" name="action" value="view">View Student Record<br />
      <input type="radio" name="action" value="logout">Logout<br />
      <input type="submit" name="submit" value="Choose this one" />
    </form>
    <?php
  }

  function logIn(){
    ?>
    <form method="post" action="#">
      <table style="border: double 1px;">
        <tr>
          <td>
            Username
          </td>
          <td>
            <input type="text" name="username" />
          </td>
        </tr>
        <tr>
          <td>
            Password
          </td>
          <td>
            <input type="text" name="password" />
          </td>
        </tr>
        <tr>
          <td>
            <input type="submit" name="submit" value="Log In"/>
          </td>
          <td>
            <input type="reset" name="reset" value="Reset" />
          </td>
        </tr>
      </table>
    </form>
    <?php
  }
?>


<html>
<head>
</head>

<body>
  <?php begin(); ?>
</body>
</html>
