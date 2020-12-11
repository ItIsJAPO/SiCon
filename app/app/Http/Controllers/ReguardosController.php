<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResguardoRequest;
use App\Models\Device;
use App\Models\Resguardo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class ReguardosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index()
//    {
//        return view(
//            'resguardos.index',
//            [
//                "ROL_ADMIN" => User::ROL_ADMIN,
//                "ROL_USUARIO" => User::ROL_USUARIO,
//                "ROL_EMPLEADO" => User::ROL_EMPLEADO,
//            ]
//        );
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->user_type === User::ROL_ADMIN ||
            Auth::user()->user_type === User::ROL_USUARIO
        ) {
            $resguardos = DB::table('dispositivos as d')->select('d.*')
                ->leftJoin('resguardos as r', 'd.id', '=', 'r.device_id')
                ->where('d.estatus', '=', 1)
                ->where('r.id')
                ->get();
//            dd($resguardos);
            return view(
                'resguardos.create',
                [
                    "devices" => $resguardos,
                    "users" => User::all(),
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
    public function store(ResguardoRequest $request)
    {
//        return $request->get("device");
        $request->validated();
        Resguardo::create(
            [
                'device_id' => $request->get("device"),
                'user_id' => $request->get("user"),
            ]
        );
        return redirect()->route('resguardos.create')->with(
            'status',
            'La asigacione fue realizada.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
//    public function show(User $empleado)
//    {
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param \App\Models\Device $Devices
//     * @return \Illuminate\Http\Response
//     */
//    public function edit(Device $device)
//    {
//        if (Auth::user()->user_type === User::ROL_ADMIN) {
//            return view(
//                'resguardos.edit',
//                [
//                    "device" => $device,
//                    "type_devices" => TypeDevice::all(),
//                ]
//            );
//        }
//        abort(403);
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param \Illuminate\Http\Request $request
//     * @param \App\Models\Devices $Devices
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Device $device, Request $request)
//    {
//        $device->update(
//            [
//                'nombre' => $request->get("nombre"),
//                'folio' => $request->get("folio"),
//                'type_device_id' => $request->get("tipo"),
//                'precio_unitario' => $request->get("precio_unitario"),
//                'estatus' => $request->get("estatus"),
//            ]
//        );
//        return redirect()->route('resguardos.index', $device)->with(
//            'status',
//            'El dispositivo fue actualizado con éxito.'
//        );
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param \App\Models\Devices $Devices
//     * @return \Illuminate\Http\Response
//     */
    public function destroy($resguardo)
    {
        Resguardo::destroy((int)$resguardo);
        return back()->with('status', 'Has desvinculado el dispositivo.');
        //
    }

    public function reportAsignacion($uuid)
    {
        $resguardo=Resguardo::findorfail($uuid);
//        setlocale(LC_TIME, "es_Mx");
        $user=User::find($resguardo->user_id);
        $fecha=new \Jenssegers\Date\Date($resguardo->created_at);
        $device=Device::find($resguardo->device_id);
        $pdf = PDF::loadView('reports.asignacion',compact("user","device", "fecha"));
        return $pdf->stream();
    }
}
