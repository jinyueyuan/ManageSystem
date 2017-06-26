<?php
require_once("../StudentManage/studentManage.php");
$object=new studentManage($_COOKIE['class_id'],$_COOKIE['grade_id']);
$show=$object->showStudentIntro($_GET['id']);
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>查看学生信息</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
</head>

<body>

<div class="container"style="overflow:hidden;margin:0;width:100%;padding:0px;">

    <div class="row" style="padding: 1em;width: 100%;margin-top:-1em;">
        <div class="col-xs-10">
            <p class="biao"><a>首页></a><a href="stu_elecList.php">电子档案></a><a>查看电子档案</a></p>
            <table class="table table-striped table-bordered">
                <!--                利用表单显示数据-->

                <tr>
                    <td colspan="2">学生学号</td>
                    <td colspan="2"><?php echo $show['stu_id']?></td>
                    <td colspan="1">学生名字</td>
                    <td colspan="1"><?php echo $show['stu_name']?></td>
                    <td rowspan="2"><img src="<?php echo $show['photo']?>" style="width:5em;"/></td>
                </tr>
                <tr>
                    <td colspan="2">性别</td>
                    <td colspan="2"><?php echo $show['sex']?></td>
                    <td colspan="1">民族</td>
                    <td colspan="1"><?php echo $show['nation']?></td>
                </tr>
                <tr>
                    <td colspan="2">籍贯</td>
                    <td colspan="2"><?php echo $show['area']?></td>
                    <td colspan="1">出生年月日</td>
                    <td colspan="1"><?php echo $show['birth_year']."/".$show['birth_month']."/".$show['birth_day']?></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="2">入学时间</td>
                    <td colspan="2"><?php echo $show['enter_year']?></td>
                    <td colspan="1">毕业学校</td>
                    <td colspan="1"><?php echo $show['preschool']?></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="2">身份证号</td>
                    <td colspan="2"><?php echo $show['id_card']?></td>
                    <td colspan="1">政治面貌</td>
                    <td colspan="1"><?php echo $show['politics']?></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="2">联系电话</td>
                    <td colspan="2"><?php echo $show['telephone']?></td>
                    <td colspan="1">邮箱</td>
                    <td colspan="1"><?php echo $show['email']?></td>
                    <td colspan="1"></td>
                </tr>
                <tr>
                    <td colspan="2"style="height:3em;">家庭地址</td>
                    <td colspan="7"><?php echo $show['family_addr']?></td>
                </tr>
                <tr>
                    <td colspan="2"style="height:5em;">奖励</td>
                    <td colspan="7"><?php echo $show['achieve']?></td>
                </tr>
                <tr>
                    <td colspan="2"style="height:5em;">惩罚</td>
                    <td colspan="7"><?php echo $show['punish']?></td>
                </tr>
                <tr>
                    <td colspan="2"style="height:5em;">个性特点</td>
                    <td colspan="7"><?php echo $show['characteristic']?></td>
                </tr>
                <tr>
                    <td colspan="2"style="height:5em;">个人经历</td>
                    <td colspan="7"><?php echo $show['experience']?></td>
                </tr>
            </table>
                <div align="center"><input type="submit" value="修改" onclick="javascript:window.location='stu_elecFill.php?id=\'<?php echo $_GET['id']?>\' '" class="btn btn-primary"/>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <input type="submit" value="返回" onclick="javascript:window.location='stu_elecList.php';" class="btn btn-primary"/></div>
        </div>
    </div>
</div>

</body>
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script>
    window.onload=function(){
        if($("body").height() < window.innerHeight){
            $("#inn").css("height",window.innerHeight-50);
        }
        else {
            $("#inn").css("height",document.body.scrollHeight-50);
        }
    };
</script>
</html>
