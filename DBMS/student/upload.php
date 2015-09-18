<?php
error_reporting(0);
/*临时存储文件地址*/
$upload_file=$_FILES['upload_file']['tmp_name'];
/*存储文件名称*/
$upload_file_name=$_FILES['upload_file']['name'];
$upload_file_name=iconv("UTF-8","gb2312", $upload_file_name);
$expire = 60*60 +time();//一小时
setcookie("cookie_filename","$upload_file_name",$expire,"/");//设置cookie存储文件名
if($upload_file)
{
  $upload_file_size=$_FILES['upload_file']['size'];
  $file_size_max = 5*1024*1024; //5M限制文件上传最大容量
  $store_dir = "F:/Apache_PHP_MySQL/Apache24/htdocs/DBMS/uploads/"; //上传文件的存储位置
  $accept_overwrite = 1; //是否允许覆盖相同文件

  if($upload_file_size > $file_size_max)
  {
    echo "<script>alert ('对不起，您的文件容量太大！');history.back();</script>";
    exit();
  }

  if(file_exists($upload_file_name))
  {
   echo "<script>alert ('存在相同文件名的文件！');history.back();</script>"; 
   exit();
  }

  if(!move_uploaded_file($upload_file, $store_dir.$upload_file_name))
  {
    echo "<script>alert ('文件上传失败,请重新上传！');history.back();</script>";
  }
  else
  {
	$expire = 60*60 +time();//一小时
	setcookie("cookie_filepath","$store_dir.$upload_file_name",$expire,"/");//设置cookie存储文件名
    echo "<script>alert ('文件上传成功！');location.href='send.php';</script>";
  }
}
?>
