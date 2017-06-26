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
require_once '../StudentManage/StudentCatalog.php';
require_once '../classManage/classCatalog.php';
if (!empty($_POST['grade_id']) && !empty($_POST['class_id'])) {
    setcookie("gradeid", $_POST['grade_id']);
    setcookie("classid", $_POST['class_id']);
    $_COOKIE['gradeid'] = $_POST['grade_id'];
    $_COOKIE['classid'] = $_POST['class_id'];
}
if (isset($_COOKIE['gradeid'])) {
    $studentCatalog = new studentCatalog($_COOKIE['gradeid'],$_COOKIE['classid']);
}
?>


<div class="container" style="overflow:hidden;margin:0;width:100%;padding:0px;">

    <div class="row" style="padding: 1em;width: 100%;margin-top:-1em;">
        <div class="col-xs-12">
            <p class="biao"><a>首页></a><a>学生简介</a></p>
            <div class="col-xs-6">
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group" style="margin-top: 1em">
                        <select name="grade_id" class="form-control col-sm-2"
                                style="width: 6em;margin-left: 1.5em;text-align: center">
                            <option value="年级" selected="selected">年级</option>
                            <?php
                            $classob=new classCatalog();
                            $gradeList=$classob->showGListDistinct();
                            while (list($grade_id) = mysql_fetch_row($gradeList)) {
                                ?>
                                <option><?php echo $grade_id ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <select name="class_id" class="form-control col-sm-2"
                                style="width: 6em;margin-left: 1em;text-align: center">
                            <option value="班级" selected="selected">班级</option>
                            <?php
                            $classList=$classob->showCListDistinct();
                            while (list($class_id) = mysql_fetch_row($classList)) {
                                ?>
                                <option><?php echo $class_id ?></option>
                                <?php
                            }
                            ?>

                        </select>
                        <input class="btn btn-default" style="margin-left: 1em" type="submit" name="submit" value="查看">

                    </div>

                </form>

            </div>
            <div>
                <?php
                if (!empty($_POST['submit']) && $_POST['submit'] == '查看' || isset($_COOKIE['gradeid'])) {
                    ?>
                    <div class="col-xs-3" style="margin-top:1em;margin-left: 0em">

                        <nav>
                            <ul class="pagination" style="margin:0;">
                                <?php
                                echo $studentCatalog->showpage();
                                ?>

                            </ul>
                        </nav>
                    </div>
                    <div class="col-xs-1" style="padding-left:0px;">
                        <p style="padding:6px;width:5em;margin-top:1em;">共
                            <?php echo $studentCatalog->pagenum; ?>页</p>
                    </div>

                    <div class="col-xs-2" style="margin-left: inherit; margin-top:1em;">
                        <form class="form-inline" action="" method="post">
                            <div class="form-group">
                                <label for="search">第</label>
                                <input name="page" type="text" class="form-control" id="search" style="width:3em;">
                                <label for="search">页</label>
                                <input class="btn btn-primary" type="submit" name="go" value="go">
                            </div>
                        </form>
                        <?php echo $studentCatalog->pageHref(); ?>


                    </div>
                    <?php
                }
                ?>

            </div>

      <div class="col-xs-7">

      <div>
         <table id="table" class="table table-striped table-bordered"
                   style="text-align: center;margin-top: 10px;display: none">
                <tr>
                    <td style="background-color:#3fb4c6; color:#fff;width:8%;">学号</td>
                    <td style="background-color:#3fb4c6; color:#fff;width:8%;">学生姓名</td>
                    <td style="background-color:#3fb4c6; color:#fff;width:8%;">年级号</td>
                    <td style="background-color:#3fb4c6; color:#fff;width:8%;">班级号</td>

                </tr>
                <?php
                if (!empty($_POST['submit']) && $_POST['submit'] == '查看' || isset($_COOKIE['gradeid'])) {

                     if($studentCatalog->getRow() >0)
                     {
                         echo "<script>document.getElementById('table').style.display='block';</script>";

//                for ($i = 0; $i < $studentCatalog->getRow(); $i++) {
                         $pagesize=$studentCatalog->retpagesize();
                         if(!empty($_GET['page'])){
                             $i=($_GET['page']-1)*$pagesize;}
                         else {
                             $i = 0;}
               for($j=0;$j<$pagesize&&$i<$studentCatalog->getRow();$i++,$j++)  {
                    $ob=$studentCatalog->showStudentList();
                    ?>

                    <tr>
                        <td><a href="stu_simpleCheck.php?stu_id=<?php echo  $ob[$i]['stu_id']; ?>"><?php echo $ob[$i]['stu_id'] ?></a></td>
                       <td><?php echo $ob[$i]['stu_name']; ?></td>
                        <td><?php echo  $ob[$i]['grade_id']; ?></td>
                        <td><?php echo  $ob[$i]['class_id']; ?></td>
                    </tr>
                    <?php
                }
                }
                }
                ?>
            </table>
        </div>



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

