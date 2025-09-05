<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequset;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.list', compact('users'));
    }


    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserRequset $request)
    {
        $user = User::create([
            'name' => $request->name,
            'code' => uniqidReal(rand(8,12)),
            'email'=> $request->email,
            'mobile' => $request->mobile,
            'role' => $request->role,
            'password'=> Hash::make($request->password),
            'created_by'=> Auth::user()->id,
            'updated_by'=> Auth::user()->id,
    ]);
    return redirect()->route('admin.users.list')->with('success','user created success');
    }


    public function show(User $user)
    {
        // return view('admin.users.show', compact('user'));
    }

    
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user )
    {
        $user = User::where('code',$request->code)->first();
        $user->update([
            'code' => $request->code,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
            'updated_by' => $request->user()->id,
        ]);
        return redirect()->route('admin.users.edit',$user->code)->with('success','user updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( User $user)
    {
        //
    }
}
