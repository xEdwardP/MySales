@extends('layouts.main')

@section('title', $title)

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Editar Categoria</h1>
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
                            <h5 class="card-title">Datos de la Categoria</h5>
                            <form action="{{ route('categories.update', $item->id) }}" method="POST">
                                @csrf
                                @method("PUT")
                                <label for="category_name">Nombre:</label>
                                <input type="text" id="category_name" class="form-control" required name="name", value="{{$item->name}}">
                                <button class="btn btn-warning mt-3">Actualizar</button>
                                <a href="{{ route('categories') }}" class="btn btn-info mt-3">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
