@php
    $church=$church??0;
    $number=$number??0;
@endphp

@include("forms.parts.name", ["value"=>$inputs["name"]??"","name"=>"form[$church][$number][name]"])
@include("forms.parts.age", ["value"=>$inputs["age"]??"","name"=>"form[$church][$number][age]"])
@include("forms.parts.ic", ["value"=>$inputs["ic"]??"","name"=>"form[$church][$number][ic]"])
@include("forms.parts.involvement", ["value"=>$inputs["involvement"]??"","name"=>"form[$church][$number][involvement]", "text"=>"Diocesan Ministries / Offices"])
@include("forms.parts.staff_volunteer", ["value"=>$inputs["staff_volunteer"]??"","name"=>"form[$church][$number][staff_volunteer]"])
@include("forms.parts.gender", ["value"=>$inputs["gender"]??"","name"=>"form[$church][$number][gender]"])
@include("forms.parts.differently_abled", ["value"=>$inputs["differently_abled"]??"","name"=>"form[$church][$number][differently_abled]"])
@include("forms.parts.language", ["value"=>$inputs["language"]??"","name"=>"form[$church][$number][language]"])
@include("forms.parts.leadership", ["value"=>$inputs["leadership"]??"","name"=>"form[$church][$number][leadership]"])
@include("forms.parts.accomodation", ["value"=>$inputs["accomodation"]??"","name"=>"form[$church][$number][accomodation]"])
@include("forms.parts.diet", ["value"=>$inputs["diet"]??"","name"=>"form[$church][$number][diet]"])
@include("forms.parts.allergy", ["value"=>$inputs["allergy"]??"","name"=>"form[$church][$number][allergy]"])
@include("forms.parts.email", ["value"=>$inputs["email"]??"","name"=>"form[$church][$number][email]"])
@include("forms.parts.mobile", ["value"=>$inputs["mobile"]??"","name"=>"form[$church][$number][mobile]"])

@foreach($details??[] as $detail)
    @include("forms.types.$detail->type", ["value"=>$inputs[$detail->identifier]??"", "name"=>"form[$church][$number][$detail->identifier]", "display"=>$detail->name])
@endforeach