@extends('layouts.main')


@section('title','profile')

@section('content')
<div class="container mt-3">
    <h2>User Card</h2>
    <div class="card" style="width:400px">
      <img class="card-img-top" src="{{URL('images/img_avatar1.png')}}" alt="Card image" style="width:100%">
      <div class="card-body">
        <h4 class="card-title">{{$user->name}}</h4>
        <p class="card-text">Some example text user email is {{$user->email}}. {{$user->name}} is an architect and engineer</p>
      </div>
    </div>
    <br>
@endsection