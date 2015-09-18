<?php 
//error_reporting(0);
//成绩评定
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
<table width="1000" border="1px" cellspacing="0" cellpadding="0" align="center" style="margin-left: 150px;">
<tr>
<div style="width:1000px;margin-left: 220px;"><font size="4">成绩列表&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;系统30分&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;文档30分&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;考勤10分</font></div>
</tr>

<tr>
<td width="100">
<div align="center" style="margin-top: 20px;width: 60px;">学生号</div>
</td>
<td width="80">
<div align="center" style="width: 60px;">姓名</div>
</td>
<td width="200px">
<div align="center" style="width: 200px;">课题名称</div>
</td>
<td width="70">
<div align="center" style="width: 60px;">功能<br>（15分）</div>
</td>

<td width="70">
<div align="center" style="width: 60px;">健壮性<br>（10分）</div>
</td>

<td width="70">
<div align="center" style="width: 80px;">易用性<br>（5分）</div>
</td>
<td width="70">
<div align="center" style="width: 80px;">数据库逻辑设计<br>（15分）</div>
</td>

<td width="70">
<div align="center" style="width: 80px;">定义及系统分析<br>（10分）</div>
</td>
<td width="70">
<div align="center" style="width: 80px;">物理设计<br>（5分）</div>
</td>
<td width="70">
<div align="center" style="width: 80px;">实验考勤</div>
</td>
<td width="70">
<div align="center" style="width: 80px;">课堂考勤</div>
</td>
<td width="90">
<div align="center" style="width: 90px;"><font size="3">课堂报告<br>（30分）</font></div>
</td>
<td width="70">
<div align="center" style="width: 60px;"><font size="4">总分</font></div>
</td>
</tr>

<?php
$teacher_ID = isset($_COOKIE['cookie_teacher_ID'])?$_COOKIE['cookie_teacher_ID']:'';
$sql = "select count(*) as num from $Subject where teacher_ID='$teacher_ID' and student_ID is not null and mark is null";
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
$sql = "select * from $Subject where teacher_ID='$teacher_ID' and student_ID is not null and mark is null order by student_ID asc limit $offset,$PAGE_NUM";
$query = mysqli_query($DB,$sql) or die("连接错误！~~~~~~~~~~~~~~");

while($row=mysqli_fetch_array($query))
{
  $student_ID=$row['student_ID'];
?>
<tr></tr>
<td width="3%" height="15">
<div align="center" style="margin-top:10px;"><?php echo "".$student_ID."";?></div><!--学生号-->
</td>
<?php
  $sql_one = "select student_name from $Student where student_ID='$student_ID'";
  $query_one = mysqli_query($DB,$sql_one) or die('连接错误..........！');
  $row_one = mysqli_fetch_array($query_one);
?>
<td width="3%" height="15">
<div align="center" style="margin-top:10px;"><?php echo "".$row_one['student_name']."";?></div><!--学生名-->
</td>

<td width="15%" height="15">
<div align="center" class="text"><?php echo "".$row['subject_title']."";?></div><!--课题名-->
</td>
<!--输入成绩-->
<form name="myform1" method="post" action="mark.php">
<div class="rowSubmit" style="margin-left:1200px;">
    <span class="btn btn-send"><input type="submit" name="ok" value="确认" /></span>
</div>
<td width="5%" height="15">
<div style="margin-top:-8px;margin-left:10px;">
<select name="func">
  <option>0</option>
  <option>1</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
  <option>6</option>
  <option>7</option>
  <option>8</option>
  <option>9</option>
  <option>10</option>
  <option>11</option>
  <option>12</option>
  <option>13</option>
  <option>14</option>
  <option>15</option>
</select>
</div><!--功能-->
</td>
<td width="5%" height="15">
<div style="margin-top:-8px;margin-left:10px;">
<select name="robustness">
  <option>0</option>
  <option>1</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
  <option>6</option>
  <option>7</option>
  <option>8</option>
  <option>9</option>
  <option>10</option>
</select>
</div><!--健壮性-->
</td>
<td width="5%" height="15">
<div style="margin-top:-8px;margin-left:20px;">
<select name="usability">
  <option>0</option>
  <option>1</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
</select>
</div><!--易用性-->
</td>
<td width="5%" height="15">
<div style="margin-top:-8px;margin-left:20px;">
<select name="logic">
  <option>0</option>
  <option>1</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
  <option>6</option>
  <option>7</option>
  <option>8</option>
  <option>9</option>
  <option>10</option>
  <option>11</option>
  <option>12</option>
  <option>13</option>
  <option>14</option>
  <option>15</option>
</select>
</div><!--逻辑设计-->
</td>
<td width="5%" height="15">
<div style="margin-top:-8px;margin-left:20px;">
<select name="need">
  <option>0</option>
  <option>1</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
  <option>6</option>
  <option>7</option>
  <option>8</option>
  <option>9</option>
  <option>10</option>
</select>
</div><!--需求分析-->
</td>
<td width="5%" height="15">
<div style="margin-top:-8px;margin-left:20px;">
<select name="physic">
  <option>0</option>
  <option>1</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
</select>
</div><!--物理设计-->
</td>
<td width="5%" height="15">
<div style="margin-top:-8px;margin-left:20px;">
<select name="experiment">
  <option>0</option>
  <option>1</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
  <option>6</option>
  <option>7</option>
  <option>8</option>
  <option>9</option>
  <option>10</option>
</select>
</div><!--实验考勤-->
</td>
<td width="5%" height="15">
<div style="margin-top:-8px;margin-left:20px;">
<select name="class">
  <option>0</option>
  <option>1</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
  <option>6</option>
  <option>7</option>
  <option>8</option>
  <option>9</option>
  <option>10</option>
</select>
</div><!--课堂考勤-->
</td>
<td width="5%" height="15">
<div  style="margin-top:-8px;margin-left:20px;">
<select name="report">
  <option>0</option>
  <option>1</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
  <option>6</option>
  <option>7</option>
  <option>8</option>
  <option>9</option>
  <option>10</option>
  <option>11</option>
  <option>12</option>
  <option>13</option>
  <option>14</option>
  <option>15</option>
  <option>16</option>
  <option>17</option>
  <option>18</option>
  <option>19</option>
  <option>20</option>
  <option>21</option>
  <option>22</option>
  <option>23</option>
  <option>24</option>
  <option>25</option>
  <option>26</option>
  <option>27</option>
  <option>28</option>
  <option>29</option>
  <option>30</option>
</select>
</div><!--课堂报告-->
</td>
</form>

<?php //获取所有属性
$func=isset($_POST['func'])?$_POST['func']:'';
$robustness=isset($_POST['robustness'])?$_POST['robustness']:'';
$usability=isset($_POST['usability'])?$_POST['usability']:'';
$logic=isset($_POST['logic'])?$_POST['logic']:'';
$need=isset($_POST['need'])?$_POST['need']:'';
$physic=isset($_POST['physic'])?$_POST['physic']:'';
$experiment=isset($_POST['experiment'])?$_POST['experiment']:'';
$class=isset($_POST['class'])?$_POST['class']:'';
$report=isset($_POST['report'])?$_POST['report']:'';
?>


<?php 
$ok = isset($_POST['ok'])?$_POST['ok']:'';
while($ok == ''){}//当点击确认后跳出while循环
if($ok == '确认'){
	if(empty($func)||empty($robustness)||empty($usability)||empty($logic)||empty($need)||empty($physic)||empty($experiment)||empty($class)||empty($report))
  {
    echo "<script>alert('存在未打分的项目，请检查！');location.href='mark.php';</script>";
    exit();
  }
   //计算总分
	$score=$func+$robustness+$usability+$logic+$need+$physic+$experiment+$class+$report;
  //发送消息，并输出是否发送成功信息  
    $sql = "insert into $Mark (user_ID,function,robustness,usability,logic,need,physic,experiment,class,report,score) values ('$student_ID','$func','$robustness','$usability','$logic','$need','$physic','$experiment','$class','$report','$score')";
    $query = mysqli_query($DB,$sql);
    if($query)
    {
      echo "<script>alert ('成功！');</script>";
	  //将Subject表中的mark项标记为1
	  $sql = "update $Subject set mark=1 where student_ID='$student_ID'";
   	  $query = mysqli_query($DB,$sql);	 
?>
<td width="5%" height="15">
<div  style="margin-top:5px;margin-left:20px;">
<?php echo "".$score."" ?>
</div>
</td>
<?php
      $ok='';
	  echo "<script>location.href='mark.php';</script>";
    }
  else
  {
    echo "<script>alert ('失败！');</script>";
    $ok='';
	exit();
  }
	}?>
	<br>
    <?php
	}
?>
</table>


<table width="860" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-left:175px;margin-top:20px;">
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
