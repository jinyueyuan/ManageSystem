<?php
/** file: updateCourse.php 课程修改表单 */
include "../DB/connDB.php";
/* 通过ID查找指定的一行记录 */
$sql = "SELECT * FROM course WHERE course_id='{$_GET["course_id"]}'";
$result = mysql_query($sql);

if($result && mysql_num_rows($result) > 0) {
    /* 获取需要修改的记录数据 */
    list($course_id,$cou_name,$credits) = mysql_fetch_row($result);
}else {
    die("没有找到需要修改的课程");
}
?>

<?php
$man_name = $_COOKIE['username'];
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>更新课程信息</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
</head>

<body>

<div class="container"style="overflow:hidden;margin:0;width:100%;padding:0px;">
    <div class="row">
        <div class="col-xs-7" style="padding: 2em;margin-top:-2em;">
            <p class="biao"><a>首页></a><a>管理课程信息></a><a>更新课程信息</a></p>
            <form class="form-horizontal" action="CourseManagement.php?action=update" method="POST">
                <div class="form-group">
                    <label for="course_id" class="col-xs-3 control-label"><span style="color:red">*</span>课程编号：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="course_id" name="course_id" value="<?php echo $course_id ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cou_name" class="col-xs-3 control-label"><span style="color:red">*</span>课程名称：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="cou_name" name="cou_name" value="<?php echo $cou_name ?>" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="credits" class="col-xs-3 control-label"><span style="color:red">*</span>学分：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="credits" name="credits" value="<?php echo $credits ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-offset-3 col-xs-6">
                        <button type="submit" name="update" id="update" value="修改课程" class="btn btn-primary"style="width:40%;font-size:1.5em;text-align:center;">修&nbsp;改&nbsp;课&nbsp;程</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
