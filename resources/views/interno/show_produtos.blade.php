
	@extends('layouts.temp_interno')
	

@section('conteudo')

<form  method="POST" action="{{route('produtos_update')}}" class="alert alert-dark" >
	{{csrf_field()}}
	<h2>Produtos</h2>
	<div class="shadow p-3 mb-5 bg-black rounded">

		<div class="row justify-content-md-center">
		    <div class="col col-md-auto">
		      <h5>Área de controle:</h5>
		    </div>

		    <div class="col-md-auto">
		     
		    	<div class="form-group form-check">
				    <input type="checkbox" class="form-check-input" id="desativar" >
				    <label class="form-check-label " for="exampleCheck1" >Atualizar</label>
				  </div>

		    </div>

		    <div class="col col-md-auto">
		       
		    </div>

		</div>


	</div>

	<div class="form-group">
		<hr class="my-4">

		<div class="row">
		    <div class="col-7">
		    	<label for="produto"> <b>Produto</b> </label>
		    	<input type="text" class="form-control " id="produto" name="produto" aria-describedby="produto" placeholder="Produto" value="{{$dados->nomeprod}}" readonly="true" >

		    </div>
		    <div class="col-3">
		      	<label for="ean"><b>Ean</b></label>
		      	<input type="text" class="form-control " id="ean" name="ean" aria-describedby="ean" placeholder="ean"value="{{$dados->ean}}" readonly="true">

		    </div>
		    <div class="col-2">
		      <label for="codigo"><b>Codigo Interno</b></label>
		      <input type="text" class="form-control " id="codigo" name="codigo" aria-describedby="codigo" placeholder="ean" value="{{$dados->codint}}" readonly="true">

		    </div>
	    </div>

	    <div class="row">
		    <div class="col-7">
		    	<label for="descricao"><b>Descrição</b></label>
		    	<input type="text" class="form-control " id="descricao" name="descricao" aria-describedby="pdescricao" placeholder="descricao" value="{{$dados->descricao}}" readonly="true">

		    </div>
		    <div class="col-3">
		      	<label for="codforn"><b>Fornecedor</b></label>
		      	<select class="form-control" name="fornecedorescod">
				  <option selectd value="{{$dadosForn->id_forn}}" selected>{{$dadosForn->empresa}}</option>
		      		@foreach ($totalForn as $fornecedores): ?>
		      			 <option value="{{$fornecedores->id_forn}}" >{{$fornecedores->empresa}}</option>
		      		@endforeach	
				</select v>

		    </div>
		    <div class="col">
		      	<label for="secao"><b>Seção</b></label>
		      	<select class="form-control  " name="secao">


				  <option value="" selected>Seção</option>
				  <option value="1" >Seção 01</option>
				  <option value="2" >Seção 02</option>
				</select>

		    </div>
		    
	    </div>

		<hr class="my-4">

		<div class="row">
		    <div class="col">
		    	<label for="quantidade"><b>Estoque</b></label>
		    	<input type="text" class="form-control " id="quantidade" name="quantidade" aria-describedby="pdescricao" placeholder="Quantidade" value="{{$dados->quantidade}}" readonly="true">

		    </div>

		    <div class="col">
		    	<label for="precocusto"><b>Preço de Custo</b></label>
		    	<input type="text" class="form-control " id="precocusto" name="precocusto" aria-describedby="pdescricao" placeholder="Preço de Custo" value="{{$dados->precocusto}}" readonly="true">

		    </div>
		    <div class="col">
		    	<label for="precovenda"><b>Preço de Venda</b></label>
		    	<input type="text" class="form-control " id="precovenda" name="precovenda" aria-describedby="precovenda" placeholder="Preço de Venda" value="{{$dados->precovenda}}" readonly="true">

		    </div>
		    

			<div class="col">
		      	<label for="status1"><b>Status do Produto</b></label>
		      	<select class="form-control" name="status1">
		      		
		      	  <option value="{{$valorStatus}}" selected >{{$descStatus}}</option>
				  <option value="1" >Ativo</option>
				  <option value="0" >Não Ativo</option>
		      		
				 
				</select>

		    </div>
			
	    </div>

	    <hr class="my-4">

	    <div class="row justify-content-md-center">

	    	<div class="col col-md-auto">
		      <button type="submit" class="btn btn-success form-control" id="edicao" disabled="true"  >Salvar Edição</button>
		    </div>

		    <div class="col col-md-auto">
		      <a class="btn btn-primary" href="{{route('produtosListar')}}"  role="button">Listar Itens</a>
		    </div>

		    <div class="col-md-auto">
		      <a class="btn btn-warning" href="{{route('imprime_Produtos',$dados->id)}}" target="_blank"  role="button">Imprimir</a>
		    </div>

		    <div class="col col-md-auto">
		       <button type="button" class="btn btn-danger form-control" data-toggle="modal" data-target="#confirm{{$dados->id}}">Apagar</button>
		    </div>

		</div>
	</div>
  <!-- Enviar um campo hidden-->
  <input type="hidden" id="id" name="id" value="{{$dados->id}}"  >
</form>

					<div class="modal fade" id="confirm{{$dados->id}}" role="dialog">
							  <div class="modal-dialog modal-md">

							    <div class="modal-content">
							      <div class="modal-body">
							            <p> Deseja excluir os dados de:</p>
							            <p> {{$dados->nomeprod}}</p>
							      </div>
							      <div class="modal-footer">
							        <a href="{{route('delete_produtos',$dados->id)}}" type="button" class="btn btn-danger" id="delete">Apagar Registo</a>
							            <button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
							      </div>
							    </div>

							  </div>
					</div>

<script type="text/javascript">

		 $(document).ready(function(e) { 
		   $("#desativar").click(function(e) {  
		      if($(this).is(':checked')) //Retornar true ou false      
		      $('.form-control').prop('readonly', false);  
		        else      
		        $('.form-control').prop('readonly', true);
          });
		});

		 $(document).ready(function(e) { 
		   $("#desativar").click(function(e) {  
		      if($(this).is(':checked')) //Retornar true ou false      
		      document.getElementById('edicao').disabled=false; 
		        else      
		        document.getElementById('edicao').disabled=true;
          });
		});

</script>
@endsection