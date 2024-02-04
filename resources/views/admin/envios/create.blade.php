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

                <x-select name="tipo" class="w-full">
                    <option value="1" @if(old('tipo') == '1' ) selected @endif>
                        Carga En general
                    </option>
                    <option value="2" @if(old('tipo') == '2' ) selected @endif>
                        Paquetería y Encomienda
                    </option>
                    <option value="3" @if(old('tipo') == '3' ) selected @endif>
                        Almacenaje
                    </option>
                    <option value="4" @if(old('tipo') == '4' ) selected @endif>
                        Carga Especializada
                    </option>
                    
                </x-select>
            </div>
            <div class="mb-4">
                <x-label class="mb-2">Estado</x-label>
                    <x-select name="estado" class="w-full">
                        <option value="1" @if(old('estado') == '1' ) selected @endif>
                            Pedido Confirmado
                        </option>
                        <option value="2" @if(old('estado') == '2' ) selected @endif>
                            En proceso
                        </option>
                        <option value="3" @if(old('estado') == '3' ) selected @endif>
                            En ruta
                        </option>
                        <option value="4" @if(old('estado') == '4' ) selected @endif>
                            En proceso de entrega
                        </option>
                        <option value="5" @if(old('estado') == '5' || $envio->estado == '5') selected @endif>
                            Entregado
                        </option>
                    </x-select>
                
                
            </div>

            <div class="flex justify-end">
                <x-button>
                    Guardar
                </x-button>
            </div>
        </form>
    </div>




</x-admin-layout>
