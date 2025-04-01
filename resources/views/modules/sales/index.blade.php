@extends('layouts.main')

@section('title', $title)

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Venta de productos</h1>
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
                            <h5 class="card-title">Crear una nueva venta</h5>
                            <p>
                                Crear ventas de los productos existentes.
                            </p>
                            <hr>
                            <table class="table table-condensed" id="cartProducts">
                                <thead>
                                    <tr>
                                        <th class="text-center">Codigo</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Cantida</th>
                                        <th class="text-center">Precio</th>
                                        <th class="text-center">Agregar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr class="text-center">
                                            <td>{{ $item->code }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td class="text-center">{{ $item->quantity }}</td>
                                            <td class="text-center">L {{ $item->selling_price }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('sales.add.cart', $item->id) }}"
                                                    class="btn btn-success">Agregar</a>
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

        {{-- Nuevo --}}
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Carrito de compras</h5>

                            @if (session('cartItems'))
                                <table class="table table-sm">
                                    <thead>
                                        <th class="text-center">Codigo</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Cantida</th>
                                        <th class="text-center">Precio</th>
                                        <th class="text-center">Quitar</th>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                        @endphp

                                        @foreach (session('cartItems') as $item)
                                            @php
                                                $totalProducts = $item['quantity'] * $item['price'];
                                                $total += $totalProducts;
                                            @endphp
                                            <tr>
                                                <td class="text-center">{{ $item['code'] }}</td>
                                                <td class="text-center">{{ $item['name'] }}</td>
                                                <td class="text-center">{{ $item['quantity'] }}</td>
                                                <td class="text-center">L {{ $item['price'] }}</td>
                                                <th class="text-center">
                                                    <a href="{{ route('sales.remove.cart', $item['id']) }}"
                                                        class="btn btn-danger btn-sm">Quitar</a>
                                                </th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="text-center">Total General</td>
                                            <td class="text-center bg-secondary text-white"><strong>L {{ $total }}</strong></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <hr>
                                <a href="#" class="btn btn-primary">Realizar venta</a>
                                <a href="{{ route('sales.delete.cart') }}" class="btn btn-danger">Borrar carrito</a>
                            @else
                                <p>No tengo contenido</p>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#cartProducts').DataTable({
                "pageLength": 2,
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
        })
    </script>
@endpush
