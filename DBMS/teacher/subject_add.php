<?php
//论文信息添加
include("connect.php");
include("sys_header.php");
include("teacher_test.php");
?>
<br>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
<div style="width:700px;margin-left: 375px;">
<table align="center" width="600" height="10" cellspacing="0">
                    <tr height="10" width="100%">
                        <td align="center">
                            <font size="4"><b>添加课题</b></font>
                        </td>
                    </tr>
                </table>
<br>
<br>
<form name="myform" method="post" action="subject_add.php">
<div style="width:800px;">
                        <label class="label_title" style="width:90px; margin-left:20px;" >课题编号:</label>
                        <input type="text" name="subject_ID" class="inputtext input_middle required" style="width:500px; margin-top:-30px;margin-left:110px;" />
                    </div>
                    <br>
<div style="width:800px;">
                        <label class="label_title" style="width:90px; margin-left:20px;" >课题题目:</label>
                        <input type="text" name="subject_title" class="inputtext input_middle required" style="width:500px; margin-top:-30px;margin-left:110px;" />
                    </div>
                    <br>
<div style="width:800px;">
                        <label class="label_title" style="width:90px; margin-left:20px;" >教师编号:</label>
                        <label class="label_title" style="width:90px;margin-top:-21px;margin-left:110px;"><?php echo "".$_COOKIE['cookie_teacher_ID']."";?></label>
                    </div>
                    <br>
<div style="width:800px;">
                        <label class="label_title" style="width:90px; margin-left:20px;" >课题状态:</label>
                        <label class="label_title" style="width:90px;margin-top:-21px;margin-left:110px;"><?php echo "未选";?></label>
                    </div>
                    <br>
<div align="center" style="margin-left:550px;margin-top:10px; width:20px;">
                        <span class="btn btn-small">
                           <input type="hidden" name="submit" value="1">
<input type="submit" name="submit" value="确定">
                        </span>
                    </div>

</form>
</div>
</body>
</html>

<?php
$submit = isset($_POST['submit'])?$_POST['submit']:'';
$subject_ID = isset($_POST['subject_ID'])?$_POST['subject_ID']:'';
$subject_title = isset($_POST['subject_title'])?$_POST['subject_title']:'';
$teacher_ID = $_COOKIE['cookie_teacher_ID'];
if($submit)
{
  if(empty($subject_ID) || empty($subject_title))
  {
    echo "<script>alert ('请输入论文编号和题目！');</script>";
    exit();
  }
  $sql="select * from $Subject where subject_ID='$subject_ID'";
  $query = mysqli_query($DB,$sql);
  $count=mysqli_num_rows($query);
  if($count)
  {
    echo "<script>alert ('该论文编号已存在！');</script>";
    exit();
  }
  else
  {
    $sql = "insert into $Subject (subject_ID,subject_title,teacher_ID,status) values ('$subject_ID','$subject_title','$teacher_ID','未选')";
    $query = mysqli_query($DB,$sql);
	
    if($query)
    {
      echo "<script>alert ('论文添加成功！');</script>";
      exit();
    }else{
		echo "<script>alert ('添加失败！');</script>";
      exit();
		}
  }
}
?>
<br>
<br>
<?php include("foot.php");?>

