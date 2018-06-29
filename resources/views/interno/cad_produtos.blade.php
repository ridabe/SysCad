@extends('layouts.temp_interno')



@section('conteudo')

<form method="POST" action="{{route('produtosStore')}}" class="alert alert-dark">
	{{ csrf_field() }}
	<h2>Produtos</h2>
	<div class="shadow p-3 mb-5 bg-black rounded">

		<div class="row justify-content-md-center">
		    <div class="col col-md-auto">
		      <h5>Área de controle:</h5>
		    </div>

		    <div class="col-md-auto">
		     
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
		    	<input type="text" class="form-control" id="produto" name="produto" aria-describedby="produto" placeholder="Produto">

		    </div>
		    <div class="col-3">
		      	<label for="ean"><b>Ean</b></label>
		      	<input type="text" class="form-control" id="ean" name="ean" aria-describedby="ean" placeholder="ean">

		    </div>
		    <div class="col-2">
		      <label for="codigo"><b>Codigo Interno</b></label>
		      <input type="text" class="form-control" id="codigo" name="codigo" aria-describedby="codigo" placeholder="ean">

		    </div>
	    </div>

	    <div class="row">
		    <div class="col-7">
		    	<label for="descricao"><b>Descrição</b></label>
		    	<input type="text" class="form-control" id="descricao" name="descricao" aria-describedby="pdescricao" placeholder="descricao">

		    </div>
		    <div class="col-3">
		      	<label for="codforn"><b>Fornecedor</b></label>
		      	<select class="form-control form-control" name="codigofornecedor">
				  <option value="" selected>Fornecedor</option>
				  @foreach ($dadosForn as $fornecedor)
				  	 <option value="{{$fornecedor->id_forn}}">{{$fornecedor->empresa}}</option>
				  @endforeach
				 
				 
				</select>

		    </div>
		    <div class="col">
		      	<label for="secao"><b>Seção</b></label>
		      	<select class="form-control form-control" name="secao">
				  <option selected>Seção</option>
				  <option value="1" >Seção 01</option>
				  <option value="2" >Seção 02</option>
				  <option value="3" >Seção 03</option>
				</select v>

		    </div>
		    
	    </div>

		<hr class="my-4">

		<div class="row">
		    <div class="col">
		    	<label for="quantidade"><b>Estoque</b></label>
		    	<input type="text" class="form-control" id="quantidade" name="quantidade" aria-describedby="pdescricao" placeholder="Quantidade">

		    </div>

		    <div class="col">
		    	<label for="precocusto"><b>Preço de Custo</b></label>
		    	<input type="text" class="form-control" id="precocusto" name="precocusto" aria-describedby="pdescricao" placeholder="Preço de Custo">

		    </div>
		    <div class="col">
		    	<label for="precovenda"><b>Preço de Venda</b></label>
		    	<input type="text" class="form-control" id="precovenda" name="precovenda" aria-describedby="precovenda" placeholder="Preço de Venda">

		    </div>
		    
			<div class="col">
		      	<label for="status1"><b>Status do Produto</b></label>
		      	<select class="form-control form-control" name="status1">
		      		 <option  selected>Status</option>
				  <option value="1">Ativo</option>
				  <option value="0" >Não Ativo</option>
				 
				</select v>

		    </div>
			
	    </div>

	    <hr class="my-4">

	    <div class="row justify-content-md-center">

	    	<div class="col col-md-auto">
		     <button type="submit" class="btn btn-primary">Enviar</button>
		    </div>
		    
		</div>
	</div>
  
</form>




@endsection