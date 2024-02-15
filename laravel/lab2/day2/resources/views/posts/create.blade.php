@extends('layouts.main')

@section('title','Create form')

@section('content')
<form action="{{route('posts.store')}}" method="POST">
  @csrf
    <div class="form-row">
      
      <div class="form-group col-md-6">
        <label for="inputEmail4">Title</label>
        <input type="text" name="title"class="form-control" id="inputEmail4">
      </div>
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Select Author</label>
      <select class="form-control" name="user_id" id="exampleFormControlSelect1">
        <option>Choose an Author</option>
        @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="enabled" id="inlineCheckbox1" >
      <label class="form-check-label" for="inlineCheckbox1">Enable</label>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Post Body</label>
      <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3">{{old('body')}}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Publish</button>
  </form>
@endsection