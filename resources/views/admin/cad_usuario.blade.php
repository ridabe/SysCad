@extends('layouts.temp_interno')
	

@section('conteudo')



<div class="alert alert-secondary" role="alert">

	 <div class="alert alert-primary" role="alert">
		        <h3 class="alert-heading">Cadastrar usuarios</h3>
		        <hr>
                @include('inc.erros')
	</div>
	
        
        <form method="POST" action="{{route('executaCriarConta')}}">
{{ csrf_field() }}
                <div class="row">
                            <div class="form-group col-6">
                                <label for="formCadNome">Nome</label>
                                <input type="text" class="form-control" id="formCadNome" name="formCadNome" aria-describedby="emailHelp" placeholder="Nome">

                            </div>

                            <div class="form-group col-6">
                                <label for="formCadEmail">Email</label>
                                <input type="mail" class="form-control" id="formCadEmail" name="formCadEmail" placeholder="Email">
                        
                            </div>
                            <center>A senha sera gerada automaticamente pelo sistema</center>
                            
                </div>	

                <!--div class="row justify-content-md-center">
                   
                                <div class="form-group col-3">
                                    <label for="formCadSenha">Senha</label>
                                    <input type="password" class="form-control" id="formCadSenha" name="formCadSenha" placeholder="Senha">
                            
                                </div>  
                               
                   

                  
                        
                        <div class="form-group col-3">
                                <label for="formCadSenhaRepetir">Repetir Senha</label>
                                    <input type="password" class="form-control" id="formCadSenhaRepetir" name="formCadSenhaRepetir" placeholder="Repetir Senha">
                            
                        </div>

                    


                </div-->

                    
		<hr class="my-4">



            <!--div class="row justify-content-md-center">
                    <div class="col-9">
                        <div class="form-group">
                            <input type="checkbox" class="form-check-input" id="contratoCheck" name="contratoCheck" value="1">
                            Aceito as <a class="nav-link active" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Regras</a> do serviço
                    
                        </div>

                    </div>

                   
            </div-->	

            
                 <div class="row justify-content-md-center">

                            <div class="col col-md-auto">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>  

                            <div class="col col-md-auto">
                             <a class="btn btn-primary" href="{{route('usuarioListar')}}"  role="button">Voltar</a>
                            </div>         

                  </div>

           

        </form>
        <hr>
</div>  
     




@endsection