@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{url('/Cargos')}}" method="post" enctype="multipart/form-data">
@csrf

@include('Cargos.form',['mod'=>'Crear'])

</form>
</div>
@endsection