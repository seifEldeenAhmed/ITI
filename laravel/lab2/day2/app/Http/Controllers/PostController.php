<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::all();
        foreach($posts as $post){
            $user_name=User::find($post->user_id)->name;
            $post->user_id=$user_name;
        }
        return view('posts.index',['posts'=>$posts]);
        

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users=User::all();
        return view('posts.create',['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title=$request->input('title');
        $user=$request->input('user_id');
        $body=$request->input('body');
        if($request->input('enabled')=='on'){
            $enabled=1;
        }else{
            $enabled=0;
        }
        Post::create(
            [
                'title'=>$title,
                'user_id'=>$user,
                'enabled'=>$enabled,
                'body'=>$body,
                'slug'=>Str::slug($title),
            ]
        );
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        $post=Post::find($id);
        $post->user_id= User::find($post->user_id)->name;
        return view('posts.postcard',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users=User::all();
        $post=Post::find($id);
        return view('posts.edit',['post'=>$post, 'users'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $msg='post updated successfully';
        Post::find($id)->update(
            [
                'title'=>$request->input('title'),
                'user_id'=>$request->input('user_id'),
                'enabled'=>$request->input('enabled')=='on'?1:0,
                'body'=>$request->input('body'),
                'slug'=>Str::slug($request->input('title'))
            ]
        );
        return redirect('home')->with(['msg'=>$msg]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::find($id)->delete();
        $posts=Post::all();
        return view('posts.index',['posts'=>$posts]);
    }
}
