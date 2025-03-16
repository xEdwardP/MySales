@extends('layouts.main')

@section('title', $title)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Editar Usuario</h1>
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
                            <h5 class="card-title">Editar Usuario</h5>
                            <form action="{{ route('users.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <label for="name">Nombre del usuario</label>
                                <input type="text" class="form-control" required name="name" id="name"
                                    value="{{ $item->name }}">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" required
                                    value="{{ $item->email }}">
                                <label for="rol">Rol de usuario</label>
                                <select name="rol" id="rol" class="form-select">
                                    <option value="">Selecciona el rol</option>
                                    @if ($item->rol == 'admin')
                                        <option value="admin" selected>Admin</option>
                                        <option value="cajero">Cajero</option>
                                    @else
                                        <option value="admin">Admin</option>
                                        <option value="cajero" selected>Cajero</option>
                                    @endif
                                </select>
                                <button class="btn btn-warning mt-3">Actualizar</button>
                                <a href="{{ route('users') }}" class="btn btn-info mt-3">
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
