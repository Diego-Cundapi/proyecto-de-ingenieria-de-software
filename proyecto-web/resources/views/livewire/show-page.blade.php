<div class="max-w-7xl font-sans font-normal mx-auto px-4 sm:px-6 lg:px-8 flex flex-col gap-10 py-12">
    @if (session('success'))
        <div class="bg-green-500 text-white p-4 text-center rounded w-full">
            <p>{{ session('success') }}</p>
        </div>
    @endif
    @if (session('error'))
        <div class="bg-red-500 text-white p-4 text-center rounded w-full">
            <p>{{ session('error') }}</p>
        </div>
    @endif

    <section class="text-white py-20 md:py-32">
        <div class="container mx-auto px-4 md:px-8 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div>
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Encuentre las piezas de automóvil perfectas</h1>
                <p class="text-lg mb-8">Mejora tu viaje con nuestras piezas y accesorios para automóviles de alta calidad.</p>
            </div>
            <div>
                <img src="{{ asset('imagenes/logo.png') }}" alt="Car" class="rounded-lg shadow-lg" />
            </div>
        </div>
    </section>
    
    <div class="flex gap-10">
        <div class=" w-64">
            <ul class="flex py-15">
                <li class="rounded-md items-center justify-center mb-4 w-full">
                <a class="mb-2 py-2 rounded-md flex justify-center text-white bg-indigo-900">Categorias</a>

                @forelse ($categories as $category)
                    <a href="#" wire:click.prevent="filterByCategory('{{ $category->id }}')" class="mb-2 p-2 rounded-md flex bg-indigo-900 items-center gap-2 text-white/60 hover:text-white text-sm capitalize">
                        <span class= "w-2 h-2 rounded-full" style= "background-color: {{$category->color}};"></span>
                        {{$category->name}}
                    </a>
                @empty
                    <p>No hay categorias</p>
                @endforelse
                    <a href="#" wire:click.prevent="filterByCategory('')" class="mb-2 p-2 rounded-md flex bg-indigo-900 items-center gap-2 text-white/60 hover:text-white text-sm capitalize">
                        <span class= "w-2 h-2 rounded-full" style= "background-color: red;"></span>
                        Todas las categorias
                    </a>
                </li>
            </ul>
        </div>

        <div class ="w-full bg-slate-800 rounded-md min-h-screen">
            <form class="mb-4 py-2 flex justify-center" action="">
                <input wire:model="search" type="text" placeholder="Buscar" class="w-1/2 bg-slate-400 text-xs rounded-md">
            </form>

            <section class="py-4">
                <div class="container mx-auto px-4 md:px-8">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
                        @foreach($productos as $producto)
                        <div class="bg-white rounded-lg shadow-lg transform hover:scale-110 transition-transform duration-900">
                            <a href="{{ route('producto', $producto->id) }}">
                                <img src="{{ $producto->imagen }}" alt="Product" class="rounded-t-lg" style="width: 400px; height: 300px;">
                                <div class="p-4">
                                    <h3 class="text-lg font-medium mb-2">{{$producto->nombre}}</h3>
                                    <p class="text-gray-500 mb-4 line-clamp-1">{{$producto->descripcion}}</p>
                                    <div class="flex items-center justify-between">
                                        <span class="text-xl font-bold">${{$producto->precio}}</span>
                                        <form action="{{route('carrito.agregarproducto')}}" class="text-center text-black" method="POST">
                                            @csrf
                                            <input type="hidden" name="producto_id" value="{{$producto->id}}">
                                            <input class="px-4 py-2 text-sm font-medium text-white bg-indigo-500 rounded-md hover:bg-indigo-600" type="submit" value="Agregar al carrito">
                                        </form>
                                    </div>
                                </div>
                            </a>
                            
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>

        {{ $productos->links() }}
    </div>
    
</div>


