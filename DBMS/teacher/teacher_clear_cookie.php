<?php
//教师用户注销
include("connect.php");
include("teacher_test.php");
setcookie("cookie_teacher_ID","");
echo "<script>alert ('教师用户成功注销！');</script>";
echo "<html><meta http-equiv=\"refresh\" content=\"0; url=http://localhost:8787/DBMS/\"></html>";
?>
