<div class="row mb-5 align-items-center">
    <div class="col-4">Attending APA 2023?</div>
    <div class="col-8 attendance-container">
        <label><input type="radio" name="{{$name}}" value="Yes" {{$value=="Yes"||$value==""?"checked":""}}>Yes</label><br>
        <label><input type="radio" name="{{$name}}" value="No" {{$value=="No"?"checked":""}}>No</label>
    </div>
</div>