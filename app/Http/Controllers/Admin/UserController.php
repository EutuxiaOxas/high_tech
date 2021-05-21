<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(15);
        $roles = Role::all();
        return view('cms.users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('cms.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        // dd($usuario->id);
        $usuario = User::find($user->id);

        $usuario->roles()->sync($request->roles);

        $users = User::all();

        return redirect()->route('cms.users.show', compact('users'))->with('message', 'El usuario se creó exitosamente!');
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
        $roles = Role::all();
        return view('cms.users.edit', compact('user','roles'));
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
        $user = User::find($id);
        // $user->roles()->sync($request->roles);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return back()->with('message','Usuario actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return back()->with('message','Usuario eliminado exitosamente!');
    }

    public function getUserById($id){
        return User::find($id);
    }

    public function updatePassword(Request $request, $id){

        $user = User::find($id);

        $password = $request->password;
        $confirm_password = $request->corfirm_password;

        if( $password == $confirm_password ){

            $user->update([
                'password' => Hash::make($password),
            ]);

            $message = 'Password actualizado exitosamente!';

        }else{
            $message = 'No coinciden los passwords!';
        }

        return back()->with('message',$message);
    }
}
