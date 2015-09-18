<?php
//学生信息资料查询
include("connect.php");
include("student_test.php");
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
  
  if(strlen($student_ID)!=12)
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

<table width="870" border="0" align="center" cellspacing="1" cellpadding="0" bgcolor="#000000" style="margin-top: 80px;margin-left:250px;">
<tr>
<td width="5%">
<div align="center" class="text" >学号</div>
</td>

<td width="3%">
<div align="center" class="text">姓名</div>
</td>

<td width="10%">
<div align="center" class="text">性别</div>
</td>

<td>
<div align="center" class="text">学院</div>
</td>

<td>
<div align="center" class="text">专业</div>
</td>

<td>
<div align="center" class="text">班级</div>
</td>

</tr>
<?php
}
$sql = "select * from $Student where student_ID='$student_ID'";
$query = mysqli_query($DB,$sql);
$row = mysqli_fetch_array($query);
?>
  <tr class="text">
  <td width="5%" align="center" ><div style="margin-top:10px;"><?php echo"".$row['student_ID']."";?></div></td>
  <td width="5%" align="center"><?php echo"".$row['student_name']."";?></td>
  <td width="5%" align="center"><?php echo"".$row['sex']."";?></td>
  <td width="20%" align="center"><?php echo"".$row['college']."";?></td>
  <td width="20%" align="center"><?php echo"".$row['major']."";?></td>
  <td width="10%" align="center"><?php echo"".$row['class']."";?></td>
</tr>
</table>

<?php include("foot.php");?>
