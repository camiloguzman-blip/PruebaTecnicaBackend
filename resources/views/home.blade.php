@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card text-center mb-3">
                                    <div class="card-header">
                                    PRUEBA TECNICA BACKEND
                                    </div>
                                <div class="card-body">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h5 class="card-title">
                    {{ __('Bienvenido!') }}
                    <br>
                    <br>
                    {{ __('Añade los datos personales de tus empleados y después agrega su cargo en tu empresa') }}
                    <h5>
                    <br>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card text-center mb-3">
                                    <div class="card-header">
                                    Empleados
                                    </div>
                                <div class="card-body">
                                    
                                    <p class="card-title">Gestiona la lista de empleados.</p>
                                    <br>
                                    <a href="{{ url('Empleados/create') }}" class="btn btn-primary"> Añadir empleados </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="card text-center mb-3">
                                    <div class="card-header">
                                    Cargos
                                    </div>
                                <div class="card-body">
                                    <p class="card-title">Gestiona la lista de cargos.</p>
                                    <br>
                                    <a href="{{ url('Cargos/create') }}" class="btn btn-primary"> Añadir cargos </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
