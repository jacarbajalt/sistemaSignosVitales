@extends('adminlte::page')

@section('template_title')
    {{ $signosvitale->name ?? 'Show Signosvitale' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Signos Vitales</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('signosvitales.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Ritmo Cardiaco:</strong>
                            {{ $signosvitale->ritmoCardiaco }}
                        </div>
                        <div class="form-group">
                            <strong>Calorias Quemadas:</strong>
                            {{ $signosvitale->caloriasQuemadas }}
                        </div>
                        <div class="form-group">
                            <strong>Pasos Diarios:</strong>
                            {{ $signosvitale->pasosDiarios }}
                        </div>
                        <div class="form-group">
                            <strong>Distancia Recorrida:</strong>
                            {{ $signosvitale->distanciaRecorrida }}
                        </div>
                        <div class="form-group">
                            <strong>Expediente:</strong>
                            {{ $signosvitale->expediente->noExpediente }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
