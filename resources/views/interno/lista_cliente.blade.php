
@extends('layouts.temp_interno')



@section('conteudo')



<div class="alert alert-secondary" role="alert">

	 <div class="alert alert-info" role="alert">
		        <h3 class="alert-heading">Pesquisar/Alterar Clientes</h3>
		        <hr>
	</div>


      <div class="card mb-3">
      	<!-- /////////////////////Pesquisar Cliente pelo Id///////////////////////////////////////    -->
<br>
			 <div class="row">

			      <div class="col col-lg-8">
			       
			      </div>

			      <div class="col col-lg-4">

			      	<form class="form-inline" method="POST" action="{{route('show_cliente')}}">
			      		{{ csrf_field() }}
					  <div class="form-group mb-2">
					   
					  </div>
					  <div class="form-group mx-sm-3 mb-2">
					    <label for="inputPassword2" class="sr-only">Id</label>
					    <input type="text" class="form-control" id="inputPassword2" name="id" placeholder="id">
					  </div>
					  <button type="submit" class="btn btn-primary mb-2">Buscar</button>
					</form>


			       
			      </div>
			  </div>

      	

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
			      <th>CPF</th>
			      <th>Visualizar</th>
			      <th>Apagar</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
			      <th>Nome</th>
			      <th>CPF</th>
			      <th>Visualizar</th>
			      <th>Apagar</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($dadosCliente as $dados)
				    <tr>
				      <th scope="row">{{$dados->id}}</th>
				      <td>{{$dados->nomecli}}</td>
				      <td>{{$dados->cpfcli}}</td>

				     
				        <td >
				      		<a href="{{route('show_cliente_edit',$dados->id)}}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Editar</a>
					    </td>
				      	<td >
				      		<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirm{{$dados->id}}">Apagar</button>



					    </td>
				    </tr>

				    	<div class="modal fade" id="confirm{{$dados->id}}" role="dialog">
							  <div class="modal-dialog modal-md">

							    <div class="modal-content">
							      <div class="modal-body">
							            <p> Deseja excluir os dados de:</p>
							            <p> {{$dados->nomecli}}</p>
							      </div>
							      <div class="modal-footer">
							        <a href="{{route('delete_cliente',$dados->id)}}" type="button" class="btn btn-danger" id="delete">Apagar Registo</a>
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
