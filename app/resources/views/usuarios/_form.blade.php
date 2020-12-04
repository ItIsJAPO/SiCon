<div class="shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="grid grid-cols-6 gap-6">
            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <label class="block font-medium text-sm text-gray-700" for="name">
                    Nombre
                </label>
                <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="name"
                       type="text" autocomplete="name" name="name" value="{{ old('name', $user->name) }}">
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <label class="block font-medium text-sm text-gray-700" for="email">
                    Correo electrónico
                </label>
                <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="email"
                       type="email" name="email" value="{{ old('email', $user->email) }}">
            </div>
            <div class="col-span-6 sm:col-span-4">
                <label class="block font-medium text-sm text-gray-700" for="rol">
                    Rol en el sistema
                </label>
                <select id="rol" name="rol"
                        autocomplete="country"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="1" @if(1===$user->rol)
                    selected
                        @endif>
                        Administrador
                    </option>
                    <option value="2" @if(2===$user->rol)
                    selected
                        @endif>
                        Usuario
                    </option>
                    <option value="3" @if(3===$user->rol| !($user->rol))
                    selected
                        @endif>
                        Empleado
                    </option>
                </select>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <label class="block font-medium text-sm text-gray-700" for="name">
                    Unidad administrativa
                </label>
                <select id="unidad_administrativa" name="unidad_administrativa"
                        autocomplete="country"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="0" @if($user->unidad_administrativa_id)
                    selected
                        @endif>
                        Sin unidad administrativa
                    </option>
                    @foreach($unidades_administrativas as $unidad_administrativa)
                        <option value="{{$unidad_administrativa->id}}"
                                @if($unidad_administrativa->id===$user->unidad_administrativa_id)
                                selected
                            @endif>
                            {{$unidad_administrativa->nombre}}
                        </option>
                    @endforeach

                </select>
            </div>


            <div class="col-span-6 sm:col-span-4">
                <label class="block font-medium text-sm text-gray-700" for="email">
                    Cargo
                </label>
                <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="cargo"
                       type="text" name="cargo" value="{{ old('cargo', $user->cargo) }}">
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
