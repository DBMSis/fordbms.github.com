<?php
/*
大体思想：注册用户必须是本校学生或者老师，因此数据库中预先应有所有学生与老师的信息，学生注册时填写的信息需要与Student表和Teacher表中的内容进行比较从而确保注册人员都为本校师生。
*/
include("connect.php");
//将注册信息写入数据库
$register = $_POST['register'];
if($register == "注册")
{
$user_ID = $_POST['user_ID'];
$user_passwd = $_POST['user_passwd'];
$user_repasswd = $_POST['user_repasswd'];
$question = $_POST['question'];
$answer = $_POST['answer'];
$sex = $_POST['sex'];
$email = $_POST['email'];
$tel_num = $_POST['tel_num'];
$college = $_POST['college'];
$major = $_POST['major'];
$degree = $_POST['degree'];
$address = $_POST['address'];
//判断用户名是否合理
if(strlen($user_ID)=="12")
{//首先查询该用户ID是否为本校学生
  if($degree == '学生')
  {
  $sql = "select * from $Student where student_ID='$user_ID'";
  $count = mysqli_query($DB,$sql);
  $num = mysqli_num_rows($count);
  if($num==0)
  {
    echo "<script>alert('此用户不存在,请检查！');history.back();</script>";
    exit();
  }
  else
  {
  $sql = "select * from $Student where student_ID='$user_ID' and sex='$sex'";
  $count = mysqli_query($DB,$sql);
  $num = mysqli_num_rows($count);
  if($num==0)
  {
    echo "<script>alert('性别不符,请检查！');history.back();</script>";
    exit();
  }

  $sql = "select * from $Student where student_ID='$user_ID' and college='$college' and major='$major'";
  $count = mysqli_query($DB,$sql);
  $num = mysqli_num_rows($count);
  if($num==0)
  {
    echo "<script>alert('所在学院或所学专业不符,请检查！');history.back();</script>";
    exit();
  }
  }
}

  if($degree == '教师')
  {
  $sql = "select * from $Teacher where teacher_ID='$user_ID'";
  $count = mysqli_query($DB,$sql);
  $num = mysqli_num_rows($count);
  if($num==0)
  {
    echo "<script>alert('此用户不存在,请检查！');history.back();</script>";
    exit();
  }
  else
  {
  $sql = "select * from $Teacher where teacher_ID='$user_ID' and sex='$sex'";
  $count = mysqli_query($DB,$sql);
  $num = mysqli_num_rows($count);
  if($num==0)
  {
    echo "<script>alert('性别不符,请检查！');history.back();</script>";
    exit();
  }

  $sql = "select * from $Teacher where teacher_ID='$user_ID' and college='$college' and major='$major'";
  $count = mysqli_query($DB,$sql);
  $num = mysqli_num_rows($count);
  if($num==0)
  {
    echo "<script>alert('所在学院或专业不符,请检查！');history.back();</script>";
    exit();
  }
  }
  }
//判断用户是否已注册
  $sql = "select * from $User where user_ID='$user_ID'";
  $count = mysqli_query($DB,$sql);
  $num = mysqli_num_rows($count);
  if($num!=0)
  {
    echo "<script>alert('此用户已经注册,请检查！');history.back();</script>";
    exit();
  }
  else//保证用户ID等信息不为空
    if($user_ID!="" && $user_passwd!="" && $sex!="" && $email!="" && $tel_num!="" && $degree!="" && $address!="")
    {
      $QUERY = mysqli_query($DB,"INSERT INTO $User VALUES ('$user_ID','$user_passwd','$question','$answer','$sex','$email','$tel_num','$college','$major','$degree','$address')");

      if($QUERY)       //注意！！！！！！！！！！！！！！！
      {
		  echo "<script>alert('注册成功，请登录！');location.href='index.php';</script>";
/*
        if($degree == '学生')
        {
        $SQL = "SELECT student_name FROM $Student WHERE student_ID='$user_ID'";
        $QUERY = mysqli_query($DB,$sql);
        $row = mysqli_fetch_array($QUERY,MYSQLI_ASSOC);
        $student_name = $row["student_name"];
		echo $student_name;
        echo "<p align=\"center\"><b><big>学生: $student_name 感谢您的注册！<br><font color='red'><a href='index.php'>点此返回登录</a></font></big></b></p>";
        }
        else
        {
        $SQL = "SELECT * FROM $Teacher WHERE teacher_ID='$user_ID'";
        $QUERY = mysqli_query($DB,$sql);
        $row = mysqli_fetch_array($QUERY);
        $teacher_name = $row['teacher_name'];
        echo "<p align=\"center\"><b><big>教师：$teacher_name 感谢您的注册！<br><font color='red'><a href='index.php'>点此返回登录</a></font></big></b></p>";
        }
*/      
	  }
    }
    else
    {
       echo "<script>alert('注册失败!');history.back();</script>";
    }
}
else
{
  echo "<script>history.back();</script>";
}
}
?>
