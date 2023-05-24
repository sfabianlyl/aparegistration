<div class="row mb-5 align-items-center">
    <div class="col-4">Differently Abled?</div>
    <div class="col-8">
        <label><input type="radio" name="{{$church}}[{{$number}}][differently_abled]" value="Yes" {{$value=="Yes"?"checked":""}}>Yes</label><br>
        <label><input type="radio" name="{{$church}}[{{$number}}][differently_abled]" value="No" {{$value=="No"?"checked":""}}>No</label>
    </div>
</div>