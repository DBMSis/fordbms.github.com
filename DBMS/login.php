<?php
//<meta http-equiv="content-type" content="text/html"; charset="utf-8">
//用户登录并建立cookie
include("connect.php");//连接数据库
$Button = $_POST["Button1"];
if($Button == "登录")
{
  $user_ID = $_POST["user_ID"];//用户输入的用户名
  $user_passwd = $_POST["user_passwd"];//密码
  $RadioButton = $_POST["RadioButton"];//选择的角色按钮

  if(empty($user_ID))
  {
    echo "<script>alert('用户名不可为空！');history.back();</script>";
    exit();
  }
  if(empty($user_passwd))
  {
    echo "<script>alert('密码不可为空！');history.back();</script>";
    exit();
  }
  if($RadioButton == '学生')
  {
	  //判断此账号是否为学生账号
	  $sql = "select * from $Student where student_ID='$user_ID'";
    $query = mysqli_query($DB,$sql) or die (mysqli_error($DB));
	$num1 = mysqli_num_rows($query);
	if($num1==0){
		echo "<script>alert('无此学生记录！');history.back();</script>";
    	exit();
		}
	
    $sql = "select * from $User where user_ID='$user_ID' and user_passwd='$user_passwd'";
    $query = mysqli_query($DB,$sql) or die (mysqli_error($DB));
    $num = mysqli_num_rows($query);
    if( $num != 0)
    {
      $expire = 60*60*24*1 +time();//当前时间+24小时
      setcookie("cookie_student_passwd","$user_passwd",$expire,"/");//设置cookie的名称、值、有效期、服务器路径
      setcookie("cookie_student_ID","$user_ID",$expire,"/");
      $sql = "select student_name from $Student where student_ID='$user_ID'";
      $query = mysqli_query($DB,$sql);
      $row = mysqli_fetch_array($query);
      $student_name = $row['student_name'];
      echo"<p align=\"center\"><b><big>$student_name 学生登录成功！</big></b></p>";
      echo"<html><meta http-equiv=\"refresh\" content=\"0; url=student/system.php\"></html>";
    }
    else
    {
      echo "<script>alert('学生帐号或密码错误，请检查！');history.back();</script>";
      exit();
    }
  }

  if($RadioButton == '教师')
  {
	  //判断此账号是否为学生账号
	  $sql = "select * from $Teacher where teacher_ID='$user_ID'";
    $query = mysqli_query($DB,$sql) or die (mysqli_error($DB));
	$num1 = mysqli_num_rows($query);
	if($num1==0){
		echo "<script>alert('无此教师记录！');history.back();</script>";
    	exit();
		}
		
    $sql = "select * from $User where user_ID='$user_ID' and user_passwd='$user_passwd'";
    $query = mysqli_query($DB,$sql) or die (mysqli_error($DB));;
    $num = mysqli_num_rows($query);
    if( $num != 0)
    {
      $expire = 60*60*24*1 +time();
      setcookie("cookie_teacher_passwd","$user_passwd",$expire,"/");
      setcookie("cookie_teacher_ID","$user_ID",$expire,"/");
      $sql = "select Teacher_name from $Teacher where Teacher_ID='$user_ID'";
      $query = mysqli_query($DB,$sql);
      $row = mysqli_fetch_array($query);
      $Teacher_name = $row['Teacher_name'];
      echo"<p align=\"center\"><b><big>$Teacher_name 教师登录成功！</big></b></p>";
      echo"<html><meta http-equiv=\"refresh\" content=\"0; url=teacher/system.php\"></html>";
    }
    else
    {
      echo "<script>alert('教师帐号或密码错误，请检查！');history.back();</script>";
      exit();
    }
  }

  if($RadioButton == '管理员')
  {
    $sql = "select * from $Admin where Admin_ID='$user_ID' and Admin_passwd='$user_passwd'";
    $query = mysqli_query($DB,$sql) or die (mysqli_error($DB));;
    $num = mysqli_num_rows($query);
    if( $num != 0)
    {
      $expire = 60*60*24*1 +time();
      setcookie("cookie_admin_passwd","$user_passwd",$expire,"/");
      setcookie("cookie_admin_ID","$user_ID",$expire,"/");
      $sql = "select Teacher_name from $Teacher where Teacher_ID='$user_ID'";
      $query = mysqli_query($DB,$sql);
      $row = mysqli_fetch_array($query);
      $Admin_name = $row['Teacher_name'];
      echo"<p align=\"center\"><b><big>$Admin_name 管理员登录成功！</big></b></p>";
      echo"<html><meta http-equiv=\"refresh\" content=\"0; url=admin/system.php\"></html>";
    }
    else
    {
      echo "<script>alert('管理员帐号或密码错误，请检查！');history.back();</script>";
      exit();
    }
  }
}
?>
