<div class="row justify-content-center">
<div class="col-md-8">
<div class="card-text mb-3">
<div class="card-body">
    
<h1>{{ $mod }} cargo </h1>

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
<ul>
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<div class="mb-3">
    <label for="Empleados_id">Empleado</label>
    <select name="Empleados_id" id="Empleados_id" class="form-control">
    <option value="">Seleccione un empleado</option>
        @foreach($Empleados as $Empleados)
            <option value="{{ $Empleados->id }}" {{ isset($Cargos->Empleados_id) && $Cargos->Empleados_id == $Empleados->id ? 'selected' : '' }}>
                {{ $Empleados->Nombres }} 
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
<label for="Area">Area</label>
<input type="text" class="form-control" name="Area" value="{{ isset($Cargos->Area)?$Cargos->Area:'' }}" id="Area">
</div>

<div class="mb-3">
<label for="Cargos">Cargo</label>
<input type="text" class="form-control" name="Cargos" value="{{ isset($Cargos->Cargos)?$Cargos->Cargos:'' }}" id="Cargos">
</div>

<!--<div class="mb-3">
<label for="Roles">Rol</label>
<input type="text" class="form-control" name="Roles" value="{{ isset($Cargos->Roles)?$Cargos->Roles:'' }}" id="Roles">
</div>-->

<div class="mb-3">
    <label for="Roles">Rol</label>
    <select name="Roles" id="Roles" class="form-control">
        <option value="">Seleccione un rol</option>
        <option value="Colaborador" {{ isset($Cargos->Roles) && $Cargos->Roles == 'Colaborador' ? 'selected' : '' }}>Colaborador</option>
        <option value="Jefe" {{ isset($Cargos->Roles) && $Cargos->Roles == 'Jefe' ? 'selected' : '' }}>Jefe</option>
    </select>
</div>

<div class="mb-3">
<label for="Jefe">Jefe</label>
<input type="text" class="form-control" name="Jefe" value="{{ isset($Cargos->Jefe)?$Cargos->Jefe:'' }}" id="Jefe"> 
</div>

<div class="mb-3">
    <label for="presidente">Presidente</label>
    <select name="presidente" id="presidente" class="form-control">
        <option value="0" {{ isset($Cargos->presidente) && $Cargos->presidente == false ? 'selected' : '' }}>No</option>
        <option value="1" {{ isset($Cargos->presidente) && $Cargos->presidente == true ? 'selected' : '' }}>Sí</option>
    </select>
</div>

<input class="btn btn-primary" type="submit" value="{{ $mod }} datos">
<a href="{{ url('Cargos/') }}" class="btn btn-dark" > Regresar </a>
<br>
</div>
</div>
</div>
</div>