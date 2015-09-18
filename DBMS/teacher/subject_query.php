<?php
//论文信息查询
include("connect.php");
include("sys_header.php");
include("teacher_test.php");
?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link ref="stylesheet" href="style.css" type="text/css">
</head>

<body>
<div style="width:770px;margin-left: 350px;">
    <form method="post" name="myfrorm" action="subject_query.php">
<table align="center" width="600" height="10" cellspacing="0">
                    <tr height="10" width="100%">
                        <td align="center" class="text">
                            <font size="4"><b>课题信息查询</b></font>
                        </td>
                    </tr>
                </table>
<br>
<br>
<div style="width:770px;">
      <label class="label_title" style="width:100px; margin-left:170px;" >课题编号:</label>
 <input type="text" name="subject_ID" class="inputtext input_middle required" style="width:200px; margin-top:-30px;margin-left:240px;" />
</div>
<br>
<br>
<div style="width:770px;">
      <label class="label_title" style="width:100px; margin-left:170px;" >课题名称:</label>
 <input type="text" name="subject_title" class="inputtext input_middle required" style="width:200px; margin-top:-30px;margin-left:240px;" />
</div>

<div align="center" style="margin-left:400px;margin-top:30px; width:20px;">
                        <span class="btn btn-small">
                        <input type="hidden" name="query" value="查询">
                <input type="submit" value="查询">
                        </span>
                    </div>
 <div style="margin-left:200px; width:600px;margin-top:10px;"><font color="#FF0000">*请选择以上任一种或多种条件进行查询</font></div>
    </form>
</div>
<?php
$query = isset($_POST["query"]) ? $_POST["query"] : '';
$subject_ID = isset($_POST["subject_ID"]) ? $_POST["subject_ID"] : '';
$subject_title = isset($_POST["subject_title"]) ? $_POST["subject_title"] : '';

if ($query) {
    if (empty($subject_ID) && empty($subject_title)) {
        echo "<script>alert ('请输入查询条件！');location.href='subject_query.php';</script>";
        exit;
    }

    $sql = "select * from $Subject where 1=1 "; //注意此处空格！！！
    if ($subject_ID) {
        $sql = $sql . "and subject_ID='$subject_ID'";
    }

    if ($subject_title) {
        $sql = $sql . "and subject_title like '%$subject_title'";
    }

    $query = mysqli_query($DB, $sql);
    $count = mysqli_num_rows($query);
    if (empty($count)) {
        echo "<script>alert ('无相关记录,请检查！');location.href='subject_query.php';</script>";
        exit;
    } else {
        if (empty($offset)) {
            $offset = 0;
        }
        ?>
        <br>
        <table width="860" border="0" cellspacing="1" cellpadding="0" align="center" style="margin-left:250px;margin-top:10px;">
            <tr>
                <td>
                    <div class="text" align="center">课题编号</div>
                </td>
                <td>
                    <div class="text" align="center">课题名称</div>
                </td>
                <td>
                    <div class="text" align="center">导师编号</div>
                </td>
                <td>
                    <div class="text" align="center">导师姓名</div>
                </td>
                <td>
                    <div class="text" align="center">学生学号</div>
                </td>
                <td>
                    <div class="text" align="center">学生姓名</div>
                </td>
                <td>
                    <div class="text" align="center">课题状态</div>
                </td>

                <?php
                $n = 1;
                $pages = ceil($count / $PAGE_NUM);
                if (isset($_GET['page'])) {
                    $page = intval($_GET['page']);
                } else {
                    $page = 1;
                }
                $offset = $PAGE_NUM * ($page - 1);

                $sql_one = $sql . "order by teacher_ID desc limit $offset,$PAGE_NUM";
                $query_one = mysqli_query($DB, $sql_one) or die("连接错误！");;

                while ($row_one = mysqli_fetch_array($query_one))
                {
                if (($n % 2) != 0)
                {
                ?>
            <tr>
                <?php
                }
                else
                {
                ?>
            <tr>
                <?php
                }
                ?>

                <td width="5%">
                    <div align="center" style="margin-top:10px;"><?php echo "" . $row_one['subject_ID'] . ""; ?></div>
                </td>
                <td width="20%">
                    <div align="center"><?php echo "" . $row_one['subject_title'] . ""; ?></div>
                </td>
                <td width="5%">
                    <div align="center"><?php echo "" . $row_one['teacher_ID'] . ""; ?></div>
                </td>

                <?php
                $teacher_ID = $row_one['teacher_ID'];
                $sql_two = "select teacher_name from $Teacher where teacher_ID='$teacher_ID'";
                $query_two = mysqli_query($DB, $sql_two);
                $row_two = mysqli_fetch_array($query_two);
                ?>

                <td width="7%">
                    <div align="center" class="text"><?php echo "" . $row_two['teacher_name'] . ""; ?></div>
                </td>
                <td width="5%">
                    <div align="center" class="text"><?php echo "" . $row_one['student_ID'] . ""; ?></div>
                </td>

                <?php
                $student_ID = $row_one['student_ID'];
                $sql_three = "select student_name from $Student where student_ID='$student_ID'";
                $query_three = mysqli_query($DB, $sql_three);
                $row_three = mysqli_fetch_array($query_three);
                ?>

                <td width="7%">
                    <div align="center" class="text"><?php echo "" . $row_three['student_name'] . ""; ?></div>
                </td>
                <td width="7%">
                    <div align="center" class="text"><?php echo "" . $row_one['status'] . ""; ?></div>
                </td>
            </tr>
            <?php
            $n++;
            }
            ?>
        </table>

        <table width="860" border="0" cellspacing="0" cellpadding="0" align="center" class="text" style="margin-left:350px;margin-top:10px;">
            <tbody>
            <tr>
                <td width="159">
                    <font color="#FF0000"><?php echo "目前共有" . $count . "条记录" ?></font>
                </td>
                <td width="205"><?php echo "共" . $pages . "页"; ?></td>

                <?php
                $first = 1;
                $prev = $page - 1;
                $next = $page + 1;
                $last = $pages;

                if ($page > 1) {
                    ?>
                    <td width="132">
                        <?php
                        echo "<a href='subject_query.php?page=" . $first . "'>首页</a>";
                        ?>
                    </td>
                    <td width="132">
                        <?php
                        echo "<a href='subject_query.php?page=" . $prev . "'>上一页</a>";
                        ?>
                    </td>
                    <?php
                }
                if ($page < $pages) {
                    ?>
                    <td width="132">
                        <?php
                        echo "<a href='subject_query.php?pag=" . $next . "'>下一页</a>";
                        ?>
                    </td>
                    <td width="132">
                        <?php
                        echo "<a href='subject_query.php?pag=" . $last . "'>尾页</a>";
                        ?>
                    </td>
                    <?php
                }
                ?>
            </tr>
            </tbody>
        </table>

        <?php
    }
}
?>
</body>
</html>
<br>
<br>
<?php include("foot.php") ?>
