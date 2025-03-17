@extends('layouts.main')

@section('title', $title)

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Editar Proveedor</h1>
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
                            <h5 class="card-title">Datos del Proveedor</h5>
                            <form action="{{ route('suppliers.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" required name="name" id="name" value="{{ $item->name }}">
                                <label for="phone">Teléfono</label>
                                <input type="text" class="form-control" required name="phone" id="phone" value="{{ $item->phone }}">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" required name="email" id="email" value="{{ $item->email }}">
                                <label for="cp">Código Postal</label>
                                <input type="text" class="form-control" required name="cp" id="cp" value="{{ $item->cp }}">
                                <label for="website">Sitio Web</label>
                                <input type="text" class="form-control" required name="website" id="website" value="{{ $item->website }}">
                                <label for="notes">Notas</label>
                                <textarea name="notes" id="notes" cols="30" rows="10" class="form-control">{{ $item->notes }}</textarea>
                                <button class="btn btn-warning mt-3">Actualizar</button>
                                <a href="{{ route('suppliers') }}" class="btn btn-info mt-3">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
