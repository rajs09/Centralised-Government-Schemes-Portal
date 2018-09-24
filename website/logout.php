<?php
session_start();
session_destroy();
setcookie('user_id',$user_id,time()-1);
echo "You have successfully logged out!"."<br>";
echo "Click here to <a href='login.html'>login again.</a>";
?>
