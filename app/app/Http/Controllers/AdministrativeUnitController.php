<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdministrativeUnitRequest;
use App\Http\Requests\TypeDeviceRequest;
use App\Models\TypeDevice;
use App\Models\UnidadAdministrativa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdministrativeUnitController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->user_type === User::ROL_ADMIN) {
            return view('administrative_units.index');
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
                'administrative_units.create',
                [
                    "unidadAdministrativa" => new UnidadAdministrativa()
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
    public function store(AdministrativeUnitRequest $request)
    {
        UnidadAdministrativa::create($request->validated());
        return redirect()->route('administrative_units.index')->with('status', 'La unidad administrativa fue creado con éxito');
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
    public function edit(UnidadAdministrativa $administrative_unit)
    {
        if (Auth::user()->user_type === User::ROL_ADMIN) {
            return view('administrative_units.edit', [
                "unidadAdministrativa"=>$administrative_unit
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
    public function update(UnidadAdministrativa $administrative_units, AdministrativeUnitRequest $request)
    {
        $administrative_units->update( $request->validated() );
        return redirect()->route('administrative_units.index', $administrative_units)->with('status', 'La unidad administrativa fue actualizado con éxito.');

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
