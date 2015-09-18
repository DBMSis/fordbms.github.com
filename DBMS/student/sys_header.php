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

        <!-- content -->
        <div class="content " role="main">

            <!-- row -->
            <div class="row">
                <div class="col-sm-8" style="padding-left: 150px;width: 565px;">
                    <h6 class="foo">Menu</h6>

                    <!-- Website Menu -->
                    <div class="dropdown-wrap boxed-velvet">
                        <ul class="dropdown inner clearfix" style="width: 652px;">
                            <li class="menu-level-0"><a href="system.php"><span>系统首页</span></a></li>
                            <li class="menu-level-0"><a href="#"><span>信息查询</span></a>
                                <ul class="submenu-1">
                                    <li class="menu-level-1"><a href="student_query.php">学生信息</a></li>
                                    <li class="menu-level-1"><a href="teacher_query.php">教师信息</a></li>
                                    <li class="menu-level-1"><a href="subject_query.php">课题信息</a></li>
                                    <li class="menu-level-1"><a href="mark_query.php">成绩信息</a></li>
                                </ul>
                            </li>
                            <li class="menu-level-0"><a href="#"><span>信息修改</span></a>
                                <ul class="submenu-1">
                                    <li class="menu-level-1"><a href="register_modify.php">注册信息</a></li>
                                    <li class="menu-level-1"><a href="passwd_modify.php">密码修改</a></li>                                  
                                </ul>
                            </li>
                            <li class="menu-level-0"><a href="#"><span>信息传递</span></a>
                                <ul class="submenu-1">
                                    <li class="menu-level-1"><a href="sendmail.php">信息发送</a></li>
                                    <li class="menu-level-1"><a href="accept.php">信息接收</a></li>                                  	<li class="menu-level-1"><a href="send.php">文件上传</a></li>
                                </ul>
                            </li>
                            <li class="menu-level-0"><a href="comment.php"><span>留言板</span></a></li>
                            <li class="menu-level-0"><a href="student_clear_cookie.php"><span>退出登录</span></a></li>
                        </ul>
                    </div>
                    <!--/ Website Menu -->
                </div>    
        </div>
        <!--/ content -->
    </div>
    <!--/ container -->
</div>
<hr style="BORDER-BOTTOM-STYLE:dotted;BORDER-LEFT-STYLE:dotted; BORDER-BIGHT-STYLE:dotted; BORDER-TOP-STYLE:dotted;margin-top:0px;" size="5" width="860" color="#40cf79">
</body>
</html>