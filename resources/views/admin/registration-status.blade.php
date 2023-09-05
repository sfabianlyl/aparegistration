
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
                    
                    <p>Total number of accounts registering: {{count($registering)}}</p>
                    <p>Total number of accounts that have logged in: {{count($loggedIn)}}</p>
                    <p>Total number of expected participants (excluding the registering account): {{$participants_expected}}</p>
                    <p>Total number of registered participants (excluding the registering account): {{$registered}}</p>
                    
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    
@stop
