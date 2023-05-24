<div class="row mb-5 align-items-center">
    <div class="col-4">Category</div>
    <div class="col-8">
        <label><input type="radio" name="{{$name}}" value="1" {{$value==""||$value=="1"? "checked":""}}>Parish Priest</label><br>
        <label><input type="radio" name="{{$name}}" value="2" {{$value=="2"? "checked":""}}>Ecclesial Assistant</label><br>
        <label><input type="radio" name="{{$name}}" value="3" {{$value=="3"? "checked":""}}>Parish Priest & Ecclesial Assistant</label><br>
        <label><input type="radio" name="{{$name}}" value="4" {{$value=="4"? "checked":""}}>Clergy *for those who do not subscribe to the above (inclusive of Assistant Parish Priest)</label>
    </div>
</div>