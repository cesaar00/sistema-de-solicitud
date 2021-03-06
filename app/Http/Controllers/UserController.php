<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UsuarioValidation;
use App\Http\Requests\PassRequest;

class UserController extends Controller
{
    public function vistahome()
    {
        return view('inicio');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $users = User::where('email', '<>', 'admin_prueba@gmail.com'); */
        $users = DB::table('users')
        ->join('model_has_roles', 'model_has_roles.model_id', 'users.id')
        ->join('roles', 'roles.id', 'model_has_roles.role_id')
        ->select('users.id',
                'users.name',
                'users.lastname',
                'users.email',
                'roles.name as role'
                )
        ->where('email', '<>', 'sistemas@teleton.org.mx')
        ->paginate(3);
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
    public function edit(User $user)
    {
        $roles = DB::table('roles')->get();
        //echo $roles;
        return view('usuarios/editusuario', compact('user','roles'));
    }

    public function editpass(User $user)
    {
        return view('usuarios/editarpass', compact('user'));
    }

    public function storepass(Request $request, $id)
    {
        $user = User::find($id);

        if($request->password == $request->password1) {
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->route('user.index')->with('info','La contraseña ha sido cambiada');
        } else {
            return redirect()->route('user.editpass', $user)->with('error','Las contraseñas no coinciden');
        }
    }

    public function editmypass()
    {
        $user = auth()->user();
        return view('usuarios/editarmypass', compact('user'));
    }

    public function storemypass(Request $request)
    {
        $user = auth()->user();

        if($request->password == $request->password1) {
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->route('user.index')->with('info','La contraseña ha sido cambiada');
        } else {
            return redirect()->route('user.index')->with('error','Error al cambiar la contraseña, los campos no coinciden');
        }
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
