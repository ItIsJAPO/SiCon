<?php

namespace App\Http\Controllers;

use App\Models\UnidadAdministrativa;
use Illuminate\Http\Request;

class UnidadAdministrativaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users/users.index');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnidadAdministrativa  $unidadAdministrativa
     * @return \Illuminate\Http\Response
     */
    public function show(UnidadAdministrativa $unidadAdministrativa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnidadAdministrativa  $unidadAdministrativa
     * @return \Illuminate\Http\Response
     */
    public function edit(UnidadAdministrativa $unidadAdministrativa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UnidadAdministrativa  $unidadAdministrativa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnidadAdministrativa $unidadAdministrativa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnidadAdministrativa  $unidadAdministrativa
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnidadAdministrativa $unidadAdministrativa)
    {
        //
    }
}
