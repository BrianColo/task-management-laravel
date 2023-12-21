@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Proyectos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Fecha Inicio</th>
                            <th scope="col">Accion</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($dataProyect as $proyect)
                            <tr>
                              <th scope="row">{{$proyect->id}}</th>
                              <th scope="row">{{$proyect->name}}</th>
                              <th scope="row">{{$proyect->description}}</th>
                              <th scope="row">{{$proyect->status_id}}</th>
                              <th scope="row">{{$proyect->date_init}}</th>
                              <th scope="row">
                                <a class="btn btn-outline-primary" href="{{ route('edit_proyect',$proyect->id) }}" role="button">
                                  {{ __('Editar') }}
                                </a>
                                <a class="btn btn-outline-danger" href="{{ route('delete_proyect',$proyect->id) }}" role="button">
                                  {{ __('Eliminar') }}
                                </a>
                              </th>
                            </tr>                                    
                          @endforeach
                        </tbody>
                      </table>
                      <a class="btn btn-primary btn-lg" href="{{ route('create_proyect') }}" role="button">
                        {{ __('Agregar Proyecto') }}
                      </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(function() {
            $('#contenedor').change(() => {
                buscarLotes('#contenedor', '#sucursal', '#lote');
            });
        });

        function _mostrarMensajes(msj,type, title, time=3500) {
            Swal.fire({
            icon: type,
            html:msj,
            title: title,
            showConfirmButton: false,
            timer: time
            });
        }
    </script>
@endsection