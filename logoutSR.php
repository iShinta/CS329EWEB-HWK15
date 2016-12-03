<?php
setcookie("id", $username, time()-3600);
setcookie("timeloggedin", time(), time()-3600);
destroySession();
?>
