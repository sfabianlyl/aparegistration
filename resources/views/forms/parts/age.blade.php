<div class="row mb-5 align-items-center">
    <div class="col-4">Age</div>
    <div class="col-8">
        <label><input type="radio" name="{{$name}}" value="18 - 23" {{$value==""||$value=="18 - 23"? "checked":""}}>18 - 23</label><br>
        <label><input type="radio" name="{{$name}}" value="24 - 30" {{$value=="24 - 30"? "checked":""}}>24 - 30</label><br>
        @if(!($restricted??false))
            <label><input type="radio" name="{{$name}}" value="31 - 40" {{$value=="31 - 40"? "checked":""}}>31 - 40</label><br>
            <label><input type="radio" name="{{$name}}" value="41 - 50" {{$value=="41 - 50"? "checked":""}}>41 - 50</label><br>
            <label><input type="radio" name="{{$name}}" value="51 - 60" {{$value=="51 - 60"? "checked":""}}>51 - 60</label><br>
            <label><input type="radio" name="{{$name}}" value="61 - 75" {{$value=="61 - 75"? "checked":""}}>61 - 75</label><br>
        @endif
    </div>
</div>