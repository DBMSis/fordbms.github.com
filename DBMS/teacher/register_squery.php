<?php
//注册信息查询
include("connect.php");
include("teacher_test.php");
?>
<br>
<br>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="style.css" type="text/css">

<?php
$student_ID = $_POST["student_ID"];

if(isset($_POST['query']))
{
  if(empty($student_ID))
  {
    echo "<script>alert ('请输入要查询的学号！');location.href='student_query.php';</script>";
    exit;
  }
  
  if(strlen($student_ID)!=8)
  {
    echo "<script>alert ('输入有误，请检查！');location.href='student_query.php';</script>";
    exit;
  }

  $sql = "select * from $User where user_ID=$student_ID";
  $query = mysqli_query($DB,$sql);
  $count = mysqli_num_rows($query);
  if($count == 0)
  {
    echo "<script>alert ('无此相关记录，请检查！');location.href='student_query.php';</script>";
    exit;
  }
?>

<table width="870" height="20" border="0" align="center" cellspacing="5" cellpadding="0" bgcolor="#000000" style="margin-top: 80px;margin-left:250px;"line-height:24px;">
<tr>
<td width="5%">
<div align="center" class="text">学号</div>
</td>

<td width="3%">
<div align="center" class="text">性别</div>
</td>

<td width="10%">
<div align="center" class="text">E-mail</div>
</td>

<td >
<div align="center" class="text">手机号码</div>
</td>

<td >
<div align="center" class="text">学院</div>
</td>

<td >
<div align="center" class="text">专业</div>
</td>

<td>
<div align="center" class="text">等级</div>
</td>

<td>
<div align="center" class="text">地址</div>
</td>

<td>
<div align="center" class="text">密码问题</div>
</td>

<td>
<div align="center" class="text">密码答案</div>
</td>
</tr>
<?php
}
$sql = "select * from $User where user_ID='$student_ID'";
$query = mysqli_query($DB,$sql);
$row = mysqli_fetch_array($query);
?>
  <tr>
  <td width="5%" align="center"><?php echo"".$row['user_ID']."";?></td>
  <td width="5%" align="center"><?php echo"".$row['sex']."";?></td>
  <td width="10%" align="center"><?php echo"".$row['email']."";?></td>
  <td width="5%" align="center"><?php echo"".$row['tel_num']."";?></td>
  <td width="10%" align="center"><?php echo"".$row['college']."";?></td>
  <td width="10%" align="center"><?php echo"".$row['major']."";?></td>
  <td width="5%" align="center"><?php echo"".$row['degree']."";?></td>
  <td width="10%" align="center"><?php echo"".$row['address']."";?></td>
  <td width="10%" align="center"><?php echo"".$row['question']."";?></td>
  <td width="10%" align="center"><?php echo"".$row['answer']."";?></td>
</tr>
</table>

<?php
?>
