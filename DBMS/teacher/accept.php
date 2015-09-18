<?php
include("teacher_test.php");
include("connect.php");
include("sys_header.php");
?>

<html>
<head>
<meta http-equiv="content-type" content="text/html" charset="utf-8">
<link href="style.css" rel="stylesheet" type="text/css">
<title>数据库课程设计管理系统</title>
</head>

<body bgcolor="#e3f3ff">
<table width="860" align="center" cellspacing="1" cellpadding="0" border="0" style="width:600px;margin-left: 375px;">
<tr>
<td colspan="4" class="text" align="center">
<font size="5">收件箱</font>
</td>
</tr>

<tr>
<td width="10%"><div align="center">ID</div></td>
<td width="10%"><div align="center">发件人</div></td>
<td width="15%"><div align="center">时间</div></td>
<td width="15%"><div align="center">主题</div></td>
<td width="40%"><div align="center">内容</div></td>
<td width="10%"><div align="right" align="center">删除</div></td>

<?php
$n = 1;

$to = isset($_COOKIE['cookie_user_ID'])?$_COOKIE['cookie_user_ID']:'';
$sql_one = "select count(*) as num from $Message where M_to='$to'";
$query_one = mysqli_query($DB,$sql_one);
$row_one = mysqli_fetch_array($query_one);
$count = $row_one['num'];

$pages = ceil($count/$PAGE_NUM);
if(isset($_GET['page']))
{
  $page = intval($_GET['page']);
}
else
{
  $page = 1;
}
$offset = $PAGE_NUM*($page - 1);
$sql = "select*from $Message where M_to='$to' order by M_time desc limit $offset,$PAGE_NUM";
$query = mysqli_query($DB,$sql) or die ('连接错误！');

while($row = mysqli_fetch_array($query))
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
  <td width="10%"><div class="title" style="margin-top:10px;" align="center" ><?php echo "".$row['M_ID'].""; ?></div></td>
  <td width="10%"><div class="title"><?php echo "".$row['M_from'].""; ?></div></td>
  <td width="15%"><div class="title" align="center"><?php echo "".$row['M_time'].""; ?></div></td>
    <td width="15%"><div class="title" align="center"><?php echo "".$row['M_subject'].""; ?></div></td>
  <td width="40%"><div class="title" align="center"><?php echo "".$row['M_content'].""; ?></div></td>
  <td width="10%"><div align="right" class="title"><?php echo "<a href=accept_del.php?M_ID=".$row['M_ID']."><font color=\"#bc0000\" size=\"3\">删除</font></a>"; ?></div></td>
</tr>
<?php
  $n++;
}
?>
</table>

<br>
<table width="860" border="0" cellspacing="0" cellpadding="0" align="center" style="width:600px;margin-left: 375px;">
<tbody>
<tr>
<td width="159">
<font color="#FF0000"><?php echo "目前共有".$count."条记录"?></font>
</td>
<td width="205"><?php echo"共有".$pages."页";?></td>

<?php
$first = 1;
$prev = $page - 1;
$next = $page + 1;
$last = $pages;

if($page > 1)
{
?>
<td width="132">
<?php
  echo "<a href='accept.php?page=".$first."'>首页</a>";
?>
</td>
<td width="132">
<?php
  echo "<a href='accept.php?page=".$prev."'>上一页</a>";
?>
</td>
<?php
}
if($page < $pages)
{
?>
<td width="132">
<?php
  echo "<a href='accept.php?page=".$next."'>下一页</a>";
?>
</td>
<td width="132">
<?php
  echo "<a href='accept.php?page=".$last."'>尾页</a>";
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
<?php include("foot.php");?>
