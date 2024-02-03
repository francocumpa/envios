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
        'name' => $boleta->id . ' | ' . $boleta->nombre,
    ],
]">
    <div class="card">
        <form action="{{ route('admin.boletas.update', $boleta) }}" method="POST">
            @csrf
            <x-validation-errors class="mb-4"></x-validation-errors>

            @method('PUT')
            <div class="mb-4">
                <x-label class="mb-2">Codigo</x-label>

                <x-input class="w-full" placeholder="Ingrese el nombre de la familia" name="codigo"
                    value="{{ old('codigo', $boleta->codigo) }}"></x-input>
            </div>
            <div class="mb-4">
                <x-label class="mb-2">Dni</x-label>

                <x-input class="w-full" type="number" placeholder="Ingrese el nombre de la familia" name="dni"
                    value="{{ old('name', $boleta->dni) }}"></x-input>
            </div>
            <div class="mb-4">
                <x-label class="mb-2">Nombre</x-label>

                <x-input class="w-full" placeholder="Ingrese el nombre de la familia" name="nombre"
                    value="{{ old('name', $boleta->nombre) }}"></x-input>
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

    <form action="{{ route('admin.boletas.destroy', $boleta) }}" method="POST" id="delete-form">
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
