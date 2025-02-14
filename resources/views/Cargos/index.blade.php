@extends('layouts.app')
@section('content')
<div class="container">

@if(Session::has('Notification'))
      <div class="alert alert-primary alert-dismissible fade show p-2" role="alert">
      <div class="m-1">
      {{Session::get('Notification')}}
      </div>
      <button type="button" class="btn-close m-0 p-2 m-2 d-block" data-bs-dismiss="alert" aria-label="Close">
      </button>
      </div>
      @endif

      <div class="card-header">
<a href="{{ url('Cargos/create') }}" class="btn btn-primary"> Crear nuevo cargo </a>
</div>

<br>
<div class="card text-center">
<div class="card-header">
Lista de Cargos
</div>
<table class="table table-striped table-hover active">
    <thead>
        <tr>
            <th>Numero</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Identificacion</th>
            <th>Area</th>
            <th>Cargo</th>
            <th>Rol</th>
            <th>jefe</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $Cargos as $Cargos )
        <tr>
            <td>{{ $Cargos->id }}</td>
            <td>{{ $Cargos->Empleados->Nombres }}</td>
            <td>{{ $Cargos->Empleados->Apellidos }}</td>
            <td>{{ $Cargos->Empleados->Identificacion }}</td>
            <td>{{ $Cargos->Area }}</td>
            <td>{{ $Cargos->Cargos }}</td>
            <td>{{ $Cargos->Roles }}</td>
            <td>{{ $Cargos->Jefe }}</td>
            <td>
                
              <a href="{{ url('/Cargos/'.$Cargos->id.'/edit') }}" class="btn btn-secondary">
              Editar
              </a>
              | 
              <form action="{{ url('/Cargos/'.$Cargos->id) }}" class="d-inline" method="post">
                @csrf 
                {{ method_field('DELETE') }}
                <input class="btn btn-dark" type="submit" onclick="return confirm('¿Está seguro de realizar esta acción?')"value="Borrar">
              </form>
            
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
<div class="card-footer text-body-secondary">
    
</div>
</div>
</div>

@endsection