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
                                    </thead>
                                    <tbody>
                                        @foreach (session('cartItems') as $item)
                                            <tr>
                                                <td class="text-center">{{ $item['code'] }}</td>
                                                <td class="text-center">{{ $item['name'] }}</td>
                                                <td class="text-center">{{ $item['quantity'] }}</td>
                                                <td class="text-center">L {{ $item['price'] }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                                <a href="#" class="btn btn-primary">Realizar compra</a>
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
                "pageLength": 2
            });
        })
    </script>
@endpush
