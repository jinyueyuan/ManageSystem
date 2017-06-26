<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>查看教师信息</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
</head>

<body>

<?php
require_once 'teacherManage.php';
if (!empty($_GET['check'])) {
    $checkTeacher = new teacherManage();
    $checkTeacher->checkTeacher($_GET['tea_id']);
}
?>
<div class="container"style="overflow:hidden;margin:0;width:100%;padding:0px;">
    <div class="row">
        <div class="col-xs-11" style="padding: 2em;margin-top:-2em;">
            <p class="biao"><a>首页></a><a>管理教师信息></a><a>查看教师信息</a></p>
            <table class="table table-striped table-bordered">
                <tr>
                    <td colspan="2">教职工号</td>
                    <td colspan="2"><?php echo $checkTeacher->tea_id; ?></td>
                    <td colspan="1">教师名字</td>
                    <td colspan="1"><?php echo $checkTeacher->tea_name; ?></td>
                    <td rowspan="2"><img src="../photo/<?php echo $checkTeacher->photo;?>" style="width:5em;"/></td>
                </tr>
                <tr>
                    <td colspan="1">性别</td>
                    <td colspan="1"><?php echo $checkTeacher->sex; ?></td>
                    <td colspan="1">民族</td>
                    <td colspan="1"><?php echo $checkTeacher->nation; ?></td>
                    <td colspan="1">出生年月</td>
                    <td colspan="1"><?php echo $checkTeacher->year.'年'.$checkTeacher->month.'月'.$checkTeacher->day.'日'; ?></td>

                </tr>
                <tr>
                    <td colspan="2">身份证号</td>
                    <td colspan="2"><?php echo $checkTeacher->id_card; ?></td>
                    <td colspan="1">政治面貌</td>
                    <td colspan="1"><?php echo $checkTeacher->politice; ?></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="2">学历</td>
                    <td colspan="2"><?php echo $checkTeacher->education; ?></td>
                    <td colspan="1">毕业专业</td>
                    <td colspan="1"><?php echo $checkTeacher->profession; ?></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="2">联系电话</td>
                    <td colspan="2"><?php echo $checkTeacher->phone; ?></td>
                    <td colspan="1">邮箱</td>
                    <td colspan="1"><?php echo $checkTeacher->email; ?></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="2" style="height:5em;">备注</td>
                    <td colspan="6" style="height:5em;"><?php echo $checkTeacher->remark; ?></td>
                </tr>
            </table>
        </div>
        <div class="form-group">
            <div class="col-xs-2 col-xs-offset-7">
                <input type="button" value="修改" name="submit" onclick="javascript:location='modifyTeacher.php?tea_id=<?php echo $checkTeacher->tea_id; ?> & modify=1'" class="btn btn-primary"style="width:80%;font-size:1.5em;text-align:center;">
            </div>
            <div class="col-xs-2">
                <input type="button" value="返回" name="submit" onclick="javascript:location='showTeacher.php'" class="btn btn-primary"style="width:80%;font-size:1.5em;text-align:center;">
            </div>
        </div>
    </div>
</div>



</body>
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
