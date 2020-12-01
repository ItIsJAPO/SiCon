<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeDeviceRequest;
use App\Models\TypeDevice;
use App\Models\UnidadAdministrativa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeDeviceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->user_type === User::ROL_ADMIN) {
            return view('type_device.index');
        }
        abort(403);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->user_type === User::ROL_ADMIN) {
            return view(
                'type_device.create',
                [
                    "typeDevice" => new TypeDevice()
                ]
            );
        }
        abort(403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeDeviceRequest $request)
    {
        TypeDevice::create($request->validated());
        return redirect()->route('type_devices.index')->with('status', 'El tipo de dispositivo fue creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $empleado)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\UnidadAdministrativa $unidadAdministrativa
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeDevice $typeDevice)
    {
        if (Auth::user()->user_type === User::ROL_ADMIN) {
            return view('type_device.edit', [
                "typeDevice"=>$typeDevice
            ]);
        }
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\UnidadAdministrativa $unidadAdministrativa
     * @return \Illuminate\Http\Response
     */
    public function update(TypeDevice $typeDevice, TypeDeviceRequest $request)
    {
        $typeDevice->update( $request->validated() );
        return redirect()->route('type_devices.index', $typeDevice)->with('status', 'El tipo de dipositivo fue actualizado con éxito.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\UnidadAdministrativa $unidadAdministrativa
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnidadAdministrativa $unidadAdministrativa)
    {
        //
    }
}
