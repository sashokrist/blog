<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{

    public function index()
    {
        return view('admin.users.index')->with('users', User::all());
    }


    public function create()
    {
       return view('admin.users.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required',
           'email' => 'required|email'
        ]);

        $user = User::create([
           'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('111111')
        ]);

        $profile = Profile::create([
            'user_id' =>$request->id,
            'avatar' => '/uploads/avatars/liza.jpg'
        ]);

        Session::flash('success', 'User was added');
        return redirect()->route('users');
    }

    public function admin($id){
        $user = User::find($id);
        $user->admin = 1;
        $user->save();
        Session::flash('success', 'User permission is admin');
        return redirect()->back();
    }

    public function not_admin($id){
        $user = User::find($id);
        $user->admin = 0;
        $user->save();
        Session::flash('success', 'User admin permission was remove');
        return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
