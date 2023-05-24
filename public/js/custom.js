toastr.options={
    "preventDuplicates":true,
    "timeOut":"3000"
}
var autoSaveTimeout;

function autoSubmit(){
    $.ajax({
        type:"POST",
        url:$(this).attribute("action"),
        data:$(this).serialize(),
        success:function(data){
            toastr.success("Saved!");
        },
        error:function(data){
            console.log(data);
        }
    });
}

$(document).ready(function(){
    $("#autoSubmitForm").on("submit",autoSubmit);
    $("#autoSubmitForm :input").on("change",function(){
        clearTimeout(autoSaveTimeout);
        autoSaveTimeout=setTimeout(function(){
            $("#autoSubmitForm").submit();
        },1500);
    });
})