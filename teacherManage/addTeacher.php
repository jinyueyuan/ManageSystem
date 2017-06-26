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

<div class="container"style="overflow:hidden;margin:0;width:100%;padding:0px;">
    <div class="row">
        <div class="col-xs-7" style="padding: 2em;margin-top:-2em;">
            <p class="biao"><a>首页></a><a>管理教师信息></a><a>添加教师信息</a></p>
            <form name="addForm" class="form-horizontal" action="teacherManage.php" method="post" enctype="multipart/form-data" onsubmit="return checkSubmit()">
                <div class="form-group">
                    <label for="code" class="col-xs-3 control-label"><span class="prompt">*</span>教职工号：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="tea_id" name="tea_id" onblur="tea_idLimit()" onclick="tea_idClick()">
                    </div>
                    <span id="err_tea_id" class="limit"></span>
                </div>
                <div class="form-group">
                    <label for="name" class="col-xs-3 control-label"><span class="prompt">*</span>教师姓名：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="tea_name" name="tea_name" onblur="tea_nameLimit()" onclick="tea_nameClick()">
                    </div>
                    <span id="err_tea_name" class="limit">教师名字不能为空</span>
                </div>
                <div class="form-group">
                    <label for="sex" class="col-xs-3 control-label"><span class="prompt">*</span>性别：</label>
                    <div class="col-xs-6 margin" onblur="sexLimit()" onclick="sexClick()">
                        <input  type="radio" id="sex" name="sex" value="男">男
                        <input style="margin-left:2em;" type="radio" name="sex" value="女">女
                    </div>
                    <span id="err_sex" class="limit">性别不能为空</span>
                </div>
                <div class="form-group">
                    <label for="birthday" class="col-xs-3 control-label"><span class="prompt">*</span>出生年月：</label>
                    <div class="col-xs-6 margin" onclick="sexLimit();dateClick()">
                        <select id="year" name="year"></select>
                        <select style="margin-left: 4px" id="month" name="month"></select>
                        <select style="margin-left: 4px" id="day" name="day"></select>
                    </div>
                    <span id="err_date" class="limit">请选择出生时间</span>
                </div>
                <div class="form-group">
                    <label for="id" class="col-xs-3 control-label"><span class="prompt">*</span>身份证号：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="id_card" name="id_card" onblur="id_cardLimit()" onclick="id_cardClick();dateLimit()">
                    </div>
                    <div>
                        <span id="err_id_card" class="limit">身份证格式不符合要求</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nation" class="col-xs-3 control-label">民族：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="nation" name="nation">
                    </div>
                </div>
                <div class="form-group">
                    <label for="outlook" class="col-xs-3 control-label">政治面貌：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="politice" name="politice">
                    </div>
                </div>
                <div class="form-group">
                    <label for="educated" class="col-xs-3 control-label">学历：</label>
                    <div class="col-xs-6 margin">
                        <input type="hidden"name="education" value="">
                        <input type="radio"id="education" name="education" value="中专">中专
                        <input style="margin-left: 5px;" type="radio"name="education" value="大专">大专
                        <input style="margin-left: 5px;" type="radio"name="education" value="本科">本科
                        <input style="margin-left: 5px;" type="radio"name="education" value="硕士">硕士
                        <input style="margin-left: 5px;" type="radio"name="education" value="博士">博士
                    </div>
                </div>
                <div class="form-group">
                    <label for="professioal" class="col-xs-3 control-label">毕业专业：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="profession" name="profession">
                    </div>
                </div>
                <div class="form-group">
                    <label for="input" class="col-xs-3 control-label">照片：</label>
                    <div class="col-xs-6">
                        <input type="file" id="photo" name="photo" onchange="checkPhotoType();checkPhotoSize()">
                        <p class="help-block">（提示：图片格式为JPG或PNG且小于2M）</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-xs-3 control-label"><span class="prompt">*</span>联系电话：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="phone" name="phone" onblur="phoneLimit()" onclick="phoneClick();educationLimit()">
                    </div>
                    <span id="err_phone" class="limit">请输入正确的电话号码</span>
                </div>
                <div class="form-group">
                    <label for="email" class="col-xs-3 control-label"><span class="prompt">*</span>邮箱：</label>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" id="email" name="email" onblur="emailLimit()" onclick="emailClick()">
                    </div>
                    <span id="err_email" class="limit">请输入正确的邮箱格式</span>
                </div>
                <div class="form-group">
                    <label for="remark" class="col-xs-3 control-label">备注：</label>
                    <div class="col-xs-6">
                        <textarea id="remark" name="remark" class="form-control" rows="4"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-offset-3 col-xs-3">
                        <input type="submit" value="确认提交" name="submit" class="btn btn-primary"style="width:80%;font-size:1.5em;text-align:center;">
                    </div>
                    <div class="col-xs-3">
                        <input id="return" type="button" value="返回" name="submit" onclick="history.go(-1)" class="btn btn-primary"style="width:80%;font-size:1.5em;text-align:center;">
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
