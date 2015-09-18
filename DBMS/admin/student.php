<?php
//学生信息添加
include("connect.php");
include("sys_header.php");
include("admin_test.php");
?>
<br>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
<table align="center" width="600" height="100" cellspacing="0" style="margin-left: 375px;">
                    <tr height="10" width="100%">
                        <td align="center" class="text">
                        <font size="4"><b>添加学生信息</b></font>
                        </td>
                    </tr>
                </table>
                <br>
<form name="myform" method="post" action="student.php">
<div style="width:600px;">
                        <label class="label_title" style="width:100px; margin-left:570px; margin-top:-60px;" >学生学号:</label>
                        <input type="text" name="student_ID" class="inputtext input_middle required" style="width:200px; margin-left:650px; margin-top:-30px;" />
                    </div>
                    <br>
                    <div style="width:600px;">
                        <label class="label_title" style="width:100px; margin-left:570px;" >学生姓名:</label>
                        <input type="text" name="student_name" class="inputtext input_middle required" style="width:200px; margin-left:650px; margin-top:-30px;" />
                    </div>
                    <br>
                    <div style="width:600px;">
                        <label class="label_title" style="width:100px; margin-left:570px;" >学生性别:</label>
                        <label class="label_title" style=" margin-left:670px;margin-top:-20px; width:100px;" >
                            <input checked="checked" type="radio" name="sex" value="男" />男&nbsp;
<input type="radio" name="sex" value="女" />女
                        </label>
                    </div>
                    <br>
<div style="width:800px;">
                        <label class="label_title" style="width:100px; margin-left:570px;" >所在学院:</label>
                        <div style="width:200px; margin-top:-30px;margin-left:650px;">
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
                        <label class="label_title" style="width:100px; margin-left:570px; margin-top:-20px;" >所在专业:</label>
                        <div style="width:200px;margin-left:650px;margin-top:-30px;">
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
<div style="width:600px;">
                        <label class="label_title" style="width:100px;margin-top:-30px; margin-left:570px;" >所在班级:</label>
                        <label class="label_title" style=" margin-left:650px;margin-top:-30px; width:200px;" >
                            <input type="text" name="class"/>
                        </label>
                    </div>
                    <div align="center" style="margin-left:780px;margin-top:10px; width:20px;">
                        <span class="btn btn-small">
                            <input type="submit" name="submit" value="确定">
                        </span>
                    </div>
</form>
</body>
</html>

<?php
$submit = isset($_POST['submit'])?$_POST['submit']:'';
$student_ID =isset($_POST['student_ID'])?$_POST['student_ID']:'';
$student_name = isset($_POST['student_name'])?$_POST['student_name']:'';
$sex = isset($_POST['sex'])?$_POST['sex']:'';
$college =isset( $_POST['college'])?$_POST['college']:'';
$major = isset($_POST['major'])?$_POST['major']:'';
$class = isset($_POST['class'])?$_POST['class']:'';

if($submit)
{
  if(empty($student_ID) && empty($student_name) && empty($sex) && empty($college) && empty($major) && empty($class))
  {
    echo "<script>alert ('请完善学生信息！');history.back();</script>";
    exit();
  }
  //判断是否已注册
  $sql="select*from $Student where student_ID='$student_ID'";
  $query=mysqli_query($DB,$sql);
  $count = mysqli_num_rows($query);
  if(!empty($count))
{
  echo "<script>alert ('该学生已存在！');</script>";
  exit;
}
  else
  {
    $sql = "insert into $Student (student_ID,student_name,sex,college,major,class) values ('$student_ID','$student_name','$sex','$college','$major','$class')";
    $query = mysqli_query($DB,$sql);

    if($query)
    {
      echo "<script>alert ('学生信息添加成功！');</script>";
      echo "<html><meta http-equiv=\"refresh\" content=\"0; url=student.php \"></html>";
      exit();
    }else{
		echo "<script>alert ('添加失败！');</script>";
      exit();
	}
  }
}
?>
<br>
<br>
<?include("foot.php");?>

