<?php
require_once("../classManage/classCatalog.php");
$username=$_COOKIE['username'];
$userid=$_COOKIE['userid'];
$tea=new classCatalog();
$tea->teaFindClass($userid);
setcookie('grade_id',$tea->getGradeNum(),time()+3600,'/');
setcookie('class_id',$tea->getClassNum(),time()+3600,'/');
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>学生信息查询系统</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/main.css" rel="stylesheet">
</head>
<style>
  table{text-align:center}
  td {height:45px}
  select{width:80px}
</style>
<body>
<nav class="navbar navbar-default" style="margin-bottom:0;border:0;border-radius:0;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-grain"></span>&nbsp;学生信息查询系统</a>
    </div>

    <span class="navbar-text"style="float:right;"><a href="../Login/loginFace.php">退出管理</a></span>
    <span class="navbar-text"style="float:right;">欢迎登录，<?php echo $username;?></span>
  </div>
</nav>

    <div class="container"style="overflow:hidden;margin:0;width:100%;padding:0px;">

      <div class="row">
        <div class="col-xs-2"id="inn" style="height: 614px;">
          <ul class="nav nav-pills nav-stacked">
            <li ><a href="#stuinfo" class="nav-header collapsed" data-toggle="collapse"> <span class="glyphicon glyphicon-user"></span>&nbsp;学生信息</a>
              <ul id="stuinfo" class="nav nav-list secondmenu collapse" style="height: 0px;text-indent: 2em">
                <li onClick="getclassname(this)"><a href="../Query/stu_baseQuery.php" target="right" style="color: grey">基本情况</a></li>
                <li onClick="getclassname(this)"><a href="../viewStuInfor/stu_simpleList.php" target="right" style="color: grey">学生简介</a></li>
                <li onClick="getclassname(this)"><a href="../familyQuery/classSelect.php" target="right" style="color: grey">通讯录</a></li>
              </ul></li>


            <li ><a href="#clainfo" class="nav-header collapsed" data-toggle="collapse" >
                <span class="glyphicon glyphicon-education"></span>&nbsp;班级信息</a>
              <ul id="clainfo" class="nav nav-list secondmenu collapse" style="height: 0px;text-indent: 2em">
                    <li onClick="getclassname(this)"><a href="../seatChart/seatForm_view.php" target="right" style="color: grey">打印座位表</a></li>
                    <li onClick="getclassname(this)"><a href="../seatChart/seatChart_view.php" target="right" style="color: grey">打印座位图</a></li>
                <li onClick="getclassname(this)"><a href="../viewClassStructure/classStructure_view.php" target="right" style="color: grey">组织结构</a></li>
                <li onClick="getclassname(this)"><a href="../classCount/classStatics.php" target="right" style="color: grey">班级统计</a></li>
              </ul>
            </li>


            <li ><a href="#gratt" class="nav-header collapsed" data-toggle="collapse">
                <span class="glyphicon glyphicon-tree-conifer"></span>&nbsp;考勤成绩</a>
              <ul id="gratt" class="nav nav-list secondmenu collapse" style="height: 0px;text-indent: 2em">
                <li onClick="getclassname(this)"><a href="../scoreCheckin/HomeRecordScoreCheckIn.php" target="right" style="color: grey">记录成绩与考勤</a></li>
                <li onClick="getclassname(this)"><a href="../scoreCheckin/HomeViewScoreCheckIn.php" target="right" style="color: grey">打印成绩与考勤</a></li>
              </ul>
            </li>

            <li onClick="getclassname(this)"><a href="../Query/stu_elecList.php" target="right"><span class="glyphicon glyphicon-book"></span>&nbsp;电子档案</a>
            </li>
          </ul>
        </div>
        <div class="col-xs-10" style="padding:0;">
          <iframe id="biao"  marginheight="0" marginwidth="0" class="inner_navigation1" name="right" src="" frameborder="0" height="700px"
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
      $("#inn").css("height",window.innerHeight-40);
    }
    else {
      $("#inn").css("height",window.innerHeight-40);
      $("#inn").css("height",document.body.scrollHeight-40);
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
