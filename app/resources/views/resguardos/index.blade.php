<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dispositivos
        </h2>
    </x-slot>

    @if(Auth::user()->user_type === $ROL_ADMIN)
        <livewire:users-table></livewire:users-table>
{{--        <livewire:resguardos-table></livewire:resguardos-table>--}}
    @elseif(Auth::user()->user_type === $ROL_EMPLEADO)
        <livewire:resguardos-empleados-table></livewire:resguardos-empleados-table>
    @endif
</x-app-layout>
