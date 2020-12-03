<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nuevo tipo de dispositivo
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 ">


        <div class="mt-10 sm:mt-0">

            @include('partials.validation-errors')


            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900">Información</h3>

                        <p class="mt-1 text-sm text-gray-600">
                            Ingrese la información básica del la unidad administrativa
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form method="POST" action="{{route('devices.update',$device)}}">
                        @csrf
                        @method('PATCH')
                        @include('devices._form',['accion' => 'Actualizar'])

                    </form>
                </div>
            </div>
        </div>


        <x-jet-section-border/>

    </div>

</x-app-layout>
