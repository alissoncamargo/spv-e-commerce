@extends('layouts.frente-loja')

@section('conteudo')
<h2>Finalizar compra</h2>
<table class="table">
    <tr>
        <td>
            <h4>
                {{$itens->count()}} produto(s) no carrinho
            </h4>
        </td>
        <td class="text-right">
            Total
        </td>
        <td>
            <h4 class="text-right text-danger">
                {{number_format($total,2,',','.')}}
            </h4>
        </td>
        @foreach($itens as $item)

        <tr>
            <td>
                <img src="{{route('imagem.file',$item->produto->imagem_nome)}}" alt="{{$item->produto->imagem_nome}}" style="width:70px;" >
            </td>
            <td>
                <a href="{{route('produto.detalhes', $item->produto->id)}}">
                    {{$item->produto->nome}}
                </a>
            </td>
            <td class="text-right">
                {{$item->qtde}}
            </td>
            <td class="text-right">
                {{'R$' .number_format($item->produto->preco_venda * $item->qtde, 2, ',', '.')}}
            </td>
            <td>
                Avaliar Produto {!! Form::selectRange('number', 1, 10, null, array('class' => 'avaliado')); !!}
                <button type="button" data-id='{{ $item->produto->id }}' class='btn btn-success btn-sm btn-avalie'>Avalie</button>
               
                <!-- avaliar por botão Avalie ou apos clicar no botão finalizar compra -->
            </td>
            <td> <a href="{{route('carrinho.remover-item', $item->produto->id)}}" 
                    class="btn btn-danger btn-xs pull-right">Excluir item </a>                
            </td>
        </tr>
        @endforeach
    </tbody>
        <td>
            @if (Auth::guest())
            <a href="{{route('carrinho.finalizar-compra')}}"
               class="btn btn-success pull-right">
                Faça seu login para finalizar a compra
            </a>
            @else
            @if(isset($pagseguro))
            <a href="{{$pagseguro['info']->getLink()}}" class="btn btn-success pull-right">
                Pagar com PagSeguro
            </a>
            @else
            <div class="alert alert-danger pull-right">
                Erro ao conectar com PagSeguro, por favor tente novamente em alguns minutos!
            </div>
            @endif
            <div class="col-md-12 col-sm-12 col-xs-12"><div id="alerta" class="alert alert-success pull-left" ></div></div>
            @endif
        </td>
    </tr>
</table>
<script type="text/javascript">
$(function() {
    $.ajaxSetup({
        headers:{
            'X-CSRF-Token':$('input[name="_token"]').val()
        }
    });
        $('#alerta').hide();
        $('.btn-avalie').on('click',function(evt){
            evt.preventDefatult;
            var ava = $(".avaliado option:selected").val();
            
            var id_produto = $(this).data('id');
            //console.log($(this).data('id'));
            //console.log(ava);
            //var dados = id_produto;
            //var dados = ava;
            
            $.ajax({
                type: "POST",
                url: '{{route("carrinho.avaliar")}}',
                data: {id_produto: id_produto, ava: ava},
                //colocar modal de "Produto Avaliado" no lugar do alert
                success: function( msg ) {
                  //$("#alerta").hide();
                  //$("#alerta").fadeIn().html("Avaliado com sucesso");
                    $("#alerta").html("Avaliado com sucesso").show().fadeOut(4000);
                }
            });
            
        });
});
</script>
@stop
