@extends('layouts.main')

@section('title', $title)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Bienvenido, {{ Auth::user()->name }}!</h5>

                            <div class="row">
                                <div class="col">
                                    <h4>Total de ventas: L {{ number_format($totalSales, 2) }}</h4>
                                </div>
                                <div class="col">
                                    <h4>Cantidad de Ventas: {{ $quantitySales }}</h4>
                                </div>
                                <div class="col">
                                    <h4>Productos con bajo stock: {{ count($productsMinStock) }}</h4>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <h3>Ultimas Ventas</h3>
                                    <ul>
                                        @foreach ($recentProducts as $item)
                                            <li>Venta # {{ $item->id }} - L {{ number_format($item->total, 2) }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
