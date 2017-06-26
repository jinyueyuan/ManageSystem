<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>查看教师信息</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
</head>

<body>

<div class="container" style="overflow:hidden;margin:0px;width:100%;padding:0px;">
    <div class="row">
        <div class="col-xs-5" style="padding: 2em;margin-top:-2em;">
            <div class="biao">
                <span><a>首页></a><a>班级信息></a><a>通讯录</a></span>

                <form class="form-horizontal" action="" method="post">
                    <div class="form-group" style="margin-top: 1em">
                        <?php
                        require_once '../classManage/classCatalog.php';
                        $classCatalog = new classCatalog();
                        ?>
                        <select name="grade_id" class="form-control col-sm-2" style="width: 6em;margin-left: 1.5em;text-align: center">
                            <option selected="selected" style="display: none">
                                <?php
                                if(isset($_COOKIE['grade_id'])){
                                    $grade_id=$_COOKIE['grade_id'];
                                    echo $grade_id;
                                }else{
                                    echo "年级";
                                }
                                ?>
                            </option>
                            <?php
                            $classCatalog->teaFindClass($_COOKIE['userid']);
//                            $gradeRow = $classCatalog->getGradeRow();
                            for ($i = 0;$i < 1;$i++) {
                                $classCatalog->getGradeNum();
                                ?>
                                <option><?php echo $classCatalog->grade_id; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <select name="class_id" class="form-control col-sm-2" style="width: 6em;margin-left: 1em;text-align: center">
                            <option selected="selected" style="display: none">
                                <?php
                                if(isset($_COOKIE['class_id'])){
                                    $class_id=$_COOKIE['class_id'];
                                    echo $class_id;
                                }else{
                                    echo "班级";
                                }
                                ?>
                            </option>
                            <?php
//                            $classCatalog->queryClassList();
//                            $classRow = $classCatalog->getClassRow();
                            for ($i = 0;$i < 1;$i++) {
                                $classCatalog->getClassNum();
                                ?>
                                <option><?php echo $classCatalog->class_id?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <input class="btn btn-default" style="margin-left: 1em" type="submit" name="submit" value="查询">
                    </div>
                </form>
            </div>

            <div class="row" style="padding-top: 10px;">
                <div class="col-xs-12" >
                    <table class="table table-striped table-bordered" >
                <tr>
                    <td style="background-color:#3fb4c6; color:#fff;width:30%;">学生学号</td>
                    <td style="background-color:#3fb4c6; color:#fff;width:30%;">学生名字</td>
                    <td style="background-color:#3fb4c6; color:#fff;width:30%;">操作</td>
                </tr>
                <?php
                require_once '../StudentManage/studentCatalog.php';
                $studentCatalog="";
                $stuRow="";
                if((!empty($_POST['submit'])&&$_POST['submit']=='查询')){
                    $grade_id=$_POST['grade_id'];
                    $class_id=$_POST['class_id'];
                    setcookie('grade_id',$grade_id);
                    setcookie('class_id',$class_id);
                    $_COOKIE['grade_id']=$grade_id;
                    $_COOKIE['class_id']=$class_id;
                    $studentCatalog=new studentCatalog($grade_id,$class_id);
                    $stuob=$studentCatalog->showStudentList();
                    $stuRow=$studentCatalog->getRow();
                    if ($stuRow > 0) {
                        echo "<script>document.getElementById('table').style.display='block';</script>";
                    }
                }elseif(isset($_COOKIE['grade_id'])&&isset($_COOKIE['class_id'])){
                    $grade_id=$_COOKIE['grade_id'];
                    $class_id=$_COOKIE['class_id'];
                    $studentCatalog=new studentCatalog($grade_id,$class_id);
                    $stuob=$studentCatalog->showStudentList();
                    $stuRow=$studentCatalog->getRow();
                    if ($stuRow > 0) {
                        echo "<script>document.getElementById('table').style.display='block';</script>";
                    }
                }
                for ($i = 0;$i <$stuRow;$i++) {
                    $stuob=$studentCatalog->showStudentList();
                ?>
                <tr>
                    <td><?php echo $stuob[$i]['stu_id'];?></td>
                    <td><?php echo $stuob[$i]['stu_name'];?></td>
                    <td>
                        <a href="showFamily.php?stu_id=<?php echo $stuob[$i]['stu_id'];?>&check=1" class="change"><span class=" glyphicon glyphicon-search"></span>&nbsp;&nbsp;查看&nbsp;&nbsp;</a>
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

</body>
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/inputLimit.js" ></script>
</html>
