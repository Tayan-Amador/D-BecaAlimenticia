<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="flex min-h-screen bg-gray-100">
        <!-- Menú lateral -->
        <aside class="flex min-h-screen">
            @include('components.menu-lateral')
        </aside>

        <div class="w-full bg-white flex items-center justify-center min-h-full p-2">
            <div class="container max-w-6xl mt-[-400px]">
                <div class="bg-gray-300 rounded-xl shadow-md overflow-hidden">
                    <!-- Table Header -->
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                            <div>
                                <h2 class="text-xl font-bold text-gray-800">Listado de Alumnos</h2>
                                <p class="text-gray-500 mt-1">Administra a los alumnos y sus estatus aquí.</p>
                            </div>
                            <div class="mt-4 md:mt-0">
                                <button
                                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out">
                                    Imprimir Reporte
                                </button>
                            </div>
                        </div>

                        <!-- Search and Filter -->
                        <div class="mt-6 flex flex-col sm:flex-row gap-4">
                            <div class="relative flex-grow">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg w-full"
                                    placeholder="Buscar alumno...">
                            </div>
                            <div>
                                <select class="border border-gray-300 rounded-lg px-4 py-2 w-full sm:w-auto"
                                    id="statusFilter">
                                    <option value="">Todos</option>
                                    <option value="activo">Activo</option>
                                    <option value="inactivo">Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Expediente</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombre
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Correo
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Carrera
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Semestre
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Teléfono
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estatus
                                    </th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">
                                        Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="alumnosTable" class="bg-white divide-y divide-gray-200">
                                @foreach ($alumnos as $alumno)
                                    <tr class="hover:bg-gray-50" data-status="{{ $alumno->estatus }}">
                                        <td class="px-6 py-4">{{ $alumno->expediente }}</td>
                                        <td class="px-6 py-4">{{ $alumno->nombre }}</td>
                                        <td class="px-6 py-4">{{ $alumno->correo }}</td>
                                        <td class="px-6 py-4">{{ $alumno->carrera }}</td>
                                        <td class="px-6 py-4">{{ $alumno->semestre }}</td>
                                        <td class="px-6 py-4">{{ $alumno->telefono }}</td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $alumno->estatus == 'activo' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ ucfirst($alumno->estatus) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="#"
                                                class="text-indigo-600 hover:text-indigo-900 mr-3">Editar</a>
                                            <a href="#" class="text-red-600 hover:text-red-900">Eliminar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const filterSelect = document.getElementById('statusFilter');
            filterSelect.addEventListener('change', function() {
                const status = this.value;
                const rows = document.querySelectorAll('#alumnosTable tr');
                rows.forEach(row => {
                    if (!status || row.dataset.status === status) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        </script>
</x-app-layout>
