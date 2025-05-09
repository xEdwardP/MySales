@extends('layouts.main')

@section('title', $title)

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Eliminar Productos</h1>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Eliminar Producto</h5>
                            <p>
                                Una vez eliminado el proveedor no podra ser recuperado.
                            </p>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">Categoria</th>
                                        <th class="text-center">Proveedor</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Imagen</th>
                                        <th class="text-center">Descripcion</th>
                                        <th class="text-center">Cantidad</th>
                                        <th class="text-center">Venta</th>
                                        <th class="text-center">Compra</th>
                                        <th class="text-center">Activo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        <td>{{ $items->category_name }}</td>
                                        <td>{{ $items->supplier_name }}</td>
                                        <td>{{ $items->name }}</td>
                                        <td>Sin Foto que mostrar</td>
                                        <td>{{ $items->description }}</td>
                                        <td>{{ $items->quantity }}</td>
                                        <td>{{ $items->purchase_price }}</td>
                                        <td>{{ $items->selling_price }}</td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="{{ $items->id }}"
                                                    {{ $items->active ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <form action="{{ route('products.destroy', $items->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Eliminar producto</button>
                                <a href="{{ route('products') }}" class="btn btn-info">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
