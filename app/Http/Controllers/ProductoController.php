<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        //Dentro de Index acomodaremos la visualizacion principal
        return view("productosIndex", compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agregarProducto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required | max:255',
            'precio' => 'required | integer | min:0',
            'categoria' => 'required | max:255'
        ]);

        //Para enviar los datos ya validados al create
        Producto::create($request->all());

        //Redireccionando para no ver pantalla vacia
        return redirect('/producto');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('productosShow', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }

    public function formValidation(Request $request)
    {
        //Validacion de datos
        $request->validate([
            'nombreProducto' => 'required|max:255|min:3',
            'precioProducto' => 'required|max:10|min:3',
            'categoriaProducto' => 'required|max:255|min:3'
        ]);
        
        //insertar en DB
        //          PROTOTIPO
        /*
        DB::table('contactos')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'comentario' => $request->comentario,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        */

        return redirect('/agregarProducto');
    }
}
