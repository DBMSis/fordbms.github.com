<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<?php
//论文课题选择
include("connect.php");
include("student_test.php");

$subject_ID = $_GET['subject_ID'];
$student_ID = $_GET['student_ID'];

$sql = "select * from $Subject where student_ID='$student_ID'";
$query = mysqli_query($DB,$sql);
$count = mysqli_num_rows($query);
if($count != 0)
{
  echo "<script>alert ('您的数据库课程设计课题已选，请勿再选！');history.back();</script>";
  exit;
}
else
{
//$sql = "insert into $Subject (student_ID) values ('$student_ID') where subject_ID='$subject_ID'";
$sql = "UPDATE $Subject SET student_ID='$student_ID' where subject_ID='$subject_ID'";
$query_one = mysqli_query($DB,$sql) or die ('连接错误！!!!!!!!!!');

$sql = "UPDATE $Subject SET status='已选' where subject_ID='$subject_ID'";
$query_two = mysqli_query($DB,$sql) or die ('连接错误！');

if($query_one && $query_two)
{
  echo "<script>alert('课题选择成功！');</script>";
  echo "<html><meta http-equiv=\"refresh\" content=\"0; url=system.php \"></html>";
}
else
{
  echo "<script>alert('课题已被选，请择选！');history.back();</script>";
  echo "<html><meta http-equiv=\"refresh\" content=\"0; url=system.php \"></html>";
  exit;
}
}
?>
