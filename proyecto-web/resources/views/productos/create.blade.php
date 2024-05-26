@extends('productos._templateForm')

@section('content')
{{$errors}}
<div class="flex justify-center py-4 px-4 bg-slate-200 rounded-md" style="width:50%; margin-left:25%;">
    <form action="{{route('productos.store')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <label>Nombre:<br> <span class="text-xs text-red-600">@error('nombre') {{ $message }}  @enderror</span></label>
            <input type="text" style="color:black" name='nombre' value="{{ old('nombre') }}">

            <label >Categoria: <br> <span class="text-xs text-red-600">@error('categories_id') {{ $message }}  @enderror</span></label>
            <select style="color:black" name="categories_id" id="categories_id">
                @forelse($categorias as $categoria)
                    <option style="color:black" value="{{ $categoria->id }}">
                        {{ $categoria->name }}
                    </option>
                @empty
                    <option style="color:black" value="">Sin categorías</option>
                @endforelse
            </select>

            <label >Modelo: <br> <span class="text-xs text-red-600">@error('modelo') {{ $message }}  @enderror</span></label>
            <input type="text" style="color:black" name='modelo' value="{{ old('modelo') }}">

            <label >Marca:<br> <span class="text-xs text-red-600">@error('marca') {{ $message }}  @enderror</span></label>
            <input type="text" style="color:black" name='marca' value="{{ old('marca') }}">

            <label >Precio: <br><span class="text-xs text-red-600">@error('precio') {{ $message }}  @enderror</span></label>
            <input type="text" style="color:black" name='precio' value="{{ old('precio') }}">

            <label >Clave: <br><span class="text-xs text-red-600">@error('clave') {{ $message }}  @enderror</span></label>
            <input type="text" style="color:black" name='clave' value="{{ old('clave') }}">

            <label >Disponible: <br><span class="text-xs text-red-600">@error('disponible') {{ $message }}  @enderror</span></label>
            <input type="text" style="color:black" name='disponible' value="{{ old('disponible') }}">

            <label >Descripción: <br><span class="text-xs text-red-600">@error('descripcion') {{ $message }}  @enderror</span></label>
            <input type="text" style="color:black" name='descripcion' value="{{ old('descripcion') }}">

            <label >Imagen:<br> <span class="text-xs text-red-600">@error('imagen') {{ $message }}  @enderror</span></label>
            <input type="file" style="color:black" name="imagen">
            
            
            <a href="{{ route('dashboard') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded mt-4 inline-flex items-center justify-center">Regresar</a>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded mt-4">Enviar</button>

        </div>
    </form>
</div>
@endsection
