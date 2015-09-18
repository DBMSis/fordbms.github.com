<?php
error_reporting(0);
//信息发送
include("connect.php");
include("sys_header.php");
include("student_test.php");
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link rel="stylesheet" href="style.css" type="text/css">
<title>文件上传</title>
</head> 

<body>
<table width="860" align="center" border="0" style="margin-left: 255px;margin-top:20px;">
<tr>
<td align="center">
<font size="5">发件箱</font>
</td>
</tr>
<tr>
<td>
<div style="width:600px;margin-left:255px;">
<label style="margin-top:-100px;width:200px;margin-top:20px;">
<font size="3">附&nbsp;&nbsp;&nbsp;件：</font>
</label>
<!--文件存储-->
<form name="form2" enctype="multipart/form-data" action="upload.php" method="post"><!--enctype="multipart/form-data"是上传二进制数据; form里面的input的值以2进制的方式传过去-->
<input type="hidden" name="max_file_size" value="100000">
<input name="upload_file" type="file" style="margin-top:-20px;margin-left: 60px;">
<input type="submit" name="upload" value="上传" style="margin-top:-20px;margin-left: 255px;">
</form>
</div>
</td>
</tr>
<tr>
<td>
<form name="form1" action="send.php" method="post">
<div style="margin-left: 255px;margin-top:20px;">
发件人：<?php echo "".$_COOKIE['cookie_student_ID']."";?><br>
</div>
</td>
</tr>

<tr>
<td>
<div style="width:600px;margin-left: 255px;margin-top:20px;">
<label style="margin-top:-100px;width:300px;">
文件名：<?php echo "".$_COOKIE['cookie_filename']."";?>
</label>

</div>
<br>
</td>
</tr>
<tr>
<td>
<div class="rowSubmit" style="position:absolute;left:800px;bottom:180px">
    <span class="btn btn-send"><input type="submit" name="send" value="发送" /></span>
</div>
</td>
</tr>
</form>
</table>

</body>
</html>

<?php
include("foot.php");
?>

<?php
//$subject = isset($_POST['subject'])?$_POST['subject']:'';
$send = isset($_POST['send'])?$_POST['send']:'';
if($send == '发送')
{
  
  $from = $_COOKIE['cookie_student_ID'];
  date_default_timezone_set('Etc/GMT-8');
  $time=date("Y-m-d H:i:s");
  $upfilepath = $_COOKIE['cookie_filepath'];
  $tmp=$_COOKIE['cookie_filename'];
  if(empty($upfilepath)){
	  echo "<script>alert ('存储路径为空！');</script>";
	  exit();
	  }
  $sql = "insert into $Upfile (upfile_from,upfile_name,upfile_time,upfile_path) values ('$from','$tmp','$time','$upfilepath')";
  $query = mysqli_query($DB,$sql);
  if($query)
  {
    echo "<script>alert ('发送成功！');</script>";
	setcookie("cookie_filename","");
	setcookie("cookie_filepath","");//发送成功后将cookie置为空
    exit();
  }else{
	  echo "<script>alert ('发送失败！');</script>";
	  setcookie("cookie_filepath","");setcookie("cookie_filename","");
      exit();
	  }
}
?>

