<?php

require_once("../classManage/classCatalog.php");
$username=$_COOKIE['username'];
$userid=$_COOKIE['userid'];
$man=new classCatalog();
$man->manFindClass($userid);
$grade_id=$man->getGradeNum();
setcookie('grade_id',$grade_id,time()+3600,'/');
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>学生信息查询系统管理员后台</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-default" style="margin-bottom:0;border:0;border-radius:0;">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-grain"></span>&nbsp;学生信息管理员后台系统</a>
        </div>

        <span class="navbar-text"style="float:right;"><a href="../Login/loginFace.php">退出管理</a></span>
        <span class="navbar-text"style="float:right;">欢迎登录，<?php echo $username;?></span>
    </div>
</nav>

<div class="container"style="overflow:hidden;margin:0;width:100%;padding:0px;">
    <div class="row">
        <div class="col-xs-2"id="inn">
            <ul class="nav nav-pills nav-stacked">
                <li onClick="getclassname(this)"><a href="../StudentManage/view.php" target="right"><span class="glyphicon glyphicon-user biaoao"></span>&nbsp;管理学生信息</a></li>
                <li onClick="getclassname(this)"><a href="../teacherManage/showTeacher.php" target="right"><span class="glyphicon glyphicon-education"></span>&nbsp;管理教师信息</a></li>
                <li onClick="getclassname(this)"><a href="../classManage/viewClassCatalog.php" target="right"><span class="glyphicon glyphicon-tree-conifer"></span>&nbsp;管理班级信息</a></li>
                <li ><a href="#stuinfo" class="nav-header collapsed" data-toggle="collapse"><span class="glyphicon glyphicon-book"></span>&nbsp;管理课程信息</a>
                <ul id="stuinfo" class="nav nav-list secondmenu collapse" style="height: 0px;">
                    <li onClick="getclassname(this)"><a href="../courseManage/viewCourseCatalog.php" target="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;管理课程信息</a></li>
                    <li onClick="getclassname(this)"><a href="../takeCourseManage/viewTakeCourseCatalog.php" target="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;管理上课信息</a></li>
                </ul>
                <li onClick="getclassname(this)"><a href="../dutyChartManage/zhiwubiao.php" target="right"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;管理职务表</a></li>
            </ul>
        </div>
        <div class="col-xs-10" style="padding:0;">
            <iframe id="biao"  marginheight="0" marginwidth="0" class="inner_navigation1" name="right" src="" frameborder="0"scrolling="auto"
                    style="width:100%;" onload="dyniframesize('biao')"></iframe>
        </div>
    </div>
</div>

</body>
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/control.js"></script>
<script src="../js/index.js"></script>
<script>
    var biao = function(){
        if($("body").height() < window.innerHeight){
            $("#inn").css("height",window.innerHeight-84.5);
        }
        else {
            $("#inn").css("height",window.innerHeight-84.5);
            $("#inn").css("height",document.body.scrollHeight-84.5);
        }
    }
    biao();
    $('#biao').load(function(){
        console.log("wawa");
        $(window.frames["right"].document).find(".biaoao").on('click',function(){
            console.log("wawa");
            biao();
        });
        biao();
    })
</script>
</html>
