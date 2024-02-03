<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Envios',
    ],
]">
    <x-slot name="action">
        <a class="btn btn-blue" href="{{ route('admin.envios.create') }}">
            Nuevo
        </a>
    </x-slot>

    @if ($envios->count())
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
            <table class=" w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID </th>
                        <th scope="col" class="px-6 py-3">
                            Boleta
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Fecha Entrega
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Direccion
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tipo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Estado
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($envios as $envio)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $envio->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $envio->boleta->codigo }} </td>
                            <td class="px-6 py-4">
                                {{ $envio->fecha_entrega }} </td>
                            <td class="px-6 py-4">
                                {{ $envio->direccion }} </td>
                            <td class="px-6 py-4">
                                {{ $envio->tipo }} </td>
                            <td class="px-6 py-4">
                                {{ $envio->estado }} </td>

                            <td class="px-6 py-4">
                                <a href="{{ route('admin.envios.edit', $envio) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $envios->links() }}
        </div>
    @else
        <div class="flex items-center p-4  text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Info alert!</span> Todavia no hay familias registradas.
            </div>
        </div>
    @endif



</x-admin-layout>
