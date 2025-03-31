@extends('layouts.main')

@section('title', $title)

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Editar imagen de Producto</h1>
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
                            <h5 class="card-title">Editar imagen de producto del stock</h5>
                            <hr>
                            <form action="{{ route('products.update.image', $item->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <label for="imagen">Selecciona la nueva imagen</label>
                                <input type="file" name="imagen" id="imagen" class="form-control">
                                <hr>
                                <button class="btn btn-warning">Actualizar imagen</button>
                                <a href="{{ route('products') }}" class="btn btn-info">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
