<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\UnidadAdministrativa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

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
                    "user" => new User(),
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
    public function store(UserRequest $request)
    {
        $request->validated();
        User::create(
            [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'cargo' => $request->get('cargo'),
                'user_type' => $request->get('rol'),
                'password' => Hash::make(Str::random(25)),
                'unidad_administrativa_id' => $request->get('unidad_administrativa'),
            ]
        );
        Password::sendResetLink(
            $request->only('email')
        );
        return redirect()->route('empleados.index')->with('status', 'El nuevo empleado fue creado con éxito');
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

    }

    /**
     * Show the form for editing the specified resource.
     * Proporciona interfaz para editar el usuario
     * @param \App\Models\UnidadAdministrativa $unidadAdministrativa
     * @return \Illuminate\Http\Response
     */
    public function edit(User $empleado)
    {

        return view(
            'usuarios.edit',
            [
                "user" => $empleado,
                "unidades_administrativas" => UnidadAdministrativa::all(),

            ]
        );
    }

    /**
     * Update the specified resource in storage.
     * actualiza el usuario puro y duro
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UnidadAdministrativa $unidadAdministrativa
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $empleado)
    {
        $request->validated();
        $empleado->update(
            [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'cargo' => $request->get('cargo'),
                'user_type' => $request->get('rol'),
                'password' => Hash::make(Str::random(25)),
                'unidad_administrativa_id' => $request->get('unidad_administrativa'),
            ]
        );
        return redirect()->route('empleados.index')->with('status', 'El nuevo empleado fue actualizado con éxito');
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
