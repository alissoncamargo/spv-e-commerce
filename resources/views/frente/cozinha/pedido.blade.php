@extends('layouts.cliente')

@section('conteudo')
	<h2>Pedidos Pendentes </h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Mesa</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($venda as $pedido)
        <tr> 	
            <td>
            2               
            </td>
            <td>
                Pendente
            </td>
            <td class="text-left small">
             <a href="#" class="btn btn-primary" >Mais detalhes</a>
            </td>
            @if($pedido->status == 1)
            <td class="text-left small">
             	{{ Form::open (['route' => ['status_pendente', $pedido->id_venda], 'method' => 'PUT']) }}
                        {{ Form::submit('Preparar', ['class'=>'btn btn-warning']) }}
                {{ Form::close() }}
            </td>
            @elseif($pedido->status == 2)
            {{ Form::open (['route' => ['status_pronto', $pedido->id_venda], 'method' => 'PUT']) }}
                        {{ Form::submit('Finalizar', ['class'=>'btn btn-warning']) }}
                {{ Form::close() }}
            @else
            <td class="text-left small">
             	
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>

@stop