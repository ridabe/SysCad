@extends('layouts.temp_interno')

@section('conteudo')



<div class="alert alert-secondary" role="alert">

	 <div class="alert alert-info" role="alert">
		        <h3 class="alert-heading">Pesquisar/Alterar Usuários</h3>
		        <hr>
	</div>


      <div class="card mb-3">
      	
	 
      	

<!-- /////////////////////Listar Todos os Clientes///////////////////////////////////////    -->

        <div class="card-header">
          
          <div class="alert alert-danger" role="alert">
  			@include('inc.erros')
		</div> 
      </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
			      <th>Nome</th>
			      <th>Email</th>
			      <th>Visualizar</th>
			      <th>Apagar</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                   <th>ID</th>
			      <th>Nome</th>
			      <th>Email</th>
			      <th>Visualizar</th>
			      <th>Apagar</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($dadosUsuario as $dados)
				    <tr>
				      <th scope="row">{{$dados->id_usuario}}</th>
				      <td>{{$dados->usuario}}</td>
				      <td>{{$dados->email}}</td>

				     
				        <td >
				      		<a href="{{route('usuarioShow',$dados->id_usuario)}}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Editar</a>
					    </td>
				      	<td >
				      		<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirm">Apagar</button>



					    </td>
				    </tr>

				    	<div class="modal fade" id="confirm" role="dialog">
							  <div class="modal-dialog modal-md">

							    <div class="modal-content">
							      <div class="modal-body">
							            <p> Deseja excluir os dados de:</p>
							            <p> {{$dados->usuario}}</p>
							      </div>
							      <div class="modal-footer">
							        <a href="#" type="button" class="btn btn-danger" id="delete">Apagar Registo</a>
							            <button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
							      </div>
							    </div>

							  </div>
							</div>

				 @endforeach
                
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">{{ date('d/m/Y')}}</div>
      
    </div>   
</div>

	
@endsection