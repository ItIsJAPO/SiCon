<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdministrativeUnitRequest;
use App\Http\Requests\DeviceRequest;
use App\Models\Device;
use App\Models\TypeDevice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DevicesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->user_type === User::ROL_ADMIN) {
            return view('devices.index');
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
                'devices.create',
                [
                    "device" => new Device(),
                    "type_devices" => TypeDevice::all(),
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
    public function store(DeviceRequest $request)
    {
        $request->validated();
        $cantidadDeCompra = $request->get("cantidad");
        for ($x = 0; $x < $cantidadDeCompra; $x++) {
            Device::create(
                [
                    'nombre' => $request->get("nombre"),
                    'folio' => "GI-" . strtoupper(Str::random(5)),
                    'type_device_id' => $request->get("tipo"),
                    'precio_unitario' => $request->get("precio_unitario"),
                    'estatus' => $request->get("estatus"),
                ]
            );
        }

        return redirect()->route('devices.index')->with('status', 'Los dispositivos fueron agregados al inventario.');
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
     * @param \App\Models\Device $Devices
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        if (Auth::user()->user_type === User::ROL_ADMIN) {
            return view(
                'devices.edit',
                [
                    "device" => $device,
                    "type_devices" => TypeDevice::all(),
                ]
            );
        }
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Devices $Devices
     * @return \Illuminate\Http\Response
     */
    public function update(Device $device, Request $request)
    {
        $device->update(
            [
                'nombre' => $request->get("nombre"),
                'folio' => $request->get("folio"),
                'type_device_id' => $request->get("tipo"),
                'precio_unitario' => $request->get("precio_unitario"),
                'estatus' => $request->get("estatus"),
            ]
        );
        return redirect()->route('devices.index', $device)->with(
            'status',
            'El dispositivo fue actualizado con éxito.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Devices $Devices
     * @return \Illuminate\Http\Response
     */
    public function destroy(Devices $Devices)
    {
        //
    }
}
