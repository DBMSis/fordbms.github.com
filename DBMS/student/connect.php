<?php
//数据库的连接
//声明全局变量
global $Hostname,$DBname,$DBuser,$DBpassword,$User,$Student,$Teacher,$Admin,$Information,$Massage,$Subject,$Docunment,$Config,$Mark,$Comment,$Sign,$Upfile;

$Hostname = "localhost";
$DBname = "dbms";
$DBuser = "root";
$DBpassword = "1111";
$DB = mysqli_connect($Hostname,$DBuser,$DBpassword) or die ("服务器连接错误！");//mysql_connect(server,user,pwd,newlink,clientflag)
mysqli_select_db($DB,$DBname) or die ("数据库连接错误！");//mysql_select_db(database,connection)

$User = "User";//用户注册信息
$Student = "Student";//学生详细信息
$Teacher = "Teacher"; //老师详细信息
$Admin = "Admin";//管理员信息
$Message = "Message";//用户之间互发的信息
$Subject = "Subject";//课题信息
$Mark = "Mark";//学生成绩
$Comment="Comment";//评论
$Sign="Sign";//签到
$Upfile="Upfile";

$PAGE_NUM = 10;
$MAX_NUM = 4;
$MAX_DATE = 30;
?>
