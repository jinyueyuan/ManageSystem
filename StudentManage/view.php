<?php
require_once("../classManage/classCatalog.php");
require_once("studentCatalog.php");
$man=new classCatalog();
$clacatalog=$man->showCList($_COOKIE['grade_id']);
if($_COOKIE['grade_id']==1)
    $grade="高一";
else if($_COOKIE['grade_id']==2)
    $grade="高二";
else
    $grade="高三";

?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>后台管理</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
  </head>

  <body>

    <div class="container"style="overflow:hidden;margin:0;width:100%;padding:0px;">

      <div class="row">

        <div class="col-xs-10" style="margin-left: 1em">
          <p class="biao"><a>首页></a></p>
          <div class="col-xs-4">
            <form name="searchForm" class="form-inline" action="stu_init.php" method="post">
              <span><?php echo $grade;?></span>&nbsp;&nbsp;&nbsp;&nbsp;
              <div class="input-group" class="col-xs-3">
                <select type="text" name="class_id" class="form-control" style="width:80px;">
                  <?php
                  if($clacatalog) {
                    foreach($clacatalog as $key => $value) {
                      ?>
                      <option value="<?php echo $value['class_id'];?>"><?php echo $value['class_id'];?>班</option>";
                 <?php }
                    }
                  ?>
                  </select>
                <span class="input-group-btn">
                  <input type="submit" name="search" class="btn btn-default" value="班级搜索">
                </span>
              </div>
            </form>
          </div>

              </div>
            </div>
          </div>



  </body>
  <script src="../js/jquery-1.11.3.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
<!--  <script>-->
<!--    window.onload=function(){-->
<!---->
<!--      if($("body").height() < window.innerHeight){-->
<!--        $("#inn").css("height",window.innerHeight-50);-->
<!--      }-->
<!--      else {-->
<!--        $("#inn").css("height",document.body.scrollHeight-50);-->
<!--      }-->
<!--    };-->
<!--  </script>-->
</html>
