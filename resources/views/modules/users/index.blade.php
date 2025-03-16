@extends('layouts.main')

@section('title', $title)

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Usuarios</h1>
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
                            <h5 class="card-title">Usuarios Registrados</h5>
                            {{-- <p>Descripcion</p> --}}
                            <a href="" class="btn btn-primary">
                                <i class="fa-solid fa-user-plus"></i> Nuevo Usuario
                            </a>
                            <hr>
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Rol</th>
                                        <th class="text-center">Cambiar Clave</th>
                                        <th class="text-center">Activo</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr class="text-center">
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->rol }}</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-secondary">
                                                    <i class="fa-solid fa-user-lock"></i> Actualizar
                                                </a>
                                            </td>
                                            <td>
                                                @if ($item->active)
                                                    <span class="badge bg-success">Activo</span>
                                                @else
                                                    <span class="badge bg-warning text-dark">Inactivo</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-warning btn-sm">
                                                    <i class="fa-solid fa-user-pen"></i> Editar
                                                </a>
                                                <a href="#" class="btn btn-danger btn-sm">
                                                    <i class="fa-solid fa-user-gear"></i> Borrar
                                                </a>
                                            </td>
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
