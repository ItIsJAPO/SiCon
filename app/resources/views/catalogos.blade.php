<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Catalogos
        </h2>
    </x-slot>

    <div class=" flex items-center justify-center bg-gray-100">
        <div class="w-full mx-auto py-16">
            <h1 class="text-3xl text-center font-bold mb-6">
               Catalogos
            </h1>


            <!-- Outline -->
            <div
                class="bg-white px-6 py-4 my-3 w-3/4 mx-auto shadow rounded-md flex items-center"
            >
                <div class="w-full text-center mx-auto">

                    <a href="{{ route('type_devices.index') }}"
                        type="button"
                        class="border border-indigo-500 text-indigo-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-indigo-600 focus:outline-none focus:shadow-outline"
                    >
                        Tipo de dispositivos

                    </a>

                    <a href="{{ route('administrative_units.index') }}"
                       type="button"
                       class="border border-indigo-500 text-indigo-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-indigo-600 focus:outline-none focus:shadow-outline"
                    >
                        Unidades administrativas
                    </a>

                </div>
            </div>
            <!-- End Outline -->
        </div>
    </div>

</x-app-layout>
