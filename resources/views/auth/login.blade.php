<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen h-screen lg:overflow-hidden bg-gray-400 text-gray-900 flex items-center justify-center">

    <div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
        <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
            <div class="mb-0"> <!-- Eliminamos el margen inferior -->
                <img src="{{ asset('assets/logo.png') }}" alt="logo" class="w-42" />
            </div>

            <div class="mt-[-10px] flex flex-col items-center">
                <div class="w-full flex-1">
                    <div class="my-6 border-b text-center">
                        <div
                            class="leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2">
                            Iniciar sesión con correo electrónico
                        </div>
                    </div>

                    <div class="mx-auto max-w-xs">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <input
                                class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                id="email" type="email" name="email" value="{{ old('email') }}" required
                                autofocus placeholder="Correo Electrónico" />
                            @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            
                            <input
                                class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                                id="password" type="password" name="password" required placeholder="Contraseña" />
                            @error('password')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            
                            <div class="flex items-center justify-between mt-5">
                                <label class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" name="remember"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                    <span class="ml-2 text-sm text-gray-600">Recordarme</span>
                                </label>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}"
                                        class="text-sm text-indigo-600 hover:underline">¿Olvidaste tu contraseña?</a>
                                @endif
                            </div>
                           
                            <button
                                class="mt-5 tracking-wide font-semibold bg-green-400 text-white w-full py-4 rounded-lg hover:bg-green-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                <svg class="w-6 h-6 -ml-2" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                    <circle cx="8.5" cy="7" r="4" />
                                    <path d="M20 8v6M23 11h-6" />
                                </svg>
                                <span class="ml-2">Iniciar Sesión</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Sección con imagen de cafetería -->
        <div class="flex-1 bg-[#8B5A2B] text-center hidden lg:flex">
            <div class="m-12 xl:m-16 w-full bg-center bg-no-repeat"
                style="background-image: url('{{ asset('assets/cafe.jpg') }}'); background-size: contain; background-position: center;">
            </div>
        </div>
    </div>
</body>

</html>
