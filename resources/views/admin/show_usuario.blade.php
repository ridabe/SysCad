@extends('layouts.temp_interno')

@section('conteudo')


<div class="alert alert-secondary" role="alert">

	
	<div class="shadow p-3 mb-5 bg-black rounded">
<h3>Usuários</h3>
		<div class="row justify-content-md-center">
			<div class="form-group form-check">	
			    
			    <div class="col-sm-auto">
			     	<div class="alert alert-warning" role="alert">
				    	<div class="form-group form-check">
						    <input type="checkbox" class="form-check-input" id="desativar" >
						    <label class="form-check-label " for="exampleCheck1" >Atualizar</label>
						</div>
					</div>

			    </div>
			</div>


			@if($dadosUsuario->admin == 1)

		    <div class="col col-md-auto">

		    	<div class="alert alert-warning" role="alert">
		    	<b>Usuario Administrador</b>
		    	</div>
		       
		    </div>

		    @endif

		</div>


	</div>
	
        
        <form method="POST" action="{{route('usuario_update')}}">
{{ csrf_field() }}



<div class="row">
			<div class="form-group col-9">
			    <label for="nomeCliente"><b>Nome</b></label>
			    <input type="text" class="form-control" id="nomeUsuario" aria-describedby="nomeUsuario" placeholder="Nome" name="nome" value="{{$dadosUsuario->usuario}}" readonly="true">
			    
			</div>

			<div class="form-group col-3">
			    <label for="cpfCliente"><b>Email</b></label>
			    <input type="text" class="form-control" id="email" aria-describedby="cpfCliente"  name="email" value="{{$dadosUsuario->email}}" readonly="true">
			   
			</div>
			
</div>	

<div class="row justify-content-md-center">

	@if($dadosUsuario->admin == 1)
		<div class="form-group col-1">
               <input type="checkbox" class="form-control" id="adminCheck" name="adminCheck" readonly="true" checked="checked" value="1">
                
        </div>
    @else
    <div class="form-group col-1">
               <input type="checkbox" class="form-control" id="adminCheck" name="adminCheck" readonly="true" value="1">
                
        </div>


    @endif    
        <div class="form-group form-check col-2">
              <p>Tornar Administrador</p> 
                
        </div>

</div>

		<hr class="my-4">



				<!-- Passar o id de forma hidden-->
				<input type="hidden" name="id" value="">
				<!-- Passar o id de forma hidden-->

			<div class="row justify-content-md-center">

	    	<div class="col col-md-auto">
		      <button type="submit" class="btn btn-success form-control" id="edicao" disabled="true"  >Salvar Edição</button>
		    </div>

		    <div class="col col-md-auto">
		      <a class="btn btn-primary" href="{{route('usuarioListar')}}"  role="button">Listar Itens</a>
		    </div>

		    <div class="col-md-auto">
		      <a class="btn btn-warning" href="{{route('imprime_usuario',$dadosUsuario->id_usuario)}}" target="_blank"  role="button">Imprimir</a>
		    </div>

		    <div class="col col-md-auto">
		       <button type="button" class="btn btn-danger form-control" data-toggle="modal" data-target="#confirm{{$dadosUsuario->id_usuario}}">Apagar</button>
		    </div>

		</div>
	
  <!-- Enviar um campo hidden-->
  <input type="hidden" id="id" name="id_usuario" value="{{$dadosUsuario->id_usuario}}"  >
</form>

					<div class="modal fade" id="confirm{{$dadosUsuario->id_usuario}}" role="dialog">
							  <div class="modal-dialog modal-md">

							    <div class="modal-content">
							      <div class="modal-body">
							            <p> Deseja excluir os dados de:</p>
							            <p>{{$dadosUsuario->usuario}} </p>
							      </div>
							      <div class="modal-footer">
							        <a href="{{route('delete_usuario',$dadosUsuario->id_usuario)}}" type="button" class="btn btn-danger" id="delete">Apagar Registo</a>
							            <button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
							      </div>
							    </div>

							  </div>
					</div>


        </form>
    

        <script type="text/javascript">
//Ativar ou desativar os dados do formulario
		 $(document).ready(function(e) { 
		   $("#desativar").click(function(e) {  
		      if($(this).is(':checked')) //Retornar true ou false      
		      $('.form-control').prop('readonly', false);  
		        else      
		        $('.form-control').prop('readonly', true);
          });
		});
//Ativar ou desativar o botao de atualizar

		 $(document).ready(function(e) { 
		   $("#desativar").click(function(e) {  
		      if($(this).is(':checked')) //Retornar true ou false      
		      document.getElementById('edicao').disabled=false; 
		        else      
		        document.getElementById('edicao').disabled=true;
          });
		});

</script>
       



@endsection