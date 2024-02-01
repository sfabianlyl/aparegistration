@php
    $priestDetails=json_decode($user->details??"",true);
@endphp

@include("forms.parts.attendance", ["value"=>$priestDetails["attendance"]??"","name"=>"self[details][attendance]"])
@include("forms.parts.name", ["value"=>$user->name??"","name"=>"self[name]"])
@include("forms.parts.age", ["value"=>$user->age??"","name"=>"self[age]"])
@include("forms.parts.ic", ["value"=>$user->ic??"","name"=>"self[ic]"])
@include("forms.parts.category", ["value"=>$user->category??"","name"=>"self[category]"])

@include("forms.parts.involvement", ["value"=>$user->involvement??"","name"=>"self[involvement]", "text"=>"ArchKL"])
@include("forms.parts.order", ["value"=>$user->order??"","name"=>"self[order]"])

@include("forms.parts.differently_abled", ["value"=>$user->differently_abled??"","name"=>"self[differently_abled]"])
@include("forms.parts.language", ["value"=>$priestDetails["language"]??"","name"=>"self[details][language]"])
@include("forms.parts.leadership", ["value"=>$user->leadership??"","name"=>"self[leadership]"])
@include("forms.parts.accomodation", ["value"=>$user->accomodation??"","name"=>"self[accomodation]"])
@include("forms.parts.diet", ["value"=>$user->diet??"","name"=>"self[diet]"])
@include("forms.parts.allergy", ["value"=>$user->allergy??"","name"=>"self[allergy]"])
@include("forms.parts.email", ["value"=>$user->email??"","name"=>"self[email]"])
@include("forms.parts.mobile", ["value"=>$user->mobile??"","name"=>"self[mobile]"])




@foreach($details??[] as $detail)
    @include("forms.types.$detail->type", ["value"=>$priestDetails[$detail->identifier]??"", "name"=>"self[details][$detail->identifier]", "display"=>$detail->name])
@endforeach