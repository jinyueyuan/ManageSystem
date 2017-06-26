<?php
require_once("classCount.php");
require_once '../classManage/classManage.php';
if(!empty($_POST['grade_id']) && !empty($_POST['class_id'])&&is_numeric($_POST['grade_id'])&&is_numeric($_POST['class_id'])){
    $object=new classCount($_POST['class_id'],$_POST['grade_id']);
    $claobject=new classManage();
    $row=$claobject->showInfor($_POST['class_id'],$_POST['grade_id']);
    if($_POST['grade_id']==1)
        $grade="高一";
    else if($_POST['grade_id']==2)
        $grade="高二";
    else
        $grade="高三";
}
else{
    echo "<script>alert('请重新选择班级');window.location.href='classStatics.php';</script>";
}

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
        <div class="col-xs-9">
            <p class="biao"><a>首页></a><a href="classStatics.php">班级信息></a><a>班级统计</a></p>
            <table class="table table-striped table-bordered">
                <!--                利用表单显示数据-->

                <tr>
                    <td width="20%">年级</td>
                    <td width="20%"><?php echo $grade;?></td>
                    <td width="20%">班级</td>
                    <td width="20%"><?php echo $_POST['class_id']."班"?></td>
                </tr>
                <tr>
                    <td width="20%">班主任</td>
                    <td width="20%"><?php echo $row['tea_name']?></td>
                    <td width="20%">班级地址</td>
                    <td width="20%"><?php echo $row['class_addr']?></td>
                </tr>
                <tr>
                    <td width="20%">班级总人数</td>
                    <td width="20%"><?php echo $object->showtotalNum();?></td>
                    <td width="20%">平均年龄</td>
                    <td width="20%"><?php echo $object->showavgAge();?></td>
                </tr>
                <tr>
                    <td width="20%">男生总数</td>
                    <td width="20%"><?php echo $object->showtotalBoy();?></td>
                    <td width="20%">女生总数</td>
                    <td cwidth="20%"><?php echo $object->showtotalGirl();?></td>
                </tr>

            </table>
                <div align="center">
                <input type="submit" value="返回" onclick="javascript:window.location='classStatics.php';" class="btn btn-primary"/></div>
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
