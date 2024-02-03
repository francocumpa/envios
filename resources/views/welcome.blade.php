<x-app-layout>

    <div class="card">

        <div class="flex min-h-full flex-col justify-center items-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                    alt="Your Company">
                <h2 class="mt-6 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Seguir tu envio
                </h2>
            </div>

            <div class="mt-6 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-4" action="{{ route('boletas.valida') }}" method="GET">
                    <div>
                        <label for="boleta" class="block text-sm font-medium leading-6 text-gray-900">Boleta</label>
                        <div class="mt-2">
                            <input name="boleta" type="number" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="codigo"
                                class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        </div>
                        <div class="mt-2">
                            <input name="codigo" type="password" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Encontrar
                            Envio</button>
                    </div>
                </form>


            </div>
        </div>
    </div>

</x-app-layout>
