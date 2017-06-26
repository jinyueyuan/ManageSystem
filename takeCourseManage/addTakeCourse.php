<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>添加上课信息</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
</head>

<?php
$man_name = $_COOKIE['username'];
?>

<body>
<div class="container"style="overflow:hidden;margin:0;width:100%;padding:0px;">

    <div class="row">
        <div class="col-xs-7" style="padding: 2em;margin-top:-2em;">
            <p class="biao"><a>首页></a><a>管理上课信息></a><a>添加上课信息</a></p>
            <form class="form-horizontal" action="takeCourseManagement.php?action=add" method="POST">
                <div class="form-group">
                    <label for="stu_id" class="col-xs-3 control-label"><span style="color:red">*</span>学号：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="stu_id" name="stu_id">
                    </div>
                </div>
                <div class="form-group">
                    <label for="class_id" class="col-xs-3 control-label"><span style="color:red">*</span>班级号：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="class_id" name="class_id">
                    </div>
                </div>
                <div class="form-group">
                    <label for="course_id" class="col-xs-3 control-label"><span style="color:red">*</span>课程编号：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="course_id" name="course_id">
                    </div>
                </div>
                <div class="form-group">
                    <label for="tea_id" class="col-xs-3 control-label"><span style="color:red">*</span>教师编号：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="tea_id" name="tea_id">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-offset-3 col-xs-6">
                        <button type="submit" name="submit" value="确认提交" class="btn btn-primary"style="width:40%;font-size:1.5em;text-align:center;">确&nbsp;认&nbsp;提&nbsp;交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/checkPhoto.js"></script>
<script src="../js/inputLimit.js"></script>
</html>
