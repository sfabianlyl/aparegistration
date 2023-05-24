<div class="row mb-5 align-items-center">
    <div class="col-4">Staff or Volunteer?</div>
    <div class="col-8">
        <label><input type="radio" name="form[{{$church}}][{{$number}}][staff_volunteer]" value="Staff" {{$value=="Staff"?"checked":""}}>Staff</label><br>
        <label><input type="radio" name="form[{{$church}}][{{$number}}][staff_volunteer]" value="Volunteer" {{$value=="Volunteer"?"checked":""}}>Volunteer</label>
    </div>
</div>