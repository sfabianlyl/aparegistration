toastr.options={
    "preventDuplicates":true,
    "timeOut":"3000"
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var autoSaveTimeout;

function autoSubmit(e){
    e.preventDefault();
    $.ajax({
        type:"POST",
        url:$(this).attr("action"),
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
    $("#autoSubmitForm :input").on("change keyup keydown",function(){
        clearTimeout(autoSaveTimeout);
        autoSaveTimeout=setTimeout(function(){
            $("#autoSubmitForm").submit();
        },1500);
    });
})