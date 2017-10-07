@extends('layouts.frente-loja')

@section('conteudo')

	<br/>
	<h2>Cardápio</h2>
	@foreach($produto as $produto)

   	<div class="col-lg-4 col-md-6 mb-4">

    	<div class="card h-100">
    			<img style='height:300px; width:300px;' src="{{route('imagem.file',$produto->imagem_nome)}}" alt="">
    			<div style='margin-bottom: 30px;' class="card-body">
    				<h4 class="card-title">
    					{{$produto->nome}}
    				</h4>
    				<p class="card-text">{{str_limit($produto->descricao,100)}}</p>
    				<h4 class="card-text">R${{$produto->preco_venda}}</h4>
    				<!-- Trigger the modal with a button -->
					<button type="button" class="btn btn-primary btn-lg getid" value='{{$produto->id}}' data-toggle="modal" data-target="#myModal">Mais Detalhes</button>
    			</div>
    			
    	</div>
    </div>
	@endforeach
		    <!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Modal Header</h4>
	      </div>
	      <div class="modal-body">
	        <p class='conteudo'></p>
	        <p class='valor'></p>
	        <img style='height:200px; width:200px;' class="imagem" />
            <br/>
            <form class="action_carrinho"  action="{{route('adicionar')}}">
                <select name="quant">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default  pull-right" data-dismiss="modal">Fechar</button>
	           <button value="" type="submit" name="botao" class="btn btn-primary btn-lg  pull-left add_carrinho" > Adicionar ao carrinho</button>
            </form>
	      </div>
	    </div>

	  </div>
	</div>

            <!-- Modal carrinho -->
    <div id="carrinho_id" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Carrinho</h4>
          </div>
          <div class="modal-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Produto</th>
                        <th class="text-right">Preço</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($itens as $item)
                    <tr class="teste">
                        <td>
                            <img src="{{route('imagem.file',$item->produto->imagem_nome)}}" alt="{{$item->produto->imagem_nome}}" data-lightbox="roadtrip" style="width:70px;" >
                        </td>
                        <td>
                            <a href="{{route('produto.detalhes', $item->produto->id)}}">
                                {{$item->produto->nome}}
                            </a>
                        </td>
                        <td class="text-right">
                            {{number_format($item->produto->preco_venda, 2, ',', '.')}}
                        </td>
                        <td> <a href="{{route('remover', $item->produto->id)}}" 
                                class="btn btn-danger btn-xs pull-right">Excluir item </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-right">
                            Total
                        </td>
                        <td>
                            <h4 class="text-right text-danger">
                                R${{number_format($total,2,',','.')}}
                            </h4>
                        </td>
                    </tr>
                </tfoot>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default  pull-right" data-dismiss="modal">Fechar</button>
            <button value="" type="submit" name="botao" class="btn btn-primary btn-lg  pull-left add_carrinho" > Confirmar pedido</button>
          </div>
        </div>
      </div>
    </div>
<script src="{{asset('bootstrap/js/jquery.min.js')}}"></script>
<script type="text/javascript">
$(function() {
    $.ajaxSetup({
        headers:{
            'X-CSRF-Token':$('input[name="_token"]').val()
        }
    });
        $('.getid').click(function(){
            //evt.preventDefatult;
            //var avaliacao = $(this).prev('select').val();//$(".avaliado option:selected").val();
            //var elementToHide = $(this);
            //console.log($(this).data('id'));
            //console.log(ava);
            //var dados = id_produto;
            //var dados = ava;
            var id = $(this).attr('value');
            $.ajax({
                type: "GET",
                url: 'http://localhost:8000/mesa/produto/'+id,
                data: {id: id},
                success: function(id) {
                $('.modal-title').html(id.nome);
                $('.conteudo').html(id.descricao);
                $('.valor').html('R$: '+id.preco_venda);
                $(".imagem").attr("src",'http://localhost:8000/imagem/arquivo/'+id.imagem_nome);
                $('.add_carrinho').val(id.id);
  				console.log(id);
                  //$("#alerta").fadeIn().html("Avaliado com sucesso");
                },
            });
            
        });
});
/*$(document).on("click", ".teste", function(){
        var teste = $(this).find('.teste').last();
        alert(teste);
    });*/
</script>


@stop