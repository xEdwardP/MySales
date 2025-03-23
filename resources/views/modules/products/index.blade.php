@extends('layouts.main')

@section('title', $title)

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Productos</h1>
            {{-- <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Ventas</li>
            </ol>
        </nav> --}}
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Administar Productos y Stock</h5>
                            <p>
                                Admnistrar el stock del sistema.
                            </p>
                            <a href="{{ route('products.create') }}" class="btn btn-primary">
                                <i class="fa-solid fa-circle-plus"></i>
                                <span class="d-none d-md-inline">Nuevo Producto</span>
                            </a>
                            <hr>
                            <table class="table datatable">
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
                                        <th class="text-center">Comprar</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr class="text-center">
                                            <td>{{ $item->category_name }}</td>
                                            <td>{{ $item->supplier_name }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>Sin Foto que mostrar</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->selling_price }}</td>
                                            <td>{{ $item->purchase_price }}</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="{{ $item->id }}"
                                                        {{ $item->active ? 'checked' : '' }}>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{route('purchases.create', $item->id)}}" class="btn btm-sm btn-info">Comprar</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('products.edit', $item->id) }}"
                                                    class="btn btm-sm btn-warning">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a href="{{ route('products.show', $item->id) }}"
                                                    class="btn btm-sm btn-danger">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
    <script>
        function change_state(id, state) {
            $.ajax({
                type: "GET",
                url: "products/change-state/" + id + "/" + state,
                success: function(response) {
                    if (response == 1) {
                        Swal.fire({
                            title: 'Exito!',
                            text: 'Cambio de estado exitoso!',
                            icon: 'success',
                            confirmButtonText: 'Aceptar'
                        });
                        
                    } else {
                        Swal.fire({
                            title: 'Fallo!',
                            text: 'No se llevo a cabo el cambio!',
                            icon: 'error',
                            confirmButtonText: 'Aceptar'
                        });
                    }
                }
            });
        }

        $(document).ready(function() {
            $('.form-check-input').on("change", function() {
                let id = $(this).attr("id");
                let state = $(this).is(":checked") ? 1 : 0;
                change_state(id, state)
            });
        });
    </script>
@endpush
