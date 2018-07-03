@extends('layouts.temp_imprime_interno')



@section('conteudo')



<div class="alert alert-secondary" role="alert">

	 <div class="alert alert-info" role="alert">
		        <h3 class="alert-heading">Relatório - Usuarios</h3>
		        <hr>
	</div>

	<!--Local onde vai o conteudo-->
	<div class="row">
		  <div class="col-sm-8">Nome: <p>{{$dadosUsuario->usuario}}</p></div>
	</div>
	<div class="row">
		  <div class="col-sm-8">Email/Login: <p>{{$dadosUsuario->email}}</p></div>
	</div>

	@if($dadosUsuario->admin == 1)

		<div class="row">
			  <div class="col-sm-8">status: <p>Administrador</p></div>
		</div>
	@else
	
		<div class="row">
			  <div class="col-sm-8">status: <p>Usuário</p></div>
		</div>

	@endif	

	
	<div class="row">
		  <div class="col-sm-8">Data do cadastro: <p>{{date('d/m/Y',strtotime($dadosUsuario->created_at))}}</p></div>
	</div>

	<div class="row">
		  <div class="col-sm-8">Ùltima Atualização: <p>{{date('d/m/Y',strtotime($dadosUsuario->updated_at))}}</p></div>
	</div>
	


	@endsection