@extends('layouts.main')


@section('title','Index')

@section('content')

<table class="table table-striped">
    <thead>
      {{ $users->links() }}
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Email</th>
        <th scope="col">Post count</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->posts_count}}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <form action="{{route('users.destroy',['user'=> $user->id])}}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-danger m-2">Delete</button>
                    </form>
                    <a href="{{route('users.show',['user' => $user->id])}}"><button type="button" class="btn btn-warning m-2">Show</button></a>
                    <a href="{{route('users.edit',['user' => $user->id])}}"><button type="button" class="btn btn-success m-2">Edit</button></a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection