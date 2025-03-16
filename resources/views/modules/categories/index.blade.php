@extends('layouts.main')

@section('title', $title)

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Categorias</h1>
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
                <h5 class="card-title">Categorias Registradas</h5>
                {{-- <p>Descripcion</p> --}}
                <a href="{{route('categories.create')}}" class="btn btn-primary">
                  <i class="fa-solid fa-circle-plus"></i> Nueva Categoria
                </a>
                <hr>
                <table class="table datatable">
                  <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>
                            <a href="{{route("categories.edit", $item->id)}}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                            <a href="{{route("categories.show", $item->id)}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Eliminar</a>
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