<?php
//学生信息查询
include("connect.php");
include("sys_header.php");
include("student_test.php");
$student_ID=$_COOKIE['cookie_student_ID'];
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="style.css" type="text/css">
<title>数据库课程设计管理系统</title>
</head>

<body>
<div style="width:1200px;height:100px;margin-left: 375px;">
<table align="center" width="600" height="10" cellspacing="0">
                    <tr height="10" width="100%">
                        <td align="center" class="text">
                            <font size="4"><b>学生信息查询</b></font>
                        </td>
                    </tr>
                </table>
<br>
<br>
        
    <div style="width:600px;">
      <label class="label_title" style="width:300px; margin-left:-80px;" ><font size="3">用户名:
	  <?php echo "".$student_ID."";?></font>
      </label>
	</div>
    <div style="width:600px;">
      <label class="label_title" style="width:300px;margin-top:10px;margin-left:-80px;" ><font size="3"  color="#CC0000">学生信息:</font>
      </label>
	</div>
<table width="800" border="0" align="center" cellspacing="1" cellpadding="0" style="margin-left:-80px;">
<tr>
<td width="10%">
<div align="center" class="text" >学号</div>
</td>

<td width="5%">
<div align="center" class="text">姓名</div>
</td>

<td width="10%">
<div align="center" class="text">性别</div>
</td>

<td width="20%">
<div align="center">学院</div>
</td>

<td width="20%">
<div align="center">专业</div>
</td>

<td>
<div align="center">班级</div>
</td>

</tr>
</div>
<?php
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

<div style="width:600px;">
      <label class="label_title" style="width:300px;margin-top:10px;margin-left:-80px;" ><font size="3"  color="#CC0000">注册信息:</font>
      </label>
</div>
<table width="800" border="0" align="center" cellspacing="1" cellpadding="0" style="margin-left:-70px;">
<tr>
<td width="5%">
<div align="center">学号</div>
</td>

<td width="3%">
<div align="center">性别</div>
</td>

<td width="10%">
<div align="center">E-mail</div>
</td>

<td>
<div align="center">手机号码</div>
</td>

<td>
<div align="center">学院</div>
</td>

<td>
<div align="center">专业</div>
</td>

<td>
<div align="center">等级</div>
</td>

<td>
<div align="center">地址</div>
</td>
</tr>
<?php
$sql = "select * from $User where user_ID='$student_ID'";
$query = mysqli_query($DB,$sql);
$row = mysqli_fetch_array($query);
?>
  <tr>
  <td width="5%" align="center"><div style="margin-top:10px;"><?php echo"".$row['user_ID']."";?></div></td>
  <td width="5%" align="center"><?php echo"".$row['sex']."";?></td>
  <td width="10%" align="center"><?php echo"".$row['email']."";?></td>
  <td width="5%" align="center"><?php echo"".$row['tel_num']."";?></td>
  <td width="10%" align="center"><?php echo"".$row['college']."";?></td>
  <td width="10%" align="center"><?php echo"".$row['major']."";?></td>
  <td width="5%" align="center"><?php echo"".$row['degree']."";?></td>
  <td width="10%" align="center"><?php echo"".$row['address']."";?></td>
</tr>
</table>
<div style="width:600px;">
      <label class="label_title" style="width:300px;margin-top:10px;margin-left:-80px;" ><font size="3"  color="#CC0000">选题信息:</font>
      </label>
</div>
<table width="750" border="0" align="center" cellspacing="1" cellpadding="0" style="margin-left:-45px;" >
<tr>
<td>
<div align="center" class="text">课题编号</div>
</td>

<td>
<div align="center" class="text">课题题目</div>
</td>

<td>
<div align="center" class="text">导师编号</div>
</td>

<td>
<div align="center" class="text">导师姓名</div>
</td>

<td>
<div align="center" class="text">学生学号</div>
</td>

<td>
<div align="center" class="text">学生姓名</div>
</td>

<td>
<div align="center" class="text">课题状态</div>
</td>
</tr>

<?php
$sql = "select * from $Subject where student_ID='$student_ID'";
$query = mysqli_query($DB,$sql);
$row_one = mysqli_fetch_array($query);
$count_one = mysqli_num_rows($query);
  if($count_one == 0)
  {
    echo "<script>alert ('无此相关记录，请检查！');</script>";
    exit;
  }
$teacher_ID = $row_one['teacher_ID'];
$sql = "select teacher_name from $Teacher where teacher_ID='$teacher_ID'";
$query = mysqli_query($DB,$sql);
$row_two = mysqli_fetch_array($query);

$student_ID = $row_one['student_ID'];
$sql = "select student_name from $Student where student_ID='$student_ID'";
$query = mysqli_query($DB,$sql);
$row_three = mysqli_fetch_array($query);
?>
  <tr>
  <td width="5%" align="center"><div style="margin-top:10px;"><?php echo"".$row_one['subject_ID']."";?></div></td>
  <td width="15%" align="center"><?php echo"".$row_one['subject_title']."";?></td>
  <td width="5%" align="center"><?php echo"".$row_one['teacher_ID']."";?></td>
  <td width="5%" align="center"><?php echo"".$row_two['teacher_name']."";?></td>
  <td width="5%" align="center"><?php echo"".$row_one['student_ID']."";?></td>
  <td width="5%" align="center"><?php echo"".$row_three['student_name']."";?></td>
  <td width="5%" align="center"><?php echo"".$row_one['status']."";?></td>
</tr>
</table>

     </div>   
</body>
</html>
<br>
<br>
<?php include("foot.php");?>
