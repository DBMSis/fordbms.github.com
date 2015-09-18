<?php 
//学生功能
include("connect.php");
include("sys_header.php");
include("teacher_test.php");//检查老师是否登陆
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


<body>
<table width="860" border="1px" cellspacing="0" cellpadding="0" align="center" style="margin-left: 255px;">
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
<div align="center" class="text">选题状态</div>
</td>
</tr>

<?php
$n=1;
$teacher_ID = $_COOKIE['cookie_teacher_ID'];
$sql = "select count(*) as num from $Subject where teacher_ID='$teacher_ID'";
$query = mysqli_query($DB,$sql) or die ("连接错误！!!!!!!!!!!!!!!!!!");
$row = mysqli_fetch_array($query);
$count = $row['num'];

if(empty($offset))
{
  $offset = 0;
}

$pages = ceil($count/$PAGE_NUM);
if( isset($_GET['page']))
{
  $page = intval($_GET['page']);
}
else
{
  $page = 1;
}

$offset = $PAGE_NUM*($page - 1);
$sql = "select * from $Subject where teacher_ID='$teacher_ID' order by teacher_ID desc limit $offset,$PAGE_NUM";
$query = mysqli_query($DB,$sql) or die("连接错误！~~~~~~~~~~~~~~");

while($row=mysqli_fetch_array($query))
{
?>
<tr></tr>
<td width="3%" height="15">
<div align="center" style="margin-top:10px;"><?php echo "".$n."";?></div>
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
  echo "<font color=\"#bc0000\" size=\"4\">未选</font>"; 
  }
?>
</div>
</td>
<br>
<?php
  $n++;
}
?>
</table>

<table width="860" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-left:375px;margin-top:10px;">
<tbody>
<tr>
<td width="200"><font color="#ff0000"><?php echo"目前共有".$count."条记录."?></font></td>
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
</body>
</html>

<br>
<br>
<?php include("foot.php")?>
