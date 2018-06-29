@extends('layouts.temp_imprime_interno')



@section('conteudo')



<div class="alert alert-secondary" role="alert">

	 <div class="alert alert-info" role="alert">
		        <h3 class="alert-heading">Relatório - Cliente</h3>
		        <hr>
	</div>

	<!--Local onde vai o conteudo-->
	<div class="row">
		  <div class="col-sm-8">Nome: <p>{{$pegarCliente->nomecli}}</p></div>
	</div>
	<div class="row">
		  <div class="col-sm-8">Telefone: <p>{{$pegarCliente->telcli}}</p></div>
	</div>
	<div class="row">
		  <div class="col-sm-8">Email: <p>{{$pegarCliente->emailcli}}</p></div>
	</div>
	<div class="row">
		  <div class="col-sm-8">Cpf: <p>{{$pegarCliente->cpfcli}}</p></div>
	</div>
	<div class="row">
		  <div class="col-sm-8">Endereço: <p>{{$pegarCliente->rua }} - {{$pegarCliente->numero}} / {{$pegarCliente->cidade }} - {{$pegarCliente->estado}}</p></div>
	</div>
	<div class="row">
		  <div class="col-sm-8">Observação: <p>{{$pegarCliente->obscli}}</p></div>
	</div>
	<div class="row">
		  <div class="col-sm-8">Data do cadastro: <p>{{date('d/m/Y',strtotime($pegarCliente->created_at))}}</p></div>
	</div>
	


	@endsection