@extends('template')

@section('titulo','Listado de Productos')

@section('encabezado')
	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Listado Productos</h1>
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
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
          	<div class="text-right">
          		<a class="btn btn-success" href="{{ route('productos.create') }}"><i class="fas fa-plus"></i></a>
          	</div>
            <table class="table table-striped table-hover">
            	<thead>
            		<tr>
            			<th>Nombre</th>
            			<th>Cantidad</th>
            			<th>Valor compra</th>
            			<th>Valor venta</th>
            			<th>Descripcion</th>
            			<th>Proveedor</th>
            			<th>Opciones</th>
            		</tr>
            	</thead>
            	<tbody>
            		@foreach($productos as $producto)
						<tr>
							<td>{{$producto->nombre}}</td>
							<td>{{$producto->cantidad}}</td>
							<td>${{number_format($producto->valor_compra,0,',','.')}}</td>
							<td>${{number_format($producto->valor_venta,0,',','.')}}</td>
							<td>{{$producto->descripcion}}</td>
							<td>{{$producto->proveedor_id}}</td>
							<td>
								<form action="{{ route('productos.destroy',$producto->id) }}" method="post">
									@csrf
									<a class="btn btn-info" href="{{ route('productos.edit',$producto->id) }}"><i class="fas fa-edit"></i></a>
									<input type="hidden" name="_method" value="delete">
									<button class="btn btn-danger" onclick="return confirm('Eliminar producto?')"><i class="fas fa-trash"></i></button>
								</form>
							</td>
						</tr>
            		@endforeach
            	</tbody>
            </table>

          </div>
        </div>
      </div>
    </div>

@endsection