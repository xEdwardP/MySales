@extends('layouts.main')

@section('title', $title)

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Editar Producto</h1>
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
                            <h5 class="card-title">Editar Producto</h5>
                            <form action="{{ route('products.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <label for="category_id">Categoria</label>
                                <select name="category_id" id="category_id" class="form-select" required>
                                    <option value="">Selecciona una categoria</option>
                                    @foreach ($categories as $category)
                                        @if ($item->category_id == $category->id)
                                            <option selected value="{{ $category->id }}"> {{ $category->name }}
                                            </option>
                                        @else
                                            <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                        @endif
                                    @endforeach
                                </select>

                                <label for="supplier_id">Proveedor</label>
                                <select name="supplier_id" id="supplier_id" class="form-select" required>
                                    <option value="">Selecciona un proveedor</option>
                                    @foreach ($suppliers as $supplier)
                                        @if ($item->supplier_id == $supplier->id)
                                            <option selected value="{{ $supplier->id }}"> {{ $supplier->name }}
                                            </option>
                                        @else
                                            <option value="{{ $supplier->id }}"> {{ $supplier->name }} </option>
                                        @endif
                                    @endforeach
                                </select>

                                <label for="name">Nombre del producto</label>
                                <input type="text" class="form-control" required name="name" id="name"
                                    value="{{ $item->name }}">

                                <label for="description">Descripción</label>
                                <textarea name="description" id="description" cols="20" rows="5" class="form-control">{{ $item->description }}</textarea>

                                <label for="selling_price">Precio de venta</label>
                                <input type="text" id="selling_price" name="selling_price" class="form-control"
                                    value="{{ $item->selling_price }}" required>

                                <button class="btn btn-warning mt-3">Actualizar</button>
                                <a href="{{ route('products') }}" class="btn btn-info mt-3">
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
