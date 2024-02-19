@extends('layouts.main')

@section('title','Create form')

@section('content')
    <a href="{{route('auth.social.redirect',['provider'=>'facebook'])}}">Facebook</a>
@endsection