<div class="row mb-5 align-items-center">
    <div class="col-4">Preferred Language</div>
    <div class="col-8">
        <label><input type="radio" name="{{$name}}" value="English" {{$value==""||$value=="English"? "checked":""}}>English</label><br>
        <label><input type="radio" name="{{$name}}" value="Bahasa Malaysia" {{$value=="Bahasa Malaysia"? "checked":""}}>Bahasa Malaysia</label><br>
        <label><input type="radio" name="{{$name}}" value="Tamil" {{$value=="Tamil"? "checked":""}}>Tamil</label><br>
        <label><input type="radio" name="{{$name}}" value="Mandarin" {{$value=="Mandarin"? "checked":""}}>Mandarin</label><br>
    </div>
</div>