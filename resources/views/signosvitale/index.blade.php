@extends('adminlte::page')

@section('template_title')
    Signosvitale
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h2>{{ __('Signos Vitales') }}</h2>
                                
                            </span>

                             <div class="float-right">
                                <a href="{{ route('signosvitales.create') }}" class="btn btn-primary float-right"  data-placement="left">
                                  {{ __('Agregar Nuevo Registro') }}
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
                                        
                                        
										<th>Ritmo Cardiaco</th>
										<th>Calorias Quemadas</th>
										<th>Pasos Diarios</th>
										<th>Distancia Recorrida</th>
										<th>Expediente</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($signosvitalesArray as $signosvitale)
                                        <tr>
                                            
                                            
											<td>{{ $signosvitale['ritmoCardiaco']}}</td>
											<td>{{ $signosvitale['caloriasQuemadas'] }}</td>
											<td>{{ $signosvitale['pasosDiarios'] }}</td>
											<td>{{ $signosvitale['distanciaRecorrida'] }}</td>
                                            @foreach ($expedientesArray as $expediente)
                                                @if ($signosvitale['idExpediente'] == $expediente['id'])
                                                    <td>{{ $expediente['noExpediente'] }}</td>
                                                @endif
                                            @endforeach
                                            
                                            
                                            <td>
                                                <form action="{{ route('signosvitales.destroy',$signosvitale['id']) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('signosvitales.show',$signosvitale['id']) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    
                                                    @csrf
                                                    
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
