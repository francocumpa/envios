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

                <x-select name="tipo" class="w-full">
                    <option value="1" @if(old('tipo') == '1' || $envio->tipo == '1' ) selected @endif>
                        Carga En general
                    </option>
                    <option value="2" @if(old('tipo') == '2' || $envio->tipo == '2') selected @endif>
                        Paquetería y Encomienda
                    </option>
                    <option value="3" @if(old('tipo') == '3' || $envio->tipo == '3') selected @endif>
                        Almacenaje
                    </option>
                    <option value="4" @if(old('tipo') == '4'|| $envio->tipo == '4') selected @endif>
                        Carga Especializada
                    </option>
                    
                </x-select>
            </div>
            <div class="mb-4">
                <x-label class="mb-2">Estado</x-label>

    <x-select name="estado" class="w-full">
        <option value="1" @if(old('estado') == '1' || $envio->estado == '1') selected @endif>
            Pedido Confirmado
        </option>
        <option value="2" @if(old('estado') == '2' || $envio->estado == '2') selected @endif>
            En proceso
        </option>
        <option value="3" @if(old('estado') == '3' || $envio->estado == '3') selected @endif>
            En ruta
        </option>
        <option value="4" @if(old('estado') == '4' || $envio->estado == '4') selected @endif>
            En proceso de entrega
        </option>
        <option value="5" @if(old('estado') == '5' || $envio->estado == '5') selected @endif>
            Entregado
        </option>
    </x-select>
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
