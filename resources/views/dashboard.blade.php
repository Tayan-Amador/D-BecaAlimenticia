<x-app-layout>
    <div class="flex h-screen bg-gray-100">
        <!-- Menú Lateral -->
        <aside class=" text-white h-full">
            @include('components.menu-lateral')
        </aside>

        <!-- Contenido Principal -->
        <div class="flex-1 flex flex-col">
            <!-- Encabezado -->
            <header class="bg-white shadow px-6 py-4">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </header>

            <!-- Contenido -->
            <main class="flex-1 p-6">
                <div class="max-w-7xl mx-auto">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
