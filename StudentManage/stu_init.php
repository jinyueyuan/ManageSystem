<?php
require_once("../classManage/classCatalog.php");
require_once("studentCatalog.php");
require_once("studentManage.php");
$username=$_COOKIE['username'];
$userid=$_COOKIE['userid'];
$grade_id=$_COOKIE['grade_id'];
$man=new classCatalog();
$clacatalog=$man->showCList($grade_id);
if(!empty($_POST['class_id']))
{
    setcookie('class_id',$_POST['class_id'],time()+600,'/');
    $_COOKIE['class_id']=$_POST['class_id'];
    $object=new studentCatalog($grade_id, $_POST['class_id']);
}
else
    $object=new studentCatalog($grade_id, $_COOKIE['class_id']);
if (!empty($_GET['delete'])&&$_GET['delete']==1){
    $aaa=new studentManage($_COOKIE['class_id'],$_COOKIE['grade_id']);
    $aaa->deleteStudent($_GET['id']);
    $catalog=$object->showStudentList();
}
else {
    $catalog = $object->showStudentList();
}
if($object->sqlQuery())
{
    $catalog=$object->sqlQuery();
}

if($grade_id==1)
    $grade="高一";
else if($grade_id==2)
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
    <title>管理学生信息</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
</head>

<body>

<div class="container"style="overflow:hidden;margin:0;width:100%;padding:0px;">

    <div class="row">
        <div style="padding: 1em;width: 100%;margin-top:-1em;">
        <div class="col-xs-12">
            <p class="biao"><a>首页></a><a>管理学生信息</a></p>

            <div class="row">

                <div class="col-xs-3">
                    <form name="searchForm" class="form-inline" action="stu_init.php" method="post">
                        <button onclick="window.location.href='stu_add.php';" type="button" class="btn btn-primary biaoao"><span class="glyphicon glyphicon-plus"></span>新增</button>
                        <div class="input-group" >
                            <input type="text" name="key" class="form-control" placeholder="关键字..." style="width:8em">
                            <span class="input-group-btn">
                                <input type="submit" name="search" class="btn btn-default" value="搜索">
                            </span>
                        </div>
                    </form>
                </div>

                <div class="col-xs-3" >
                    <form name="searchForm" class="form-inline" action="stu_init.php" method="post">
                        <span><?php echo $grade;?></span>&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="input-group" style="margin-left: 4px;">
                            <select type="text" name="class_id" class="form-control" style="width:80px;">
                                <?php
                                if($clacatalog) {
                                    foreach($clacatalog as $key => $value) {
                                        ?>
                                        <option value="<?php echo $value['class_id'];?>"
                                            <?php if(isset($_COOKIE['class_id'])&&$value['class_id']==$_COOKIE['class_id'])
                                                echo "selected=\"selected\""?>
                                            ><?php echo $value['class_id'];?>班</option>";
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

                <div class="col-xs-3" style="padding-left:0;margin-left: 2em">
                    <nav>
                        <ul class="pagination" style="margin:0;">
                            <?php
                            echo $object->showpage();
                            ?>
                            <span> &nbsp;&nbsp;共<?php echo $object->pagenum;?>页</span>
                        </ul>
                    </nav>
                </div>

                <div class="col-xs-2" style="margin-right: inherit ">
                    <form class="form-inline" action="stu_init.php" method="post">
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

            <div class="row" style="padding-top: 1em;">
                <div class="col-xs-12" >
                    <table class="table table-striped table-bordered" >
                        <tr>
                            <td style="background-color:#3fb4c6; color:#fff;width:15%;" >学生学号</td>
                            <td style="background-color:#3fb4c6; color:#fff;width:15%;">名字</td>
                            <td style="background-color:#3fb4c6; color:#fff;width:10%;">年级</td>
                            <td style="background-color:#3fb4c6; color:#fff;width:10%;">班级</td>
                            <td style="background-color:#3fb4c6; color:#fff;width:18%;">职务</td>
                            <td style="background-color:#3fb4c6; color:#fff;width:10%;">座位号</td>
                            <td style="background-color:#3fb4c6; color:#fff;">操作</td>
                        </tr>
                        <?php
                        if($catalog) {
                            $pagesize=$object->retpagesize();
                            if(!empty($_GET['page'])){
                                $i=($_GET['page']-1)*$pagesize;}
                            else {
                                $i = 0;
                            }
                            for($j=0;$j<$pagesize&&$i<$object->getRow();$i++,$j++)  {
                                ?>
                                <tr>
                                    <td><?php echo $catalog[$i]['stu_id'] ?></td>
                                    <td><?php echo $catalog[$i]['stu_name'] ?></td>
                                    <td><?php echo $catalog[$i]['grade_id'] ?></td>
                                    <td><?php echo $catalog[$i]['class_id'] ?></td>
                                    <td><?php echo $catalog[$i]['stu_job'] ?></td>
                                    <td><?php echo $catalog[$i]['seat_id'] ?></td>
                                    <td><a href="stu_check.php?id=<?php echo $catalog[$i]['stu_id']; ?>"
                                           class="check"><span class=" glyphicon glyphicon-search"></span>查看</a>/
                                        <a href="stu_change.php?id=<?php echo $catalog[$i]['stu_id']; ?>"
                                           class="change"><span class="glyphicon glyphicon-pencil"></span>修改</a>/
                                        <a href="#"
                                           deleteSelect="stu_init.php?id=<?php echo $catalog[$i]['stu_id']; ?> & delete=1"
                                           class="delete"><span class="glyphicon glyphicon-trash"></span>删除</a></td>
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
</div>
<div style="width:100%;height:100%;position:absolute;background-color:#000;top:0;left:0;z-index:2;opacity:0.3;display:none;" id="cover"></div>
<div style="position:absolute;top:5em;width:100%;z-index:3;text-align:left;display:none;" id="pushWindow">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-4 col-xs-offset-4"style="background-color:#fff;padding:0;">
                <p style="background-color:#3fb4c6;margin:0;padding:5px;color:#fff;">删除询问</p>
                <div style="text-align:center;">
                    <p style="margin:3em;">确定删除该文件吗？</p>
                    <div style="text-align:right;background-color:#eee;padding:5px;">
                        <input type="submit" class="btn btn-default" value="确认" id="deleteConfirm">
                        &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-default" id="cancel">取消</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/control.js"></script>

</html>