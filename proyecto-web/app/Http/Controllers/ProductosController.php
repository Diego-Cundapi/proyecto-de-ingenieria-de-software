<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categories::all(); // Obtén todas las categorías
        return view('productos.create', compact('categorias'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:45',
            'categories_id' => 'required|exists:categories,id',
            'modelo' => 'required|integer',
            'marca' => 'required|string|max:20',
            'precio' => 'required|numeric',
            'clave' => 'required|string|max:20',
            'descripcion' => 'required|string|max:100',
            'imagen' => 'required|image|mimes:jpg,jpeg,png|max:2048', // max 2MB
            'disponible' => 'required|integer',
        ]);

        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('imagenes/productos'), $imageName);
            $imagePath = 'imagenes/productos/' . $imageName;

        $producto = Producto::create([
            'nombre' => $validatedData['nombre'],
            'categories_id' => $validatedData['categories_id'],
            'modelo' => $validatedData['modelo'],
            'marca' => $validatedData['marca'],
            'precio' => $validatedData['precio'],
            'clave' => $validatedData['clave'],
            'descripcion' => $validatedData['descripcion'],
            'imagen' => $imagePath,
            'disponible' => $validatedData['disponible'],
        ]);

        return redirect()->route('dashboard')->with('success', 'Producto creado exitosamente');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        $categorias = Categories::all();
        return view('productos.edit', compact('producto','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:45',
            'categories_id' => 'required|exists:categories,id',
            'modelo' => 'required|integer',
            'marca' => 'required|string|max:20',
            'precio' => 'required|numeric',
            'clave' => 'required|string|max:20',
            'descripcion' => 'required|string|max:100',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', 
            'disponible' => 'required|integer',
        ]);

        // Manejo de la imagen
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($producto->imagen && Storage::exists($producto->imagen)) {
                Storage::delete($producto->imagen);
            }

            // Almacenar la nueva imagen y obtener la ruta
            $image = $request->file('imagen');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('imagenes/productos'), $imageName);
            $imagePath = 'imagenes/productos/' . $imageName;

            // Actualizar la ruta de la imagen en los datos validados
            $validatedData['imagen'] = $imagePath;
        }

        // Actualizar el producto con los datos validados
        $producto->update($validatedData);

        // Redirigir a una ruta específica con un mensaje de éxito
        return redirect()->route('dashboard')->with('success', 'Producto actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Buscar el producto por su ID
        $producto = Producto::find($id);

        if ($producto) {
            // Eliminar la imagen asociada al producto si existe
            if ($producto->imagen && Storage::exists($producto->imagen)) {
                Storage::delete($producto->imagen);
            }
            
            // Eliminar el producto de la base de datos
            $producto->delete();

            // Redirigir a una ruta específica con un mensaje de éxito
            return redirect()->route('dashboard')->with('success', 'Producto eliminado exitosamente');
        } 
    }
}
