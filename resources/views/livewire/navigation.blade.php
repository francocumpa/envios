<div x-data="{
    open: false,
}">
    <header class="bg-purple-600">
        <x-container class="px-4 py-4">
            <div class="flex justify-between items-center space-x-8">
                <button class="text-2xl md:text-3xl" x-on:click="open=true">

                    <i class="fas fa-bars text-white"></i>
                </button>
                <h1 class="text-white">
                    <a href="/" class="inline-flex flex-col items-end">
                        <span class="text-2xl md:text-3xl leading-4 md:leading-6 font-semibold">EnviosDirecto</span>
                        <span class="text-xs">Seguimiento Online</span>
                    </a>
                </h1>

                <div class="flex items-center space-x-8">
                    <x-dropdown>
                        <x-slot name="trigger">
                            @auth
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <button class="text-2xl md:text-3xl">
                                    <i class="fas fa-user text-white"></i>

                                </button>
                            @endauth

                        </x-slot>
                        <x-slot name="content">
                            @guest
                                <div class="px-4 py-2">
                                    <div class="flex justify-center">
                                        <a href="{{ route('login') }}" class="btn btn-purple">Iniciar Sesion</a>
                                    </div>
                                    <p class="text-sm text-center mt-2">
                                        ¿No tienes cuenta? <a href="{{ route('register') }}"
                                            class="text-purple-600 hover:underline">Registrate</a>
                                    </p>
                                </div>
                            @else
                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    Mi perfil
                                </x-dropdown-link>
                                <div class="border-t border-gray-200">
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf

                                        <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </div>
                            @endguest

                        </x-slot>

                    </x-dropdown>


                </div>
            </div>
            <div class="mt-4 md:hidden">
                <x-input class="w-full" placeholder="Buscar por producto, tienda o marca"></x-input>

            </div>
        </x-container>
    </header>

</div>
