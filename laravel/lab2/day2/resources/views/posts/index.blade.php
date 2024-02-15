@extends('layouts.main')


@section('title','Posts Index')

@section('content')

<table class="table table-striped">
    <thead>
      {{ $posts->links() }}
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">slug</th>
        <th scope="col">Created By</th>
        <th scope="col">Created At</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->slug}}</td>
            <td>{{$post->user_id}}</td>
            <td>{{$post->created_at}}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <form action="{{route('posts.destroy',['post'=> $post->id])}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger m-2">Delete</button>
                    </form>
                    <a href="{{route('posts.show',['post' => $post->id])}}"><button type="button" class="btn btn-warning m-2">Show</button></a>
                    <a href="{{route('posts.edit',['post' => $post->id])}}"><button type="button" class="btn btn-success m-2">Edit</button></a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection