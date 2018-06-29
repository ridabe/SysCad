@extends('layouts.app')

@section('conteudo')

<!--Espaço para trazer as mensagens de erro-->
@include('inc.erros')
<div class="card card-login mx-auto mt-5">
      <div class="card-header">Reenviar Senha</div>
      <div class="card-body">
        <form action="{{route('executaRecuperarSenha')}}" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="formEmail" type="email" name="formEmail" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
         
          
          <button class="btn btn-primary btn-block"">Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="{{route('cadastro')}}">Criar uma conta</a>
          <a class="d-block small" href="{{route('login')}}">Voltar</a>
        </div>
      </div>
    </div>


@endsection