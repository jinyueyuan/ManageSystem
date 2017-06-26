<?php

$id=$_COOKIE['userid'];
$name=$_COOKIE['username'];
require_once("../DB/connDB.php");
require_once("DutyChart.php");
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>添加教师信息</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
  </head>

  <body>

    <div class="container"style="overflow:hidden;margin:0;width:100%;padding:0px;">
      <div style="padding: 2em;width: 100%;margin-top:-2em;">
      <p class="biao"><a>首页></a><a>管理职务表</a></p>
      <div class="row">

        <div class="col-xs-5">
            <?php
            $temp=new DutyChart();
            $chart=$temp->getDutyChart();
            $num=count($chart);
            if($num!=0){
                echo "<table class='table table-bordered table-striped' style='margin-top:10px;margin-left:10px'>";
                echo "<tr style='background-color:#3fb4c6; color:#fff;'><th>职务</th><th>编号</th></tr>";
                for($i=0;$i<$num;$i++){
                    echo "<tr><td>".$chart[$i]['job_name']."</td><td>".$chart[$i]['job_seq']."</td></tr>";
                }
                echo "</table>";
            }else{
                echo "no data";
            }

            ?>
<a href = "xiugaizhiwubiao.php"><button class="btn btn-default" style="margin-left: 10px" >编辑</button></a>
        </div>
      </div>
    </div>
</div>
  </body>
  <script src="../js/jquery-1.11.3.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/YMDClass.js"></script>
  <script>
    window.onload=function(){
      new YMDselect('year','month','day');
    };

  </script>
</html>
