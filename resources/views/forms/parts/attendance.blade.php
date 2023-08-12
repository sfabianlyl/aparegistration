<div class="row mb-5 align-items-center">
    <div class="col-4">Attending APA 2023?</div>
    <div class="col-8 attendance-container">
        <label><input type="radio" name="{{$name}}" value="Yes" {{$value=="Yes"||$value==""?"checked":""}}>Yes</label><br>
        <label><input type="radio" name="{{$name}}" value="No" {{$value=="No"?"checked":""}}>No</label>
    </div>
</div>

<script>
    $(document).ready(function(){
        $(".attendance-container input").on("change",function(){
            if($(this).val()=="No"){
                $("#form-self :input:not(.attendance-container input)").prop("readonly",true);
            }else{
                $("#form-self :input:not(.attendance-container input)").prop("readonly",false);
            }
        });
        $(".attendance-container input").trigger("change");
    });
</script>