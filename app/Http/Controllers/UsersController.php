<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Position;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataPosition = Position::all();

        if ($request->has('search')) {
            $showUsers = Users::where('username', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $showUsers = Users::all();
        }

        return view('masteruser', compact('showUsers', 'dataPosition'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataPosition = Position::all();

        return view('masteruser', compact('dataPosition'));
    }

    // Show Search Data
    public function search(Request $request)
    {
        //
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
            'username' => 'required|unique:users,username',
            'address' => 'required',
            'position' => 'required',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required|min:6',
            'level' => 'required'
        ]);

        $user = new Users;

        $user->username = $request->input('username');
        $user->address = $request->input('address');
        $user->position = $request->input('position');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->isAdmin = $request->input('level');

        $user->save();

        $request->session()->flash('success', 'User added successfully!');

        return redirect('masteruser');
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
        //
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
        // $this->validate($request,[
        //     'username' => 'required',
        //     'address' => 'required',
        //     'position' => 'required',
        //     'email' => 'required|email:dns|unique:users,email',
        //     'password' => 'required|min:6',
        //     'level' => 'required'
        // ]);

        $user = Users::FindOrFail($request->user_id);
        $user->update($request->all());
        
        // Check Password
        $passwordHash = Hash::make($request->input('password'));
        if($user->password == $passwordHash){
            $user->update(['password' => $passwordHash]);
        }
        $request->session()->flash('editsuccess', 'User updated successfully!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Users::FindOrFail($id);
        $user->delete();
        return response()->json(['deletesuccess' => 'User deleted successfully!']);
    }
}
