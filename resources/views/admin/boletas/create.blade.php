<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Boletas',
        'route' => route('admin.boletas.index'),
    ],
    [
        'name' => 'Nuevo',
    ],
]">
    <div class="card">
        <form action="{{ route('admin.boletas.store') }}" method="POST">
            @csrf
            <x-validation-errors class="mb-4"></x-validation-errors>
            <div class="mb-4">
                <x-label class="mb-2">Codigo</x-label>

                <x-input class="w-full" placeholder="Ingrese el nombre de la familia" name="codigo"
                    value="{{ old('codigo') }}"></x-input>
            </div>
            <div class="mb-4">
                <x-label class="mb-2">DNI</x-label>

                <x-input class="w-full" type='number' placeholder="Ingrese el nombre de la familia" name="dni"
                    value="{{ old('dni') }}"></x-input>
            </div>
            <div class="mb-4">
                <x-label class="mb-2">Nombre</x-label>

                <x-input class="w-full" placeholder="Ingrese el nombre de la familia" name="nombre"
                    value="{{ old('nombre') }}"></x-input>
            </div>
            <div class="flex justify-end">
                <x-button>
                    Guardar
                </x-button>
            </div>
        </form>
    </div>




</x-admin-layout>
