@extends('layouts.app')
@section('content')

<div class="container">

<form action="{{url('/Cargos/'.$Cargos->id)}}" method="post" enctype="multipart/form-data">
@csrf 
{{ method_field('PATCH')}}
@include('Cargos.form',['mod'=>'Editar'])
</form>

</div>
@endsection