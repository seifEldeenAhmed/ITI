@extends('layouts.main')

@section('title','edit form')

@section('content')
<form action="{{route('users.update',['user' => $user->id])}}" method="POST">
  @csrf
  @method('PUT')
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Email</label>
        <input type="email" class="form-control" name="useremail" id="inputEmail4" value="{{$user->email}}">
      </div>
      <div class="form-group col-md-6">
        <label for="inputEmail4">Name</label>
        <input type="text" class="form-control" name="username" id="inputEmail4" value="{{$user->name}}">
      </div>
    </div>

    <button type="submit" class="btn btn-primary">Sign Up</button>
  </form>
@endsection