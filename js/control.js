/**
 * Created by m.cb on 15/11/26.
 */
window.onload=function(){
    var deleteAttr = "";
    $("#deleteConfirm").click(function(){
        window.location.href=deleteAttr;
        deleteAttr = "";
    })
    $(".delete").click(function(){
        deleteAttr = $(this).attr("deleteSelect");
        $("#cover").show();
        $("#pushWindow").show();
    });
    $("#cover").click(function(){
        $("#cover").hide();
        $("#pushWindow").hide();
    })
    $("#cancel").click(function(){
        $("#cover").hide();
        $("#pushWindow").hide();
    })
    if($("body").height() < window.innerHeight){
        $("#inn").css("height",window.innerHeight-50);
    }
    else {
        $("#inn").css("height",document.body.scrollHeight-50);
    }
};