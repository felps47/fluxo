@extends('layouts.base')
@section('content')
<h1 >Show</h1>

<h2>
    Lista de Lancamentos :
    {{$centro->lancamentos()->count()}}
</h2>
<h2>
   <p>
       <br>
       Total Entrada: R$
       {{$centro->lancamentos()
        ->where('id_tipo',1)
        ->sum('valor')}}
       <br>

        Total Saidas: R$ -
        {{$centro->lancamentos()
        ->where('id_tipo',2)
        ->sum('valor')
        }}
    <br>
        Saldo Total:  R$
        {{$centro->lancamentos()->where('id_tipo',1)->sum('valor')
        -
        $centro->lancamentos()->where('id_tipo',2)->sum('valor')}}
</p>
</h2>

<table class="table table-striped table-hover">
    <thead>
        <caption>Listas de Lancamentos - {{$centro->lancamentos()->count()}}</caption>
        <th>
            <th class="col-md-1">#</th>
            <th class="col-md-1">ID</th>
            <th>Tipo</th>
            <th>Usuario</th>
            <th>Descrição</th>
            <th>Valor</th>
        </th>
    </thead>
        <tbody class="table-group-divider">
        @foreach ($centro ->lancamentos()->get() as $lancamento )
        <tr

                @if ($lancamento->id_tipo == 2)
                       class="table-danger"
                @endif>

            <td scope ="row">{{$loop->iteration}}</td>
            <td scope ="row">{{$lancamento->id_lancamento}}</td>
            <td scope ="row">{{$lancamento->id_tipo}}</td>

            <td>{{$lancamento->tipo->tipo}}</td>
            <td>{!!$lancamento->usuario->name!!}</td>
            <td>{{$lancamento->descricao}}</td>
            <td>{{$lancamento->valor}}</td>

         </tr>
          @endforeach
        ></tbody>
    </table>
@endsection
</table>
@section('scripts')
@parent

@endsection
