<?php
require_once("../classManage/classCatalog.php");
require_once("../StudentManage/studentCatalog.php");
require_once("../StudentManage/studentManage.php");
$userid=$_COOKIE['userid'];
$tea=new classCatalog();
$tea->teaFindClass($userid);
$grade_id=$tea->getGradeNum();
$class_id=$tea->getClassNum();
$object=new studentCatalog($grade_id,$class_id);
$catalog=$object->showStudentList();
$object->sqlQuery();
if($object->sqlQuery())
    $catalog=$object->sqlQuery();
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>电子档案</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
</head>

<body>


<div class="container"style="overflow:hidden;margin:0;width:100%;padding:0px;">

    <div class="row" style="padding: 1em;width: 100%;margin-top:-1em;">

        <div class="col-xs-12" >
            <p class="biao"><a>首页></a><a>电子档案</a></p>
            <div class="row">
                <div class="col-xs-4">
                    <form name="searchForm" class="form-inline" action="" method="post">

                        <div class="input-group" class="col-xs-3;">
                            <input type="text" name="key" class="form-control" placeholder="关键字...">
                            <span class="input-group-btn">
                                <input type="submit" name="search" class="btn btn-default" value="搜索">
                            </span>
                        </div>
                    </form>
                </div>
                <div class="col-xs-1 "style="padding-right:0;">
                    <p style="padding:6px;width: 17em;padding-top:7px;">共找到<?php echo $object->total;?>记录&nbsp;&nbsp;每页显示<?php echo $object->pagesize;?>条&nbsp;&nbsp;共<?php echo $object->pagenum;?>页</p>
                </div>
                <div class="col-xs-3" style="padding-left:0;margin-left: 14em">
                    <nav>
                        <ul class="pagination" style="margin:0;">
                            <?php
                            echo $object->showpage();
                            ?>

                        </ul>
                    </nav>
                </div>
                <div class="col-xs-2" style="margin-left: inherit ">
                    <form class="form-inline" action="" method="post">
                        <div class="form-group">
                            <label for="search">第</label>
                            <input name="page" type="text" class="form-control" id="search" style="width:3em;">
                            <label for="search">页</label>
                            <input class="btn btn-primary" type="submit" name="go" value="go">
                        </div>
                    </form>
                    <?php echo $object->pageHref();?>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td style="background-color:#3fb4c6; color:#fff;width:18%;">学生学号</td>
                            <td style="background-color:#3fb4c6; color:#fff;width:15%;">名字</td>
                            <td style="background-color:#3fb4c6; color:#fff;width:12%;">班级</td>
                            <td style="background-color:#3fb4c6; color:#fff;width:18%;">职务</td>
                            <td style="background-color:#3fb4c6; color:#fff;width:18%;">座位号</td>
                            <td style="background-color:#3fb4c6; color:#fff;">操作</td>
                        </tr>
                        <?php
                        if($catalog){
                            $pagesize=$object->retpagesize();
                            if(!empty($_GET['page'])){
                                $i=($_GET['page']-1)* $pagesize;}
                            else
                                $i=0;
                            for($j=0;$j<$pagesize&&$i<$object->getRow();$i++,$j++)  {
                                ?>
                                <tr>
                                    <td><?php echo $catalog[$i]['stu_id']?></td>
                                    <td><?php echo $catalog[$i]['stu_name']?></td>
                                    <td><?php echo $catalog[$i]['class_id']?></td>
                                    <td><?php echo $catalog[$i]['stu_job']?></td>
                                    <td><?php echo $catalog[$i]['seat_id']?></td>
                                    <td><a href="stu_elecQuery.php?id=<?php echo $catalog[$i]['stu_id'];?>" class="check" ><span class=" glyphicon glyphicon-search"></span>查看</a>/
                                        <a href="stu_elecFill.php?id=<?php echo $catalog[$i]['stu_id'];?>" class="change"><span class="glyphicon glyphicon-pencil"></span>修改</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>

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
