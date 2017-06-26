<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>首页</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
</head>

<body>

<div class="container" style="overflow:hidden;margin:0;width:100%;padding:0px;">

    <div class="row" style="padding: 1em;width: 100%;margin-top:-1em;">

        <div class="col-xs-10">
            <p class="biao"><a>首页></a><a>班级信息></a><a>班级统计</a></p>

            <form class="form-horizontal" action="classSta_query.php" method="post">
                <div class="form-group" style="margin-top: 1em">
                    <select name="grade_id" class="form-control col-sm-2"
                            style="width: 6em;margin-left: 1.5em;text-align: center">
                        <option value="年级" selected="selected">年级</option>
                        <?php
                        require_once '../classManage/classCatalog.php';
                        $classob=new classCatalog();
                        $gradeList=$classob->showGListDistinct();
                        $i=0;
                        while (list($grade_id) = mysql_fetch_row($gradeList)) {
                            $i++;
                            ?>

                            <option
                                value="<?php echo $i; ?>" ><?php echo $grade_id ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <select name="class_id" class="form-control col-sm-2"
                            style="width: 6em;margin-left: 1em;text-align: center">
                        <option value="班级" selected="selected">班级</option>
                        <?php
                        $classList=$classob->showCListDistinct();
                        $i=0;
                        while (list($class_id) = mysql_fetch_row($classList)) {
                            $i++;
                            ?>
                            <option
                                value="<?php echo $i; ?>" ><?php echo $class_id ?></option>
                            <?php
                        }
                        ?>

                    </select>
                    <input class="btn btn-default" style="margin-left: 1em" type="submit" name="submit" value="查看">

                </div>
            </form>

        </div>
    </div>
</div>


</body>
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/YMDClass.js"></script>
<script>
    window.onload = function () {
        new YMDselect('year', 'month', 'day');

    };

</script>
</html>

