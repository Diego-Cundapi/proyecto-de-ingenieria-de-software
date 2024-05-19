<div class="max-w-7xl font-sans font-normal mx-auto px-4 sm:px-6 lg:px-8 flex gap-10 py-12">
    <div class=" w-64">
        <ul class="flex py-15">
            <li class="rounded-md items-center justify-center mb-4 w-full">
            <a class="mb-2 py-2 rounded-md flex justify-center bg-gradient-to-r from-pink-400 to-yellow-600">Categorias</a>

            @forelse ($categories as $category)
                <a href="#" wire:click.prevent="filterByCategory('{{ $category->id }}')" class="mb-2 p-2 rounded-md flex bg-cyan-600 items-center gap-2 text-white/60 hover:text-white text-xs capitalize">
                    <span class= "w-2 h-2 rounded-full" style= "background-color: {{$category->color}};"></span>
                    {{$category->name}}
                </a>
            @empty
                <p>No hay categorias</p>
            @endforelse
                <a href="#" wire:click.prevent="filterByCategory('')" class="mb-2 p-2 rounded-md flex bg-cyan-600 items-center gap-2 text-white/60 hover:text-white text-xs capitalize">
                    <span class= "w-2 h-2 rounded-full" style= "background-color: #000ace;"></span>
                    Todas las categorias
                </a>
            </li>
        </ul>
    </div>

    <div class ="w-full bg-gradient-to-r from-teal-200 via-yellow-600 to-green-700 rounded-md min-h-screen">
        <form class="mb-4 py-2 px-2 flex justify-center" action="">
            <input wire:model="search" type="text" placeholder="Buscar" class="w-1/2 bg-slate-400 text-xs rounded-md">
        </form>

        <div class="w-full gap-4 grid  grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 px-4 py-2">
            @forelse($productos as $producto)
                <div  class="bg-gradient-to-r from-violet-600 via-blue-500 to-red-400 transform hover:scale-110 transition-transform duration-300 rounded-md p-2 h-48">
                    <a href="" class="block bg-transparent gap-4 w-full h-full capitalize" >
                        <!-- Contenedor de la imagen -->
                        <div>
                            <img src="" alt="Foto" class="h8">
                        </div>
                        <!-- Contenedor de los detalles -->
                        <div class="text-sm">
                            <p class="">{{"$" . $producto->precio}}</p>
                            <p>nombre: {{$producto->nombre}}</p>
                            <p>modelo: {{$producto->modelo}}</p>
                            <p>marca: {{$producto->marca}}</p>
                            <p class="line-clamp-2"> <!-- este estilo lo que hace es mostrar las dos primeras lineas de un texto y si es mayor a ese limite entonces pone "..." -->
                                descripcion: {{$producto->descripcion}}
                            </p>
                        </div>
                        <input class="text-white/60 hover:text-white/90 flex justify-end" type="submit" value="comprar">
                    </a>
                </div>
            @empty
                <p>no hay productos</p>
            @endforelse
    </div>
    {{ $productos->links() }}
</div>
