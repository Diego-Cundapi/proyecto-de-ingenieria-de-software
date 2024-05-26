@extends('productos._templateForm')

@section('content')

{{$errors}}
<div class="flex justify-center py-4 px-4 bg-slate-200 rounded-md" style="width:50%; margin-left:25%;">
    <form class="" action="{{route('productos.update',['producto' => $producto->id])}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-2 gap-4">
            <label for="">Nombre:  <br> <span class="text-xs text-red-600">@error('nombre') {{ $message }}  @enderror</label>
            <input type="text" style="color:black" name='nombre' value="{{old('nombre',$producto->nombre)}}">


            <label for="">Categoria  <br> <span class="text-xs text-red-600">@error('categories_id') {{ $message }}  @enderror</label>
            <select  style="color:black" name="categories_id" id="">
                @forelse($categorias as $categoria)
                    <option style="color:black"value="{{ $categoria->id }} " @selected($producto->categories_id==$categoria->id)>
                    {{ $categoria->name }}
                    </option>
                @empty

                @endforelse
            </select>

            <label for="">modelo:  <br> <span class="text-xs text-red-600">@error('modelo') {{ $message }}  @enderror</label>
            <input type="text" style="color:black" name='modelo' value="{{old('modelo',$producto->modelo)}}">

            <label for="">marca:  <br> <span class="text-xs text-red-600">@error('marca') {{ $message }}  @enderror</label>
            <input type="text" style="color:black" name='marca' value="{{old('marca',$producto->marca)}}">

            <label for="">precio:  <br> <span class="text-xs text-red-600">@error('precio') {{ $message }}  @enderror</label>
            <input type="text" style="color:black" name='precio' value="{{old('precio',$producto->precio)}}">

            <label for="">clave:  <br> <span class="text-xs text-red-600">@error('clave') {{ $message }}  @enderror</label>
            <input type="text" style="color:black" name='clave' value="{{old('clave',$producto->clave)}}">

            <label >Disponible:  <br> <span class="text-xs text-red-600">@error('disponible') {{ $message }}  @enderror <br><span class="text-xs text-red-600">@error('disponible') {{ $message }}  @enderror</span></label>
            <input type="text" style="color:black" name='disponible' value="{{ old('disponible',$producto->disponible) }}">

            <label for="">descripcion:  <br> <span class="text-xs text-red-600">@error('descripcion') {{ $message }}  @enderror</label>
            <input type="text" style="color:black" name='descripcion' value="{{old('descripcion',$producto->descripcion)}}">

            <label for="">imagen:  <br> <span class="text-xs text-red-600">@error('imagen') {{ $message }}  @enderror</label>
            <img class="w-24 h-20" src="{{asset($producto->imagen)}}" alt="">
            <input type="file" style="color:black" name="imagen" >
            <br>

            <a href="{{ route('dashboard') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded mt-4 inline-flex items-center justify-center">Regresar</a>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded mt-4">Enviar</button>



        </div>
        
    </form>
</div>