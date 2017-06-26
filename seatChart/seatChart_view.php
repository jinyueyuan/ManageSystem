<?php
//ini_set('display_errors',1);
//ini_set('display_startup_errors',1);
//error_reporting(-1);

require_once("../classManage/classCatalog.php");
require_once("../DB/connDB.php");

$temp=new classCatalog();
$classlist=$temp->getAllClasses();
$len=count($classlist);

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>打印座位表</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <style>
        table{text-align: center;}
        td{height:50px;}
        select{width:80px}
        }
    </style>
</head>

<body>
<div class="container"
     style="overflow: hidden; margin: 0; width: 100%; padding: 0px;">

    <div class="col-xs-6" style = "margin-top:50px;margin-left:50px;">
        <span class="label label-info" >年级</span><select id="grade" class="selectpicker" data-style="btn-danger" onchange="bian(this.options[this.options.selectedIndex].value)" style="margin-left: 2px;">

        </select> <span class="label label-info"  style="margin-left: 10px;">班级</span><select id="cla" class="selectpicker" data-style="btn-danger" style="margin-left: 2px;" >

        </select><span class="label label-info" style="margin-left: 10px;">样式</span><select id="style" class="selectpicker" data-style="btn-danger" style="margin-left: 2px;">
            <option value="1" selected="selected">默认</option>
            <option value="2">正视</option>
            <option value="3">背视</option>
        </select>
        <button id="review" class="btn btn-info btn-sm" onclick="passValue()" style="margin-left: 10px;">预览</button>
        <br />
        <div id="content" style="margin-top: 20px;height: 600px;"></div>
    </div>


</div>



</body>
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/YMDClass.js"></script>
<script>
    //获取php中classlist的长度和数据
    var len = <?php echo $len?>;
    var classlist=new Array();
    var slist = '<?php echo urlencode(json_encode($classlist));?>';
    var list = eval(decodeURIComponent(slist));
    classlist=list;

    window.onload = function() {

        if ($("body").height() < window.innerHeight) {
            $("#inn").css("height", window.innerHeight - 50);
        } else {
            $("#inn").css("height", document.body.scrollHeight - 50);
        }

        var gradeSelect=document.getElementById("grade");
        var classSelect=document.getElementById("cla");

        //获取年级
        var grade = new Array();
        for(var i=0;i<len;i++){
            grade.push(classlist[i][0])
            for(var j=i-1;j>=0;j--){
                if(classlist[i][0]==classlist[j][0]) {
                    grade.pop(classlist[i][0]);
                    break;
                }
            }
        }
        grade.sort();

        for(var i=0;i<grade.length;i++){
            var objOption = document.createElement("option");
            objOption.text=grade[i];
            objOption.value=grade[i];
            gradeSelect.options.add(objOption);
        }
        //获取班级
        var cla=new Array();
        for(var i=0;i<len;i++){
            if(classlist[i][0]==grade[0]){
                cla.push(classlist[i][1]);
            }
        }
        cla.sort();
        for(var i=0;i<cla.length;i++){
            var objOption = document.createElement("option");
            objOption.text=cla[i];
            objOption.value=cla[i];
            classSelect.options.add(objOption);
        }
    }

    function bian(val){
        var classSelect=document.getElementById("cla");
        classSelect.options.length=0;
        var cla=new Array();
        for(var i=0;i<len;i++){
            if(classlist[i][0]==val){
                cla.push(classlist[i][1]);
            }
        }
        cla.sort();
        for(var i=0;i<cla.length;i++){
            var objOption = document.createElement("option");
            objOption.text=cla[i];
            objOption.value=cla[i];
            classSelect.options.add(objOption);
        }
    }
</script>
<script>
    function show(grade,cla,style){
        var xmlhttp;
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                document.getElementById("content").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","\zuoweituhoutai.php?g="+grade+"&c="+cla+"&s="+style,true);
        xmlhttp.send();
    }

    function passValue(){
        var grade_value = document.getElementById("grade").value;
        var class_value = document.getElementById("cla").value;
        var style_value = document.getElementById("style").value;
        show(grade_value,class_value,style_value);
    }

</script>
</html>