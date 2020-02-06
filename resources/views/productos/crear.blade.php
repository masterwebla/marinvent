@extends('template')

@section('titulo','Crear Productos')

@section('encabezado')
	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Crear Productos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Productos</a></li>
              <li class="breadcrumb-item active">Listado</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection

@section('contenido')
	<div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
              <form action="{{ route('productos.store') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" id="nombre" placeholder="Nombre del producto" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="cantidad">Cantidad</label>
                  <input type="number" name="cantidad" id="cantidad" placeholder="Cantidad" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="valor_compra">Valor compra</label>
                  <input type="number" name="valor_compra" id="valor_compra" placeholder="Valor de compra" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="valor_venta">Valor venta</label>
                  <input type="number" name="valor_venta" id="valor_venta" placeholder="Valor de venta" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="descripcion">Descripcion</label>
                  <textarea name="descripcion" id="descripcion" placeholder="Descripcion" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                  <label for="proveedor_id">Proveedor</label>
                  <select name="proveedor_id" id="proveedor_id" class="form-control" required>
                    <option value="">Seleccionar proveedor</option>
                    @foreach($proveedores as $proveedor)
                      <option value="{{$proveedor->id}}">{{$proveedor->razon_social}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <button class="btn btn-success">Guardar</button>
                  <a class="btn btn-danger" href="{{ route('productos.index') }}">Cancelar</a>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>

@endsection