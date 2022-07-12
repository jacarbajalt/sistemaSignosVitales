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
                            {{ $signosvitalesArray['ritmoCardiaco'] }}
                        </div>
                        <div class="form-group">
                            <strong>Calorias Quemadas:</strong>
                            {{ $signosvitalesArray['caloriasQuemadas'] }}
                        </div>
                        <div class="form-group">
                            <strong>Pasos Diarios:</strong>
                            {{ $signosvitalesArray['pasosDiarios'] }}
                        </div>
                        <div class="form-group">
                            <strong>Distancia Recorrida:</strong>
                            {{ $signosvitalesArray['distanciaRecorrida'] }}
                        </div>
                        <div class="form-group">
                            <strong>Expediente:</strong>
                            
                            @foreach ($expedientesArray as $expediente)
                                @if ($signosvitalesArray['idExpediente'] == $expediente['id'])
                                    {{ $expediente['noExpediente'] }}
                                @endif
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
