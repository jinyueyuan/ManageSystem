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

<div class="container" style="overflow:hidden;margin:0;width:100%;padding:0px;">

    <div class="row" style="padding: 1em;width: 100%;margin-top:-1em;">

        <div class="col-xs-9">
            <p class="biao"><a>首页></a><a>查看学生简介</a></p>
            <table class="table table-striped table-bordered">
                <tr>
                    <?php
                    require_once '../DB/connDB.php';
                    require_once 'stuInfor.php';
                    $getStuID = $_GET['stu_id'];
                    $stuInfor = new stuInfor($getStuID);
                    $stuInfor->sqlQuery();
                    for ($i = 0; $i < $stuInfor->getRow(); $i++) {
                    $stuInfor->showStuInfor();
                    ?>
                    <td colspan="2">学生学号</td>
                    <td colspan="2"><?php echo$stuInfor->stu_id ?></td>

                    <td colspan="2">学生姓名</td>
                    <td colspan="1"><?php echo $stuInfor->stu_name ?></td>

                    <td rowspan="2"><img src="<?php echo $stuInfor->photo ?>" style="width:5em;"/></td>
                </tr>
                <tr>
                    <td>性别</td>
                    <td><?php echo $stuInfor->sex ?></td>

                    <td>民族</td>
                    <td><?php echo $stuInfor->nation ?></td>

                    <td>出生年月</td>
                    <td colspan="2"><?php echo $stuInfor->birth_year . '-' . $stuInfor->birth_month . '-' . $stuInfor->birth_day ?></td>

                </tr>
                <tr>
                    <td colspan="2">身份证号</td>
                    <td colspan="2"><?php echo $stuInfor->id_card ?></td>

                    <td colspan="2">政治面貌</td>
                    <td colspan="2"><?php echo $stuInfor->politics  ?></td>

                </tr>
                <tr>
                    <td colspan="2">籍贯</td>
                    <td colspan="2"><?php echo $stuInfor->area  ?></td>

                    <td colspan="2">家庭住址</td>
                    <td colspan="2"><?php echo $stuInfor->family_addr  ?></td>

                </tr>
                <tr>
                    <td colspan="2">联系电话</td>
                    <td colspan="2"><?php echo $stuInfor->telephone ?></td>

                    <td colspan="2">入学年份</td>
                    <td colspan="2"><?php echo $stuInfor->enter_year ?></td>
                    <?php

                    ?>
                </tr>
                <tr>
                    <td colspan="2" style="height:5em;">经历</td>
                    <td colspan="6" style="height:5em;"><?php echo $stuInfor->experience  ?></td>

                </tr>
                <tr>
                    <td colspan="2" style="height:5em;">个性特点</td>
                    <td colspan="6" style="height:5em;"><?php echo $stuInfor->character  ?></td>
                </tr>
                <tr>
                    <td colspan="2" style="height:5em;">奖励和成就</td>
                    <td colspan="6" style="height:5em;"><?php echo $stuInfor->achieve  ?></td>
                </tr>
                <tr>
                    <td colspan="2" style="height:5em;">惩罚</td>
                    <td colspan="6" style="height:5em;"><?php echo $stuInfor->punish  ?></td>
                    <?php
                    }
                    ?>
                </tr>
            </table>
            <div align="center">
                <input type="submit" value="返回" onclick="javascript:window.location='stu_simpleList.php';" class="btn btn-primary"/>
            </div>
        </div>
    </div>
</div>

</body>
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script>
    window.onload = function () {
        if ($("body").height() < window.innerHeight) {
    };
</script>
</html>
