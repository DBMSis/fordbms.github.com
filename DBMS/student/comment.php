<?php 
error_reporting(0);
//留言板
include("connect.php");
include("sys_header.php");
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
<div class="body_wrap">
<div class="container">
      <div class="col-sm-10">
                            <h6 class="foo">Comment</h6>
  <?php
  $n=1;
$sql = "select count(*) as num from $Comment";//计算评论的数量
$query = mysqli_query($DB,$sql) or die ("连接错误！!!!!!!!!!!!!!!!!!");
$row = mysqli_fetch_array($query);
$count = $row['num'];
/*echo "<script>alert('$count');</script>";*/
if(empty($offset))
{
  $offset = 0;
}

$pages = ceil($count/$PAGE_NUM);//ceil返回大于或者等于指定表达式的最小整数,记录的条数/每一页最多条
if( isset($_GET['page']))//用于收集来自 method="get" 的表单中的值。
{
  $page = intval($_GET['page']);//变量转成整数类型
}
else
{
  $page = 1;
}

$offset = $PAGE_NUM*($page - 1);
$sql = "select * from $Comment order by ID desc limit $offset,$PAGE_NUM";//将所有通过的课题按教师ID降序排列，选取第offset到第PAGE_NUM条数据
$query = mysqli_query($DB,$sql) or die("连接错误！~~~~~~~~~~~~~~");

while($row=mysqli_fetch_array($query))
{ 
  $userID = $row['user_ID'];
  $time=$row['time'];
  $content=$row['content'];
  ?>
  <!-- post comments -->
      <div class="comment-list clearfix" id="comments" style="margin-left:70px;">
        <ol>
                                    <li class="comment">
                                        <div class="comment-body">
                                            <div class="inner">
                                                <div class="comment-arrow"></div>
                                                <div class="comment-avatar">
                                                    <div class="avatar"><img src="images/teacher.png" alt="" /></div>
                                                </div>
                                                <div class="comment-text">
                                                    <div class="comment-author clearfix">
                                                        <a href="#" class="link-author">
                                                        用户ID：<?php echo "".$userID."" ?>
                                                        </a> 
                                                        <span class="comment-date">
                                                       	<?php echo "".$time."" ?>
                                                        </span> 
                                                        |<a href="#addcomments" class="link-reply anchor">Reply</a>
                                                    </div>
                                                    <div class="comment-entry">
                                                        <?php echo "".$content."" ?>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </li>
        </ol>
  </div>
                            <!--/ post comments -->
  <?php
  $n++;
}
?>      
<table width="860" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-left: 255px;">
<tbody>
<tr>
<td width="200"><font color="#ff0000"><?php $n--;echo"目前共有".$count."条记录."?></font></td>
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
  echo "<a href='comment.php:page=".$first."'>首页</a>";
?>
</td>
<td width="140">
<?php
  echo "<a href='comment.php:page=".$prev."'>上一页</a>";
?>
</td> 

<?php
}

if( $page < $pages)
{
?>
<td width="140">
<?php
  echo "<a href='comment.php:page=".$next."'>下一页</a>";
?>
</td>
<td width="140">
<?php
  echo "<a href='comment.php:page=".$last."'>尾页</a>";
?>
</td>
<?php
}
?>
</tr>
</tbody>
</table>     
<form name="form1" action="comment.php" method="post" ENCTYPE="multipart/form-data">
  <!-- post comments -->
      <div class="comment-list clearfix" id="comments" style="margin-left:70px;margin-top:20px;">
        <ol>
                                    <li class="comment">
                                        <div class="comment-body">
                                            <div class="inner">
                                                <div class="comment-arrow"></div>
                                                <div class="comment-avatar">
                                                    <div class="avatar"><img src="images/teacher.png" alt="" /></div>
                                                </div>
                                                <div class="comment-text">
                                                    <div class="comment-author clearfix">
                                                        <a href="#" class="link-author">
                                                        用户ID：<?php echo "".$_COOKIE['cookie_student_ID']."" ?>
                                                        </a> 
                                                        <span class="comment-date">
                                                       	<!--获取系统当前时间-->
<?php 
date_default_timezone_set('Etc/GMT-8');
echo $time=date("Y-m-d H:i:s");?>
                                                        </span> 
                                                        |<a href="#addcomments" class="link-reply anchor">Reply</a>
                                                    </div>
                                                    <div class="comment-entry">
                                                        <textarea cols="58" rows="3" name="body" id="styled_message" class="textarea textarea_middle">
</textarea>
                                                    </div>
                                                    <div class="rowSubmit" style="margin-left:480px;margin-top:5px;">
                                    <span class="btn btn-send"><input type="submit" name="send" value="发送" /></span>
                                	</div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </li>
        </ol>
  </div>  
  </form>           
  </div>
    <!--/ container -->
</div>
<?php
$userID = $_COOKIE['cookie_student_ID'];
$body = isset($_POST['body'])?$_POST['body']:'';
$send = isset($_POST['send'])?$_POST['send']:'';

if($send == '发送')
{
  if(empty($body))
  {
    echo "<script>alert ('内容不可为空！');</script>";
    exit();
  }

  //发送消息，并输出是否发送成功信息  
    $sql = "insert into $Comment (user_ID,time,content) value ('$userID','$time','$body')";
    $query = mysqli_query($DB,$sql);
    if($query)
    {
      echo "<script>alert ('发送成功！');location.href='comment.php';</script>";
      exit();
    }
  else
  {
    echo "<script>alert ('发送失败！');</script>";
    exit();
  }
  }
?>
</body>
</html>