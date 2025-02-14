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
<a href="{{ url('Empleados/create')}}" class="btn btn-primary" >Registrar nuevo empleado</a>
</div>

<br>
<div class="card text-center">
<div class="card-header">
    Lista de Empleados
</div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Numero</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Identificacion</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Ciudad</th>
            <th>Departamento</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $Empleados as $Empleados )
        <tr>

            <td>{{ $Empleados->id }}</td>
            <td>{{ $Empleados->Nombres }}</td>
            <td>{{ $Empleados->Apellidos }}</td>
            <td>{{ $Empleados->Identificacion }}</td>
            <td>{{ $Empleados->Direccion }}</td>
            <td>{{ $Empleados->Telefono }}</td>
            <td>{{ $Empleados->Ciudad_de_nacimiento }}</td>
            <td>{{ $Empleados->Departamento }}</td>
            <td>    

            <a href="{{ url('/Empleados/'.$Empleados->id.'/edit') }}" class="btn btn-secondary"> 
                Editar
            </a>
             |

            <form action="{{ url('/Empleados/'.$Empleados->id )}}" class="d-inline" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input class="btn btn-dark" type="submit" onclick="return confirm('¿Estas seguro?')" value="Borrar">
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
