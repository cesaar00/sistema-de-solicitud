<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UsuarioValidation;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('email', '<>', 'admin_prueba@gmail.com')->paginate(4);
       /*  $users = User::orderBy('id', 'DESC')->paginate(3); */
        return view('usuarios/indexusuarios', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles=DB::table('roles')->get();
        return view('usuarios/nuevousuario', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioValidation $request)
    {
        //
        $user= [
            'name'=> $request->name,
            'lastname'=> $request->lastname,
            'email'=> $request->email,
            'password'=> bcrypt($request->password)
        ];

        $elid=User::create($user);

        DB::table('model_has_roles')->insert([
          'role_id'=> $request->role_id,
          'model_type' => 'App\User',
          'model_id' => $elid->id
         ]);
        return redirect('/user');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $user)
    {
        //
        /* $user = User::find($id); */
        /* $user->delete(); */
        /* return back()->with('info', 'El usuario ha sido eliminado'); */
        DB::table('users')->where('id', '=',$user->id)->delete();
        return redirect()->route('user.index')->with('info','registro eliminado');
    }
}
