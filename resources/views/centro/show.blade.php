@extends('layouts.base')
@section('content')
<h1 >Show</h1>
<h1  >"{{route('lancamento.show',['id' =>$centro->id_centro_custo])}}"</h1>
@endsection
@section('scripts')
@parent

@endsection
