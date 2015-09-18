<meta http-equiv="content-type" type="text/html; charset=utf-8">
<?php
include("admin_test.php");
include("connect.php");

$M_ID = $_GET['M_ID'];
$sql = "delete from $Message where M_ID='$M_ID'";
$query = mysqli_query($DB,$sql) or die ('连接错误！');
if($query)
{
  echo "<script>alert ('信息删除成功！');</script>";
  echo "<html><meta http-equiv=\"refresh\" content=\"0; url=accept.php \"></html>";
}
else
{
  echo "<script>alert ('信息删除不成功！');history.back();</script>";
}
?>
