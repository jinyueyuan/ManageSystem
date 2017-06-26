<?php
require_once("studentManage.php");
$username=$_COOKIE['username'];
if(isset($_POST['submitted'])){
    $object=new studentManage($_COOKIE['class_id'],$_COOKIE['grade_id']);
    $object->addStudent();}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>添加学生信息</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
</head>

<body>


<div class="container"style="overflow:hidden;margin:0;width:100%;padding:0px;">
    <div class="row" >
        <div style="padding: 1em;width: 100%;margin-top:-1em;">
        <div class="col-xs-7" >
            <p class="biao"><a>首页></a><a href="stu_init.php">管理学生信息></a><a>添加学生信息</a></p>
            <form class="form-horizontal" action="stu_add.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="stu_id" class="col-xs-3 control-label"><span style="color:red">*</span>学生学号：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="stu_id" name="stu_id">
                    </div>
                </div>
                <div class="form-group">
                    <label for="stu_name" class="col-xs-3 control-label"><span style="color:red">*</span>学生姓名：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="stu_name" name="stu_name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="sex" class="col-xs-3 control-label"><span style="color:red">*</span>性别：</label>
                    <div class="col-xs-6">
                        <input style="margin-top:0.5em;" type="radio" id="sex" name="sex" value="男">男&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input style="margin-top:0.5em;" type="radio" name="sex" value="女">女
                    </div>
                </div>
                <div class="form-group">
                    <label for="birthday" class="col-xs-3 control-label"><span style="color:red">*</span>出生年月：</label>
                    <div class="col-xs-6">
                        <select name="year"></select>&nbsp;&nbsp;&nbsp;
                        <select name="month"></select>&nbsp;&nbsp;&nbsp;
                        <select name="day"></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="id_card" class="col-xs-3 control-label"><span style="color:red">*</span>身份证号：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="id_card" name="id_card">
                    </div>
                </div>
                <div class="form-group">
                    <label for="nation" class="col-xs-3 control-label"><span style="color:red">*</span>民族：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="nation" name="nation">
                    </div>
                </div>
                <div class="form-group">
                    <label for="area" class="col-xs-3 control-label"><span style="color:red">*</span>籍贯：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="area" name="area">
                    </div>
                </div>
                <div class="form-group">
                    <label for="outlook" class="col-xs-3 control-label"><span style="color:red">*</span>政治面貌：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="outlook" name="outlook">
                    </div>
                </div>
                <div class="form-group">
                    <label for="preschool" class="col-xs-3 control-label"><span style="color:red">*</span>毕业学校：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="preschool" name="preschool">
                    </div>
                </div>
                <div class="form-group">
                    <label for="enter_time" class="col-xs-3 control-label"><span style="color:red">*</span>入学时间：</label>
                    <div class="col-xs-6">
                        <select name="enter_year">
                            <option value="0">-请选择-</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                        </select>&nbsp;&nbsp;&nbsp;
<!--                        <select name="month">-->
<!--                            <option value="selected">-请选择-</option>-->
<!--                            <option value="7">7</option>-->
<!--                            <option value="=8">8</option>-->
<!--                            <option value="9">9</option>-->
<!--                        </select>-->
                    </div>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-xs-3 control-label"><span style="color:red">*</span>照片：</label>
                    <div class="col-xs-6">
                        <input type="file" id="photo" name="picture" onchange="checkPhotoType();checkPhotoSize()">
                        <p class="help-block">（提示：上传图片不能大于2m）</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-xs-3 control-label"><span style="color:red">*</span>联系电话：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-xs-3 control-label"><span style="color:red">*</span>家庭地址：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-xs-3 control-label"><span style="color:red">*</span>邮箱：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="job" class="col-xs-3 control-label"><span style="color:red">*</span>职务：</label>
                    <div class="col-xs-6">
                        <select name="job">
                            <option value="">请选择</option>
                            <?php
                            require_once '../dutyChartManage/DutyChart.php';
                            $jobobj=new DutyChart();
                            $joblist=$jobobj->getDutyChart();
                            if($joblist)
                            {
                                foreach($joblist as $key=>$value){
                                   ?>
                            <option value="<?php echo $value['job_name'];?>"><?php echo $value['job_name']?></option>
                            <?php
                                }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="seat_id" class="col-xs-3 control-label"><span style="color:red">*</span>座位号：</label>
                    <div class="col-xs-6">
                        <select name="seat_id">
                            <option value="0">请选择</option>
                            <?php
                            for($i=1;$i<=20;$i++)
                               echo "<option value='$i'>$i 号</option>";
     ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-offset-3 col-xs-6">
                        <input type="submit" class="btn btn-primary"style="width:40%;font-size:1.5em;text-align:center;" name="submit" value="确认提交">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" onclick="javascript:window.location='stu_init.php';" class="btn btn-primary" style="width:30%;font-size:1.5em;text-align:center;">返回</button>
                        <input type="hidden" name="submitted" value="true" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</body>
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/YMDClass.js"></script>
<script src="../js/checkPhoto.js"></script>
<script>
    window.onload=function(){
        new YMDselect('year','month','day');
    };

</script>
</html>
