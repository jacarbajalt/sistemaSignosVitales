@extends('adminlte::page')

@section('template_title')
    Expediente
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h2>{{ __('Expedientes') }}</h2>
                            </span>

                             <div class="float-right">
                                <a href="{{ route('expedientes.create') }}" class="btn btn-primary">
                                  {{ __('Agregar Nuevo Expediente') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        
                                        
										<th>No. de Expediente</th>
										<th>Paciente</th>
										<th>Doctor</th>
										<th>Descripcion</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expedienteArray as $expediente)
                                        <tr>
                                            
                                            
											<td>{{ $expediente['noExpediente'] }}</td>
                                            
                                            @foreach ($pacientesArray as $paciente)
                                                @if ($expediente['idPaciente'] == $paciente['id'])
                                                    <td>{{ $paciente['nombre'] }}</td>
                                                @endif
                                            @endforeach
                                            
                                            @foreach ($doctoresArray as $doctor)
                                                @if ($expediente['idDoctor'] == $doctor['id'])
                                                    <td>{{ $doctor['nombre'] }}</td>
                                                @endif
                                            @endforeach
											<td>{{ $expediente['descripcion'] }}</td>

                                            <td>
                                                <form action="{{ route('expedientes.destroy',$expediente['id']) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('expedientes.show',$expediente['id']) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('expedientes.edit',$expediente['id']) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                
                
            </div>
        </div>
    </div>
@endsection
