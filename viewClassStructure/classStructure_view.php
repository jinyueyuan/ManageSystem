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
<?php
require_once 'classStructure.php';
if (!empty($_POST['grade_id']) && !empty($_POST['class_id'])) {
    setcookie("gradeid", $_POST['grade_id']);
    setcookie("classid", $_POST['class_id']);
    $_COOKIE['gradeid'] = $_POST['grade_id'];
    $_COOKIE['classid'] = $_POST['class_id'];

}

?>

<div class="container" style="overflow:hidden;margin:0;width:100%;padding:0px;">

    <div class="row" style="padding: 1em;width: 100%;margin-top:-1em;">

        <div class="col-xs-10">
            <p class="biao"><a>首页></a><a>学生简介</a></p>

            <form class="form-horizontal" action="" method="post">
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
                                value="<?php echo $i; ?>" <?php if (isset($_COOKIE['gradeid'])&&$_COOKIE['gradeid'] == $i) echo "selected"; ?> ><?php echo $grade_id ?></option>
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
                                value="<?php echo $i; ?>" <?php if (isset($_COOKIE['classid'])&&$_COOKIE['classid'] == $i) echo "selected"; ?>><?php echo $class_id ?></option>
                            <?php
                        }
                        ?>

                    </select>
                    <input class="btn btn-default" style="margin-left: 1em" type="submit" name="submit" value="查看">
                    <input class="btn btn-default" style="margin-left: 1em" type="submit" name="submit" value="按职务排序">

                </div>

            </form>

        </div>
        <div class="col-xs-7">
            <table id="table" class="table table-striped table-bordered"
                   style="text-align: center;margin-top: 10px;display: none">
                <tr>
                    <td style="background-color:#3fb4c6; color:#fff;width:8%;">学号</td>
                    <td style="background-color:#3fb4c6; color:#fff;width:8%;">学生姓名</td>
                    <td style="background-color:#3fb4c6; color:#fff;width:8%;">年级号</td>
                    <td style="background-color:#3fb4c6; color:#fff;width:8%;">班级号</td>
                    <td style="background-color:#3fb4c6; color:#fff;width:8%;">职务名称</td>
                    <td style="background-color:#3fb4c6; color:#fff;width:8%;">座位号</td>


                </tr>
                <?php
                $classCatalog_2 = new classCatalog_2();
                if(isset($_COOKIE['gradeid'])&&isset($_COOKIE['classid'])){
                    $classCatalog_2->grade_id2 = $_COOKIE['gradeid'];
                    $classCatalog_2->class_id2 = $_COOKIE['classid'];
                }

                if (!empty($_POST['submit']) && $_POST['submit'] == '查看') {

                    $classCatalog_2->sqlQuery_check();


                }

                if (!empty($_POST['submit']) && $_POST['submit'] == '按职务排序') {
                    $classCatalog_2->sqlQuery_sort();
                }


                if ($classCatalog_2->getRow()>0) {
                    echo "<script>document.getElementById('table').style.display='block';</script>";

                    for ($i = 0; $i < $classCatalog_2->getRow(); $i++) {
                        $classCatalog_2->showList();
                        ?>
                        <tr>
                            <td><?php echo $classCatalog_2->stu_id; ?></td>
                            <td><?php echo $classCatalog_2->stu_name; ?></td>
                            <td><?php echo $classCatalog_2->grade_id; ?></td>
                            <td><?php echo $classCatalog_2->class_id; ?></td>
                            <td><?php echo $classCatalog_2->job_name; ?></td>
                            <td><?php echo $classCatalog_2->seat_id; ?></td>
                        </tr>
                        <?php
                    }


                }

                ?>

            </table>
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

