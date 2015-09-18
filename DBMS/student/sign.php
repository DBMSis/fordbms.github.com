<?php 
error_reporting(0);
include("connect.php");
include("student_test.php");//检查学生是否登陆
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
<meta charset="utf-8">
<title>数据库课程设计管理系统</title>
</head>

<body>
<form name="myform2" method="post" action="system.php">
<!--点击签到后，在签到表中记录签到时间-->
<div class="rowSubmit" style="position:absolute;left:1200px;top:40px">
    <span class="btn"><input type="submit" name="sign" value="签到" /></span>
</div>
</form>

</body>
</html>