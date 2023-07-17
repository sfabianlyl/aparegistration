<div class="row mb-5 align-items-center">
    <div class="col-4">Age</div>
    <div class="col-8">
        <label><input type="radio" name="{{$name}}" value="18 - 25" {{$value==""||$value=="18 - 25"? "checked":""}}>18 - 25</label><br>
        <label><input type="radio" name="{{$name}}" value="26 - 35" {{$value=="26 - 35"? "checked":""}}>26 - 35</label><br>
        @if(!($restricted??false))
            <label><input type="radio" name="{{$name}}" value="36 - 45" {{$value=="36 - 45"? "checked":""}}>36 - 45</label><br>
            <label><input type="radio" name="{{$name}}" value="46 - 55" {{$value=="46 - 55"? "checked":""}}>46 - 55</label><br>
            <label><input type="radio" name="{{$name}}" value="56 - 65" {{$value=="56 - 65"? "checked":""}}>56 - 65</label><br>
            <label><input type="radio" name="{{$name}}" value="66 - 75" {{$value=="66 - 75"? "checked":""}}>66 - 75</label><br>
        @endif
    </div>
</div>