<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $users=User::all();
        return view('users.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create(
            ['name' => $request->input('username') ,'email' => $request->input('useremail')]
            );
        
        return redirect()->route('users.home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user=User::find($id);
        return view('users.profile',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::find($id);
        return view('users.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        User::find($id)->update(
            ['name' => $request->input('username'),
            'email'=>$request->input('useremail')
        ]);
        $msg='Update done successfully';
        return redirect('home')->with(['msg'=>$msg]);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        $msg='Delete done successfully';
        return redirect('home')->with(['msg'=>$msg]);

    }
}
