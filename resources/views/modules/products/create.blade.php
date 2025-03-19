@extends('layouts.main')

@section('title', $title)

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Registrar Nuevo Producto</h1>
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
                            <h5 class="card-title">Datos del Producto</h5>
                            <form action="{{ route('products.store') }}" method="POST">
                                @csrf
                                <label for="category_id">Categoria</label>
                                <select name="category_id" id="category_id" class="form-select" required>
                                    <option value="">Selecciona una categoria</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                    @endforeach
                                </select>

                                <label for="supplier_id">Proveedor</label>
                                <select name="supplier_id" id="supplier_id" class="form-select" required>
                                    <option value="">Selecciona un proveedor</option>
                                    @foreach ($suppliers as $item)
                                        <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                    @endforeach
                                </select>

                                <label for="name">Nombre del producto</label>
                                <input type="text" class="form-control" required name="name" id="name">

                                <label for="description">Descripción</label>
                                <textarea name="description" id="description" cols="20" rows="5" class="form-control"></textarea>

                                <button class="btn btn-success mt-3">Guardar</button>
                                <a href="{{ route('products') }}" class="btn btn-warning mt-3">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
