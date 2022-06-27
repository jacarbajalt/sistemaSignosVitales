<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('No. de Expediente') }}
            {{ Form::text('noExpediente', $expediente->noExpediente, ['class' => 'form-control' . ($errors->has('noExpediente') ? ' is-invalid' : ''), 'placeholder' => 'Numero de Expediente Nuevo']) }}
            {!! $errors->first('noExpediente', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <div class="row">

            
            <div class="col-md-6">
            {{ Form::label('Paciente Asignado') }}
            {{ Form::select('idPaciente', $paciente, $expediente->idPaciente, ['class' => 'form-control' . ($errors->has('idPaciente') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione Paciente']) }}
            {!! $errors->first('idPaciente', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-md-6">
            {{ Form::label('Doctor(a) Asignado') }}
            {{ Form::select('idDoctor', $doctor, $expediente->idDoctor, ['class' => 'form-control' . ($errors->has('idDoctor') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione Doctor']) }}
            {!! $errors->first('idDoctor', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::textArea('descripcion', $expediente->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese Descripcion del Paciente', 'rows'=>'10']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </div>
</div>