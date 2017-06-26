<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>记录成绩与考勤</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
</head>

<?php
$tea_name = $_COOKIE['username'];
?>

<body>

<div class="container" style="overflow:hidden;margin:0;width:100%;padding:0px;">

    <div class="row">

        <div class="col-xs-6" style="padding: 2em;margin-top:-2em;">
            <div class="biao">
                <span><a>首页></a><a>考勤成绩></a><a>记录成绩与考勤</a></span>

                <form class="form-horizontal" action="" method="post">
                    <div class="form-group" style="margin-top: 1em">
                        <?php
                        require_once '../DB/connDB.php';
                        ?>
                        <select name="course_id" class="form-control col-sm-2" style="width: 6em;margin-left: 1.5em;text-align: center">
                            <option value="课程" selected="selected">课程</option>
                            <?php
                            $getTea_id = $_COOKIE['userid'];
                            $courseList_sql = "SELECT DISTINCT course_id FROM take_class WHERE tea_id=$getTea_id";
                            $courseList = mysql_query($courseList_sql);
                            while (list($course_id1) = mysql_fetch_row($courseList)) {
                                ?>
                                <option><?php echo $course_id1 ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <select name="class_id" class="form-control col-sm-2" style="width: 6em;margin-left: 1em;text-align: center">
                            <option value="班级" selected="selected">班级</option>
                            <?php
                            $classList_sql = "SELECT DISTINCT class_id FROM take_class WHERE tea_id=$getTea_id";
                            $classList = mysql_query($classList_sql);
                            while (list($class_id1) = mysql_fetch_row($classList)) {
                                ?>
                                <option><?php echo $class_id1 ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <input class="btn btn-default" style="margin-left: 1em" type="submit" name="submit" value="确定">
                    </div>
                </form>
            </div>
            <table id="table" class="table table-striped table-bordered" style="text-align: center;margin-top: 10px;display: none">
                <tr>
                    <td style="background-color:#3fb4c6; color:#fff;width:17%;">学号</td>
                    <td style="background-color:#3fb4c6; color:#fff;width:16%;">姓名</td>
                    <td style="background-color:#3fb4c6; color:#fff;width:16%;">班级号</td>
                    <td style="background-color:#3fb4c6; color:#fff;width:16%;">考勤</td>
                    <td style="background-color:#3fb4c6; color:#fff;width:22%;">分数</td>
                </tr>
                <?php
                $studentCatalog = "";
                $stuRow = "";
                if (!empty($_POST['submit']) && $_POST['submit'] == '确定') {
                    $class_id2 = $_POST['class_id'];
                    $course_id2 = $_POST['course_id'];
                    $studentCatalog_sql = "SELECT * FROM take_class WHERE class_id=$class_id2 AND course_id=$course_id2";
                    $studentCatalog = mysql_query($studentCatalog_sql);
                    $stuRow = @mysql_num_rows($studentCatalog);
                    if ($stuRow > 0) {
                        echo "<script>document.getElementById('table').style.display='block';</script>";
                    }
                }
                while (list($stu_id, $class_id, $course_id, $tea_id, $check_in, $score) = @mysql_fetch_row($studentCatalog)) {
                    $name_sql = "SELECT stu_name FROM student WHERE stu_id=$stu_id";
                    $nameResult = mysql_query($name_sql);
                    list($stu_name) = @mysql_fetch_row($nameResult);
                    ?>
                    <tr>
                        <td><?php echo $stu_id ?></td>
                        <td><?php echo $stu_name ?></td>
                        <td><?php echo $class_id ?></td>
                        <td>
                            <a style="color: red" href="recordScoreCheckIn.php?action=check_in&stu_id=<?php echo $stu_id ?>&course_id=<?php echo $course_id ?>&tea_id=<?php echo $tea_id ?>&check_in=<?php echo $check_in ?>"><span class="glyphicon glyphicon-pencil"></span>旷课</a></td>
                        <td>
                            <form action="recordScoreCheckIn.php" method="get" style="text-align: center">
                                <input type="hidden" name="stu_id" value="<?php echo $stu_id ?>">
                                <input type="hidden" name="tea_id" value="<?php echo $tea_id ?>">
                                <input type="hidden" name="course_id" value="<?php echo $course_id ?>">
                                <input type="text" style="border:0;text-align: center" name="score" size="4" value="<?php echo $score ?>">
                                <input type="submit" name="submit" class="btn-info" value="保存">
                            </form>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>

    </div>
</div>

</body>
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
