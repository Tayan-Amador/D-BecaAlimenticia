<!DOCTYPE html>
<html lang="es">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-orange-100">
    <aside class="w-64 bg-orange-900 text-white h-screen p-4">
        <h1 class="text-3xl font-bold text-center pb-4">Beca Alimenticia</h1>
        <nav class="mt-5 space-y-4">
            <!-- Inicio -->
            <a href="{{ route('dashboard') }}"
                class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg bg-orange-800 text-white hover:bg-orange-700">
                🏠 Inicio
            </a>

            <!-- Gestión de Alumnos -->
            <div>
                <button
                    class="w-full flex items-center justify-between px-4 py-2.5 text-sm font-medium rounded-lg text-orange-300 hover:bg-orange-700"
                    aria-expanded="false" aria-controls="alumnos-dropdown">
                    <span>🎓 Alumnos</span>
                    <svg class="h-5 w-5 transition-transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="hidden space-y-1 pl-11" id="alumnos-dropdown">
                    <a href="{{ route('alumnos.index') }}"
                        class="block px-4 py-2 text-sm text-orange-300 rounded-md hover:bg-orange-700">
                        Registrar Alumno
                    </a>
                    <a href="{{ route('listado.alumnos') }}"
                        class="block px-4 py-2 text-sm text-orange-300 rounded-md hover:bg-orange-700">
                        Listado de Alumnos
                    </a>
                </div>
            </div>

            <!-- Gestión de Huellas -->
            <div>
                <button
                    class="w-full flex items-center justify-between px-4 py-2.5 text-sm font-medium rounded-lg text-orange-300 hover:bg-orange-700"
                    aria-expanded="false" aria-controls="huellas-dropdown">
                    <span>🛑 Huellas</span>
                    <svg class="h-5 w-5 transition-transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="hidden space-y-1 pl-11" id="huellas-dropdown">
                    <a href="{{ route('registrar.huella') }}"
                        class="block px-4 py-2 text-sm text-orange-300 rounded-md hover:bg-orange-700">
                        Registro de Huella
                    </a>
                    <a href="{{ route('listado.sin_huella') }}"
                        class="block px-4 py-2 text-sm text-orange-300 rounded-md hover:bg-orange-700">
                        Alumnos sin Huella
                    </a>
                </div>
            </div>

            <!-- Registro de Comidas -->
            <a href="{{ route('registrar.comida') }}"
                class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg text-orange-300 hover:bg-orange-700">
                🍽️ Registro de Comida
            </a>

            <!-- Reportes -->
            <div>
                <button
                    class="w-full flex items-center justify-between px-4 py-2.5 text-sm font-medium rounded-lg text-orange-300 hover:bg-orange-700"
                    aria-expanded="false" aria-controls="reportes-dropdown">
                    <span>📊 Reportes</span>
                    <svg class="h-5 w-5 transition-transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="hidden space-y-1 pl-11" id="reportes-dropdown">
                    <a href="{{ route('reportes.alumnos') }}"
                        class="block px-4 py-2 text-sm text-orange-300 rounded-md hover:bg-orange-700">
                        Reporte de Alumnos
                    </a>
                    <a href="{{ route('reportes.comidas') }}"
                        class="block px-4 py-2 text-sm text-orange-300 rounded-md hover:bg-orange-700">
                        Comidas Entregadas
                    </a>
                </div>
            </div>
        </nav>
    </aside>

    <script>
        document.querySelectorAll('button[aria-controls]').forEach(button => {
            button.addEventListener('click', () => {
                const dropdown = document.getElementById(button.getAttribute('aria-controls'));
                const isExpanded = button.getAttribute('aria-expanded') === 'true';

                button.setAttribute('aria-expanded', !isExpanded);
                dropdown.classList.toggle('hidden');
                button.querySelector('svg').classList.toggle('rotate-180');
            });
        });
    </script>
</body>

</html>
