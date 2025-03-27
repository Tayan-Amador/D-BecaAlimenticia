<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alumnos Sin Huella') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- Mensaje cuando no hay datos -->
        <p id="no-data-message" class="no-data-message">No hay alumnos sin huella.</p>

        <!-- Tabla -->
        <div class="table-container">
            <table id="alumnos-table">
                <thead>
                    <tr>
                        <th>Expediente</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Carrera</th>
                        <th>Teléfono</th>
                        <th>Status</th>
                        <th>Huella</th> <!-- Columna para huella -->
                    </tr>
                </thead>
                <tbody>
                    <!-- Los datos se llenarán dinámicamente con JavaScript -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Realizamos una petición fetch a la ruta que devuelve los datos JSON
        fetch('{{ route('huellas.alumnos_sh') }}')
            .then(response => response.json())
            .then(data => {
                const tableBody = document.querySelector("table tbody");
                const noDataMessage = document.getElementById("no-data-message");

                if (data.length === 0) {
                    // Si no hay datos, mostrar el mensaje
                    noDataMessage.style.display = 'block';
                } else {
                    // Si hay datos, llenar la tabla con ellos
                    data.forEach(alumno => {
                        const row = document.createElement('tr');
                        row.classList.add('table-row');

                        row.innerHTML = `
                            <td>${alumno.expediente}</td>
                            <td>${alumno.nombre}</td>
                            <td>${alumno.correo}</td>
                            <td>${alumno.carrera}</td>
                            <td>${alumno.telefono}</td>
                            <td>${alumno.status}</td>
                            <td>${alumno.huella ? 'Con Huella' : 'Sin Huella'}</td>
                        `;
                        tableBody.appendChild(row);
                    });
                }
            })
            .catch(error => {
                console.error('Error al cargar los datos:', error);
            });
    </script>

    <style>
        /* Estilos generales para la tabla */
        .table-container {
            overflow-x: auto;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th, td {
            padding: 12px 16px;
            text-align: left;
            border: 1px solid #e0e0e0;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        tr.table-row:hover {
            background-color: #f9fafb;
        }

        .no-data-message {
            text-align: center;
            font-weight: bold;
            color: #666;
            display: none;
        }
    </style>
</x-app-layout>
