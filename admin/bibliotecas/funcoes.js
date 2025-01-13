function reloadPage(){
    $("#container_fluid").hide();
    $("#proc_loader").show();
    setTimeout(function () {
        location.reload();
    }, 1500);
}

function redirectPage(url,time){
    setTimeout(function () {
        location.href="?pg="+url;
    }, time);
}

function getURLParameter(name) {
    return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null;
}

function toUpper(obj){
    obj.value = obj.value.toUpperCase();
}

$(function () {
    $(".clbx").colorbox({rel:"fotos"});
});

function formataValor(value, row, index) {
    return "R$ " + exibirValor(value);
}

function formataData(value, row, index) {
    //console.log(value);
    if(value != "" && value != "0000-00-00") {
        return moment(value).format('DD/MM/YYYY');
    }else{
        return "-";
    }
}

