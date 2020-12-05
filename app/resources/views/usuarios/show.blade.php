<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Visualizando empleado
        </h2>
    </x-slot>
    <div class=" pt-12 mt-5  lg:mt-0 lg:ml-4">
    @include('partials.session-status')
    </div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 ">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6 flex items-center">
                <div class="flex-shrink-0 h-10 w-10">
                    <img class="h-10 w-10 rounded-full"
                         src="{{$user->getProfilePhotoUrlAttribute()}}"
                         alt="">
                </div>
                <div class="ml-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Información del empleado
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Contiene la información del empleado
                    </p>
                </div>

            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Nombre
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{$user->name}}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Username / Email
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{$user->email}}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Unidad Administrativa
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">

                            @if($user->unidad_administrativa_id)
                                {{$user->unidadAdministrativa->nombre}}
                            @else
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                        Sin Unidad admistrativa
                                                        </span>
                            @endif


                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Cargo
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            @if($user->unidad_administrativa_id)
                                {{$user->cargo}}
                            @endif
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Rol
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            @switch($user->user_type)
                                @case(1)
                                Admin
                                @break

                                @case(2)
                                Usuario
                                @break

                                @default
                                Empleado
                            @endswitch
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Resguardos
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                @foreach($resguardos as $resguardo)
                                    <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                        <div class="w-0 flex-1 flex items-center">
                                            <!-- Heroicon name: paper-clip -->
                                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                 fill="currentColor"
                                                 aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                      d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                            <span class="ml-2 flex-1 w-0 truncate">
                                            {{$resguardo->nombre}} Folio: {{$resguardo->folio}}
                                            </span>
                                        </div>
                                        <div class="ml-4 flex-shrink-0">
                                            @if($user->user_type===1|$user->user_type===2)
                                                <form method="POST" action="{{ route('resguardos.destroy',$resguardo->resguardo_id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="font-medium text-indigo-600 hover:text-indigo-500">Desvincular</button>
                                                </form>
{{--                                                <a href="{{ route('resguardos.destroy',$resguardo->id) }}" class="font-medium text-indigo-600 hover:text-indigo-500">--}}
{{--                                                    Desvincular--}}
{{--                                                </a>--}}
                                            @endif
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

    </div>

    {{--    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 ">--}}


    {{--        <div class="mt-10 sm:mt-0">--}}
    {{--            <div class="md:grid md:grid-cols-3 md:gap-6">--}}
    {{--                <div class="md:col-span-1">--}}
    {{--                    <div class="px-4 sm:px-0">--}}
    {{--                        <h3 class="text-lg font-medium text-gray-900">Información del empleado</h3>--}}

    {{--                        <p class="mt-1 text-sm text-gray-600">--}}
    {{--                            Actualice la información básica de su empleado--}}
    {{--                        </p>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="mt-5 md:mt-0 md:col-span-2">--}}
    {{--                    <form method="POST" action="{{route('empleados.update',$user)}}">--}}
    {{--                        @csrf @method('PATCH')--}}
    {{--                        @include('usuarios._form',['accion' => 'Actualizar'])--}}
    {{--                    </form>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--        <x-jet-section-border/>--}}

    {{--        <div class="mt-10 sm:mt-0">--}}
    {{--            <div class="md:grid md:grid-cols-3 md:gap-6">--}}
    {{--                <div class="md:col-span-1">--}}
    {{--                    <div class="px-4 sm:px-0">--}}
    {{--                        <h3 class="text-lg font-medium text-gray-900">--}}
    {{--                            Unidad admistrativa--}}
    {{--                        </h3>--}}

    {{--                        <p class="mt-1 text-sm text-gray-600">--}}
    {{--                            Indique a que unidad administrativa y cargo tiene el empleado--}}
    {{--                        </p>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="mt-5 md:mt-0 md:col-span-2">--}}
    {{--                    <form method="POST" action="{{route('empleados.store')}}">--}}
    {{--                        <div class="shadow overflow-hidden sm:rounded-md">--}}
    {{--                            <div class="px-4 py-5 bg-white sm:p-6">--}}
    {{--                                <div class="grid grid-cols-6 gap-6">--}}

    {{--                                    <div class="col-span-6 sm:col-span-4">--}}
    {{--                                        <label class="block font-medium text-sm text-gray-700" for="name">--}}
    {{--                                            Unidad administrativa--}}
    {{--                                        </label>--}}
    {{--                                        <select id="unidad_administrativa" name="unidad_administrativa"--}}
    {{--                                                autocomplete="country"--}}
    {{--                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">--}}
    {{--                                            @foreach($unidades_administrativas as $unidad_administrativa)--}}
    {{--                                                <option value="{{$unidad_administrativa->id}}"--}}
    {{--                                                        @if($unidad_administrativa->id===$user->unidad_administrativa->id)--}}
    {{--                                                        selected--}}
    {{--                                                    @endif>--}}
    {{--                                                    {{$unidad_administrativa->nombre}}--}}
    {{--                                                </option>--}}
    {{--                                            @endforeach--}}
    {{--                                        </select>--}}
    {{--                                    </div>--}}


    {{--                                    <div class="col-span-6 sm:col-span-4">--}}
    {{--                                        <label class="block font-medium text-sm text-gray-700" for="email">--}}
    {{--                                            Cargo--}}
    {{--                                        </label>--}}
    {{--                                        <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="cargo"--}}
    {{--                                               type="email" value="{{$user->cargo}}">--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}

    {{--                            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">--}}
    {{--                                <button type="submit"--}}
    {{--                                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"--}}
    {{--                                >--}}
    {{--                                    Guardar--}}
    {{--                                </button>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </form>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}


    {{--    </div>--}}
</x-app-layout>
