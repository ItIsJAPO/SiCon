<div class="shadow overflow-hidden sm:rounded-md">


    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="grid grid-cols-6 gap-6">

            <div class="col-span-6 sm:col-span-4">
                <label class="block font-medium text-sm text-gray-700" for="user">
                    Seleccione el usuario
                </label>
                <select id="user" name="user"
                        autocomplete="user"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach($users as $user)
                        <option value="{{$user->id}}"
                            {{--                                @if($accion==="Actualizar"& $user->id ===$device->type_device_id)--}}
                            {{--                                selected--}}
                            {{--                            @endif--}}
                        >
                            {{$user->name}}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <label class="block font-medium text-sm text-gray-700" for="device">
                    Seleccioe el dispositivo
                </label>
                @if($devices->count())
                    <select id="device" name="device"
                            autocomplete="device"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @foreach($devices as $device)
                            <option value="{{$device->id}}"
                                {{--                                @if($accion==="Actualizar"& $user->id ===$device->type_device_id)--}}
                                {{--                                selected--}}
                                {{--                            @endif--}}
                            >
                                {{$device->nombre}} ({{$device->folio}})
                            </option>
                        @endforeach
                    </select>
                @else
                    <div class="p-m-2 text-center pb-5 m-2">
                        <div class="p-1">
                            <div
                                class="inline-flex items-center bg-white leading-none text-pink-600 rounded-full p-2 shadow text-teal text-sm">
                                <span class="inline-flex px-2">No hay dispositivos para asignar.</span>
                            </div>
                        </div>

                    </div>
                @endif
            </div>
        </div>
    </div>


</div>

<div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
    <button type="submit"
            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
    >
        Guardar
    </button>
</div>
</div>
