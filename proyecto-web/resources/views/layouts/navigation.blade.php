<div>
@if (isset($header))
                <header class="bg-black/80 shadow text-white">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>

            @else
                <header class="bg-black/80 shadow font-semibold">
                    <div class="flex items-center justify-between max-w-7xl mx-auto px-1">
                        <div class="">
                            <img src="{{ asset('imagenes/logo.jpg') }}" class="h-10" alt="Logo">
                        </div>
                        <div class="space-x-4 text-white/60 ">
                            <a class="hover:text-white/90" href="">Home</a>
                            <a href="" class="hover:text-white/90">Carrito</a>
                            <a href="" class="hover:text-white/90">Iniciar sesión</a>
                            <a href="" class="hover:text-white/90">Registrarse</a>
                        </div>
                    </div>
                </header>
            @endif


</div>