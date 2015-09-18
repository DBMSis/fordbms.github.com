<?php
//管理员用户注销
include("connect.php");
include("admin_test.php");
setcookie("cookie_admin_ID","");
echo "<script>alert ('管理员成功注销！');</script>";
echo "<html><meta http-equiv=\"refresh\" content=\"0; url=http://localhost:8787/DBMS/\"></html>";
?>
