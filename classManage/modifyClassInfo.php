<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>管理班级信息</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
</head>

<body>
<?php
require_once 'classManage.php';
$object = new classManage();
$getClassID = $_GET['class_id'];
$grade_id=$_COOKIE['grade_id'];
$row=$object->showInfor($grade_id,$getClassID);
?>
<div class="container" style="overflow:hidden;margin:0;width:100%;padding:0px;">

    <div class="row">

        <div class="col-xs-6">
            <p class="biao"><a>首页></a><a>管理班级信息></a><a>修改班级信息</a></p>

            <form class="form-horizontal" action="classManage.php" method="post">


                <div class="form-group">
                    <label for="grade_id" class="col-xs-3 control-label"><span style="color:red">*</span>年级号：</label>

                                      <div class="col-xs-6">
                                          <?php $number=$_COOKIE['grade_id'];
                                          if($number==1)
                                              echo "高一";
                                          elseif($number==2)
                                              echo "高二";
                                          elseif($number==3)
                                              echo "高三";
                                          ?>
                                   </div>

                </div>

                <div class="form-group">
                    <label for="class_id" class="col-xs-3 control-label"><span style="color:red">*</span>班级号：</label>

                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="class_id" value="<?php echo $row['class_id'] ?>"
                               name="class_id">
                    </div>
                </div>

                <div class="form-group">
                    <label for="class_addr" class="col-xs-3 control-label"><span style="color:red">*</span>班级地址：</label>

                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="class_addr" value="<?php echo $row['class_addr'] ?>"
                               name="class_addr">
                    </div>
                </div>

                <div class="form-group">
                    <label for="tea_id" class="col-xs-3 control-label"><span style="color:red">*</span>班主任编号：</label>

                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="tea_id" value="<?php echo $row['tea_id'] ?>"
                               name="tea_id">
                    </div>
                </div>


                <div class="form-group">
                    <label for="remark" class="col-xs-3 control-label"><span style="color:red">*</span>备注：</label>

                    <div class="col-xs-6">
                        <textarea class="form-control" rows="4"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-offset-3 col-xs-6">
                        <input type="submit" name="submit" value="确认修改" class="btn btn-primary"
                               style="width:40%;font-size:1.5em;text-align:center;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-primary" onclick="javascript:window.location='viewClassCatalog.php'"
                               style="width:30%;font-size:1.5em;text-align:center;" >返回</button>
                    </div>
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
