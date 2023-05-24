<div class="row mb-5 align-items-center">
    <div class="col-4">Gender</div>
    <div class="col-8">
        <label><input type="radio" name="form[{{$church}}][{{$number}}][gender]" value="Male" {{$value=="Male"?"checked":""}}>Male</label><br>
        <label><input type="radio" name="form[{{$church}}][{{$number}}][gender]" value="Female" {{$value=="Female"?"checked":""}}>Female</label>
    </div>
</div>