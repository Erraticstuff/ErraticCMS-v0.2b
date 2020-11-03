function id(file){
    return document.getElementById(file);
}

$(document).ready(function(){
    $("#upload").click(function(){
        id("progressBar").style.display = "block";
        var file = id("file").files[0];

        if (file!="") {
            var formdata = new FormData();
            formdata.append("file", file);
            var ajax = new XMLHttpRequest();
            ajax.upload.addEventListener("progress", progressHandler, false);
            ajax.addEventListener("load", completeHandler, false);
            ajax.addEventListener("error", errorHandler, false);
            ajax.addEventListener("abort", abortHandler, false);
            ajax.open("POST", "upload.php");
            ajax.send(formdata);
        }
    });
});

function progressHandler(event){
    id("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
    var percent = (event.loaded / event.total) * 100;
    id("progressBar").value = Math.round(percent);
    id("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
}
function completeHandler(event){
    id("status").innerHTML = event.target.responseText;
    id("progressBar").value = 0;
}
function errorHandler(event){
    id("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
    id("status").innerHTML = "Upload Aborted";
}