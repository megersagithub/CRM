<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
                ->where('usertype', '=', 'admin')
                ->get();
                
        return view('admin.dashboard', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required',
            'email'=> 'required',
        ] );
        $user = new User;
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->usertype = "admin";
        $user->password=Hash::make($request->input('password'));
        $user->save();
        return redirect('/Admindashboard')->with('success', "Registered successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view("admin.editadmin")->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=> 'required',
            'email'=> 'required',
        ]);
        $name = $request->name;
        $email = $request->email;
        $usertype = "admin";
        $password = $request->password;
        
        $update = [
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'usertype' => $usertype,
            'password' => Hash::make($password),
        ];
        User::where('id', $id)->update($update);
        return redirect('/Admindashboard')->with('success', 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = User::find($id);
        $delete -> delete();
        return redirect('/Admindashboard');
    }
}
