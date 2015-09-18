<?php 
//学生功能
include("connect.php");
include("sys_header.php");
include("student_test.php");//检查学生是否登陆
include("sign.php");
?>
<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="author" content="ThemeFuse">
<meta name="keywords" content="">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>数据库课程设计管理系统</title>

<!-- main JS libs -->
<script src="js/libs/modernizr.min.js"></script>
<script src="js/libs/jquery-1.10.0.js"></script>
<script src="js/libs/jquery-ui.min.js"></script>
<script src="js/libs/bootstrap.min.js"></script>

<!-- Style CSS -->
<link href="css/bootstrap.css" media="screen" rel="stylesheet">
<link href="style.css" media="screen" rel="stylesheet">

<!-- scripts -->
<script src="js/general.js"></script>
<!-- styled select -->
<link rel="stylesheet" href="css/cusel.css">
<script src="js/cusel-min.js"></script>
<!-- custom input -->
<script src="js/jquery.customInput.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<!-- Placeholders -->
<script type="text/javascript" src="js/jquery.powerful-placeholder.min.js"></script>
<!-- Progress Bars -->
<script src="js/progressbar.js"></script>
</head>


<body bgcolor="#e3f3ff">
<table width="860" border="1px" border-color="#FFFF99" cellspacing="0" cellpadding="0" align="center" style="margin-left: 255px;">
<tr>
<div align="center" class="text"><font size="4">课题列表</font></div>
</tr>

<tr>
<td width="50">
<div align="center" class="text">序号</div>
</td>

<td width="70">
<div align="center" class="text">课题编号</div>
</td>

<td width="200">
<div align="center">课题名称</div>
</td>

<td width="70">
<div align="center" class="text">导师编号</div>
</td>

<td width="70">
<div align="center" class="text">导师姓名</div>
</td>

<td width="70">
<div align="center" class="text">职称</div>
</td>


<td width="70">
<div align="center" class="text">请选题</div>
</td>
</tr>

<?php
$n=1;
$sql = "select count(*) as num from $Subject where audit='通过'";//计算已经编辑通过的课题的数量
$query = mysqli_query($DB,$sql) or die ("连接错误！!!!!!!!!!!!!!!!!!");
$row = mysqli_fetch_array($query);
$count = $row['num'];
/*echo "<script>alert('$count');</script>";*/
if(empty($offset))
{
  $offset = 0;
}

$pages = ceil($count/$PAGE_NUM);//ceil返回大于或者等于指定表达式的最小整数,记录的条数/每一页最多条
if( isset($_GET['page']))//用于收集来自 method="get" 的表单中的值。
{
  $page = intval($_GET['page']);//变量转成整数类型
}
else
{
  $page = 1;
}

$offset = $PAGE_NUM*($page - 1);
$sql = "select * from $Subject where audit='通过' order by teacher_ID desc limit $offset,$PAGE_NUM";//将所有通过的课题按教师ID降序排列，选取第offset到第PAGE_NUM条数据
//$sql = "select * order by teacher_ID desc limit $offset,$PAGE_NUM";
$query = mysqli_query($DB,$sql) or die("连接错误！~~~~~~~~~~~~~~");

while($row=mysqli_fetch_array($query))
{
	if(($n%2)!=0)//使两行之间颜色不同
  {
?>
<tr>
<?php
  }
  else
  {
?>
    <tr>
<?php
  }
  $teacher_ID = $row['teacher_ID'];
  $sql_three = "select major from $Teacher where teacher_ID='$teacher_ID'";
  $query_three = mysqli_query($DB,$sql_three);
  $row_three = mysqli_fetch_array($query_three);

  $student_ID = $_COOKIE['cookie_student_ID'];
  $sql_four = "select major from $Student where student_ID='$student_ID'";
  $query_four = mysqli_query($DB,$sql_four);
  $row_four = mysqli_fetch_array($query_four);

  if($row_three['major']==$row_four['major'])
  {
?>
<td width="3%" height="15">
<div align="center" class="text" style="margin-top:10px;"><?php echo "".$n.""; ?></div>
</td>

<td width="3%" height="15">
<div align="center" class="text"><?php echo "".$row['subject_ID']."";?></div>
</td>

<td width="15%" height="15">
<div align="center" class="text"><?php echo "".$row['subject_title']."";?></div>
</td>

<td width="3%" height="15">
<div align="center" class="text"><?php echo "".$row['teacher_ID']."";?></div>
</td>

<?php
  $teacher_ID = $row['teacher_ID'];
  $sql_one = "select teacher_name,degree from $Teacher where teacher_ID='$teacher_ID'";
  $query_one = mysqli_query($DB,$sql_one) or die('连接错误..........！');
  $row_one = mysqli_fetch_array($query_one);
?>

<td width="5%" height="15">
<div align="center" class="text"><?php echo "".$row_one['teacher_name']."";?></div>
</td>

<td width="5%" height="15">
<div align="center" class="text"><?php echo "".$row_one['degree']."";?></div>
</td>

<td width="4%" height="15">
<div align="center" class="text">
<?php
  $status = $row['status'];
  if($status == '已选')
  {
    echo "<font color=\"#c8b8b8\">".$status."</font>";
  }
  else
  {
  echo "<a href=subject.php?subject_ID=".$row['subject_ID']."&student_ID=".$_COOKIE['cookie_student_ID']."><font color=\"#bc0000\" size=\"4\">未选</font></a>"; 
  }
?>
</div>
</td>

<?php
  $n++;
  }
}
?>
</table>
<br>
<table width="860" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-left: 255px;">
<tbody>
<tr>
<td width="200"><font color="#ff0000"><?php $n--;echo"目前共有".$n."条记录."?></font></td>
<td width="200"><?php echo"共".$pages."页";?></td>

<?php
$first = 1;
$prev = $page - 1;
$next = $page + 1;
$last = $pages;

if($page > 1)
{
?>
<td width="140">
<?php
  echo "<a href='system.php:page=".$first."'>首页</a>";
?>
</td>
<td width="140">
<?php
  echo "<a href='system.php:page=".$prev."'>上一页</a>";
?>
</td> 

<?php
}

if( $page < $pages)
{
?>
<td width="140">
<?php
  echo "<a href='system.php:page=".$next."'>下一页</a>";
?>
</td>
<td width="140">
<?php
  echo "<a href='system.php:page=".$last."'>尾页</a>";
?>
</td>
<?php
}
?>
</tr>
</tbody>
</table>

<?php
$student_ID = $_COOKIE['cookie_student_ID'];
$sql = "select * from $Subject where student_ID='$student_ID'";
$query = mysqli_query($DB,$sql);
$count = mysqli_num_rows($query);
if($count != 0)
{
?>
<br>
<hr width="860">
<table width="860" border="0" align="center" cellspacing="1" cellpadding="0" bgcolor="#000000" style="margin-left:250px;">
<tr>
<td >
<div align="center" class="text">课题编号</div>
</td>

<td>
<div align="center" class="text">课题名称</div>
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

<td>
<div align="center" class="text">课题改选</div>
</td>
</tr>

<?php

$sql = "select * from $Subject where student_ID='$student_ID'";
$query = mysqli_query($DB,$sql);
$row_one = mysqli_fetch_array($query);

$teacher_ID = $row_one['teacher_ID'];
$sql = "select teacher_name from $Teacher where teacher_ID='$teacher_ID'";
$query = mysqli_query($DB,$sql);
$row_two = mysqli_fetch_array($query);

$student_ID = $row_one['student_ID'];
$sql = "select student_name from $Student where student_ID='$student_ID'";
$query = mysqli_query($DB,$sql);
$row_three = mysqli_fetch_array($query);
?>
<tr class="text">
<td width="5%" align="center"><div style="margin-top:10px;"><?php echo "".$row_one['subject_ID']."";?></div></td>
<td width="15%" align="center"><?php echo "".$row_one['subject_title']."";?></td>
<td width="3%" align="center"><?php echo "".$row_one['teacher_ID']."";?></td>
<td width="5%" align="center"><?php echo "".$row_two['teacher_name']."";?></td>
<td width="3%" align="center"><?php echo "".$row_one['student_ID']."";?></td>
<td width="5%" align="center"><?php echo "".$row_three['student_name']."";?></td>
<td width="5%" align="center"><?php echo "".$row_one['status']."";?></td>
<td width="5%" align="center"><?php echo "<a href=subject_modify.php?subject_ID=".$row_one['subject_ID']."><font color=\"#bc0000\" size=\"4\">删除</a>";?></td>
</tr>

<?php
}?>
</table>
<?php 
$student_ID=isset($_COOKIE['cookie_student_ID'])?$_COOKIE['cookie_student_ID']:'';
//sign表中存储学生号student_ID、签到标志signal(null,1)
$sign = isset($_POST['sign'])?$_POST['sign']:'';
if($sign=='签到'){
	$sql = "insert into $Sign (student_ID,sign) values ('$student_ID','1')";
    $query = mysqli_query($DB,$sql);
    if($query)
    {
      echo "<script>alert ('签到成功！');location.href='system.php';</script>";
      exit();
    }
  else
  {
    echo "<script>alert ('签到失败！');location.href='system.php';</script>";
    exit();
  }
	}
?>
</body>
</html>
<br>
<br>
<?php include("foot.php")?>
