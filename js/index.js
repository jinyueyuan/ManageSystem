/**
 * Created by m.cb on 15/12/11.
 */
window.onload=function(){
    if($("body").height() < window.innerHeight){
        $("#inn").css("height",window.innerHeight-50);
    }
    else {
        $("#inn").css("height",document.body.scrollHeight-50);
    }
};
function getclassname(obj) {
    if (document.getElementsByClassName('active').length == 0) {
        obj.className = 'active';
        obj.id = 'active';
    }else {
        var obj1 = document.getElementById('active');
        obj1.className = '111';
        obj1.id = '1';
        obj.className = 'active';
        obj.id = 'active';
    }
};
function dyniframesize(down) {
    var pTar = null;
    if (document.getElementById){
        pTar = document.getElementById(down);
    }
    else{
        eval('pTar = ' + down + ';');
    }
    if (pTar && !window.opera){
        pTar.style.display="block"
        if (pTar.contentDocument && pTar.contentDocument.body.offsetHeight){
            pTar.height = pTar.contentDocument.body.offsetHeight +20;
            pTar.width = pTar.contentDocument.body.scrollWidth+20;
        }
        else if (pTar.Document && pTar.Document.body.scrollHeight){
            pTar.height = pTar.Document.body.scrollHeight;
            pTar.width = pTar.Document.body.scrollWidth;
        }
    }
}