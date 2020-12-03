<div class="shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-4">
                <label class="block font-medium text-sm text-gray-700" for="nombre">
                    Nombre del los dispositivos
                </label>
                <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="nombre"
                       type="text" autocomplete="name" name="nombre"
                       value="{{ old('nombre', $device->nombre) }}">
            </div>
            @if($accion==="Actualizar")
                <div class="col-span-6 sm:col-span-4">
                    <label class="block font-medium text-sm text-gray-700" for="folio">
                        Folio:
                    </label>
                    <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="folio"
                           type="text" autocomplete="name" name="folio"
                           value="{{ old('folio', $device->folio) }}">
                </div>
            @endif
            <div class="col-span-6 sm:col-span-4">
                <label class="block font-medium text-sm text-gray-700" for="tipo">
                    Tipo de dispositivo
                </label>
                <select id="tipo" name="tipo"
                        autocomplete="tipo"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach($type_devices as $type_device)
                        <option value="{{$type_device->id}}"
                                @if($accion==="Actualizar"& $type_device->id ===$device->type_device_id)
                                selected
                            @endif
                        >
                            {{$type_device->nombre}}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <label class="block font-medium text-sm text-gray-700" for="precio_unitario">
                    Precio unitario
                </label>
                <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="precio_unitario"
                       type="number" step="any" autocomplete="precio_unitario" name="precio_unitario"
                       value="{{ old('precio_unitario', $device->precio_unitario) }}">
            </div>

            <div class="col-span-6 sm:col-span-4">
                <label class="block font-medium text-sm text-gray-700" for="estatus">
                    Estatus
                </label>
                <select id="tipo" name="estatus"
                        autocomplete="estatus"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                    <option value="1"  @if($accion==="Actualizar"& 1 ===$device->estatus)
                    selected
                        @endif
                    >
                        Disponible
                    </option>
                    <option value="0" @if($accion==="Actualizar"& 0 ===$device->estatus)
                    selected
                        @endif>
                        No disponible para prestamo
                    </option>


                </select>
            </div>
            @if($accion==="Crear")
                <div class="col-span-6 sm:col-span-4">
                    <label class="block font-medium text-sm text-gray-700" for="cantidad">
                        Cantidad
                    </label>
                    <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="cantidad"
                           type="number" autocomplete="cantidad" name="cantidad"
                           value="{{ old('cantidad') }}">
                </div>
            @endif

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
