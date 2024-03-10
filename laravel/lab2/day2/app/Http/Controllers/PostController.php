<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FileValidate;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use App\Events\PostCounter;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(15);
        
        return view('posts.index',['posts'=>$posts]);
        

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
        $imagePath=null;
        if ($request->hasFile('file')&& $request->file('file')->isValid()) {
            $path = $request->file->store('images','public');
            $imagePath= $path;
        }
        $title=$request->input('title');
        $body=$request->input('body');
        if($request->input('enabled')=='on'){
            $enabled=1;
        }else{
            $enabled=0;
        }
        $data=[
            'title'=>$title,
            'body'=>$body,
            'enabled'=>$enabled,
            'slug'=>Str::slug($title),
            'image'=>$imagePath
        ];  
        
        $user=Auth::user();
        $post=$user->posts()->create($data);
        event(new PostCounter($post));
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
        $post=Post::find($id);
        if (Auth::id()==$post->user->id) {
            return view('posts.edit',['post'=>$post]);
        }
        else{
            
            return redirect()->route('posts.index')->with(['msg'=>'Access Denied']);
        }
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
                'user_id'=>Auth::id(),
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
        $post=Post::find($id);
        if (Auth::id()==$post->user_id) {
            # code...
            Post::find($id)->delete();
            return redirect()->route('posts.index');
        }else{
            return redirect()->route('posts.index')->with(['msg'=>'Access Denied']);
        }
    }
}
