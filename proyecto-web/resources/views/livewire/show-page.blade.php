<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex gap-10 py-12">
    <div class=" w-64">
        <ul class="flex py-15">
            <li class="rounded-md items-center justify-center mb-4 w-full font-semibold">
            <a class="mb-2 py-2 rounded-md flex justify-center bg-gradient-to-r from-pink-400 to-yellow-600">Categorias</a>

            @forelse ($categories as $category)
                <a href="#"  class="mb-2 p-2 rounded-md flex bg-cyan-600 items-center gap-2 text-white/60 hover:text-white font-semibold text-xs capitalize">
                    <span class= "w-2 h-2 rounded-full" style= "background-color: {{$category->color}};"></span>
                    {{$category->name}}
                </a>
            @empty
                <p>No hay categorias</p>
            @endforelse

            </li>
        </ul>
    </div>

    <div class ="w-full flex bg-slate-200 rounded-md">
        <div class="w-full gap-4 grid  grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 px-4 py-2">
            <div  class="bg-red-500 rounded-md">
                <a href="" class="bg-red-500 gap-4" >
                    <img src="" alt="Foto" class="h8">
                    <p>Precio</p>
                    <p>Name del producto</p>
                    <p>descripcion del producto</p>
                </a>
            </div>
            <div  class="bg-red-500 gap-4 rounded-md">
                <a href="" class="bg-red-500 gap-4" >
                    <img src="" alt="Foto" class="h8">
                    <p>Precio</p>
                    <p>Name del producto</p>
                    <p>descripcion del producto</p>
                </a>
            </div>
            <div  class="bg-red-500 gap-4 rounded-md">
                <a href="" class="bg-red-500 gap-4" >
                    <img src="" alt="Foto" class="h8">
                    <p>Precio</p>
                    <p>Name del producto</p>
                    <p>descripcion del producto</p>
                </a>
            </div>
            <div  class="bg-red-500 gap-4 rounded-md">
                <a href="" class="bg-red-500 gap-4" >
                    <img src="" alt="Foto" class="h8">
                    <p>Precio</p>
                    <p>Name del producto</p>
                    <p>descripcion del producto</p>
                </a>
            </div>
            <div  class="bg-red-500 gap-4 rounded-md">
                <a href="" class="bg-red-500 gap-4" >
                    <img src="" alt="Foto" class="h8">
                    <p>Precio</p>
                    <p>Name del producto</p>
                    <p>descripcion del producto</p>
                </a>
            </div>
            <div  class="bg-red-500 gap-4 rounded-md">
                <a href="" class="bg-red-500 gap-4" >
                    <img src="" alt="Foto" class="h8">
                    <p>Precio</p>
                    <p>Name del producto</p>
                    <p>descripcion del producto</p>
                </a>
            </div>
            
        </div>
    </div>
    
    
</div>
