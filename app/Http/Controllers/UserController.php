<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users=User::simplePaginate(10);
        return view("home",compact('users'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adduser');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'useremail' => 'required|email',
            'usersalary' => 'required|numeric',
            'userdob' => 'required',
            'userpass' => 'required',
        ]);

        User::create([
            'user_name' => $request->username,
            'email' => $request->useremail,
            'salary' => $request->usersalary,
            'dob' => $request->userdob,
            'password' => $request->userpass,

        ]);

        return redirect()->route('user.index')
                        ->with('status','New User Added Successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::findOrFail($id);
        // return $users;
        return view('viewuser',compact('users'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)//you can use 'string $id'
    {
        $users = User::findOrFail($user->id);
        return view('updateuser',compact('users'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) //you can use 'User $user'
    {
        $request->validate([
            'username' => 'required|string',
            'useremail' => 'required|email',
            'usersalary' => 'required|numeric',
            'userdob' => 'required',
            'userpass' => 'required',
        ]);

        $user =User::where('id',$id)
                        ->update([
                            'user_name' => $request->username,
                            'email' => $request->useremail,
                            'salary' => $request->usersalary,
                            'dob' => $request->userdob,
                            'password' => $request->userpass,
                        ]);

        return redirect()->route('user.index')
                        ->with('status','User Data Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $users=User::find($id);
        $users->delete();
        return redirect()->route('user.index')
        ->with('status','User Data Deleted Successfully.');
    }
}
