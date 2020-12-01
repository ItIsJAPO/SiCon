<div class=" py-12 mt-5  lg:mt-0 lg:ml-4">

    @include('partials.session-status')
    <div class="-m-2 text-center pb-5">
        <div class="p-1 sm:ml-3">

            <a href="{{ route('administrative_units.create') }}">
                <button type="button"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Nueva unidad administrativa
                </button>
            </a>
        </div>
    </div>
    <div>

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
                                            <button class="form-input rounded-md shadow-sm mt-1 ml-6 block"
                                                    wire:click="clear">
                                                x
                                            </button>
                                        @endif
                                    </div>
                                    @if($administrative_units->count())
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead>
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Nombre
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-50">
                                                    <span class="sr-only">Acciones</span>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach($administrative_units as $type_device)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">

                                                        {{ $type_device->nombre}}

                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <a href="{{ route('administrative_units.edit',$type_device) }}"
                                                           class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div
                                            class="bg-white px-4 py-3 items-center justify-between border-t border-gray-200 sm:px-6">
                                            {{ $administrative_units->links() }}
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
