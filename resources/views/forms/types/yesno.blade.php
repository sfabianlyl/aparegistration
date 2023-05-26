<div class="row mb-5 align-items-center">
    <div class="col-4">{{$display}}</div>
    <div class="col-8">
        <label><input type="radio" name="{{$name}}" value="Yes" {{$value=="Yes"?"checked":""}}>Yes</label><br>
        <label><input type="radio" name="{{$name}}" value="No" {{$value=="No"?"checked":""}}>No</label>
    </div>
</div>