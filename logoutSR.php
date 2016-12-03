<?php
setcookie("id", $username, time()-3600);
setcookie("timeloggedin", time(), time()-3600);
destroySession();
?>
<a href=\"index.php\"> You have been logged out. Back to the homepage </a>
