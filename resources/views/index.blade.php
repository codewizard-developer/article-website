@extends('header')
@section('content')
@if(Auth::check())
<h1>{{Auth::user()->name}}</h1>
@else
<h1>Please Login</h1>
@endif
@endsection