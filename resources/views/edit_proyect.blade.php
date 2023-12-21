@extends('layouts.app')

@section('content')
{!! Form::model($dataProyect, ['route' => ['update_proyect', $dataProyect->id] , 'method' => 'PUT']) !!}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Proyectos > Editar</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="name_proyect">Nombre</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Nombre" value="{{$dataProyect->name}}" aria-label="NameProyect" aria-describedby="name_proyect">
                          </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="desc_proyect">Descripción</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Descripcion" value="{{$dataProyect->description}}" aria-label="DescProyect" aria-describedby="desc_proyect">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="desc_proyect">Estado</span>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="statusRadioActive" value="1" {{$propCheckEnable}}>
                                <label class="form-check-label" for="statusRadio">Activo</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="statusRadioDisable" value="0" {{$propCheckDisable}}>
                                <label class="form-check-label" for="statusRadio">Inactivo</label>
                              </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">Fecha Inicio</span>
                            </div>
                            <input type="date" class="form-control" placeholder="Fecha Inicio Proyecto" value="{{$dataProyect->date_init}}" aria-label="FechaIni" aria-describedby="basic-addon1">
                          </div>
                    </div>
                      {!! Form::submit('Guardar', ['class' => 'btn btn-primary btn-lg Actualizar', 'id' => 'updateButton']) !!}
                      {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(function() {
            $('#updateButton').click(() => {
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