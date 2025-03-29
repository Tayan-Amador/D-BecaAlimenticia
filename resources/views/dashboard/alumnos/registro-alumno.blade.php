<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="flex min-h-screen">

        <!-- Contenido principal -->
        <div class="flex-1 flex items-center w-full justify-center mx-auto p-4 min-h-screen">
            <div class="bg-white shadow-xl rounded-xl p-4 sm:p-10 w-full sm:w-[80%] items-center">
                <h2
                    class="text-xl sm:text-4xl md:text-5xl lg:text-6xl font-poppins text-gray-900 text-center mb-4 font-bold">
                    Registro de Alumnos</h2>

                <form id="miFormulario"
                    action="{{ $alumno ? route('alumnos.actualizar', $alumno->id) : route('alumnos.registrar') }}"
                    method="POST" class="space-y-6 w-full max-w-4xl mx-auto p-4 {{ $alumno ? 'editar' : 'registro' }}">
                    @csrf
                    @if ($alumno)
                        @method('PUT') <!-- Si estamos editando, usamos PUT -->
                    @endif

                    <!-- Expediente -->
                    <div class="relative">
                        <label for="expediente"
                            class="text-gray-800 font-medium text-lg block mb-2 sm:text-base md:text-lg lg:text-xl break-words">Expediente</label>
                        <input type="text" name="expediente" id="expediente" required
                            class="w-full px-4 py-3 text-md border rounded-lg focus:ring-3 focus:ring-indigo-500 focus:outline-none mt-1"
                            value="{{ old('expediente', $alumno->expediente ?? '') }}">
                    </div>

                    <!-- Nombre -->
                    <div class="relative">
                        <label for="nombre"
                            class="text-gray-800 font-medium text-lg block mb-2 sm:text-base md:text-lg lg:text-xl break-words">Nombre
                            completo</label>
                        <input type="text" name="nombre" id="nombre" required
                            class="w-full px-4 py-3 text-md border rounded-lg focus:ring-3 focus:ring-indigo-500 focus:outline-none mt-1"
                            value="{{ old('nombre', $alumno->nombre ?? '') }}">
                    </div>

                    <!-- Correo -->
                    <div class="relative">
                        <label for="correo"
                            class="text-gray-800 font-medium text-lg block mb-2 sm:text-base md:text-lg lg:text-xl break-words">Correo
                            electrónico</label>
                        <input type="email" name="correo" id="correo" required
                            class="w-full px-4 py-3 text-md border rounded-lg focus:ring-3 focus:ring-indigo-500 focus:outline-none mt-1"
                            value="{{ old('correo', $alumno->correo ?? '') }}">
                    </div>

                    <!-- Teléfono -->
                    <div class="relative">
                        <label for="telefono"
                            class="text-gray-800 font-medium text-lg block mb-2 sm:text-base md:text-lg lg:text-xl break-words">Número
                            de teléfono</label>
                        <input type="text" name="telefono" id="telefono" required
                            class="w-full px-4 py-3 text-md border rounded-lg focus:ring-3 focus:ring-indigo-500 focus:outline-none mt-1"
                            value="{{ old('telefono', $alumno->telefono ?? '') }}"
                            oninput="validarNumerico(this, 'error-telefono')">
                        <span id="error-telefono" class="text-red-500 text-sm hidden">Por favor, ingresa solo números
                            válidos.</span>
                    </div>

                    <!-- Carrera -->
                    <div class="relative" id="carrera">
                        <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch"
                            class="w-full flex justify-between items-center px-4 py-2 text-sm font-medium text-white bg-orange-500 rounded-lg hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300"
                            type="button">Carreras
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownSearch"
                            class="absolute bottom-full left-0 z-10 hidden bg-white rounded-lg shadow-md w-full">
                            <div class="p-3">
                                <label for="input-group-search" class="sr-only">Buscar</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="input-group-search"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                                        placeholder="Buscar carreras">
                                </div>
                            </div>

                            <ul class="max-h-48 overflow-y-auto px-3 pb-3 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownSearchButton">
                                <!-- Opciones de carrera -->
                                <li>
                                    <div
                                        class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-administracion" type="radio" name="carrera"
                                            value="Administracion"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                            {{ old('carrera', $alumno->carrera ?? '') == 'Administracion' ? 'checked' : '' }}>
                                        <label for="checkbox-administracion"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm dark:text-gray-300">
                                            Lic. Administración
                                        </label>
                                    </div>
                                </li>

                                <li>
                                    <div
                                        class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-comercio" type="radio" name="carrera" value="Comercio"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                            {{ old('carrera', $alumno->carrera ?? '') == 'Comercio' ? 'checked' : '' }}>
                                        <label for="checkbox-comercio"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm dark:text-gray-300">
                                            Lic. Comercio
                                        </label>
                                    </div>
                                </li>

                                <li>
                                    <div
                                        class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-nutricion" type="radio" name="carrera" value="Nutricion"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                            {{ old('carrera', $alumno->carrera ?? '') == 'Nutricion' ? 'checked' : '' }}>
                                        <label for="checkbox-nutricion"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm dark:text-gray-300">
                                            Lic. Nutrición
                                        </label>
                                    </div>
                                </li>

                                <li>
                                    <div
                                        class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-criminologia" type="radio" name="carrera"
                                            value="Criminologia"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                            {{ old('carrera', $alumno->carrera ?? '') == 'Criminologia' ? 'checked' : '' }}>
                                        <label for="checkbox-criminologia"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm dark:text-gray-300">
                                            Lic. Criminología
                                        </label>
                                    </div>
                                </li>

                                <li>
                                    <div
                                        class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-enfermeria" type="radio" name="carrera"
                                            value="Enfermeria"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                            {{ old('carrera', $alumno->carrera ?? '') == 'Enfermeria' ? 'checked' : '' }}>
                                        <label for="checkbox-enfermeria"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm dark:text-gray-300">
                                            Lic. Enfermería
                                        </label>
                                    </div>
                                </li>

                                <li>
                                    <div
                                        class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-ingles" type="radio" name="carrera"
                                            value="Enseñanza Ingles"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                            {{ old('carrera', $alumno->carrera ?? '') == 'Enseñanza Ingles' ? 'checked' : '' }}>
                                        <label for="checkbox-ingles"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm dark:text-gray-300">
                                            Lic. Enseñanza del Inglés
                                        </label>
                                    </div>
                                </li>

                                <li>
                                    <div
                                        class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-fisioterapia" type="radio" name="carrera"
                                            value="Fisioterapia"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                            {{ old('carrera', $alumno->carrera ?? '') == 'Fisioterapia' ? 'checked' : '' }}>
                                        <label for="checkbox-fisioterapia"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm dark:text-gray-300">
                                            Lic. Fisioterapia
                                        </label>
                                    </div>
                                </li>

                                <li>
                                    <div
                                        class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-entrenamiento" type="radio" name="carrera"
                                            value="Entrenamiento Deportivo"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                            {{ old('carrera', $alumno->carrera ?? '') == 'Entrenamiento Deportivo' ? 'checked' : '' }}>
                                        <label for="checkbox-entrenamiento"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm dark:text-gray-300">
                                            Lic. Entrenamiento Deportivo
                                        </label>
                                    </div>
                                </li>

                                <li>
                                    <div
                                        class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-geociencias" type="radio" name="carrera"
                                            value="Geociencias"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                            {{ old('carrera', $alumno->carrera ?? '') == 'Geociencias' ? 'checked' : '' }}>
                                        <label for="checkbox-geociencias"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm dark:text-gray-300">
                                            Ing. Geociencias
                                        </label>
                                    </div>
                                </li>

                                <li>
                                    <div
                                        class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-industrial" type="radio" name="carrera"
                                            value="Industrial"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                            {{ old('carrera', $alumno->carrera ?? '') == 'Industrial' ? 'checked' : '' }}>
                                        <label for="checkbox-industrial"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm dark:text-gray-300">
                                            Ing. Industrial
                                        </label>
                                    </div>
                                </li>

                                <li>
                                    <div
                                        class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-software" type="radio" name="carrera" value="Software"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                            {{ old('carrera', $alumno->carrera ?? '') == 'Software' ? 'checked' : '' }}>
                                        <label for="checkbox-software"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm dark:text-gray-300">
                                            Ing. Software
                                        </label>
                                    </div>
                                </li>

                                <li>
                                    <div
                                        class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-horticultura" type="radio" name="carrera"
                                            value="Horticultura"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                            {{ old('carrera', $alumno->carrera ?? '') == 'Horticultura' ? 'checked' : '' }}>
                                        <label for="checkbox-horticultura"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm dark:text-gray-300">
                                            Ing. Horticultura
                                        </label>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="flex gap-4 flex-col sm:flex-row w-full">
                        <button type="submit"
                            class="flex-1 sm:w-auto bg-[#800020] text-white font-bold text-lg py-3 rounded-lg hover:bg-red-800 transition shadow-md">
                            {{ $alumno ? 'Actualizar' : 'Registrar' }}
                        </button>

                        <button type="button" onclick="confirmarCancelar()"
                            class="flex-1 sm:w-auto bg-gray-500 text-white font-bold text-lg py-3 rounded-lg hover:bg-gray-600 transition shadow-md">
                            Cancelar
                        </button>

                    </div>
                </form>

            </div>
        </div>
    </div>

    {{-- Alerta de registro --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success'))
                Swal.fire({
                    title: "¡Registro exitoso!",
                    text: "{{ session('success') }}",
                    icon: "success",
                    timer: 3000,
                    showConfirmButton: false,
                    background: "#f0fdfa",
                    color: "#065f46",
                });
            @endif

            @if ($errors->any())
                Swal.fire({
                    title: "¡Ups! Algo salió mal",
                    html: `{!! implode('<br>', $errors->all()) !!}`,
                    icon: "error",
                    confirmButtonText: "Revisar",
                    confirmButtonColor: "#DC2626",
                    background: "#FEF2F2",
                    color: "#7F1D1D",
                });
            @endif
        });
    </script>

    {{-- Script patra la funcion del select carreras --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dropdownButton = document.getElementById("dropdownSearchButton");
            const dropdownMenu = document.getElementById("dropdownSearch");
            const checkboxes = document.querySelectorAll('#carrera input[type="checkbox"]');

            // ✅ Mostrar/Ocultar dropdown al hacer clic en el botón
            dropdownButton.addEventListener("click", function(event) {
                event.stopPropagation();
                dropdownMenu.classList.toggle("hidden");
            });

            // ✅ Cierra el dropdown si se hace clic fuera de él
            document.addEventListener("click", function(event) {
                if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add("hidden");
                }
            });

            // ✅ Permitir seleccionar solo una opción a la vez
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener("change", function() {
                    if (this.checked) {
                        checkboxes.forEach(cb => {
                            if (cb !== this) cb.checked =
                                false; // Desmarca las demás opciones
                        });
                    }
                });
            });
        });
    </script>


    {{-- Script para la validación de los campos numéricos que la edad y telefono solo se pueda teclear datos numericos --}}
    <script>
        // Función común para validar campos numéricos
        function validarNumerico(input, errorId) {
            const errorMensaje = document.getElementById(errorId);

            // Si se ingresa algo que no es un número, se eliminará
            if (input.value.match(/[^0-9]/)) {
                errorMensaje.classList.remove('hidden');
                input.value = input.value.replace(/[^0-9]/g, ''); // Eliminar caracteres no numéricos
            } else {
                errorMensaje.classList.add('hidden'); // Si solo hay números, se oculta el mensaje
            }
        }
    </script>

    {{-- Script para filtrar carreras --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("input-group-search"); // El input del buscador
            const carrerasList = document.querySelectorAll('#dropdownSearch ul li'); // Lista de carreras

            // Función para filtrar las carreras
            searchInput.addEventListener("input", function() {
                const searchTerm = searchInput.value.toLowerCase(); // Convierte el texto a minúsculas

                // Iteramos sobre todas las carreras
                carrerasList.forEach(function(carreraItem) {
                    const carreraName = carreraItem.querySelector("label").textContent
                        .toLowerCase(); // Obtener nombre de la carrera

                    // Si el nombre de la carrera contiene el término de búsqueda, lo mostramos, si no lo ocultamos
                    if (carreraName.includes(searchTerm)) {
                        carreraItem.style.display = "block"; // Mostrar carrera
                    } else {
                        carreraItem.style.display = "none"; // Ocultar carrera
                    }
                });
            });
        });
    </script>

    {{-- script general que determine si estamos en el registro o en la edición --}}
    <script>
        function confirmarCancelar() {
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¿Quieres cancelar?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, cancelar',
                cancelButtonText: 'No, mantener'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Obtener el formulario
                    const form = document.getElementById('miFormulario');

                    // Limpiar todos los campos de texto, correo, teléfono, etc.
                    form.querySelectorAll('input[type="text"], input[type="email"], input[type="number"], textarea')
                        .forEach(input => {
                            input.value = '';
                        });

                    // Limpiar campos de radio (Carrera)
                    form.querySelectorAll('input[type="radio"]').forEach(radio => {
                        radio.checked = false;
                    });

                    // Limpiar dropdown (Carrera)
                    const selectDropdown = form.querySelectorAll('select');
                    selectDropdown.forEach(select => {
                        select.selectedIndex = -1; // Resetea la selección
                    });

                    // Si usas Select2 o alguna librería similar
                    if (window.$) {
                        $('.select2').val(null).trigger('change');
                    }

                    // Redirigir dependiendo de si estamos en la vista de edición o registro
                    if (form.classList.contains('editar')) {
                        window.location.href =
                        "{{ route('alumnos.listado') }}"; // Redirigir a listado de alumnos (Edición)
                    } else {
                        window.location.href =
                        "{{ route('alumnos.registro') }}"; // Redirigir a registro (Creación)
                    }

                    Swal.fire(
                        'Cancelado!',
                        'La operación ha sido cancelada.',
                        'success'
                    );
                }
            });
        }
    </script>

</x-app-layout>
