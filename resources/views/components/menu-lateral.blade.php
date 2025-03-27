<!DOCTYPE html>
<html lang="es">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-orange-100">
    <aside class="w-64 bg-orange-900 text-white p-4">
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
                    class="dropdown-btn w-full flex items-center justify-between px-4 py-2.5 text-sm font-medium rounded-lg text-white hover:bg-orange-700"
                    data-target="alumnos-dropdown">
                    <span>🎓 Alumnos</span>
                    <svg class="dropdown-icon h-5 w-5 transition-transform transform" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="dropdown-menu hidden space-y-1 pl-11" id="alumnos-dropdown">
                    <a href="{{ route('alumnos.registro') }}"
                        class="block px-4 py-2 text-sm text-white rounded-md hover:bg-orange-700">
                        Registrar Alumno
                    </a>
                    <a href="{{ route('alumnos.listado') }}"
                        class="block px-4 py-2 text-sm text-white rounded-md hover:bg-orange-700">
                        Listado de Alumnos
                    </a>
                </div>
            </div>

            <!-- Reportes -->
            <div>
                <button
                    class="dropdown-btn w-full flex items-center justify-between px-4 py-2.5 text-sm font-medium rounded-lg text-white hover:bg-orange-700"
                    data-target="reportes-dropdown">
                    <span>📊 Reportes</span>
                    <svg class="dropdown-icon h-5 w-5 transition-transform transform" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="dropdown-menu hidden space-y-1 pl-11" id="reportes-dropdown">
                    <a href="{{ route('reportes.alumnos') }}"
                        class="block px-4 py-2 text-sm text-white rounded-md hover:bg-orange-700">
                        Reporte de Alumnos
                    </a>
                    <a href="{{ route('reportes.comidas') }}"
                        class="block px-4 py-2 text-sm text-white rounded-md hover:bg-orange-700">
                        Comidas Entregadas
                    </a>
                </div>
            </div>
        </nav>
    </aside>

</body>

</html>
