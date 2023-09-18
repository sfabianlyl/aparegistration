
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
                            <li {{$majorCount==$priest->entities->sum("pax")? "style=color:#1fce1f;":""}}>{{$priest->name}}: {{$majorCount}}/{{$priest->entities->sum("pax")}}</li>
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
                                    <li {{$minorCount==$entity->pax? "style=color:#1fce1f;":""}}>{{$entity->name}}: {{$minorCount}}/{{$entity->pax}}</li>
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

                    <h3>All details (Registering Accounts)</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Attending</th>
                                <th>Language</th>
                                <th>IC/Passport</th>
                                <th>Age</th>
                                <th>Mobile</th>
                                <th>Involvement</th>
                                <th>Diocesan/Religious</th>
                                <th>Differently Abled Person</th>
                                <th>Leadership</th>
                                <th>Accomodation</th>
                                <th>Driving</th>
                                <th>Dietary Requirements</th>
                                <th>Allergy</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count=0;
                            @endphp
                            @foreach($registering as $priest)
                                @php
                                    $count++;
                                    $details=json_decode($priest->details);
                                @endphp
                                <tr>
                                    <td>{{$count}}</td>
                                    <td>{{$priest->name}}</td>
                                    <td>
                                        @switch($priest->category)
                                            @case(1)
                                                Parish Priest
                                                @break
                                            @case(2)
                                                Ecclesial Assistant
                                                @break
                                            @case(3)
                                                Parish Priest & Ecclesial Assistant
                                                @break
                                            @case(4)
                                                Clergy
                                                @break
                                            @default
                                                {{$priest->category}}
                                        @endswitch
                                    </td>
                                    <td>{{$details->attendance??""}}</td>
                                    <td>{{$details->language??""}}</td>
                                    <td>{{$priest->ic}}</td>
                                    <td>{{$priest->age}}</td>
                                    <td>{{$priest->mobile}}</td>
                                    <td>{{$priest->involvement}}</td>
                                    <td>{{$priest->order}}</td>
                                    <td>{{$priest->differently_abled}}</td>
                                    <td>{{$priest->leadership}}</td>
                                    <td>{{$priest->accomodation}}</td>
                                    <td>{{$details->driving??""}}</td>
                                    <td>{{$priest->diet}}</td>
                                    <td>{{$priest->allergy}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <h3>All details (Participants Registered)</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Parish/Ministry</th>
                                <th>Name</th>
                                <th>Language</th>
                                <th>IC/Passport</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Staff/Volunteer</th>
                                <th>Involvement</th>
                                <th>Differently Abled Person</th>
                                <th>Leadership</th>
                                <th>Accomodation</th>
                                <th>Driving</th>
                                <th>Dietary Requirements</th>
                                <th>Allergy</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count=0;
                                
                                if($entities)
                                foreach($entities as $entity=>$people)
                                foreach($people as $person)
                                if(isset($person["name"]))
                            @endphp
                            @foreach($loggedIn as $priest)
                                @php
                                    $entities=json_decode($priest->filled,true);
                                @endphp
                                @foreach($priest->entities as $entity)
                                    @php
                                        $code=preg_replace('/[^A-Za-z0-9\_]/', '', str_replace(' ','_',strtolower($entity->name)));
                                    @endphp
                                    @if ($entities)
                                        @if (isset($entities[$code]))
                                            @foreach ($entities[$code] as $person)
                                                @if (isset($person["name"]))
                                                    @if ($person["name"])
                                                        @php
                                                            $count++;  
                                                        @endphp
                                                        <tr>
                                                            <td>{{$count}}</td>
                                                            <td>{{$entity->name}}</td>
                                                            <td>{{$person["name"]??""}}</td>
                                                            <td>{{$person["language"]??""}}</td>
                                                            <td>{{$person["ic"]??""}}</td>
                                                            <td>{{$person["age"]??""}}</td>
                                                            <td>{{$person["gender"]??""}}</td>
                                                            <td>{{$person["email"]??""}}</td>
                                                            <td>{{$person["mobile"]??""}}</td>
                                                            <td>{{$person["staff_volunteer"]??""}}</td>
                                                            <td>{{$person["involvement"]??""}}</td>
                                                            <td>{{$person["differently_abled"]??""}}</td>
                                                            <td>{{$person["leadership"]??""}}</td>
                                                            <td>{{$person["accomodation"]??""}}</td>
                                                            <td>{{$person["driving"]??""}}</td>
                                                            <td>{{$person["diet"]??""}}</td>
                                                            <td>{{$person["allergy"]??""}}</td>
                                                        </tr>
                                                    @endif
                                                @endif
                                                
                                            @endforeach
                                        @endif
                                    @endif
                                @endforeach
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    
@stop
