<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>添加教师信息</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
</head>

<body>
<?php
require_once 'familyManage.php';
if(!empty($_GET['modify'])){
    $number=$_GET['number'];
    $modifyFamilyRead=new familyQuery();
    $modifyFamilyRead->modifyFamilyRead($number);
}
?>
<div class="container"style="overflow:hidden;margin:0;width:100%;padding:0px;">
    <div class="row">
        <div class="col-xs-7" style="padding: 2em;margin-top:-2em;">
            <p class="biao"><a>首页></a><a>班级信息></a><a>通讯录></a><a>修改通讯录</a></p>
            <form name="addForm" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="code" class="col-xs-3 control-label"><span class="prompt">*</span>成员编号：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="number" name="number" value="<?php echo $modifyFamilyRead->number?>">
                    </div>
                    <span id="err_tea_name" class="prompt">成员编号不能修改</span>
                </div>
                <div class="form-group">
                    <label for="name" class="col-xs-3 control-label"><span class="prompt">*</span>成员名字：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="member_name" name="member_name" value="<?php echo $modifyFamilyRead->member_name?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="id" class="col-xs-3 control-label"><span class="prompt">*</span>关系：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="relations" name="relations" value="<?php echo $modifyFamilyRead->relations?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="nation" class="col-xs-3 control-label">政治面貌：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="politics" name="politics" value="<?php echo $modifyFamilyRead->politics?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="outlook" class="col-xs-3 control-label"><span class="prompt">*</span>联系方式：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="telephone" name="telephone" value="<?php echo $modifyFamilyRead->telephone?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="professioal" class="col-xs-3 control-label"><span class="prompt">*</span>从事工作：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="job" name="job" value="<?php echo $modifyFamilyRead->job?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-xs-3 control-label"><span class="prompt">*</span>工作地点：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="workplace" name="workplace" value="<?php echo $modifyFamilyRead->workplace?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-xs-3 control-label">月收入：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="income" name="income" value="<?php echo $modifyFamilyRead->income?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-xs-3 control-label">健康状况：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="health" name="health" value="<?php echo $modifyFamilyRead->health?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-offset-3 col-xs-3">
                        <input type="submit" value="确认修改" name="submit" class="btn btn-primary"style="width:80%;font-size:1.5em;text-align:center;">
                    </div>
                    <div class="col-xs-3">
                        <input type="button" value="返回" name="submit" onclick="history.go(-1)" class="btn btn-primary"style="width:80%;font-size:1.5em;text-align:center;">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        new YMDselect('year', 'month', 'day');
    };

</script>
</body>
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/YMDClass.js"></script>
<script src="../js/checkPhoto.js"></script>
<script src="../js/inputLimit.js"></script>
</html>
