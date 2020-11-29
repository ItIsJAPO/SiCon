<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Empleados
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                            <div
                                class=" flex bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
                                <input class="form-input rounded-md shadow-sm mt-1 block w-full" type="text"
                                       placeholder="Buscar..." wire:model="search">
                                <div class="form-input rounded-md shadow-sm mt-1 ml-6 block">
                                    <select class="outline-none text-gray-500  text-sm" wire:model="perPage">
                                        <option value="5">5 por página</option>
                                        <option value="10">10 por página</option>
                                        <option value="15">15 por página</option>
                                        <option value="20">20 por página</option>
                                    </select>
                                </div>
                                @if($search!=='')
                                    <button class="form-input rounded-md shadow-sm mt-1 ml-6 block" wire:click="clear">
                                        x
                                    </button>
                                @endif
                            </div>
                            @if($usuarios->count())
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Nombre
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Unidad administrativa
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Estatus
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Rol del sistema
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50">
                                            <span class="sr-only">Acciones</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($usuarios as $usuario)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <img class="h-10 w-10 rounded-full"
                                                             src="{{$usuario->getProfilePhotoUrlAttribute()}}" alt="">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $usuario->name}}
                                                        </div>
                                                        <div class="text-sm text-gray-500">
                                                            {{ $usuario->email}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    @if($usuario->unidad_administrativa!==null)
                                                        {{$usuario->unidad_administrativa->nombre}}
                                                    @else
                                                        <span
                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                        Sin Unidad admistrativa
                                                        </span>
                                                    @endif

                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    @if($usuario->unidad_administrativa!==null)
                                                        {{$usuario->cargo}}
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Activo
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                @switch($usuario->user_type)
                                                    @case(1)
                                                    Admin
                                                    @break

                                                    @case(2)
                                                    Usuario
                                                    @break

                                                    @default
                                                    Empleado
                                                @endswitch
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div
                                    class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
                                    {{ $usuarios->links() }}
                                </div>
                            @else
                                <div
                                    class="bg-white px-4 py-3 items-center justify-between text-gray-500 border-t border-gray-200 sm:px-6">
                                    No hay resultados para la búsqueda "{{$search}}" en la página "{{$page}}" al
                                    mostrar {{$perPage}} por págiina
                                </div>


                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
