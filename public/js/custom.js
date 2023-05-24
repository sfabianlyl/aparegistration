function displayForm(){
    $(".entity-button").removeClass("active");
    $(this).addClass("active");

    
}

$(document).ready(function(){
    $(".entity-button").on("click",displayForm);
})