<?php
//信息发送
include("connect.php");
include("sys_header.php");
include("student_test.php");
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
<!-- Calendar -->
<link href="css/jquery-ui-1.8.20.custom.css" rel="stylesheet">
<script src="js/jquery-ui.multidatespicker.js"></script>
<!-- Graph Builder -->
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
<script type="text/javascript" src="js/jquery.flot.js"></script>
<script type="text/javascript" src="js/jquery.flot.resize.js"></script>
<script type="text/javascript">
    $(function() {
        var graphwidth = $('.widget_graph .inner').width();
        $('.widget_graph .graph').css('height', parseInt(graphwidth/1.7));
        $(window).resize(function() {
            graphwidth = $('.widget_graph .inner').width();
            $('.widget_graph .graph').css('height', parseInt(graphwidth/1.7));
        });

        var d1 = [[0, 9], [1, 23], [1.8, 7], [2.2, 24], [2.8, 18], [4, 36]];
        var graphholder = $("#graph");
        var plot = $.plot(graphholder, [d1], {
            colors: ["#c06030", "#afd8f8", "#cb4b4b", "#4da74d", "#9440ed"],
            xaxis: {
                min: null,
                max: null
            },
            yaxis: {
                autoscaleMargin: 0.02
            },
            series: {
                lines: {
                    show: true,
                    lineWidth: 5,
                    fill: true,
                    fillColor: "rgba(69,144,161,0.1)"
                },
                points: {
                    show: true,
                    radius: 5,
                    lineWidth: 3,
                    fillColor: "#f3d4a4"
                }
            },
            grid: {
                hoverable: true,
                clickable: true,
                margin: 12,
                color: "#79889a",
                borderColor: "#79889a"
            }
        });

        function showTooltip(x, y, contents) {
            $("<div id='graph-tooltip'>" + contents + "</div>").css({top: y - 40, left: x - 22}).appendTo("body").fadeIn(200);
        };

        var previousPoint = null;
        $("#graph").bind("plothover", function (event, pos, item) {

            if (item) {
                if (previousPoint != item.dataIndex) {

                    previousPoint = item.dataIndex;

                    $("#graph-tooltip").remove();
                    var x = item.datapoint[0].toFixed(2),
                        y = item.datapoint[1].toFixed(2);

                    showTooltip(item.pageX, item.pageY, '$' + y*100);
                }
            } else {
                $("#graph-tooltip").remove();
                previousPoint = null;
            }
        });
    });
</script>

<!-- range sliders -->
<script src="js/jquery.slider.bundle.js"></script>
<script src="js/jquery.slider.js"></script>
<link rel="stylesheet" href="css/jslider.css">
<!-- Visual Text Editor -->
<script src="js/nicEdit.js"></script>
<!-- Volume, Balance -->
<script type="text/javascript" src="js/knobRot-0.2.2.js"></script>
<!-- Video Player -->
<link href="css/video-js.css" rel="stylesheet">
<script src="js/video.js"></script>
<!-- Audio Player  -->
<link href="css/jplayer.css" rel="stylesheet">
<script src="js/jquery.jplayer.min.js"></script>
<script src="js/jplayer.playlist.min.js"></script>


<!-- Scroll Bars -->
<script src="js/jquery.mousewheel.js"></script>
<script src="js/jquery.jscrollpane.min.js"></script>
<script type="text/javascript">
	jQuery(function()
	{
		jQuery('.scrollbar').jScrollPane({
			verticalDragMaxHeight: 39,
			verticalDragMinHeight: 39
		});

		jQuery('.scrollbar.style2').jScrollPane({
			verticalDragMaxHeight: 36,
			verticalDragMinHeight: 36
		});
	});
</script>

<!-- Multiselect -->
<link rel="stylesheet" href="css/chosen.css">
<script src="js/jquery.chosen.min.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#contact_name').chosen({ width: "100%" });
    });
</script>

<!--[if lt IE 9]><script src="js/respond.min.js"></script><![endif]-->
<!--[if gte IE 9]>
<style type="text/css">
    .gradient, .nicEdit-container {filter: none !important;}
</style>
<![endif]-->
</head>

<body>
                    <!-- comment form -->
                    <div class="add-comment add-comment-velvet styled" id="addcomments" style="left:200px;width: 551px;margin-left:200px;">
                        <div class="add-comment-title"><h3>New Message</h3></div>
                        <div class="comment-form">
                            <div align="left">
                              <script type="text/javascript">
                                bkLib.onDomLoaded(function() {
                                    var myNicEditor = new nicEditor({
                                        buttonList : [
                                            'bold',
                                            'italic',
                                            'underline',
                                            'forecolor',
                                            'left',
                                            'center',
                                            'right',
                                            'justify'
                                        ]
                                    });
                                    myNicEditor.setPanel('edit_buttons');
                                    myNicEditor.addInstance('styled_message');
                                });
                                setTimeout(function () {
                                    var nic_width = $('.nicEdit-panel').width();
                                    $('.nicEdit-container').css('width', nic_width);
                                    $('.nicEdit-main').css('width', nic_width-24);
                                }, 2000);
                                $(window).resize(function() {
                                    var nic_width = $('.nicEdit-panel').width();
                                    $('.nicEdit-container').css('width', nic_width);
                                    $('.nicEdit-main').css('width', nic_width-24);
                                });
                            </script>
                            </div>
                            <form name="form1" action="sendmail.php" method="post" ENCTYPE="multipart/form-data">
                            <!--enctype="multipart/form-data"是上传二进制数据; form里面的input的值以2进制的方式传过去-->
                                <div class="form-inner">
                                    <div class="field_select">
                                        <label class="label_title">Name:</label>
    									<input type="text" name="to" placeholder="用户ID" class="inputtext input_middle required" />
                                    </div>
                                    <div class="field_text">
                                        <label for="subject" class="label_title">Subject:</label>
                                        <input type="text" name="subject" id="subject" placeholder="Hello, Mike!" class="inputtext input_middle required" />
                                    </div>
                                    <div class="clear"></div>
                                    <div class="field_text field_textarea">
                                        <div id="edit_buttons" class="edit_buttons"></div>
                                        <label for="styled_message" class="label_title">Message:</label>
                                        <textarea cols="30" rows="10" name="body" id="styled_message" class="textarea textarea_middle"></textarea>
                                    </div>
                                    <div class="clear"></div>
                              </div>

                                <div class="rowSubmit">
                                    <span class="btn btn-send"><input type="submit" name="send" value="发送" /></span>
                                </div>
                          </form>
                      </div>
                    </div>
</body>
</html>

<?php
include("foot.php");
?>

<?php
$from = $_COOKIE['cookie_student_ID'];
$to = isset($_POST['to'])?$_POST['to']:'';
$subject = isset($_POST['subject'])?$_POST['subject']:'';
$body = isset($_POST['body'])?$_POST['body']:'';
$send = isset($_POST['send'])?$_POST['send']:'';

if($send == '发送')
{
  if(empty($to))
  {
    echo "<script>alert ('收件人不可为空！');</script>";
    exit();
  }
  else
  {
    $sql = "select * from $User where user_ID='$to'";
    $query = mysqli_query($DB,$sql);
    $count = mysqli_num_rows($query);
    if($count == 0)
    {
      echo "<script>alert ('收件人不存在，请检查！');</script>";
      exit();
    }
  }

  if(empty($subject))
  {
    echo "<script>alert ('主题不可为空！');</script>";
    exit();
  }
  //发送消息，并输出是否发送成功信息

date_default_timezone_set('Etc/GMT-8');
$time=date("Y-m-d H:i:s");
    $sql = "insert into $Message (M_from,M_to,M_time,M_subject,M_content) value ('$from','$to','$time','$subject','$body')";
    $query = mysqli_query($DB,$sql);
    if($query)
    {
      echo "<script>alert ('发送成功！');</script>";
      exit();
    }
  else
  {
    echo "<script>alert ('发送失败！');</script>";
    exit();
  }
}
?>

