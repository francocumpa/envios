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
        'name' => $envio->id . ' | ' . $envio->esta,
    ],
]">
    <div class="card">
        <form action="{{ route('admin.envios.update', $envio) }}" method="POST">
            @csrf
            <x-validation-errors class="mb-4"></x-validation-errors>

            @method('PUT')
            <div class="mb-4">
                <x-label class="mb-2">Boleta</x-label>

                <x-select name="boleta_id" class="w-full">
                    @foreach ($boletas as $boleta)
                        <option value="{{ $boleta->id }}" @selected(old('boleta_id', $envio->boleta_id) == $boleta->id)>

                            {{ $boleta->codigo }} - {{ $boleta->nombre }}</option>
                    @endforeach
                </x-select>
            </div>
            <div class="mb-4">
                <x-label class="mb-2">Fecha Entrega</x-label>

                <x-input class="w-full" type="date" placeholder="Ingrese el nombre de la familia"
                    name="fecha_entrega" value="{{ old('fecha_entrega', $envio->fecha_entrega) }}"></x-input>
            </div>
            <div class="mb-4">
                <x-label class="mb-2">Direccion</x-label>

                <x-input class="w-full" placeholder="Ingrese el nombre de la familia" name="direccion"
                    value="{{ old('direccion', $envio->direccion) }}"></x-input>
            </div>
            <div class="mb-4">
                <x-label class="mb-2">Tipo</x-label>

                <x-input class="w-full" type="number" placeholder="Ingrese el nombre de la familia" name="tipo"
                    value="{{ old('tipo', $envio->tipo) }}"></x-input>
            </div>
            <div class="mb-4">
                <x-label class="mb-2">Estado</x-label>

                <x-input class="w-full" type="number" placeholder="Ingrese el nombre de la familia" name="estado"
                    value="{{ old('estado', $envio->estado) }}"></x-input>
            </div>

            <div class="flex justify-end">
                <x-danger-button onclick="confirmDelete()">
                    Eliminar
                </x-danger-button>
                <x-button class="ml-2">
                    Actualizar
                </x-button>

            </div>
        </form>
    </div>

    <form action="{{ route('admin.envios.destroy', $boleta) }}" method="POST" id="delete-form">
        @csrf
        @method('DELETE')

    </form>
    @push('js')
        <script>
            function confirmDelete() {

                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "¡Sí, bórralo!",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form').submit();


                    }
                });


            }
        </script>
    @endpush


</x-admin-layout>
