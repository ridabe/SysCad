
@extends('layouts.app')
@section('conteudo')
<div class="alert alert-info" role="alert">
       Cadastrar Nova Conta
</div>

@include('inc.erros')

<div class="row">
 <div class="row justify-content-center col-md-4  col-md-12  col-xs-12">



    <form action="{{'executaCriarConta'}}" method="POST">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="formCadNome">Nome</label>
          <input type="text" class="form-control" id="formCadNome" name="formCadNome" aria-describedby="emailHelp" placeholder="Nome">

        </div>
        <div class="form-group">
          <label for="formCadEmail">Email</label>
          <input type="mail" class="form-control" id="formCadEmail" name="formCadEmail" placeholder="Email">
        </div>
        <div class="form-group">
                <label for="formCadSenha">Senha</label>
                <input type="password" class="form-control" id="formCadSenha" name="formCadSenha" placeholder="Senha">
         </div>
         <div class="form-group">
                <label for="formCadSenhaRepetir">Repetir Senha</label>
                <input type="password" class="form-control" id="formCadSenhaRepetir" name="formCadSenhaRepetir" placeholder="Repetir Senha">
         </div>
         <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="contratoCheck" name="contratoCheck" value="1">
                Aceito as <a class="nav-link active" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Regras</a> do serviço
          </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>

        <ul class="nav justify-content-center">
                <li class="nav-item">
                  <a class="nav-link active" href="{{route('login')}}">Voltar</a>
                </li>
        </ul>
    </form>
    <div class="row justify-content-center col-md-4  col-md-6  col-xs-8">
    <div class="collapse" id="collapseExample">
            <div class="card card-body">
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
            </div>
          </div>
   </div>
</div>
</div>


@endsection
