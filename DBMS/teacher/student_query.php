<?php
//学生信息查询
include("connect.php");
include("sys_header.php");
include("teacher_test.php");
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="style.css" type="text/css">
<title>数据库课程设计管理系统</title>
</head>

<body>
<div style="width:600px;height:100px;margin-left: 375px;">
<form name="myform" method="post" action="student_query.php">
<table align="center" width="600" height="10" cellspacing="0">
                    <tr height="10" width="100%">
                        <td align="center" class="text">
                            <font size="4"><b>学生信息查询</b></font>
                        </td>
                    </tr>
                </table>
<br>
<br>
                
    <div style="width:600px;">
      <label class="label_title" style="width:100px; margin-left:170px;" >用户名:</label>
 <input type="text" name="student_ID" placeholder="学生号" class="inputtext input_middle required" style="width:200px; margin-top:-30px;margin-left:220px;" />
</div>
<br><br><br>
<div style="width:600px;">
                        <label class="label_title" style=" margin-left:230px;margin-top:-20px; width:600px;" >
                          <div align="left">
							<input checked="checked" type="radio" name="select" value="student">学生信息&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="radio" name="select" value="subject">选题信息
                          </div>
                        </label>
    </div>
    <div align="center" style="margin-left:350px;margin-top:30px; width:20px;">
                        <span class="btn btn-small">
                        <input type="hidden" name="query" value="1">
						<input type="submit" name="submit" value="查询">
                        </span>
                    </div>
                    <br><br><br>
                    
</form>
</div>

<?php
//条件判断
$query = isset($_POST['query'])?$_POST['query']:'';
if($query)
{
  switch($_POST['select'])
  {
    case "student":
      include("student_squery.php");
      break;
    case "subject": 
      include("subject_squery.php");
      break;
  }
}
?>
</body>
</html>
<br>
<br>
<?php include("foot.php");?>
