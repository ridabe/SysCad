@extends('layouts.app')

@section('conteudo')
<div class="alert alert-info" role="alert">
       Recuperar Senha
</div>

<!--Espaço para trazer as mensagens de erro-->
@include('inc.erros')
<div class="row">
 <div class="row justify-content-center col-md-4  col-md-12  col-xs-12">


    <form action="{{'executaRecuperarSenha'}}" method="POST">
        {{ csrf_field() }}


        <div class="form-group">
          <label for="formCadEmail">Email</label>
          <input type="mail" class="form-control" id="formCadRecuperar" name="formCadRecuperar" placeholder="Email">
        </div>


        <button type="submit" class="btn btn-primary">Recuperar</button>
        <ul class="nav justify-content-center">
                <li class="nav-item">
                  <a class="nav-link active" href="{{ route('cadastro') }}">Enviar</a>
                </li>

                <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}">Home</a>
                </li>
        </ul>

    </form>

</div>
</div>


@endsection
