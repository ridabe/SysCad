@extends('layouts.app')

@section('conteudo')
<div class="alert alert-info" role="alert">
       Alterar Senha
       <!--Espaço para trazer as mensagens de erro-->
@include('inc.erros')
</div>



 <div class="row justify-content-center col-md-4  col-md-12  col-xs-12">


    <form action="{{'interno/trocarSenha'}}" method="POST">
        {{ csrf_field() }}

        <div class="row">
          
          <label for="formCadEmail"><b>Nova Senha</b></label>

        </div>

        <div class="row">

            <div class col>

                <div class="form-group">
                  
                  <input type="password" class="form-control" id="formCadRecuperar" name="senha" >
                </div>

           
                <input type="hidden" id="formCadRecuperar" name="email" value="{{$email}}" >
            </div>

            <div class col>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Trocar Senha</button>
              </div>
            </div>

          </div>
           <div class="row">
              <div class="col">
                <img src="{{asset('imagens/algo_log.png')}}" class="img-fluid">
              </div>
            </div>
        
    </form>

</div>



@endsection