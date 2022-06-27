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
                            {{ $expediente->noExpediente }}
                        </div>
                        <div class="form-group">
                            <strong>Paciente:</strong>
                            {{ $expediente->user2->nombre.' '.$expediente->user2->apPaterno. ' '.$expediente->user2->apMaterno }}
                        </div>
                        <div class="form-group">
                            <strong>Doctor(a):</strong>
                            {{ $expediente->user->nombre.' '.$expediente->user->apPaterno. ' '.$expediente->user->apMaterno }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $expediente->descripcion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
