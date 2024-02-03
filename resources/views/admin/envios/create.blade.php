<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Envios',
        'route' => route('admin.envios.index'),
    ],
    [
        'name' => 'Nuevo',
    ],
]">
    <div class="card">
        <form action="{{ route('admin.envios.store') }}" method="POST">
            @csrf
            <x-validation-errors class="mb-4"></x-validation-errors>
            <div class="mb-4">
                <x-label class="mb-2">Boleta</x-label>

                <x-select name="boleta_id" class="w-full">
                    @foreach ($boletas as $boleta)
                        <option value="{{ $boleta->id }}" @selected(old('boleta_id') == $boleta->id)>

                            {{ $boleta->codigo }} - {{ $boleta->nombre }}</option>
                    @endforeach
                </x-select>
            </div>
            <div class="mb-4">
                <x-label class="mb-2">Fecha Entrega</x-label>

                <x-input class="w-full" type="date" placeholder="Ingrese el nombre de la familia"
                    name="fecha_entrega" value="{{ old('fecha_entrega') }}"></x-input>
            </div>
            <div class="mb-4">
                <x-label class="mb-2">Direccion</x-label>

                <x-input class="w-full" placeholder="Ingrese el nombre de la familia" name="direccion"
                    value="{{ old('direccion') }}"></x-input>
            </div>
            <div class="mb-4">
                <x-label class="mb-2">Tipo envio</x-label>

                <x-input class="w-full" type="number" placeholder="Ingrese el nombre de la familia" name="tipo"
                    value="{{ old('tipo') }}"></x-input>
            </div>
            <div class="mb-4">
                <x-label class="mb-2">Estado</x-label>

                <x-input class="w-full" type="number" placeholder="Ingrese el nombre de la familia" name="estado"
                    value="{{ old('estado') }}"></x-input>
            </div>

            <div class="flex justify-end">
                <x-button>
                    Guardar
                </x-button>
            </div>
        </form>
    </div>




</x-admin-layout>
