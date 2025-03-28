@extends('layouts.main')

@section('title', $title)

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Eliminar Compra de Productos</h1>
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
                            <h5 class="card-title">Eliminar Compra</h5>
                            <hr>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">Usuario</th>
                                        <th class="text-center">Producto</th>
                                        <th class="text-center">Cantidad</th>
                                        <th class="text-center">Precio de compra</th>
                                        <th class="text-center">Total compra</th>
                                        <th class="text-center">Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        <td>{{ $items->user_name }}</td>
                                        <td>{{ $items->product_name }}</td>
                                        <td>{{ $items->quantity }}</td>
                                        <td>L {{ $items->purchase_price }}</td>
                                        <td>L {{ $items->purchase_price * $items->quantity }}</td>
                                        <td>{{ $items->created_at }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <form action="{{ route('purchases.destroy', $items->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="text" value="{{ $items->product_id }}" name="product_id" hidden>
                                <button class="btn btn-danger mt-3">Eliminar Compra</button>
                                <a href="{{ route("purchases") }}" class="btn btn-info mt-3">
                                    Cancelar
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
