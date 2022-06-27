@extends('layouts.app')

@section('template_title')
    {{ $user->name ?? 'Show User' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show User</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $user->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Appaterno:</strong>
                            {{ $user->apPaterno }}
                        </div>
                        <div class="form-group">
                            <strong>Apmaterno:</strong>
                            {{ $user->apMaterno }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                        <div class="form-group">
                            <strong>Username:</strong>
                            {{ $user->username }}
                        </div>
                        <div class="form-group">
                            <strong>Fechanacimiento:</strong>
                            {{ $user->fechaNacimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Edad:</strong>
                            {{ $user->edad }}
                        </div>
                        <div class="form-group">
                            <strong>Rol:</strong>
                            {{ $user->rol }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
