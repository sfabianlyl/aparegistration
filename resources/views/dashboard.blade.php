<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(count($entities ?? [])==0)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        You have no forms to fill up yet. Stay tuned!
                    </div>
                </div>
            @else
                <nav class="nav nav-pills flex-column mb-5">
                    @foreach ($entities as $entity)
                        <a class="nav-link" href="#form-{{$entity->id}}" id="form-{{$entity->id}}-tab" data-toggle="tab" role="tab" aria-controls="form-{{$entity->id}}">{{$entity->name}}</a>
                    @endforeach
                </nav>
                <form action="{{route("auto.submit.participants")}}" method="POST" id="autoSubmitForm">
                    <div class="tab-content" id="formsContent">
                        @foreach($entities as $entity)
                            <div class="tab-pane fade" id="form-{{$entity->id}}" role="tabpanel" aria-labelledby="form-{{$entity->id}}-tab">
                                <h4>{{$entity->name}}</h4>
                                @php
                                    $church=preg_replace('/[^A-Za-z0-9\_]/', '', str_replace(' ','_',strtolower($entity->name)));
                                @endphp
                                @for ($i = 0; $i < $entity->pax; $i++)
                                    <h6>Person {{$i+1}}</h6>
                                    @switch($entity->category)
                                        @case("Church")
                                            @include("forms.church", ["inputs"=>$inputs[$church][$i]??[], "details"=>$details, "church"=>$church, "number"=>$i])
                                        @break
                                        @case("Chapel")
                                            @include("forms.chapel", ["inputs"=>$inputs[$church][$i]??[], "details"=>$details, "church"=>$church, "number"=>$i])
                                        @break
                                        @case("Ministry/Office")
                                            @include("forms.ministry", ["inputs"=>$inputs[$church][$i]??[], "details"=>$details, "church"=>$church, "number"=>$i])
                                        @break
                                        @default
                                            
                                    @endswitch
                                @endfor
                            </div>
                        @endforeach
                    </div>
                </form>
            @endif
        </div>
    </div>
</x-app-layout>
