<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>管理课程信息</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
</head>

<body>
<?php
require_once 'CourseCatalog.php';
$courseCatalog = new CourseCatalog(4);
$courseCatalog->sqlQuery();
?>

<?php
$man_name = $_COOKIE['username'];
?>

<div class="container"style="overflow:hidden;margin:0;width:100%;padding:0px;">

    <div class="row">
        <div style="padding: 1em;width: 100%;margin-top:-1em;">
        <div class="col-xs-12">
            <p class="biao"><a>首页></a><a>管理课程信息</a></p>
            <div class="row">
                <div class="col-xs-3">
                    <form class="form-inline" action="" method="post">
                        <button onclick="window.location.href='addCourse.php';" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>新增</button>
                        <div class="input-group">
                            <input type="text" name="key" class="form-control" style="width: 8em" placeholder="关键字...">
                            <span class="input-group-btn">
                                <input type="submit" name="search" class="btn btn-default" value="搜索">
                            </span>
                        </div>
                    </form>
                </div>
                <div class="col-xs-1"style="padding-right:0;">
                    <p style="padding:6px;width: 18em;padding-top:7px;margin-left: 2em">共找到<?php echo $courseCatalog->total;?>记录&nbsp;&nbsp;每页显示<?php echo $courseCatalog->pagesize;?>条&nbsp;&nbsp;共<?php echo $courseCatalog->pagenum;?>页</p>
                </div>
                <div class="col-xs-3"style="padding-left:0;margin-left: 18em">
                    <nav>
                        <ul class="pagination" style="margin:0;">
                            <?php
                            echo $courseCatalog->showpage();
                            ?>
                        </ul>
                    </nav>
                </div>
                <div class="col-xs-2" style="margin-left: inherit ">
                    <form class="form-inline" action="" method="post">
                        <div class="form-group">
                            <label for="search">第</label>
                            <input type="text" class="form-control" id="search" name="page" style="width:3em;">
                            <label for="search">页</label>
                            <input class="btn btn-primary" type="submit" name="go" value="go">
                        </div>
                    </form>
                    <?php echo $courseCatalog->pageHref();?>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-striped table-bordered" style="text-align: center">
                        <tr>
                            <td style="background-color:#3fb4c6; color:#fff;width:15%;">课程号</td>
                            <td style="background-color:#3fb4c6; color:#fff;width:18%;">课程名称</td>
                            <td style="background-color:#3fb4c6; color:#fff;width:12%;">学分</td>
                            <td style="background-color:#3fb4c6; color:#fff;width:12%;">操作</td>
                        </tr>
                        <?php
                        for($i=0;$i<$courseCatalog->getRow();$i++) {
                            $courseCatalog->showCourseList();
                            ?>
                            <tr>
                                <td><?php echo $courseCatalog->course_id; ?></td>
                                <td><?php echo $courseCatalog->cou_name; ?></td>
                                <td><?php echo $courseCatalog->credits; ?></td>
                                <td>
                                    <a href="updateCourse.php?action=modify&course_id=<?php echo $courseCatalog->course_id ?>"><span class="glyphicon glyphicon-pencil"></span>修改&nbsp;</a>
                                    <a onclick="return confirm(\'确定删除课程吗?\')" href="CourseManagement.php?action=delete&id=<?php echo $courseCatalog->course_id ?>"><span class="glyphicon glyphicon-trash"></span>删除</a>
                                </td>
                            </tr>
                            <?php
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
                    <p style="margin:3em;">确定删除吗？</p>
                    <div style="text-align:right;background-color:#eee;padding:5px;">
                        <button class="btn btn-default">确认</button>&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-default" id="cancel">取消</button>
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
