<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="flex min-h-screen bg-gray-100">
        <!-- Menú lateral -->
        <aside class="flex min-h-screen">
            @include('components.menu-lateral')
        </aside>

        <!-- Contenido principal -->
        <div class="flex-1 flex items-center justify-center p-10">
            <div class="bg-white shadow-xl rounded-xl p-10 w-full max-w-2xl">
                <h2 class="text-4xl font-bold text-gray-900 text-center mb-6">Registro de Alumnos</h2>

                <!-- Formulario -->
                <form id="miFormulario" action=" " method="POST" class="space-y-6">
                    @csrf

                    <div class="relative flex space-x-4 w-full ">
                        <div class="flex flex-col w-4/5">
                            <label for="nombre" class="text-gray-800 font-semibold text-lg">Nombre completo</label>
                            <input type="text" name="nombre" id="nombre" required
                                class="w-full px-4 py-3 text-md border rounded-lg focus:ring-3 focus:ring-indigo-500 focus:outline-none mt-1">
                        </div>


                        <div class="flex flex-col w-1/5">
                            <label for="edad" class="text-gray-800 font-semibold text-lg">Edad</label>
                            <input type="text" name="edad" id="edad" required
                                class="w-full px-4 py-3 text-md border rounded-lg focus:ring-3 focus:ring-indigo-500 focus:outline-none mt-1"
                                oninput="validarNumerico(this, 'error-edad')">
                            <span id="error-edad" class="text-red-500 text-sm hidden">Por favor, ingresa solo números
                                válidos.</span>
                        </div>
                    </div>

                    <div class="relative">
                        <label for="correo" class="text-gray-800 font-semibold text-lg">Correo electrónico</label>
                        <input type="email" name="correo" required
                            class="w-full px-4 py-3 text-md border rounded-lg focus:ring-3 focus:ring-indigo-500 focus:outline-none mt-1">
                    </div>

                    <div class="relative">
                        <label for="telefono" class="text-gray-800 font-semibold text-lg">Número de teléfono</label>
                        <input type="text" name="telefono" id="telefono" required
                            class="w-full px-4 py-3 text-md border rounded-lg focus:ring-3 focus:ring-indigo-500 focus:outline-none mt-1"
                            oninput="validarNumerico(this, 'error-telefono')">
                        <span id="error-telefono" class="text-red-500 text-sm hidden">Por favor, ingresa solo números
                            válidos.</span>
                    </div>

                    <div class="relative flex space-x-4">
                        <div class="w-1/2">
                            <label for="tipo_participante" class="text-gray-800 font-semibold text-lg">Tipo de
                                Participante</label>
                            <select id="tipo_participante" name="tipo_participante"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>Selecciona un tipo</option>
                                <option value="publico">Publico</option>
                                <option value="aspirante">Aspirante</option>
                                <option value="estudiante">Estudiante</option>
                                <option value="estudiante">Docente</option>
                            </select>
                        </div>

                        <div class="w-1/2">
                            <label for="genero" class="text-gray-800 font-semibold text-lg">Género</label>
                            <select id="genero" name="genero"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>Selecciona un género</option>
                                <option value="masculino">Masculino</option>
                                <option value="femenino">Femenino</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                    </div>

                    <div class="relative w-full" hidden id="carrera">
                        <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch"
                            class="w-full flex justify-between items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300"
                            type="button">Carreras <svg class="w-2.5 h-2.5  ms-2.5" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>

                        <!-- Dropdown menu -->
                        <div id="dropdownSearch"
                            class="absolute top-full left-0 z-10 hidden bg-white rounded-lg shadow-md w-full">
                            <div class="p-3">
                                <label for="input-group-search" class="sr-only">Search</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="input-group-search"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Buscar carreras">
                                </div>
                            </div>

                            <ul class="max-h-48 overflow-y-auto px-3 pb-3 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownSearchButton">
                                <li>
                                    <div
                                        class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-administracion" type="checkbox" name="carreras[]"
                                            value="Administracion"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="checkbox-administracion"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm dark:text-gray-300">Lic.
                                            Administración</label>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-comercio" type="checkbox" name="carreras[]"
                                            value="Comercio"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="checkbox-comercio"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm dark:text-gray-300">Lic.
                                            Comercio</label>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-nutricion" type="checkbox" name="carreras[]"
                                            value="Nutricion"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="checkbox-nutricion"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm dark:text-gray-300">Lic.
                                            Nutrición</label>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-criminologia" type="checkbox" name="carreras[]"
                                            value="Criminologia"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="checkbox-criminologia"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm dark:text-gray-300">Lic.
                                            Criminología</label>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-enfermeria" type="checkbox" name="carreras[]"
                                            value="Enfermeria"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="checkbox-enfermeria"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm dark:text-gray-300">Lic.
                                            Enfermería</label>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-ingles" type="checkbox" name="carreras[]"
                                            value="Enseñanza Ingles"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="checkbox-ingles"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm dark:text-gray-300">Lic.
                                            Enseñanza del Inglés</label>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-software" type="checkbox" name="carreras[]"
                                            value="Fisioteapia"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="checkbox-software"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm dark:text-gray-300">Lic.
                                            Fisioteapia</label>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-software" type="checkbox" name="carreras[]"
                                            value="Entrenamiento Deportivo"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="checkbox-software"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm dark:text-gray-300">Lic.
                                            Entrenamiento Deportivo</label>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-geociencias" type="checkbox" name="carreras[]"
                                            value="Geociencias"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="checkbox-geociencias"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm dark:text-gray-300">Ing.
                                            Geociencias</label>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-industrial" type="checkbox" name="carreras[]"
                                            value="Industrial"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="checkbox-industrial"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm dark:text-gray-300">Ing.
                                            Industrial</label>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-software" type="checkbox" name="carreras[]"
                                            value="Software"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="checkbox-software"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm dark:text-gray-300">Ing.
                                            Software</label>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="flex items-center p-2 rounded-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-software" type="checkbox" name="carreras[]"
                                            value="Horticultura"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="checkbox-software"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm dark:text-gray-300">Ing.
                                            Horticultura</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-indigo-700 text-white font-bold text-lg py-3 rounded-lg hover:bg-indigo-800 transition shadow-md">
                        Guardar
                    </button>

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
                    timer: 3000, // Se cierra automáticamente después de 3 segundos
                    showConfirmButton: false,
                    background: "#f0fdfa", // Verde claro
                    color: "#065f46", // Verde oscuro
                });
            @endif

            @if ($errors->any())
                Swal.fire({
                    title: "¡Ups! Algo salió mal",
                    html: `<div style="text-align: left; font-size: 16px; color: #B91C1C;">
                        @foreach ($errors->all() as $error)
                            🔴 {{ $error }}<br>
                        @endforeach
                    </div>`,
                    icon: "error",
                    confirmButtonText: "Revisar",
                    confirmButtonColor: "#DC2626", // Rojo oscuro
                    background: "#FEF2F2", // Fondo rojo claro
                    color: "#7F1D1D", // Texto rojo oscuro
                });
            @endif
        });
    </script>


    {{-- Script patra la funcion del select carreras --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const select = document.getElementById("tipo_participante");
            const carreraDiv = document.getElementById("carrera");
            const checkboxes = document.querySelectorAll('#carrera input[type="checkbox"]');
            const form = document.querySelector("form");
            let errorMessage = document.getElementById("error-message");

            if (!errorMessage) {
                errorMessage = document.createElement("p");
                errorMessage.id = "error-message";
                errorMessage.textContent = "Debes seleccionar al menos una carrera.";
                errorMessage.style.color = "red";
                errorMessage.style.display = "none";
                carreraDiv.appendChild(errorMessage);
            }

            function handleSingleSelection(event) {
                if ((select.value === "estudiante" || select.value === "docente") && event.target.checked) {
                    checkboxes.forEach(cb => {
                        if (cb !== event.target) cb.checked = false;
                    });
                }
            }

            select.addEventListener("change", function() {
                checkboxes.forEach(cb => cb.checked = false); // Borra la selección al cambiar

                if (this.value === "aspirante" || this.value === "estudiante" || this.value === "docente") {
                    carreraDiv.removeAttribute("hidden");
                } else {
                    carreraDiv.setAttribute("hidden", "true");
                }

                checkboxes.forEach(checkbox => {
                    checkbox.removeEventListener("change", handleSingleSelection);
                    if (select.value === "estudiante" || select.value === "docente") {
                        checkbox.addEventListener("change", handleSingleSelection);
                    }
                });
            });

            form.addEventListener("submit", function(event) {
                const selectedValue = select.value;
                const isCareerRequired = selectedValue === "aspirante" || selectedValue === "estudiante" ||
                    selectedValue === "docente";
                const isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);

                if (isCareerRequired && !isChecked) {
                    event.preventDefault();
                    errorMessage.style.display = "block";
                } else {
                    errorMessage.style.display = "none";
                }
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

</x-app-layout>
