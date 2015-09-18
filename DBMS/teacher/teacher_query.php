<?php
//导师信息查询
include("connect.php");
include("sys_header.php");
include("teacher_test.php");
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link ref="stylesheet" href="style.css" type="text/css">
</head>

<body>
<div style="width:600px;height:100px;margin-left: 300px;">
<form method="post" name="myfrorm" action="teacher_query.php">
<table align="center" width="600" height="10" cellspacing="0" style="margin-left: 90px;">
                    <tr height="10" width="100%">
                        <td align="center" class="text">
                            <font size="4"><b>导师信息查询</b></font>
                        </td>
                    </tr>
                </table>
<br>
<br>
<div style="width:600px;">
  <label class="label_title" style="width:100px; margin-left:230px;" >导师编号:</label>
 <input type="text" name="teacher_ID" class="inputtext input_middle required" style="width:200px; margin-top:-30px;margin-left:300px;" />
</div>
<br>
<div style="width:600px;">
  <label class="label_title" style="width:100px; margin-left:230px;" >导师姓名:</label>
 <input type="text" name="teacher_name" class="inputtext input_middle required" style="width:200px; margin-top:-30px;margin-left:300px;" />
</div>
<br>
<div style="width:600px;">
  <label class="label_title" style="width:100px; margin-left:230px;" >所在学院:</label>
 <input type="text" name="college" class="inputtext input_middle required" style="width:200px; margin-top:-30px;margin-left:300px;" />
</div>
<br>
<div style="width:600px;">
  <label class="label_title" style="width:100px; margin-left:230px;" >所在专业:</label>
 <input type="text" name="major" class="inputtext input_middle required" style="width:200px; margin-top:-30px;margin-left:300px;" />
</div>
<br>
<div align="center" style="margin-left:420px; width:20px;">
                        <span class="btn btn-small">
                        <input type="hidden" name="query" value="查询">
						<input type="submit" name="submit" value="查询">
                        </span>
                    </div>

<div style="margin-left:240px; width:600px;margin-top:10px;"><font color="#FF0000">*请选择以上任一种或多种条件进行查询</font></div>

</form>
</div>
<?php
$query = isset($_POST["query"])?$_POST["query"]:'';
$teacher_ID = isset($_POST["teacher_ID"])?$_POST["teacher_ID"]:'';
$teacher_name = isset($_POST["teacher_name"])?$_POST["teacher_name"]:'';
$college = isset($_POST["college"])?$_POST["college"]:'';
$major = isset($_POST["major"])?$_POST["major"]:'';

if($query)
{
  if(empty($teacher_ID)&&empty($teacher_name)&&empty($college)&&empty($major))
  {
    echo "<script>alert ('请输入查询条件！');location.href='teacher_query.php';</script>";
    exit;
  }

  $sql = "select * from $Teacher where 1=1 "; //注意此处空格！！！
  if($teacher_ID)
  {
    $sql = $sql."and teacher_ID='$teacher_ID'";
  }

  if($teacher_name)
  {
    $sql = $sql."and teacher_name='$teacher_name'";
  }

  if($college)
  {
    $sql = $sql."and college like '%$college'";
  }
  
  if($major)
  {
    $sql = $sql."and major like '%$major'";
  }

$query = mysqli_query($DB,$sql);
$count = mysqli_num_rows($query);
if(empty($count))
{
  echo "<script>alert ('无相关记录,请检查！');location.href='teacher_query.php';</script>";
  exit;
}
else{
  if(empty($offset))
  {
    $offset = 0;
  }
?>
<br>
<table width="860" border="0" cellspacing="1" cellpadding="0" align="center" style="margin-left:250px;margin-top:220px;">
<tr>
<td><div align="center">导师编号</div></td>
<td><div align="center">姓名</div></td>
<td><div align="center">性别</div></td>
<td><div align="center">职称</div></td>
<td><div align="center">E-mail</div></td>
<td><div align="center">电话</div></td>
<td><div align="center">学院</div></td>
<td><div align="center">专业</div></td>

<?php
  $n = 1;
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

  $sql_one = $sql."order by teacher_ID desc limit $offset,$PAGE_NUM";
  $query_one = mysqli_query($DB,$sql_one) or die("连接错误！");
  while($row_one = mysqli_fetch_array($query_one))
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

  <td width="5%"><div align="center" class="text" style="margin-top:10px;"><?php echo "".$row_one['teacher_ID'].""; ?></div></td>
  <td width="5%"><div align="center" class="text"><?php echo "".$row_one['teacher_name'].""; ?></div></td>
  <td width="5%"><div align="center" class="text"><?php echo "".$row_one['sex'].""; ?></div></td>
  <td width="5%"><div align="center" class="text"><?php echo "".$row_one['degree'].""; ?></div></td>

<?php
    $teacher_ID = $row_one['teacher_ID'];
    $sql_two = "select email,tel_num from $User where user_ID='$teacher_ID'";
    $query = mysqli_query($DB,$sql_two);
    $row_two = mysqli_fetch_array($query);
?>

  <td width="10%"><div align="center" class="text"><?php echo "".$row_two['email'].""; ?></div></td>
  <td width="10%"><div align="center" class="text"><?php echo "".$row_two['tel_num'].""; ?></div></td>


  <td width="13%"><div align="center" class="text"><?php echo "".$row_one['college'].""; ?></div></td>
  <td width="17%"><div align="center" class="text"><?php echo "".$row_one['major'].""; ?></div></td>
</tr>
<?php
  $n++;
  }
?>
</table>

<table width="860" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-left:350px;margin-top:10px;">
<tbody>
<tr>
<td width="159">
<font color="#FF0000"><?php echo "目前共有".$count."条记录"?></font>
</td>
<td width="205"><?php echo "共".$pages."页"; ?></td>

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
    echo "<a href='teacher_query.php?page=".$first."'>首页</a>";
?>
</td>
<td width="132">
<?php
    echo "<a href='teacher_query.php?page=".$prev."'>上一页</a>";
?>
</td>
<?php
  }
  if($page < $pages)
  {
?>
<td width="132">
<?php
    echo "<a href='teacher_query.php?page=".$next."'>下一页</a>";
?>
</td>
<td width="132">
<?php
    echo "<a href='teacher_query.php?page=".$last."'>尾页</a>";
?> 
 </td> 
<?php
  }
?>
</tr>
</tbody>
</table>

<?php
}
}
?>
</body>
</html>
<br>
<br>
<?php include("foot.php")?>
