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
                            <a href="{{ route('users.create') }}" class="btn btn-primary">
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
                                        <th class="text-center">Editar</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-users">
                                    @include('modules.users.tbody')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
    <script>
        function refresh_tbody(){
            $.ajax({
                type : "GET",
                url : "{{ route('users.tbody') }}",
                success : function(response){
                    // console.log(response);
                }
            });
        }

        function change_state(id, state){
            $.ajax({
                type: "GET",
                url : "users/change-state/" + id + "/" + state,
                success: function(response){
                    if (response == 1){
                        alert("Se ha actualizado el estado exitosamente");
                        refresh_tbody();
                    }
                }
            });
        }

        $(document).ready(function(){
         $('.form-check-input').on("change", function(){
           let id = $(this).attr("id");
           let state = $(this).is(":checked") ? 1 : 0;
           change_state(id, state)
         });
       });
    </script>
@endpush
