/**
 * Created by m.cb on 15/11/23.
 */
function tea_idLimit() {
    var tea_id = document.getElementById("tea_id").value;
    var err_tea_id = document.getElementById("err_tea_id");
    var tea_idReg = /^[0-9]{1,6}$/;
    if (!tea_idReg.test(tea_id) || tea_id.length != 6) {
        err_tea_id.style.display = "block";
        err_tea_id.style.color="red";
        err_tea_id.innerHTML="教职工号不正确";
        return false;
    }
    $.post("teacherManage.php",{check_tea_id:tea_id}, function(isset){
        if(isset==1){    //判断已经存在
            err_tea_id.style.display = "block";
            err_tea_id.style.color="red";
            err_tea_id.innerHTML="该教职工号已存在";
            return false;
        }
    });
    err_tea_id.style.display = "block";
    err_tea_id.style.color="green";
    err_tea_id.innerHTML="该教职工号可用";
    return true;
}
function tea_idClick(){
    var err_tea_id = document.getElementById("err_tea_id");
    err_tea_id.style.display="block";
    err_tea_id.style.color="blue";
    err_tea_id.innerHTML="输入6位数字的教职工号";
    return true;
}

function tea_nameLimit(){
    var tea_name = document.getElementById("tea_name").value;
    if(tea_name==""){
        document.getElementById("err_tea_name").style.display="block";
        return false;
    }else{
        document.getElementById("err_tea_name").style.display="none";
        return true;
    }
}
function tea_nameClick(){
    document.getElementById("err_tea_name").style.display="none";
    return true;
}

function sexLimit(){
    var sex = document.getElementsByName("sex");
    if(!sex[0].checked && !sex[1].checked){
        document.getElementById("err_sex").style.display="block";
        return false;
    }else{
        document.getElementById("err_sex").style.display="none";
        return true;
    }
}
function sexClick(){
    document.getElementById("err_sex").style.display="none";
    return true;
}

function dateLimit(){
    var day = document.getElementById("day").value;
    var dayReg = /^[1-9]|[1-2]\d|3[0-1]$/;
    if(!dayReg.test(day)){
        document.getElementById("err_date").style.display="block";
        return false;
    }else{
        document.getElementById("err_date").style.display="none";
        return true;
    }
}
function dateClick(){
    document.getElementById("err_date").style.display="none";
    return true;
}

function id_cardLimit(){
    var id_card = document.getElementById("id_card").value;
    var id_cardReg=/(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/;
    if(!id_cardReg.test(id_card)){
        document.getElementById("err_id_card").style.display="block";
        return false;
    }else{
        document.getElementById("err_id_card").style.display="none";
        return true;
    }
}
function id_cardClick(){
    document.getElementById("err_id_card").style.display="none";
    return true;
}

function educationLimit(){
    var education=document.getElementsByName("education");
    var flag=true;
    for(var i=0;i<education.length-1;i++){
        if(education[i].checked==true){
            flag=false;
            break;
        }
    }
    if(flag){
        education[0].checked=true;
    }
}

function phoneLimit(){
    var phone = document.getElementById("phone").value;
    var phoneReg=/^1[34578]\d{9}$/;
    if(!phoneReg.test(phone)){
        document.getElementById("err_phone").style.display="block";
        return false;
    }else{
        document.getElementById("err_phone").style.display="none";
        return true;
    }
}
function phoneClick(){
    document.getElementById("err_phone").style.display="none";
    return true;
}

function emailLimit(){
    var email = document.getElementById("email").value;
    var emailReg=/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
    if(!emailReg.test(email)){
        document.getElementById("err_email").style.display="block";
        return false;
    }else{
        document.getElementById("err_email").style.display="none";
        return true;
    }
}
function emailClick(){
    document.getElementById("err_email").style.display="none";
    return true;
}

function checkSubmit(){
    if(!tea_idLimit() || !tea_nameLimit() || !sexLimit() || !dateLimit() || !id_cardLimit() || !phoneLimit() || !emailLimit()) {
        alert('请检查以上信息');
        return false;
    }
    return true;
}

function firm() {
    //利用对话框返回的值 （true 或者 false）
    if (confirm("你确定删除吗？")) {
        document.getElementById('delete').href="familyQuery.php?number=<?php echo $familyQuery->number?>&delete=1";
    }
    else {
        history.go(0);
    }
}