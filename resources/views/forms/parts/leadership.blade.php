<div class="row mb-5 align-items-center">
    <div class="col-4">In-coming / Out-going / On-going Leadership</div>
    <div class="col-8">
        <label><input type="radio" name="{{$church}}[{{$number}}][leadership]" value="In-coming" {{$value==""||$value=="In-coming"?"checked":""}}>In-coming</label><br>
        <label><input type="radio" name="{{$church}}[{{$number}}][leadership]" value="Out-going" {{$value=="Out-going"?"checked":""}}>Out-going</label><br>
        <label><input type="radio" name="{{$church}}[{{$number}}][leadership]" value="On-going" {{$value=="On-going"?"checked":""}}>On-going</label>
    </div>
</div>