@extends('layouts.main')

@section('title', $title)

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Reporte de Productos</h1>
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
                            <h5 class="card-title">Administrar Reportes De Productos</h5>
                            <p>
                                Tipos de reportes del sistema para productos.
                            </p>
                            <div class="row">
                                <div class="col text-end">
                                    <a href="{{route('products_report.change_stock')}}" class="btn btn-primary btn-sm">
                                        Productos con cantidad 1 o 0
                                    </a>
                                </div>
                            </div>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr class="text-center">
                                            <td>{{ $item->category_name }}</td>
                                            <td>{{ $item->supplier_name }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td class="text-center">
                                                @if ($item->imagen_product)
                                                <img src="{{ asset('storage/' . $item->imagen_product) }}" alt="" width="60px" height="60px">
                                                <a href="{{ route('products.show.image', $item->imagen_id) }}" 
                                                    class="badge rounded-pill bg-warning text-dark">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                  </a>
                                                @else
                                                    <span class="text-muted">Sin Imagen</span>
                                                    {{-- Pendiente de corregir --}}
                                                    {{-- <a href="" 
                                                        class="badge rounded-pill bg-warning text-dark py-2 px-1">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                        Agregar imagen
                                                      </a> --}}
                                                @endif
                                            </td>
                                            <td>{{ $item->description }}</td>
                                            <td class="text-center">{{ $item->quantity }}</td>
                                            <td class="text-center">L {{ $item->purchase_price }}</td>
                                            <td class="text-center">L {{ $item->selling_price }}</td>
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