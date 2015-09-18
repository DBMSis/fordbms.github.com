<?php
include("connect.php");
include("admin_test.php");
include("sys_header.php");
?>
<br>

<html>
<head>
<meta http-equiv="content-type" content="html/text; charset=utf-8">
<link ref="stylesheet" href="style.css" type="text/css">
<title>数据库课程设计管理系统</title>
</head>

<body>
<div style="width:600px;margin-left: 375px;">
<form name="myform" action="passwd_modify.php" method="post">
<table align="center" width="600" height="10" cellspacing="0">
                    <tr height="10" width="100%">
                        <td align="center">
                            <font size="4"><b>密码修改</b></font>
                        </td>
                    </tr>
                </table>
<br>
<br>
<div style="width:800px;">
                        <label class="label_title" style="width:90px; margin-left:180px;" >用户名:</label>
                        <label class="label_title" style="width:90px; margin-left:240px;margin-top:-20px;" >
<?php
$tmp=$_COOKIE['cookie_admin_ID'];
 echo "".$tmp."";
 ?>
 </label>
                    </div>
                    <br>
                    <div style="width:800px;">
                       <label class="label_title" style="width:90px; margin-left:180px;" >旧密码:</label>
                        <input type="password" name="user_passwd" class="inputtext input_middle required" style="width:250px; margin-top:-30px;margin-left:240px;" />
                    </div>
                    <br>
<div style="width:800px;">
                       <label class="label_title" style="width:90px; margin-left:180px;" >新密码:</label>
                        <input type="password" name="passwd" class="inputtext input_middle required" style="width:250px; margin-top:-30px;margin-left:240px;" />
                    </div>
                    <br>
<div style="width:800px;">
                       <label class="label_title" style="width:90px; margin-left:160px;" >确认新密码:</label>
                        <input type="password" name="again_passwd" class="inputtext input_middle required" style="width:250px; margin-top:-30px;margin-left:240px;" />
                    </div>
                    <br>
<div align="center" style="margin-left:450px;margin-top:10px; width:20px;">
                        <span class="btn btn-small">
                            <input type="submit" name="modify" value="确定">
                        </span>
                    </div>
</form>
</table>
</div>
</body>
</html>

<?php
$user_passwd = isset($_POST['user_passwd'])?$_POST['user_passwd']:'';//旧密码
$passwd = isset($_POST['passwd'])?$_POST['passwd']:'';//新密码
$again_passwd = isset($_POST['again_passwd'])?$_POST['again_passwd']:'';//再次输入
$modify = isset($_POST['modify'])?$_POST['modify']:'';
if($modify == "确定")
{
  if(empty($user_passwd)&&empty($passwd)&&empty($again_passwd))
  {
    echo "<script>alert ('请修改！');location.href='passwd_modify.php';</script>";
    exit;
  }
  else{
    $sql = "select Admin_passwd from $Admin where Admin_ID='$tmp'";
    $query = mysqli_query($DB,$sql);
    $row = mysqli_fetch_array($query);
	
    if($passwd != $again_passwd)
    {
      echo "<script>alert ('新密码输入不一致，请检查！');</script>";
      exit;
    }
    if($user_passwd != $row['Admin_passwd'])
    {
      echo "<script>alert ('旧密码错误，请检查！');</script>";
      exit;
    }
      $sql = "update $Admin set Admin_passwd='$passwd' where Admin_ID='$tmp'";
      $query = mysqli_query($DB,$sql);
      if($query)
      {
        echo "<script>alert ('密码修改成功！');</script>";
        exit();
      }
    }
}
?>


<br>
<br>
<?php include("foot.php") ?>
