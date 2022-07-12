@extends('adminlte::page')

@section('template_title')
    {{ $expediente->name ?? 'Show Expediente' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Datos de Expediente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('expedientes.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>No. de Expediente:</strong>
                            {{ $expedienteArray['noExpediente'] }}
                        </div>
                        <div class="form-group">
                            <strong>Paciente:</strong>
                            @foreach ($pacientesArray as $paciente)
                                @if ($expedienteArray['idPaciente'] == $paciente['id'])
                                    {{ $paciente['nombre'].' '.$paciente['apPaterno'].' '.$paciente['apMaterno'] }}
                                @endif
                            @endforeach
                            
                        </div>
                        <div class="form-group">
                            <strong>Doctor(a):</strong>
                            @foreach ($doctoresArray as $doctor)
                                @if ($expedienteArray['idDoctor'] == $doctor['id'])
                                    {{ $doctor['nombre'].' '.$doctor['apPaterno'].' '.$doctor['apMaterno'] }}
                                @endif
                            @endforeach
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $expedienteArray['descripcion'] }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
