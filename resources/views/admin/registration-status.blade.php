
@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', "Registration Status")

@section('page_header')
    <h1 class="page-title">
        Registration Status
    </h1>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered" style="padding:2rem;">
                    
                    <h3>Summary</h3>
                    <p>Total number of accounts registering: {{count($registering)}}</p>
                    <p>Total number of accounts that have logged in: {{count($loggedIn)}}</p>
                    <p>Total number of expected participants (excluding the registering account): {{$participants_expected}}</p>
                    <p>Total number of registered participants (excluding the registering account): {{$registered}}</p>
                    

                    <h3>By Registering Account</h3>
                    <ol>
                        @foreach($loggedIn as $priest)
                            @php
                                $majorCount=0;
                                $entities=json_decode($priest->filled,true);
                                if($entities)
                                foreach($entities as $entity=>$people)
                                foreach($people as $person)
                                if(isset($person["name"]))
                                if($person["name"])
                                $majorCount++;
                            @endphp
                            <li>{{$priest->name}}: {{$majorCount}}/{{$priest->entities->sum("pax")}}</li>
                            <ul>
                                @foreach($priest->entities as $entity)
                                    @php
                                        $minorCount=0;
                                        $code=preg_replace('/[^A-Za-z0-9\_]/', '', str_replace(' ','_',strtolower($entity->name)));
                                        if($entities)
                                        if(isset($entities[$code]))
                                        foreach($entities[$code] as $person)
                                        if(isset($person["name"]))
                                        if($person["name"])
                                        $minorCount++;
                                    @endphp
                                    <li>{{$entity->name}}: {{$minorCount}}/{{$entity->pax}}</li>
                                @endforeach
                            </ul>
                            
                        @endforeach
                    </ol>
                    
                    <h3>Who hasn't logged in?</h3>
                    <ol>
                    @foreach($registering->whereNull("filled")->all() as $priest)
                        <li>{{$priest->name}}</li> 
                    @endforeach
                    </ol>

                    <h3>Who hasn't logged in? (Emails)</h3>
                    <p>
                        @foreach($registering->whereNull("filled")->all() as $priest)
                            {{$priest->email}}<br> 
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    
@stop
