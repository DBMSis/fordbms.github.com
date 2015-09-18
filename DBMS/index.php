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
</head>

<body>
    <div class="body_wrap">
        <div class="container">

            <!-- content -->
            <div class="content " role="main">

                <!-- row -->
                <div class="row">
                    <div class="col-sm-8" style="padding-left: 250px;">
                        <!-- Website Menu -->
                        <div class="dropdown-wrap boxed-velvet">
                            <ul class="dropdown inner clearfix" style="width: 450px;">
                                <li class="menu-level-0"><a href="index.php"><span>系统首页</span></a></li>
                                <li class="menu-level-0"><a href="register.php"><span>用户注册</span></a></li>
                                <li class="menu-level-0"><a href="help.php"><span>帮助信息</span></a></li>
                                <li class="menu-level-0"><a href="contact.php"><span>联系反馈</span></a></li> 
                            </ul>
                        </div>
                        <!--/ Website Menu -->
                    </div>    
                </div>
            </div>
            <div style="text-align:center">
                <hr style="BORDER-BOTTOM-STYLE:dotted;BORDER-LEFT-STYLE:dotted; BORDER-RIGHT-STYLE:dotted; BORDER-TOP-STYLE:dotted;margin-top:0px;" size="5" width="940" color="#40cf79">

                <table height="400" width="860" align="center" bgcolor="#E3F3FF">
                    <tr height="10">
                    </tr>

                    <tr>
                        <td width="10">
                        </td>
                        <td height="342" width="290" align="left">
                            <form id="myform" method="post" action="login.php">
                                <ul>

                                    <h2>已注册用户可直接登录</h2>
                                    <br>
                                    <br>
                                    <div style="width:100px;">
                                        <label class="label_title" style="width:80px;" >用户名:</label>
                                        <input type="text" name="user_ID" id="user_ID" placeholder="学生号或教师编号" class="inputtext input_middle required" style="width:200px; margin-top:-30px;margin-left:65px;" />
                                    </div>
                                    <br><br>
                                    <div style="width:100px;">
                                        <label class="label_title" style="width:80px;" >密&nbsp;码:</label>
                                        <input type="password" name="user_passwd" id="user_passwd" class="inputtext input_middle required" style="width:200px; margin-top:-30px;margin-left:65px;" />
                                    </div>
                                    

                                    <li>
                                        <table width="100%" border="0">
                                            <tr>
                                                <br>
                                                <td align="center">
                                                    <input checked="checked" type="radio" name="RadioButton" id="RadioButton1" value="学生" />
                                                    <label for="RadioButton1">学生</label>&nbsp;&nbsp;&nbsp;
                                                    <input type="radio" name="RadioButton" id="RadioButton2" value="教师" />
                                                    <label for="RadioButton2">教师</label>&nbsp;&nbsp;&nbsp;
                                                    <input type="radio" name="RadioButton" id="RadioButton3" value="管理员" />
                                                    <label for="RadioButton2">管理员</label>
                                                </td>
                                            </tr>
                                        </table>
                                    </li>

                                    <li>
                                        <table width="100%">
                                            <tr><br>
                                                <td align="center">
                                                    <span class="btn btn-small"><input type="submit" name="Button1" id="Button1" value="登录" /></span>&nbsp;&nbsp;&nbsp;
                                                    <span class="btn btn-small"><input type="reset" name="reset" id="Button2" value="重置" onclik="history.back();" /></span>
                                                </td>
                                            </tr>
                                        </table>
                                    </li>
                                </ul>
                            </form>
                        </td>

                        <br>
                        <td align="left" class="text" style="padding-left: 80px;">
                            <div align="center"><font color="red">使用须知</font></div>
                            <br>
                            <ol>
                                <li>1.本网站只对本校师生开放！</li>
                                <br>
                                <li>2.本站详细内容须登陆后方可查阅，未登陆用户只能查看首页的相关内容！</li>
                                <br>
                                <li>3.本校师生可在特定的开放时间内注册，经管理员验证后方可进行登陆使用！</li>
                                <br>
                                <li>4.本校的师生注册时，用户名请使用自己的编号或学号！</li>
                                <br>
                                <li>5.如若忘记密码请到教务处查询！</li>
                            </ol>
                        </td>
                    </tr>
                    <tr>
                    </tr>
                </table>
            </div>
            <!--/ container -->
        </div>
    </body>
    </html>
	<?php include("foot.php");?>