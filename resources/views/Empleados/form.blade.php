<h1>{{ $mod }} Empleado</h1>
<br>

@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
<ul>
          @foreach( $errors->all() as $errors )
          <li> {{ $errors }} </li>
          @endforeach
</ul>
    </div>

@endif

<div class="mb-3">
<label for="Nombres">Nombres</label>
<input type="text" class="form-control" name="Nombres" value="{{ isset($Empleados->Nombres)?$Empleados->Nombres:'' }}" id="Nombres">
</div>

<div class="mb-3">
<label for="Apellidos">Apellidos</label>
<input type="text" class="form-control" name="Apellidos" value="{{ isset($Empleados->Apellidos)?$Empleados->Apellidos:'' }}" id="Apellidos">
</div>

<div class="mb-3">
<label for="Identificacion">Numero de indetificacion</label>
<input type="text" class="form-control" name="Identificacion" value="{{ isset($Empleados->Identificacion)?$Empleados->Identificacion:'' }}" id="Identificacion">
</div>

<div class="mb-3">
<label for="Direccion">Direccion</label>
<input type="text" class="form-control" name="Direccion" value="{{ isset($Empleados->Direccion)?$Empleados->Direccion:'' }}" id="Direccion">
</div>

<div class="mb-3">
<label for="Telefono">Telefono</label>
<input type="text" class="form-control" name="Telefono" value="{{ isset($Empleados->Telefono)?$Empleados->Telefono:'' }}" id="Telefono">
</div>

<div class="mb-3">
<label for="Ciudad_de_nacimiento">Ciudad de nacimiento</label>
<input type="text" class="form-control" name="Ciudad_de_nacimiento" value="{{ isset($Empleados->Ciudad_de_nacimiento)?$Empleados->Ciudad_de_nacimiento:'' }}" id="Ciudad_de_nacimiento"> 
</div>

<div class="mb-3">
<label for="Departamento">Departamento</label>
<input type="text" class="form-control" name="Departamento" value="{{ isset($Empleados->Departamento)?$Empleados->Departamento:'' }}" id="Departamento"> 
</div>

<input class="btn btn-primary" type="submit" value="{{ $mod }} datos">

<a class="btn btn-dark" href="{{ url('Empleados/')}}">Volver</a>

<br>