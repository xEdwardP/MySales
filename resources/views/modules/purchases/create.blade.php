@extends('layouts.main')

@section('title', $title)

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Registrar Nueva Compra</h1>
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
                            <h5 class="card-title">Compra nueva de : {{ $item->name }}</h5>
                            <form action="{{ route('purchases.store') }}" method="POST">
                                @csrf
                                <input type="text" value="{{ $item->id }}" id="id" name="id" hidden>
                                <label for="quantity">Cantidad del producto</label>
                                <input type="text" class="form-control" required name="quantity" id="quantity">
                                <label for="purchase_price">Precio de compra</label>
                                <input type="text" id="purchase_price" name="purchase_price" class="form-control"
                                    required>
                                <button class="btn btn-primary mt-3">Comprar</button>
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
