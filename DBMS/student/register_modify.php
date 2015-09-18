<?php
error_reporting(0); 
include("sys_header.php");
include("connect.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
<link href="style.css" rel="stylesheet" type="text/css">
<title>数据库课程设计管理系统</title>
</head>

<body bgcolor="#e3f3ff">
<div style="width:700px;margin-left: 375px;">
<table align="center" width="600" height="10" cellspacing="0">
                    <tr height="10" width="100%">
                        <td align="center">
                            <font size="4"><b>注册信息修改</b></font>
                        </td>
                    </tr>
                </table>
<br>
<br>

<form name="myform" method="post" action="register_modify.php">
                    <div style="width:800px;">
                        <label class="label_title" style="width:90px; margin-left:20px;" >密码提示问题:</label>
                        <input type="text" name="question" class="inputtext input_middle required" style="width:500px; margin-top:-30px;margin-left:110px;" />
                    </div>
                    <br>
                    <div style="width:800px;">
                        <label class="label_title" style="width:90px; margin-left:20px;" >密码提示回答:</label>
                        <input type="text" name="answer" class="inputtext input_middle required" style="width:500px; margin-top:-30px;margin-left:110px;" />
                    </div>
                    <br>
                    <div style="width:800px;">
                        <label class="label_title" style="width:100px; margin-left:50px;" >电子邮箱:</label>
                        <input type="text" name="email" class="inputtext input_middle required" style="width:500px; margin-top:-30px;margin-left:110px;" />
                    </div>
                    <br>
                    <div style="width:800px;">
                        <label class="label_title" style="width:100px; margin-left:50px;" >手机号码:</label>
                        <input type="text" name="tel_num" class="inputtext input_middle required" style="width:500px; margin-top:-30px;margin-left:110px;" />
                    </div>
                    <br>
                    <div style="width:800px;">
                        <label class="label_title" style="width:100px; margin-left:50px;" >联系地址:</label>
                        <input type="text" name="address" class="inputtext input_middle required" style="width:500px; margin-top:-30px;margin-left:110px;" />
                    </div>
<div align="center" style="margin-left:550px;margin-top:10px; width:20px;">
                        <span class="btn btn-small">
                            <input type="submit" name="modify" onclick=checkuser(this.form)  value="修改">
                        </span>
                    </div>
                    <br>
<div style="margin-left:200px; width:600px;"><font color="#FF0000">*请选择任一项或多项进行修改</font></div>
</form>
</div>
</body>
</html>
<br>
<?php
$tmp=$_COOKIE['cookie_student_ID'];//获取用户名

$question = isset($_POST['question'])?$_POST['question']:'';
$answer = isset($_POST['answer'])?$_POST['answer']:'';
$email = isset($_POST['email'])?$_POST['email']:'';
$tel_num = isset($_POST['tel_num'])?$_POST['tel_num']:'';
$address = isset($_POST['address'])?$_POST['address']:'';
$modify = isset($_POST['modify'])?$_POST['modify']:'';

if($modify == "修改")
{
  if(empty($question)&&empty($answer)&&empty($tel_num)&&empty($address)&&empty($email))
  {
    echo "<script>alert ('请选择任一项或多项进行修改！');location.href='register_modify.php';</script>";
    exit;
  }
  else
  {
    if($question)
    {
      $sql = "update $User set question='$question' where user_ID='$tmp'";
      $query = mysqli_query($DB,$sql);
    }

    if($answer)
    {
      $sql = "update $User set answer='$answer' where user_ID='$tmp'";
      $query = mysqli_query($DB,$sql);
    }
	$pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
    if($email)
    {
      if(!preg_match( $pattern,$email))//与正则表达式函数库eregi功能相同:字符串比对解析，与大小写无关。
      {
       echo "<script>alert ('E-mail格式不对！');location.href='register_modify.php';</script>"; 
       exit;
      }
      else
      {
        $sql = "update $User set email='$email' where user_ID='$tmp'";
        $query = mysqli_query($DB,$sql);
      }
    }

    if($tel_num)
    {
      if(strlen($tel_num)=='11')
      {
      $sql = "update $User set tel_num='$tel_num' where user_ID='$tmp'";
      $query = mysqli_query($DB,$sql);
      }
	  else{
	  echo "<script>alert ('手机号码格式不对！');location.href='register_modify.php';</script>"; 
       exit;
	  }
    }

    if($address)
    {
      $sql = "update $User set address='$address' where user_ID='$tmp'";
      $query = mysqli_query($DB,$sql);
    }

    if($query){
		echo "<script>alert ('修改成功！');</script>";
  	  }
    else{
		echo "<script>alert ('修改失败！');</script>";
	  }
  }
}

?>
</body>
</html>

<br>
<?php include("foot.php")?>

