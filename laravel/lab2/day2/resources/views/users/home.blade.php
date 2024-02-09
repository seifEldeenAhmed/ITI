@extends('layouts.main')

@section('title','index')


@section('content')
    @if(session('msg'))
        <p>{{session('msg')}}</p>
    @endif
@endsection