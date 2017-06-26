/**
 * Created by m.cb on 15/11/21.
 */

function checkPhotoType(){
    var photo = document.getElementById("photo");  //获取上传图片的资源
    var photoName = photo.value; //获取上传图片的名字
    var extensionUpper = photoName.substr(photoName.lastIndexOf(".")+1).toUpperCase(); //获取上传图片的名字的后缀名并转换成大写字母
    if(extensionUpper=='ICO' || extensionUpper=='JPG' || extensionUpper=='JPEG' || extensionUpper=='PNG'){
        return true;
    }else{
        alert ("你上传的图片格式不正确");
        photo.outerHTML = photo.outerHTML; //清除上传文件内容
        return false;
    }
}

function checkPhotoSize(){
    var LIMIT = 1024*1024;
    var photo = document.getElementById("photo");  //获取上传图片的资源
    var fileSize =  photo.files[0].size;
    if(fileSize>LIMIT){
        alert ("你上传的图片超过限制的大小");
        photo.outerHTML = photo.outerHTML; //清除上传文件内容
        return false;
    }
}