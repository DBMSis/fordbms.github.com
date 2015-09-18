<?php
//学生用户注销
include("connect.php");
include("student_test.php");
setcookie("cookie_student_ID","");
setcookie("cookie_filename","");
setcookie("cookie_filepath","");
echo "<script>alert ('学生用户成功注销！');</script>";
echo "<html><meta http-equiv=\"refresh\" content=\"0; url=http://localhost:8787/DBMS/\"></html>";
?>
