<?php

$id=$_COOKIE['userid'];
$name=$_COOKIE['username'];

require_once("../DB/connDB.php");
require_once("DutyChart.php");
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>添加教师信息</title>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/main.css" rel="stylesheet">
<style type="text/css">
.alert{color: #3fb4c6;}
.arow{margin-top: 5px;}
	button{margin-left: 2px;}
</style>
</head>

<body>

	<div class="container" style="overflow: hidden; margin: 0; width: 100%; padding: 0px;">
		<div style="padding: 2em;width: 100%;margin-top:-2em;">
			<p class="biao"><a>首页></a><a href="zhiwubiao.php">管理职务表></a><a>编辑职务表</a></p>
		<div class="row">

			<div class="col-xs-6">

				<?php
				$warn="";

				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$num = $_POST['m_value'];
					$m = 1;
					$arr=array();
					for ($i = 0; $i < $num; $i ++) {
						$name = $_POST[$m++];
						$seq = $_POST[$m++];
						$arr[$i]=array($name,$seq);
					}


					$jobinfor = new DutyChart();
					if($jobinfor->save($arr,$num)){
						$warn="保存成功";
					}
				}
				?>
				<div class="form-gruop" style="margin-left: 8px;margin-top: 10px" >
					<span><label style='background-color:#3fb4c6; color:#fff; width:184px;line-height: 34px'>&nbsp;&nbsp;职务</label><label style='background-color:#3fb4c6; color:#fff; width:262px;height:34px;line-height: 34px'>&nbsp;&nbsp;&nbsp;&nbsp;序号</label></span>
				</div>
	<form class="form-inline" id="myform" name="duty_form" method="post"
					action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>"
					style="margin-left: 7px;">
		<?php
		$temp=new DutyChart();
		$chart=$temp->getDutyChart();
		$num1=count($chart);
		echo "<div class='form-group'>";
		echo "<input type = 'hidden' name = 'm_value' value = '$num1'>";
		echo "</div>";
		if($num1!=0){
			for($i=0;$i<$num1;$i++){
				echo "<div class='form-group arow'>";
				echo "<input class='form-control' type = 'text'  value = ".$chart[$i]['job_name']." ><input class='form-control' type = 'text'  value = ". $chart[$i]['job_seq'] ." ><button type = 'button' class ='btn btn-default'  name = 'del_but' >删除</button>";
				echo "</div>";
			}
			echo "</table>";
		}

		?>


            </form>

            <div class="row" style="margin-left:6px;margin-top: 10px;">
				<button class="btn btn-default" id="save_but" onclick="save()" style="background-color:#3fb4c6; color:#fff;">保存</button>
			    <button class="btn btn-default" id="add_but" onclick="add()">添加</button>
			</div>
			<div class="row alert"	style="margin-left:50px">
				<?php echo $warn;?>
			</div>
		    </div>
	    </div>
	</div>
</div>
</body>
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/YMDClass.js"></script>
<script>
    window.onload=function(){
      if($("body").height() < window.innerHeight){
        $("#inn").css("height",window.innerHeight-50);
      }
      else {
        $("#inn").css("height",document.body.scrollHeight-50);
      }
      var btn = document.getElementsByName("del_but");
      for(var i=0;i<btn.length;i++){
          btn[i].onclick=function(){
              del(this);
          };
      }
    };

  </script>
<script>
function add(){
	var form = document.getElementById("myform");
    var m = document.getElementsByName("m_value")[0].value;
    var div_ele = document.createElement("div");
    div_ele.setAttribute("class","form-gruop arow");
	var input1 = document.createElement("input");
	input1.type = "text";
	input1.setAttribute("class","form-control");
	var input2 = document.createElement("input");
	input2.type = "text";
	input2.setAttribute("class","form-control");
	var delete_but = document.createElement("button");
	delete_but.innerHTML = "删除";
	delete_but.type = "button";
	delete_but.name = "del_but";
	delete_but.setAttribute("class","btn btn-default");
	delete_but.onclick = function(){
		del(this);
	};
	div_ele.appendChild(input1);
	div_ele.appendChild(input2);
	div_ele.appendChild(delete_but);
	form.appendChild(div_ele);
    document.getElementsByName("m_value")[0].value = parseInt(m)+1;
}


	function del(obj){
	var del_but = document.getElementsByName("del_but");
	for(var i = 0;i < del_but.length;i++){
		if(obj === del_but[i]){
		   var focus = del_but[i];


		  
           var form = document.getElementById("myform");
           form.removeChild(focus.parentNode);

           document.getElementsByName("m_value")[0].value = document.getElementsByName("m_value")[0].value - 1;
           break; 
		}
	}
}

	function trim(s){
	    return s.replace(/(^\s*)|(\s*$)/g, "");
	}

	function save(){
		var temp = document.getElementsByName("m_value")[0].value ;
		var nodes = document.getElementsByTagName("input");
		var arr = new Array();
		var x = 1;
		for(var i = 0;i < temp;i++){
			if(nodes[x].value == "" || nodes[x].value == null){
               document.getElementsByClassName("alert")[0].innerHTML = "";
               alert("请输入职务名");
               return;
			}
			x++;
			if(nodes[x].value == "" || nodes[x].value == null){
			   document.getElementsByClassName("alert")[0].innerHTML = "";
               alert("请输入有效整数");
               return;
			}
			arr[i] = trim(nodes[x].value);
		    x++;
		}
		for(var i = 0;i < temp - 1;i++){
			for(var j = i + 1;j < temp;j++){
				if(arr[i] == arr[j]){
					document.getElementsByClassName("alert")[0].innerHTML = "";
					alert("序号不能相同");
					return;
				}
			}
		}
		var m = 1;
		var n = nodes.length;
		for(var i = 1;i < n;i++){
			nodes[i].name = m;
			m++;
		}
		document.getElementById("myform").submit();
	}
	</script>
</html>
