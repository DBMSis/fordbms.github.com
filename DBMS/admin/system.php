<?php
//管理员功能
include("connect.php");
include("sys_header.php");
include("admin_test.php");
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
</html>

<body>
<table width="860" border="1" cellspacing="0" cellpadding="0" align="center" style="margin-left:250px;">
<tr>
<div align="center" class="text"><font size="4">课题审核</font></div>
</tr>

<tr>
<td width="50">
<div align="center" style="margin-top:10px;">序号</div>
</td>

<td width="70">
<div align="center" class="text">课题编号</div>
</td>

<td width="200">
<div align="center" class="text">课题名称</div>
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
<div align="center" class="text">审核</div>
</td>
</tr>

<?php
$n=1;
$sql = "select count(*) as num from $Subject where audit='审核'";
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
//$teacher_ID = $_COOKIE['cookie_user_ID'];
$sql = "select * from $Subject where audit='审核' order by teacher_ID desc limit $offset,$PAGE_NUM";
$query = mysqli_query($DB,$sql) or die("连接错误！~~~~~~~~~~~~~~");

while($row=mysqli_fetch_array($query))
{
  if(($n%2)!=0)
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

?>
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
  $audit = $row['audit'];
  if($audit == '审核')
  {
  echo "<a href=audit.php?subject_ID=".$row['subject_ID']."><font color=\"#bc0000\" size=\"4\">通过</font></a>"; 
  }
?>
</div>
</td>

<?php
  $n++;
}
?>
</table>

<table width="860" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-left:270px;margin-top:10px;">
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
