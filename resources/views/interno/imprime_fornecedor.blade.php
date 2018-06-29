@extends('layouts.temp_imprime_interno')



@section('conteudo')



<div class="alert alert-secondary" role="alert">

	 <div class="alert alert-info" role="alert">
		        <h3 class="alert-heading">Relatório - Fornecedor</h3>
		        <hr>
	</div>

	<!--Local onde vai o conteudo-->
	<div class="row">
		  <div class="col-sm-8">Empresa: <p>{{$pegarFornecedor->empresa}}</p></div>
	</div>
	<div class="row">
		  <div class="col-sm-8">CNPJ: <p>{{$pegarFornecedor->cnpj}}</p></div>
	</div>
	<div class="row">
		  <div class="col-sm-8">Fornecedor: <p>{{$pegarFornecedor->nomeforn}}</p></div>
	</div>

	<div class="row">
		  <div class="col-sm-8">Telefone: <p>{{$pegarFornecedor->telforn}}</p></div>
	</div>
	<div class="row">
		  <div class="col-sm-8">Email: <p>{{$pegarFornecedor->emailforn}}</p></div>
	</div>
	<div class="row">
		  <div class="col-sm-8">Cpf: <p>{{$pegarFornecedor->cpfforn}}</p></div>
	</div>
	<div class="row">
		  <div class="col-sm-8">Endereço: <p>{{$pegarFornecedor->rua }} - {{$pegarFornecedor->numero}} / {{$pegarFornecedor->cidade }} - {{$pegarFornecedor->estado}}</p></div>
	</div>
	<div class="row">
		  <div class="col-sm-8">Observação: <p>{{$pegarFornecedor->obsforn}}</p></div>
	</div>
	<div class="row">
		  <div class="col-sm-8">Data do cadastro: <p>{{date('d/m/Y',strtotime($pegarFornecedor->created_at))}}</p></div>
	</div>
	


	@endsection