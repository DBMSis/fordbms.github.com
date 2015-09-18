<?php
//学生信息查询
include("connect.php");
include("student_test.php");

$subject_ID = $_GET['subject_ID'];

$sql = "update $Subject set student_ID='' where subject_ID='$subject_ID'";
$query_one = mysqli_query($DB,$sql);

$sql = "update $Subject set status='未选' where subject_ID='$subject_ID'";
$query_two = mysqli_query($DB,$sql);

if($query_one && $query_two)
{
  echo "<script>alert ('课题删除成功,请选择!');</script>";
  echo "<html><meta http-equiv=\"refresh\" content=\"0; url=system.php \"></html>";
  exit;
}
?>

