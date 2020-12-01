<?php

namespace App\Http\Controllers;

use App\Models\UnidadAdministrativa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{

    /**
     * Display a listing of the resource.
     * Generalmente usado para mostrarlo en listado
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usuarios.index');
    }

    /**
     * Show the form for creating a new resource.
     * Crea una interfaz para crear un nuevo usuario
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->user_type === User::ROL_ADMIN) {
            return view(
                'usuarios.create',
                [
                    "unidades_administrativas" => UnidadAdministrativa::all(),
                ]
            );
        }
        abort(403);
    }

    /**
     * Store a newly created resource in storage.
     * La parte que almacena lo nuevo guardado
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request->get('name');
       User::create(
            [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'cargo' => $request->get('cargo'),
                'user_type' => $request->get('rol'),
                'password' => Hash::make(uniqid()),
            ]
        );


        //
    }

    /**
     * Display the specified resource.
     * Muestra en detalle el usuario
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $empleado)
    {
//        dd(Auth::user());
//        return $empleado;
        return view(
            'usuarios.show',
            [
                "user" => $empleado,
                "unidades_administrativas" => UnidadAdministrativa::all(),
                'current_user' => Auth::user(),

            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     * Proporciona interfaz para editar el usuario
     * @param \App\Models\UnidadAdministrativa $unidadAdministrativa
     * @return \Illuminate\Http\Response
     */
    public function edit($unidadAdministrativa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * actualiza el usuario puro y duro
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UnidadAdministrativa $unidadAdministrativa
     * @return \Illuminate\Http\Response
     */
    public function update( User $empleado,Request $request)
    {
//        dd($empleado);
//        dd($request->get('name'));
        $empleado->update(
            [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'cargo' => $empleado->cargo,
                'user_type' => $request->get('rol'),
            ]
        );
        return redirect()->route('empleados.show',1);
        //
    }

    /**
     * Remove the specified resource from storage.
     * elimina el usuario
     * @param \App\Models\UnidadAdministrativa $unidadAdministrativa
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnidadAdministrativa $unidadAdministrativa)
    {
        //
    }
}
