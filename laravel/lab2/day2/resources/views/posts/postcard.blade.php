@extends('layouts.main')


@section('title','Post-card')

@section('content')
<div class="container mt-3">
    <h2>Post Card</h2>
    <div class="card" style="width:400px">
      <img class="card-img-top" src="{{URL('images/img_avatar1.png')}}" alt="Card image" style="width:100%">
      <div class="card-body">
        <h4 class="card-title">{{$post->title}}</h4>
        <h4 class="card-title">{{$post->user_id}}</h4>
        <h4 class="card-title">{{$post->slug}}</h4>
        <h4 class="card-title">{{$post->created_at}}</h4>
        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam blanditiis dicta tenetur, dolore ex at nobis accusantium necessitatibus
          fuga dolores sit molestias, 
          ipsa dolor, temporibus cum omnis harum sint qui.
          {{$post->body}}.
          is an architect and engineer</p>
      </div>
    </div>
    <br>
@endsection