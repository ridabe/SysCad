
	@extends('layouts.temp_interno')

@section('conteudo')



<div class="alert alert-secondary" role="alert">

	 <div class="alert alert-info" role="alert">
		        <h3 class="alert-heading">Pesquisar/Alterar Clientes</h3>
		        <hr>
	</div>


      <div class="card mb-3">
      

        <div class="card-header">
          
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
			      <th>Nome</th>
			      <th>Email</th>
			      <th>Telefone</th>
			      <th>CPF</th>
			      <th>Endereço</th>
			      <th>Editar</th>
			      <th>Apagar</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
			      <th>Nome</th>
			      <th>Email</th
			      <th>Telefone</th>
			      <th>CPF</th>
			      <th>Endereço</th>
			      <th>Editar</th>
			      <th>Apagar</th>
                </tr>
              </tfoot>
              <tbody>
               
				    <tr>
				    
				     
				      <td>{{$dados->id}}</td>
				      <td>{{$dados->nomecli}}</td>
				      <td>{{$dados->emailcli}}</td>
				      <td>{{$dados->telcli}}</td>
				      <td>{{$dados->cpfcli}}</td>
				       <td>{{$dados->rua }} - {{$dados->numero}} / {{$dados->cidade }} - {{$dados->estado}} </td>
				    
				     
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
				    </tr>
				
                
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">


        		<div class="row">

			      <div class="col col-lg-10">
			       		{{ date('d/m/Y')}}
			      </div>

			      <div class="col col-lg-2">

			      	
			      		<a class="dropdown-item" href="{{route('clienteListar')}}">
			      			<button type="button" class="btn btn-success">Voltar</button>
			      			
			      		</a>
			       
			      </div>
			  </div>

        </div>
      
    </div>   
</div>
	
@endsection