@extends('layouts.app')

@section('conteudo')

<!--Espaço para trazer as mensagens de erro-->
@include('inc.erros')
<div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="{{route('executarlogin')}}" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" type="email" name="formEmail" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" type="password" name="formSenha" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div>
          <button class="btn btn-primary btn-block"">Login</button>
        </form>
        <div class="text-center">
          <!--a class="d-block small mt-3" href="{{route('cadastro')}}">Criar uma conta</a-->
          <a class="d-block small" href="{{route('form_lembrar_senha')}}">Lembrar Senha</a>
        </div>
      </div>
    </div>


@endsection
