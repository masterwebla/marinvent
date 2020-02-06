<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Proveedor;

class ProductosController extends Controller
{
    //Función para listar los productos
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index',compact('productos'));
    }

    //Función para abrir el formulario para crear un producto
    public function create()
    {
        $proveedores = Proveedor::all();
        return view('productos.crear',compact('proveedores'));
    }

    //Función para guardar un producto
    public function store(Request $request)
    {
        //Validar los datos
        $request->validate([
            'nombre'=>'required|max:100',
            'cantidad'=>'required|numeric',
            'valor_compra'=>'required|numeric',
            'valor_venta'=>'required|numeric',
            'descripcion'=>'required',
            'proveedor_id'=>'required',
        ]);

        //Guardarlos en la Base de Datos
        $productos = Producto::create([
            'nombre'=>$request->nombre,
            'cantidad'=>$request->cantidad,
            'valor_compra'=>$request->valor_compra,
            'valor_venta'=>$request->valor_venta,
            'descripcion'=>$request->descripcion,
            'proveedor_id'=>$request->proveedor_id
        ]);

        return redirect()->route('productos.index');

    }

    //Para mostrar un producto
    public function show($id)
    {
        //
    }

    //Función para abrir el formulario para editar un producto
    public function edit($id)
    {
        $producto = Producto::find($id);
        $proveedores = Proveedor::all();
        return view('productos.editar',compact('producto','proveedores'));
    }

    //Función para actualizar un producto
    public function update(Request $request, $id)
    {
        
        //Validar los datos
        $request->validate([
            'nombre'=>'required|max:100',
            'cantidad'=>'required|numeric',
            'valor_compra'=>'required|numeric',
            'valor_venta'=>'required|numeric',
            'descripcion'=>'required',
            'proveedor_id'=>'required',
        ]);

        $producto = Producto::find($id);
        $producto->nombre = $request->nombre;
        $producto->cantidad = $request->cantidad;
        $producto->valor_compra = $request->valor_compra;
        $producto->valor_venta = $request->valor_venta;
        $producto->descripcion = $request->descripcion;
        $producto->proveedor_id = $request->proveedor_id;
        $producto->save();

        return redirect()->route('productos.index');
    }

    //Función para borrar un producto
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();

        return redirect()->route('productos.index');
    }
}
