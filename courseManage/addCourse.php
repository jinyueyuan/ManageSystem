<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>添加课程信息</title>
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
            <p class="biao"><a>首页></a><a>管理课程信息></a><a>添加课程信息</a></p>
            <form class="form-horizontal" action="CourseManagement.php?action=add" method="POST">
                <div class="form-group">
                    <label for="course_id" class="col-xs-3 control-label"><span style="color:red">*</span>课程编号：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="course_id" name="course_id">
                    </div>
                </div>
                <div class="form-group">
                    <label for="cou_name" class="col-xs-3 control-label"><span style="color:red">*</span>课程名称：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="cou_name" name="cou_name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="credits" class="col-xs-3 control-label"><span style="color:red">*</span>学分：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="credits" name="credits">
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
