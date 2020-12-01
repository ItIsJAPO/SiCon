<div class="shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-4">
                <label class="block font-medium text-sm text-gray-700" for="nombre">
                    Nombre del tipo de dispositivo
                </label>
                <input class="form-input rounded-md shadow-sm mt-1 block w-full" id="nombre"
                       type="text" autocomplete="name" name="nombre"
                       value="{{ old('nombre', $typeDevice->nombre) }}">
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
