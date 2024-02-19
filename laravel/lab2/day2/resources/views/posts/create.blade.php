@extends('layouts.main')

@section('title','Create form')

@section('content')
<form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="form-row">
      
      <div class="form-group col-md-6">
        <label for="inputEmail4">Title</label>
        <input type="text" name="title"class="form-control" id="inputEmail4">
      </div>
    </div>

    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="enabled" id="inlineCheckbox1" >
      <label class="form-check-label" for="inlineCheckbox1">Enable</label>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Post Body</label>
      <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3">{{old('body')}}</textarea>
    </div>

    <div class="mb-3">
      <label for="formFile" class="form-label">Default file input example</label>
      <input class="form-control" type="file" name="file" id="formFile">
    </div>

    <button type="submit" class="btn btn-primary">Publish</button>
  </form>
@endsection