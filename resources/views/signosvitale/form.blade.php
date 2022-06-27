<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <div class="row">
            <div class="col-md-6">
            {{ Form::label('Ritmo Cardiaco') }}
            {{ Form::text('ritmoCardiaco', $signosvitale->ritmoCardiaco, ['class' => 'form-control' . ($errors->has('ritmoCardiaco') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese Ritmo Cardiaco']) }}
            {!! $errors->first('ritmoCardiaco', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-6">
            {{ Form::label('Calorias Quemadas') }}
            {{ Form::text('caloriasQuemadas', $signosvitale->caloriasQuemadas, ['class' => 'form-control' . ($errors->has('caloriasQuemadas') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese Calorias Quemadas']) }}
            {!! $errors->first('caloriasQuemadas', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            </div>
            
        </div>
        <div class="form-group">
            <div class="row">
            <div class="col-md-6">
            {{ Form::label('Pasos Diarios') }}
            {{ Form::text('pasosDiarios', $signosvitale->pasosDiarios, ['class' => 'form-control' . ($errors->has('pasosDiarios') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese Pasos Diarios']) }}
            {!! $errors->first('pasosDiarios', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-6">
            {{ Form::label('Distancia Recorrida') }}
            {{ Form::text('distanciaRecorrida', $signosvitale->distanciaRecorrida, ['class' => 'form-control' . ($errors->has('distanciaRecorrida') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese Distancia Recorrida']) }}
            {!! $errors->first('distanciaRecorrida', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            </div>
            
        </div>
        <div class="form-group">
            {{ Form::label('Expediente') }}
            {{ Form::select('idExpediente', $expediente, $signosvitale->idExpediente, ['class' => 'form-control' . ($errors->has('idExpediente') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione Expediente']) }}
            {!! $errors->first('idExpediente', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>