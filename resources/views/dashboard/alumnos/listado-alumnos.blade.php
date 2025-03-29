<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <div class="flex min-h-screen bg-gray-100">

        <div class="w-full bg-white flex items-center justify-center min-h-full p-2">
            <div class="container max-w-6xl">
                <div class="bg-gray-300 rounded-xl shadow-md overflow-hidden">
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                            <div>
                                <h2 class="text-xl font-bold text-gray-800">Listado de Alumnos</h2>
                                <p class="text-gray-500 mt-1">Administra a los alumnos y sus estatus aquí.</p>
                            </div>
                            <div class="mt-4 md:mt-0">
                                <button
                                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg">Imprimir
                                    Reporte</button>
                            </div>
                        </div>

                        <!-- Search and Filter -->
                        <div class="mt-6 flex flex-col sm:flex-row gap-4">
                            <div class="relative flex-grow">
                                <input type="text" class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg w-full"
                                    placeholder="Buscar Expediente...">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>

                            <div>
                                <select
                                    class="border border-gray-300 rounded-lg px-3 py-2 w-auto max-w-[150px] sm:max-w-none focus:outline-none focus:ring-2 focus:ring-indigo-500 appearance-none bg-white pr-8 text-sm sm:text-base"
                                    id="statusFilter">
                                    <option value="">Todos</option>
                                    <option value="activo">Activo</option>
                                    <option value="inactivo">Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Responsive Table -->
                    <div class="overflow-x-auto">
                        <table id="tabla" class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-2 py-2 text-center text-sm font-medium text-gray-500">Expediente</th>
                                    <th class="px-2 py-2 text-center text-sm font-medium text-gray-500">Nombre</th>
                                    <th class="px-2 py-2 text-center text-sm font-medium text-gray-500">Correo</th>
                                    <th class="px-2 py-2 text-center text-sm font-medium text-gray-500">Carrera</th>
                                    <th class="px-2 py-2 text-center text-sm font-medium text-gray-500">Teléfono</th>
                                    <th class="px-2 py-2 text-center text-sm font-medium text-gray-500">Estatus</th>
                                    <th class="px-2 py-2 text-center text-sm font-medium text-gray-500">Acciones</th>
                                </tr>
                            </thead>

                            <tbody id="alumnosTable" class="bg-white divide-y divide-gray-200">
                                @forelse ($alumnos as $alumno)
                                    <tr class="hover:bg-gray-50 participante-row" data-status="{{ $alumno->status }}">
                                        <td class="px-2 text-center py-4 expediente">{{ $alumno->expediente }}</td>
                                        <td class="px-2 text-center py-4 nombre">{{ $alumno->nombre }}</td>
                                        <td
                                            class="px-2 text-center py-4 whitespace-nowrap overflow-hidden text-ellipsis max-w-[150px] sm:max-w-[250px] correo">
                                            {{ $alumno->correo }}
                                        </td>
                                        <td class="px-2 text-center py-4 carrera">{{ $alumno->carrera }}</td>
                                        <td class="px-2 text-center py-4 telefono">{{ $alumno->telefono }}</td>

                                        <td class="px-2 text-center py-4">
                                            <!-- Enlace para cambiar el estado -->
                                            <a href="{{ route('alumnos.cambiarStatus', $alumno->id) }}"
                                                class="{{ $alumno->status == 'activo' ? 'text-green-600 hover:text-green-900' : 'text-gray-600 hover:text-gray-900' }}">
                                                <i class="fas fa-toggle-on"></i>
                                                {{ $alumno->status == 'activo' ? 'Activo' : 'Inactivo' }}
                                            </a>
                                        </td>

                                        <td class="px-2 py-4 text-center space-x-4">
                                            <!-- Enlace de editar -->
                                            <a href="{{ route('alumnos.registro', $alumno->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900 btn-editar">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <!-- Formulario de eliminar -->
                                            <form action="{{ route('alumnos.eliminar', $alumno->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="hover:bg-gray-50">
                                        <td colspan="7" class="px-4 py-4 text-center text-gray-500">No hay registros
                                            disponibles</td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Filtro de búsqueda
            const searchInput = document.querySelector('input[type="text"]');
            const statusFilter = document.getElementById('statusFilter');
            const tableRows = document.querySelectorAll('#alumnosTable tr');

            // Función para aplicar los filtros
            function applyFilters() {
                const searchTerm = searchInput.value.toLowerCase();
                const statusValue = statusFilter.value;

                tableRows.forEach(row => {
                    const nombre = row.querySelector('.nombre') ? row.querySelector('.nombre').textContent
                        .toLowerCase() : '';
                    const expediente = row.querySelector('.expediente') ? row.querySelector('.expediente')
                        .textContent.toLowerCase() : '';
                    const carrera = row.querySelector('.carrera') ? row.querySelector('.carrera')
                        .textContent.toLowerCase() : '';
                    const status = row.dataset.status; // Status de la fila (activo/inactivo)

                    // Verificamos si el nombre, expediente, carrera coinciden con la búsqueda y si el status coincide con el filtro
                    const matchesSearchTerm = nombre.includes(searchTerm) || expediente.includes(
                        searchTerm) || carrera.includes(searchTerm);
                    const matchesStatus = statusValue ? status === statusValue : true;

                    if (matchesSearchTerm && matchesStatus) {
                        row.style.display = ''; // Mostrar fila
                    } else {
                        row.style.display = 'none'; // Ocultar fila
                    }
                });
            }

            // Aplicar filtros cada vez que el usuario escribe en el campo de búsqueda
            searchInput.addEventListener('input', applyFilters);

            // Aplicar filtros cuando cambie el filtro de estatus
            statusFilter.addEventListener('change', applyFilters);

            // Inicializa los filtros cuando se cargue la página
            applyFilters();
        });
    </script>

    <script>
        // Alerta de confirmación antes de eliminar
        const deleteForms = document.querySelectorAll('form[action*="eliminar"]');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Evita que el formulario se envíe inmediatamente

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás recuperar este registro después de eliminarlo!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Si el usuario confirma, envía el formulario
                    }
                });
            });
        });

        // Alerta de confirmación antes de editar solo en la acción Editar
        const editLinks = document.querySelectorAll('.btn-editar');
        editLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Evita que se siga el enlace inmediatamente

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡Serás redirigido a la página de edición del alumno!",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Editar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        .href; // Redirige al enlace de edición si el usuario confirma
                    }
                });
            });
        });
    </script>

</x-app-layout>
