@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ url('/Empleados/'.$Empleados->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}
    @include('Empleados.form',['mod'=>'Editar'])
    </form>
</div>
@endsection
