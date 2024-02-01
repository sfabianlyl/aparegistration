<x-guest-layout>
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
                <a class="nav-link" href="#form-member-1" id="form-member-1-tab" data-toggle="tab" role="tab" aria-controls="form-member-1">Member 1</a>
                <a class="nav-link" href="#form-member-2" id="form-member-2-tab" data-toggle="tab" role="tab" aria-controls="form-member-2">Member 2</a>
                <a class="nav-link" href="#form-member-3" id="form-member-3-tab" data-toggle="tab" role="tab" aria-controls="form-member-3">Member 3</a>
                
            </nav>
            <form action="{{route("auto.submit.participants")}}" method="POST" id="autoSubmitForm">
                @csrf
                <div class="tab-content" id="formsContent">
                    <div class="tab-pane fade" id="form-self" role="tabpanel" aria-labelledby="form-self-tab">
                        <h4>My Details</h4>
                        
                        @include("forms.self")
                    </div>
                    @for ($i = 1; $i < 4; $i++)
                        <div class="tab-pane fade" id="form-member-{{$i}}" role="tabpanel" aria-labelledby="form-member-{{$i}}-tab">
                            <h4>Member 1</h4>
                            @include("forms.church")
                        </div>
                    @endfor
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
