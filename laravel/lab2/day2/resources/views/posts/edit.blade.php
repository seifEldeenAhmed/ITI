@extends('layouts.main')

@section('title','Edit form')

@section('content')
<form action="{{route('posts.update',['post' => $post->id])}}" method="POST">
  @csrf
  @method('PUT')
    <div class="form-row">
      
      <div class="form-group col-md-6">
        <label for="inputEmail4">Title</label>
        <input type="text" name="title"class="form-control" id="inputEmail4" value="{{ $post->title }}">
      </div>
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Select Author</label>
      <select class="form-control" name="user_id" id="exampleFormControlSelect1">
        @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="enabled" id="inlineCheckbox1" {{ $post->enabled==1?'checked':'' }} >
      <label class="form-check-label" for="inlineCheckbox1">Enable</label>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Post Body</label>
      <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3">{{$post->body}}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Publish</button>
  </form>
@endsection