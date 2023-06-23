<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <div class="scrollTopButton">
        <p class="text-center mb-0">Back to<br>Top</p>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <nav class="nav nav-pills flex-column mb-5">
                <a class="nav-link" href="#form-self" id="form-self-tab" data-toggle="tab" role="tab" aria-controls="form-self">My Details</a>
                @foreach ($entities as $entity)
                    <a class="nav-link" href="#form-{{$entity->id}}" id="form-{{$entity->id}}-tab" data-toggle="tab" role="tab" aria-controls="form-{{$entity->id}}">{{$entity->name}}</a>
                @endforeach
            </nav>
            <form action="{{route("auto.submit.participants")}}" method="POST" id="autoSubmitForm">
                @csrf
                <div class="tab-content" id="formsContent">
                    <div class="tab-pane fade" id="form-self" role="tabpanel" aria-labelledby="form-self-tab">
                        <h4>My Details</h4>
                        
                        @include("forms.self", ["user"=>$user, "details"=>$detailsPriest])
                    </div>
                    @foreach($entities as $entity)
                        <div class="tab-pane fade" id="form-{{$entity->id}}" role="tabpanel" aria-labelledby="form-{{$entity->id}}-tab">
                            <h4>{{$entity->name}}</h4>
                            @php
                                $church=preg_replace('/[^A-Za-z0-9\_]/', '', str_replace(' ','_',strtolower($entity->name)));
                            @endphp
                            @for ($i = 0; $i < $entity->pax; $i++)
                                <h6>Delegate {{$i+1}}</h6>
                                @switch($entity->category)
                                    @case("Church")
                                        @include("forms.church", ["inputs"=>$inputs[$church][$i]??[], "details"=>$detailsChurch, "church"=>$church, "number"=>$i])
                                    @break
                                    @case("Chapel")
                                        @include("forms.chapel", ["inputs"=>$inputs[$church][$i]??[], "details"=>$detailsChapel, "church"=>$church, "number"=>$i])
                                    @break
                                    @case("Mass Centre")
                                        @include("forms.mass_centre", ["inputs"=>$inputs[$church][$i]??[], "details"=>$detailsMassCentre, "church"=>$church, "number"=>$i])
                                    @break
                                    @case("Ministry/Office")
                                        @include("forms.ministry", ["inputs"=>$inputs[$church][$i]??[], "details"=>$detailsMinistry, "church"=>$church, "number"=>$i])
                                    @break
                                    @default
                                        
                                @endswitch
                            @endfor
                        </div>
                    @endforeach
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
