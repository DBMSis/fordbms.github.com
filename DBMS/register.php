<!doctype html>
<html lang="en" class="no-js">
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
</script>
</head>
<?php
include("connect.php");
include("checkout.js");
?>
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
                <hr style="BORDER-BOTTOM-STYLE:dotted;BORDER-LEFT-STYLE:dotted; BORDER-RIGHT-STYLE:dotted; BORDER-TOP-STYLE:dotted" size="5" width="940" color="#40cf79">
                <br>
                <table align="center" width="860" height="10" cellspacing="0">
                    <tr height="10" width="100%">
                        <td align="center" class="text">
                            <font color="e8f2f8">注&nbsp;册</font><font class="title">(注＊必填！)</font>
                        </td>
                    </tr>
                </table>
                <br>
                <form name="myform" method="post" action="SQL.php">
                    <div style="width:800px;">
                        <label class="label_title" style="width:100px; margin-left:70px;" >用户名:</label>
                        <input type="text" name="user_ID" placeholder="学生号或教师编号" class="inputtext input_middle required" style="width:500px; margin-top:-30px;" />
                        <label class="label_title" style=" margin-left:650px;margin-top:-30px; width:20px;" >*</label>
                    </div>
                    <br><br>
                    <div style="width:800px;">
                        <label class="label_title" style="width:100px; margin-left:80px;" >密码:</label>
                        <input type="password" name="user_passwd" class="inputtext input_middle required" style="width:500px; margin-top:-30px;" />
                        <label class="label_title" style=" margin-left:650px;margin-top:-30px; width:20px;" >*</label>
                    </div>
                    <br><br>
                    <div style="width:800px;">
                        <label class="label_title" style="width:100px; margin-left:70px;" >确认密码:</label>
                        <input type="password" name="user_repasswd" class="inputtext input_middle required" style="width:500px; margin-top:-30px;" />
                        <label class="label_title" style=" margin-left:650px;margin-top:-30px; width:20px;" >*</label>
                    </div>
                    <br><br>
                    <div style="width:800px;">
                        <label class="label_title" style="width:90px; margin-left:60px;" >密码提示问题:</label>
                        <input type="text" name="question" class="inputtext input_middle required" style="width:500px; margin-top:-30px;" />
                    </div>
                    <br><br>
                    <div style="width:800px;">
                        <label class="label_title" style="width:90px; margin-left:60px;" >密码提示回答:</label>
                        <input type="text" name="answer" class="inputtext input_middle required" style="width:500px; margin-top:-30px;" />
                    </div>
                    <br><br>
                    <div style="width:800px;">
                        <label class="label_title" style="width:100px; margin-left:70px;" >性别:</label>
                        <label class="label_title" style=" margin-left:150px;margin-top:-20px; width:100px;" >
                            <input checked="checked" type="radio" name="sex" id="sex_m" value="男"/>男&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="sex" id="sex_f" value="女"/>女
                        </label>
                        <label class="label_title" style=" margin-left:650px;margin-top:-20px; width:20px;" >*</label>
                    </div>
                    <br><br>
                    <div style="width:800px;">
                        <label class="label_title" style="width:100px; margin-left:70px;" >电子邮箱:</label>
                        <input type="text" name="email" class="inputtext input_middle required" style="width:500px; margin-top:-30px;" />
                        <label class="label_title" style=" margin-left:650px;margin-top:-30px; width:20px;" >*</label>
                    </div>
                    <br><br>
                    <div style="width:800px;">
                        <label class="label_title" style="width:100px; margin-left:70px;" >手机号码:</label>
                        <input type="text" name="tel_num" class="inputtext input_middle required" style="width:500px; margin-top:-30px;" />
                        <label class="label_title" style=" margin-left:650px;margin-top:-30px; width:20px;" >*</label>
                    </div>
                    <br><br>
                    <div style="width:800px;">
                        <label class="label_title" style="width:100px; margin-left:70px;" >所在学院:</label>
                        <div style="width:500px; margin-top:-30px;margin-left:155px;">
                            <select class="select_styled select_styled_orange" name="college" >
                                <option>软件学院</option>
                                <option>法学院</option>
                                <option>管理学院</option>
                                <option>化学与材料科学学院</option>
                                <option>计算机科学学院</option>
                                <option>经济学院</option>
                                <option>美术学院</option>
                                <option>民族学与社会学学院</option>
                                <option>生命科学学院</option>
                                <option>外语学院</option>
                                <option>文学与新闻传播学院</option>
                            </select>
                        </div>
                    </div>
                    <div style="width:800px;">
                        <label class="label_title" style="width:100px; margin-left:70px;" >所在专业:</label>
                        <div style="width:500px; margin-top:-35px;margin-left:155px;">
                            <select class="select_styled select_styled_orange" name="major">
                                <option>软件工程专业</option>
                                <option>通信工程专业</option>
                                <option>生物医学工程专业</option>
                                <option>光信息科学与技术专业</option>
                                <option>法学专业</option>
                                <option>汉语言文学专业</option>
                                <option>对外汉语专业</option>
                                <option>新闻学专业</option>
                                <option>广播电视新闻学专业</option>
                                <option>广告学专业</option>
                                <option>民族学专业</option>
                                <option>社会工作专业</option>
                                <option>社会学专业</option>
                                <option>历史学专业</option>
                                <option>政治学与行政学专业</option>
                                <option>思想政治教育专业</option>
                                <option>英语专业</option>
                                <option>日语专业</option>
                                <option>艺术设计专业</option>
                                <option>美术学专业</option>
                                <option>动画专业</option>
                                <option>信息管理与信息系统专业</option>
                                <option>电子商务专业</option>
                                <option>旅游管理专业</option>
                                <option>工商管理专业</option>
                                <option>市场营销专业</option>
                                <option>会计学专业</option>
                                <option>财务管理专业</option>
                                <option>人力资源管理专业</option>
                                <option>行政管理专业</option>
                                <option>公共事业管理专业</option>
                                <option>劳动与社会保障专业</option>
                                <option>应用心理学专业</option>
                                <option>教育学专业</option>
                                <option>经济学专业</option>
                                <option>国际经济与贸易专业</option>
                                <option>金融学专业</option>
                                <option>保险学专业</option>
                                <option>金融工程专业</option>
                                <option>计算机科学与技术专业</option>
                                <option>软件工程专业</option>
                                <option>网络工程专业</option>
                                <option>自动化专业</option>
                                <option>信息与计算科学专业</option>
                                <option>数学与应用数学专业</option>
                                <option>统计学专业</option>
                                <option>应用化学专业</option>
                                <option>材料化学专业</option>
                                <option>化学工程与工艺专业</option>
                                <option>环境科学专业</option>
                                <option>环境工程专业</option>
                                <option>生物工程专业</option>
                                <option>生物技术专业</option>
                                <option>药学专业</option>
                                <option>药物制剂专业</option>
                                <option>化学生物学专业</option>
                            </select>
                        </div>
                    </div>
                    <div style="width:800px;">
                        <label class="label_title" style="width:100px; margin-left:70px;" >等级权限:</label>
                        <label class="label_title" style=" margin-left:150px;margin-top:-20px; width:150px;" >
                            <input checked="checked" type="radio" name="degree" value="学生"/>学生&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="degree" value="教师"/>教师
                        </label>
                        <label class="label_title" style=" margin-left:650px;margin-top:-30px; width:20px;" >*</label>
                    </div>
                    <br><br>
                    <div style="width:800px;">
                        <label class="label_title" style="width:100px; margin-left:70px;" >联系地址:</label>
                        <input type="text" name="address" class="inputtext input_middle required" style="width:500px; margin-top:-30px;" />
                        <label class="label_title" style="margin-left:650px;margin-top:-30px; width:20px;" >*</label>
                    </div>
                    <div align="center" style="margin-left:550px;margin-top:30px; width:20px;">
                        <span class="btn btn-small">
                            <input type="submit" name="register" onclick=checkuser(this.form)  value="注册">
                        </span>
                    </div>
                    <br><br>
                </form>
            </div>
            <!--/ container -->
        </div>
    </body>
    </html>
    <?php include("foot.php")?>