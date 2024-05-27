<div class="max-w-7xl font-sans font-normal mx-auto px-4 sm:px-6 lg:px-8 flex flex-col gap-10 py-12">
    @if (session('success'))
        <div class="bg-green-500 text-white p-4 text-center rounded w-full">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="flex gap-10">
    <div class=" w-64">
        <ul class="flex py-15">
            <li class="rounded-md items-center justify-center mb-4 w-full">
            <a class="mb-2 py-2 rounded-md flex justify-center text-white bg-slate-800">Categorias</a>

            @forelse ($categories as $category)
                <a href="#" wire:click.prevent="filterByCategory('{{ $category->id }}')" class="mb-2 p-2 rounded-md flex bg-slate-800 items-center gap-2 text-white/60 hover:text-white text-xs capitalize">
                    <span class= "w-2 h-2 rounded-full" style= "background-color: {{$category->color}};"></span>
                    {{$category->name}}
                </a>
            @empty
                <p>No hay categorias</p>
            @endforelse
                <a href="#" wire:click.prevent="filterByCategory('')" class="mb-2 p-2 rounded-md flex bg-slate-800 items-center gap-2 text-white/60 hover:text-white text-xs capitalize">
                    <span class= "w-2 h-2 rounded-full" style= "background-color: #000ace;"></span>
                    Todas las categorias
                </a>
            </li>
        </ul>
    </div>

    <div class ="w-full bg-slate-800 rounded-md min-h-screen">
        <form class="mb-4 py-2 px-2 flex justify-center" action="">
            <input wire:model="search" type="text" placeholder="Buscar" class="w-1/2 bg-slate-400 text-xs rounded-md">
        </form>

        <div class="w-full gap-4 grid  grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 px-4 py-2">
            @forelse($productos as $producto)
                <div  class="bg-slate-900 text-white via-blue-500 to-red-400 transform hover:scale-110 transition-transform duration-300 rounded-md p-2 h-76">
                    <a href="" class="block bg-transparent gap-4 w-full h-full capitalize" >
                        <!-- Contenedor de la imagen -->
                        <div class="-">
                            <img src="{{ $producto->imagen }}" alt="Foto" class="w-52 h-32">
                        </div>
                        <!-- Contenedor de los detalles -->
                        <div class="text-xs">
                            <p class="">{{"$" . $producto->precio}}</p>
                            <p>nombre: {{$producto->nombre}}</p>
                            <p>modelo: {{$producto->modelo}}</p>
                            <p>marca: {{$producto->marca}}</p>
                            <p>categoria: {{$producto->categoria ? $producto->categoria->name : 'Sin categoría'}}</p>
                            <p class="line-clamp-2"> <!-- este estilo lo que hace es mostrar las dos primeras lineas de un texto y si es mayor a ese limite entonces pone "..." -->
                                descripcion: {{$producto->descripcion}}
                            </p>
                        </div>
                        <form action="{{route('carrito.agregarproducto')}}" method="POST">
                            @csrf
                            <input type="hidden" name="producto_id" value="{{$producto->id}}">
                            <input class="text-white/60 hover:text-white/90 flex justify-end" type="submit" value="Agregar al carrito">
                        </form>
                    </a>
                </div>
            @empty
                <p>no hay productos</p>
            @endforelse
    </div>
    {{ $productos->links() }}
    </div>
    
</div>
