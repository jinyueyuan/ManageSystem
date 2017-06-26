<?php
require_once("../StudentManage/studentManage.php");
$object=new studentManage($_COOKIE['class_id'],$_COOKIE['grade_id']);
if(isset($_POST['submitted'])) {
//    if($_POST['submit']=="确认提交"){
      if($object->updateElec($_POST['stu_id'])){
          $show=$object->showStudent($_POST['stu_id']);
          $show_two=$object->showStudentIntro($_POST['stu_id']);}
      else {
          $show = $object->showStudent($_POST['submitted']);
          $show_two=$object->showStudentIntro($_POST['stu_id']);
//          echo "mysql error;";
      }


}
else
{
    $show=$object->showStudent($_GET['id']);
    $show_two=$object->showStudentIntro($_GET['id']);}
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
    <div class="row" style="padding: 1em;width: 100%;margin-top:-1em;">

        <div class="col-xs-7">
            <p class="biao"><a>首页></a><a href="stu_elecList.php">电子档案></a><a>填写电子档案</a></p>
            <form class="form-horizontal" action="stu_elecFill.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="stu_id" class="col-xs-3 control-label"><span style="color:red">*</span>学生学号：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="stu_id" name="stu_id" value="<?php echo $show['stu_id']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="stu_name" class="col-xs-3 control-label"><span style="color:red">*</span>学生姓名：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="stu_name" name="stu_name" value="<?php echo $show['stu_name']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="sex" class="col-xs-3 control-label"><span style="color:red">*</span>性别：</label>
                    <div class="col-xs-6">
                        <input style="margin-top:0.5em;" type="radio" id="sex" name="sex" value="male" <?php if($show['sex']=="male")echo "checked='checked'";?>>男
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input style="margin-top:0.5em;" type="radio" name="sex" value="female" <?php if($show['sex']=="female")echo "checked='checked'";?>>女
                    </div>
                </div>
                <div class="form-group">
                    <label for="birthday" class="col-xs-3 control-label"><span style="color:red">*</span>出生年月：</label>
                    <div class="col-xs-6">
                        <select name="year">
                            <?php
                            for($i=1966;$i<=2015;$i++)
                            {
                                if($i==$show['birth_year'])
                                    echo "<option value=$i selected='selected'>$i</option>";
                            }
                            ?>
                        </select>&nbsp;&nbsp;&nbsp;
                        <select name="month"></select>&nbsp;&nbsp;&nbsp;
                        <select name="day"></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="id_card" class="col-xs-3 control-label"><span style="color:red">*</span>身份证号：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="id_card" name="id_card" value="<?php echo $show['id_card']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="nation" class="col-xs-3 control-label"><span style="color:red">*</span>民族：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="nation" name="nation" value="<?php echo $show['nation']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="area" class="col-xs-3 control-label"><span style="color:red">*</span>籍贯：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="area" name="area" value="<?php echo $show['area']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="outlook" class="col-xs-3 control-label"><span style="color:red">*</span>政治面貌：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="outlook" name="outlook" value="<?php echo $show['politics']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="preschool" class="col-xs-3 control-label"><span style="color:red">*</span>毕业学校：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="preschool" name="preschool" value="<?php echo $show['preschool']?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="enter_time" class="col-xs-3 control-label"><span style="color:red">*</span>入学时间：</label>
                    <div class="col-xs-6">
                        <select name="enter_year">
                            <?php
                            //                            if($show['enter_year']==0)
                            //                                echo "<option value='0' selected='selected'>-请选择-</option>";
                            for($i=2013;$i<=2015;$i++)
                            {
                                echo "<option value=$i";
                                if($i==$show['enter_year'])
                                    echo " selected='selected'";
                                echo ">$i</option>";

                            }
                            ?>
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
                    <label for="input" class="col-xs-3 control-label"><span style="color:red">*</span>照片：</label>
                    <div class="col-xs-6">
                        <p><img src="<?php echo $show['photo']?>" style="width:5em;"/></p>
                        <input type="file" id="photo" name="picture" onchange="checkPhotoType();checkPhotoSize()">
                        <input type="hidden" name="prephoto" value="<?php echo $show['photo']?>" />
                        <p class="help-block">（提示：上传图片不能大于2m）</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-xs-3 control-label"><span style="color:red">*</span>联系电话：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $show['telephone'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-xs-3 control-label"><span style="color:red">*</span>家庭地址：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $show['family_addr'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-xs-3 control-label"><span style="color:red">*</span>邮箱：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $show['email'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="achieve" class="col-xs-3 control-label"><span style="color:red">*</span>奖励：</label>
                    <div class="col-xs-6">
                        <textarea name="achieve" row="3" cols="30" class="form-control" id="achieve" ><?php echo $show_two['achieve']?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="punish" class="col-xs-3 control-label"><span style="color:red">*</span>惩罚：</label>
                    <div class="col-xs-6">
                        <textarea row="3" cols="30" class="form-control" id="punish" name="punish" ><?php echo $show_two['punish']?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="characteristic" class="col-xs-3 control-label"><span style="color:red">*</span>性格特点：</label>
                    <div class="col-xs-6">
                        <textarea row="3" cols="30" class="form-control" id="characteristic" name="characteristic" ><?php echo  $show_two['characteristic']?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="experience" class="col-xs-3 control-label"><span style="color:red">*</span>经历：</label>
                    <div class="col-xs-6">
                        <textarea row="3" cols="30" class="form-control" id="experience" name="experience" ><?php echo $show_two['experience']?></textarea>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-xs-offset-3 col-xs-6" >
                        <input type="submit" class="btn btn-primary" style="width:40%;font-size:1.5em;text-align:center;" name="submit" value="确认提交">

                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" onclick="javascript:window.location='stu_elecList.php';" class="btn btn-primary" style="width:30%;font-size:1.5em;text-align:center;">返回</button>
                        <input type="hidden"  name="submitted" value="<?php echo $_GET['id']?>"/>
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
    window.onload=function(){
        new YMDselect('year','month','day');
        if($("body").height() < window.innerHeight){
            $("#inn").css("height",window.innerHeight-50);
        }
        else {
            $("#inn").css("height",document.body.scrollHeight-50);
        }
    };

</script>
</html>

