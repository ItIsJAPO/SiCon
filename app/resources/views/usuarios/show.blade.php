<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Empleado: {{$user->name}}
        </h2>
    </x-slot>


    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 ">

        @if($current_user->user_type===\App\Models\User::ROL_ADMIN)
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium text-gray-900">Información del empleado</h3>

                            <p class="mt-1 text-sm text-gray-600">
                                Actualice la información básica de su empleado
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form method="POST" action="{{route('empleados.update',1)}}">
                            @csrf @method('PATCH')
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <!-- Name -->
                                        <div class="col-span-6 sm:col-span-4">
                                            <label class="block font-medium text-sm text-gray-700" for="name">
                                                Nombre
                                            </label>
                                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="name"
                                                   type="text" name="name" autocomplete="name" value="{{$user->name}}">
                                        </div>

                                        <!-- Email -->
                                        <div class="col-span-6 sm:col-span-4">
                                            <label class="block font-medium text-sm text-gray-700" for="email">
                                                Correo electrónico
                                            </label>
                                            <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="email"
                                                   type="email" name="email" value="{{$user->email}}">
                                            <p class="mt-2 text-sm text-red-600">error</p>
                                        </div>
                                        <div class="col-span-6 sm:col-span-4">
                                            <label class="block font-medium text-sm text-gray-700" for="email">
                                                Rol en el sistema {{$user->user_type}}
                                            </label>
                                            <select id="rol" name="rol"
                                                    autocomplete="country"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="1"
                                                        @if(1===$user->user_type)
                                                        selected
                                                    @endif>
                                                    Administrador
                                                </option>
                                                <option value="2"
                                                        @if(2===$user->user_type)
                                                        selected
                                                    @endif>
                                                    Usuario
                                                </option>
                                                <option value="3"
                                                        @if(3===$user->user_type)
                                                        selected
                                                    @endif>
                                                    Empleado
                                                </option>
                                            </select>
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
                        </form>
                    </div>
                </div>
            </div>
        @endif

        <x-jet-section-border/>

        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900">
                            Unidad admistrativa
                        </h3>

                        <p class="mt-1 text-sm text-gray-600">
                            Indique a que unidad administrativa y cargo tiene el empleado
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form method="POST" action="{{route('empleados.store')}}">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">

                                    <div class="col-span-6 sm:col-span-4">
                                        <label class="block font-medium text-sm text-gray-700" for="name">
                                            Unidad administrativa
                                        </label>
                                        <select id="unidad_administrativa" name="unidad_administrativa"
                                                autocomplete="country"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            @foreach($unidades_administrativas as $unidad_administrativa)
                                                <option value="{{$unidad_administrativa->id}}"
                                                        @if($unidad_administrativa->id===$user->unidad_administrativa->id)
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
                                               type="email" value="{{$user->cargo}}">
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
                    </form>
                </div>
            </div>
        </div>


    </div>
</x-app-layout>
