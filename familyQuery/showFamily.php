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

<div class="container"style="overflow:hidden;margin:0;width:100%;padding:0px;">
    <div class="row">
        <div class="col-xs-12" style="padding: 2em;margin-top:-2em;">
            <div class="biao">
                <span><a>首页></a><a>班级信息></a><a>通讯录></a><a>查看通讯录</a></span>
            </div>
            <table class="table table-striped table-bordered" style="text-align: center;margin-top: 10px">
                <tr>
                    <td style="background-color:#3fb4c6; color:#fff;width:8%;">成员编号</td>
                    <td style="background-color:#3fb4c6; color:#fff;width:9%;">成员名字</td>
                    <td style="background-color:#3fb4c6; color:#fff;width:8%;">关系</td>
                    <td style="background-color:#3fb4c6; color:#fff;width:9%;">政治面貌</td>
                    <td style="background-color:#3fb4c6; color:#fff;width:15%;">联系方式</td>
                    <td style="background-color:#3fb4c6; color:#fff;width:10%;">从事工作</td>
                    <td style="background-color:#3fb4c6; color:#fff;width:12%;">工作地点</td>
                    <td style="background-color:#3fb4c6; color:#fff;width:9%;">月收入</td>
                    <td style="background-color:#3fb4c6; color:#fff;width:9%;">健康状况</td>
                    <td style="background-color:#3fb4c6; color:#fff;">操作</td>
                </tr>
                <?php
                require_once 'familyManage.php';
                $row = $familyQuery->getRow();
                for($i=0;$i<$row;$i++) {
                    $familyQuery->showFamilyLis();
                    ?>
                    <tr>
                        <td><?php echo $familyQuery->number?></td>
                        <td><?php echo $familyQuery->member_name?></td>
                        <td><?php echo $familyQuery->relations?></td>
                        <td><?php echo $familyQuery->politics?></td>
                        <td><?php echo $familyQuery->telephone?></td>
                        <td><?php echo $familyQuery->job?></td>
                        <td><?php echo $familyQuery->workplace?></td>
                        <td><?php echo $familyQuery->income?></td>
                        <td><?php echo $familyQuery->health?></td>
                        <td>
                            <a href="modifyFamily.php?number=<?php echo $familyQuery->number?>&modify=1" class="change"><span class="glyphicon glyphicon-pencil"></span>修改&nbsp;
                            </a>
<!--                            <a id="delete" onclick="firm()" href="#" class="change"><span class="glyphicon glyphicon-trash"></span>删除</a>-->
                            <a href="#" deleteSelect="showFamily.php?number=<?php echo $familyQuery->number?>&delete=1" id="delete" class="delete"><span class="glyphicon glyphicon-pencil"></span>删除
                            </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
        <div class="form-group">
            <div class="col-xs-2 col-xs-offset-8">
                <input type="button" value="增加" name="submit" onclick="location='addFamily.php'" class="btn btn-primary"style="width:80%;font-size:1.5em;text-align:center;">
            </div>
            <div class="col-xs-2">
                <input type="button" value="返回" name="submit" onclick="location='classSelect.php'" class="btn btn-primary"style="width:80%;font-size:1.5em;text-align:center;">
            </div>
        </div>
    </div>
</div>

<div style="width:100%;height:100%;position:absolute;background-color:#000;top:0;left:0;z-index:2;opacity:0.3;display:none;" id="cover"></div>
<div style="position:absolute;top:5em;width:100%;z-index:3;text-align:left;display:none;" id="pushWindow">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-4 col-xs-offset-4"style="background-color:#fff;padding:0;">
                <p style="background-color:#3fb4c6;margin:0;padding:5px;color:#fff;">删除询问</p>
                <div style="text-align:center;">
                    <p style="margin:3em;">确定删除该文件吗？</p>
                    <div style="text-align:right;background-color:#eee;padding:5px;">
                        <input type="submit" class="btn btn-default" value="确认" id="deleteConfirm">
                        &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-default" id="cancel">取消</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/inputLimit.js" ></script>
<script src="../js/control.js"></script>
</html>
