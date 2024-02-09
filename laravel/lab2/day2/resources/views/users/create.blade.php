@extends('layouts.main')

@section('title','Create form')

@section('content')
<form action="{{route('users.store')}}" method="POST">
  @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Email</label>
        <input type="email" name="useremail" class="form-control" id="inputEmail4">
      </div>
      <div class="form-group col-md-6">
        <label for="inputEmail4">Name</label>
        <input type="text" name="username"class="form-control" id="inputEmail4">
      </div>
    </div>

    <button type="submit" class="btn btn-primary">Sign Up</button>
  </form>
@endsection