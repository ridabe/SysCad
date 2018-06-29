@extends('layouts.temp_imprime_interno')
@section('conteudo')

	
	<div class="alert alert-secondary" role="alert">

	 <div class="alert alert-info" role="alert">
		        <h3 class="alert-heading">Relatório - Produtos</h3>
		        <hr>
	</div>

	<!--Local onde vai o conteudo-->
	
	<div class="row">
		  <div class="col-sm-8">Codigo Interno: <p>{{$dados->codint}}</p></div>
	</div>
	<div class="row">
		  <div class="col-sm-8">Ean: <p>{{$dados->ean}}</p></div>
	</div>
	<div class="row">
		  <div class="col-sm-8">Produto: <p>{{$dados->nomeprod}}</p></div>
	</div>
	<div class="row">
		  <div class="col-sm-8">Produto: <p>{{$dados->descricao}}</p></div>
	</div>
<hr class="my-4">

	<div class="row">

		 @if ($dados->status1 == 1) 
           <div class="col-sm-8">Produto: <p>Ativo</p></div>
           
       @else
            <div class="col-sm-8">Produto: <p>Não Ativo</p></div>

        @endif
		  
	</div>
	
	<div class="row">
		  <div class="col-sm-8">Preço de Custo: <p>{{$dados->precocusto}}</p></div>
	</div>
	<div class="row">
		  <div class="col-sm-8">Preço de Venda: <p>{{$dados->precovenda}}</p></div>
	</div>
	
 <hr class="my-4">

	
	<div class="row">
		  <div class="col-sm-8">Data do cadastro: <p>{{date('d/m/Y',strtotime($dados->created_at))}}</p></div>
	</div>
	
	  
  @endsection