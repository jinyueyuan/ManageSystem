<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>基本信息</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <style>
        td{ text-align:center }
    </style>
</head>

<body>

<?php
require_once '../StudentManage/studentCatalog.php';
if(!empty($_POST['gradeid'])&&!empty($_POST['classid'])){
    setcookie("gradeid",$_POST['gradeid']);
    setcookie("classid",$_POST['classid']);
    $_COOKIE['gradeid']=$_POST['gradeid'];
    $_COOKIE['classid']=$_POST['classid'];
    $studentCatalog = new studentCatalog($_POST['gradeid'],$_POST['classid']);
    $ob=$studentCatalog->showStudentList();
    }
if(!empty($_POST['nameSort'])&&($_POST['nameSort']=='按姓名排序')){
    $studentCatalog = new studentCatalog($_COOKIE['gradeid'],$_COOKIE['classid']);
    $ob=$studentCatalog->nameSort();
    }

?>



<div class="container"style="overflow:hidden;margin:0;width:100%;padding:0px;">

    <div class="row" style="padding: 1em;width: 100%;margin-top:-1em;">
        <div class="col-xs-12">
            <p class="biao"><a>首页></a><a>学生信息></a><a>基本情况></a></p>
<!--            <ol class="breadcrumb">-->
<!--                <li><a >首页</a></li>-->
<!--                <li class="active">学生信息-基本情况</li>-->
<!--            </ol>-->
            <div class="row">
                <div class="col-xs-6">
                    <form role="form" name="selectForm" class="form-inline" action="" method="post">
                        <label>年 级&nbsp;&nbsp;</label>
                        <div class="form-group">
                            <select class="form-control" name="gradeid">
                                <option value="1" <?php if(isset($_COOKIE['gradeid']) && $_COOKIE['gradeid']=="1") echo "selected";?>>高一</option>
                                <option value="2" <?php if(isset($_COOKIE['gradeid']) && $_COOKIE['gradeid']=="2") echo "selected";?>>高二</option>
                                <option value="3" <?php if(isset($_COOKIE['gradeid']) && $_COOKIE['gradeid']=="3") echo "selected";?>>高三</option>
                            </select>
                        </div>
                        &nbsp;&nbsp;
                        <label>班 级&nbsp;&nbsp;</label>
                        <div class="form-group">
                            <select class="form-control" name="classid">
                                <option value="1" <?php if(isset($_COOKIE['classid']) && $_COOKIE['classid']=="1") echo "selected";?>>1</option>
                                <option value="2" <?php if(isset($_COOKIE['classid']) && $_COOKIE['classid']=="2") echo "selected";?>>2</option>
                                <option value="3" <?php if(isset($_COOKIE['classid']) && $_COOKIE['classid']=="3") echo "selected";?>>3</option>
                            </select>
                        </div>
                        &nbsp;&nbsp;
                        <input type="submit" name="check" class="btn btn-primary" value="查看">

                    </form>

                </div>



                <div class="col-xs-1 "style="margin-left:92px;">
                    <?php
                    if(!empty($_POST['gradeid'])&&!empty($_POST['classid'])) {
                        ?>
                        <form action="" method="post">
                            <input type="submit" name="nameSort" class="btn btn-primary" value="按姓名排序">
                        </form>
                        <?php
                    }
                    ?>
                </div>




            </div>

            <div class="row" style="margin-top:10px;">
                <div class="col-xs-12">
                    <table class="table table-striped table-bordered">
                        <?php
                        if(!empty($_POST['gradeid'])&&!empty($_POST['classid'])||!empty($_POST['nameSort'])) {
                            ?>
                            <tr>
                                <td style="background-color:#3fb4c6; color:#fff;width:20%;">学    号</td>
                                <td style="background-color:#3fb4c6; color:#fff;width:20%;">姓    名</td>
                                <td style="background-color:#3fb4c6; color:#fff;width:20%;">性    别</td>
                                <td style="background-color:#3fb4c6; color:#fff;width:20%;">电话号码</td>
                                <td style="background-color:#3fb4c6; color:#fff;width:20%;">出生年月</td>
                            </tr>
                            <?php
                        }
                        ?>
                        <?php
                        if(!empty($_POST['gradeid'])&&!empty($_POST['classid'])||(!empty($_POST['nameSort']))) {
                            for ($i = 0; $i < $studentCatalog->getRow(); $i++) {
                                ?>
                                <tr>
                                    <td><?php echo $ob[$i]['stu_id']; ?></td>
                                    <td><?php echo $ob[$i]['stu_name']; ?></td>
                                    <td><?php echo $ob[$i]['sex']; ?></td>
                                    <td><?php echo $ob[$i]['telephone']; ?></td>
                                    <td><?php echo $ob[$i]['birth_year'].".".$ob[$i]['birth_month'].".".$ob[$i]['birth_day']; ?></td>
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
</div>







<script>
    function getclassname(obj) {
        document.getElementById('good').class='active';
    }
</script>


</body>
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/control.js"></script>
<script>

    window.onload = function() {

        if ($("body").height() < window.innerHeight) {
            $("#inn").css("height", window.innerHeight - 50);
        } else {
            $("#inn").css("height", document.body.scrollHeight - 50);
        }
    }

</script>
</html>