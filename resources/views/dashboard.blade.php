<x-app-layout>
    <div class="flex h-screen bg-gray-100">
        <!-- Menú Lateral -->
        <aside class="text-white h-full">
            @include('components.menu-lateral')
        </aside>

        <!-- Contenido Principal -->
        <div class="flex-1 flex flex-col">
            <!-- Encabezado -->
            <header class="bg-white shadow px-6 py-4">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Bienvenido a la Beca Alimenticia') }}
                </h2>
            </header>

            <!-- Contenido -->
            <main class="flex-1 p-6">
                <div class="max-w-7xl mx-auto">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                        <h3 class="text-2xl font-semibold text-gray-800">
                            {{ __('¡Bienvenido a tu espacio de apoyo alimenticio!') }}</h3>
                        <p class="mt-4 text-lg text-gray-600">
                            {{ __('Nos complace tenerte en el programa de Beca Alimenticia. Sabemos lo importante que es contar con apoyo para una alimentación adecuada, especialmente en momentos de necesidad. Este espacio está diseñado para brindarte el acceso a los recursos alimenticios que necesitas para que puedas concentrarte en tus estudios y en tu bienestar.') }}
                        </p>
                        <p class="mt-4 text-lg text-gray-600">
                            {{ __('A través de este programa, tendrás acceso a becas alimenticias que te permitirán cubrir tus necesidades básicas de nutrición. Explora las opciones disponibles y no dudes en acercarte si necesitas más información o asistencia en el proceso de inscripción.') }}
                        </p>
                        <p class="mt-4 text-lg text-gray-600">
                            {{ __('Nuestro objetivo es proporcionarte el apoyo necesario para que puedas seguir adelante con tus estudios sin preocupaciones. ¡Estamos aquí para ayudarte en cada paso del camino!') }}
                        </p>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
