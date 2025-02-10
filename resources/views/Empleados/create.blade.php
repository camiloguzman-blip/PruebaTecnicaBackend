@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{url('/Empleados')}}" method="post" enctype="multipart/form-data">
     @csrf

    @include('Empleados.form',['mod'=>'Crear'])
   </form>
</div>
@endsection
