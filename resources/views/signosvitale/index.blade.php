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
                                        <th>#</th>
                                        
										<th>Ritmo Cardiaco</th>
										<th>Calorias Quemadas</th>
										<th>Pasos Diarios</th>
										<th>Distancia Recorrida</th>
										<th>Expediente</th>

                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($signosvitales as $signosvitale)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $signosvitale->ritmoCardiaco }}</td>
											<td>{{ $signosvitale->caloriasQuemadas }}</td>
											<td>{{ $signosvitale->pasosDiarios }}</td>
											<td>{{ $signosvitale->distanciaRecorrida }}</td>
											<td>{{ $signosvitale->expediente->noExpediente }}</td>

                                            <td>
                                                <form action="{{ route('signosvitales.destroy',$signosvitale->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('signosvitales.show',$signosvitale->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success disabled" href="{{ route('signosvitales.edit',$signosvitale->id) }}"><i class="fa fa-fw fa-edit" role="button" aria-disabled="true"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm disabled"><i class="fa fa-fw fa-trash" role="button" aria-disabled="true"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                
                {!! $signosvitales->links() !!}
            </div>
        </div>
    </div>
@endsection
