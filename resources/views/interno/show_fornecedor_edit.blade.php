@extends('layouts.temp_interno')

@section('conteudo')

<div class="alert alert-secondary" role="alert">

	
        <form method="POST" action="{{route('show_fornecedor_update')}}">
{{ csrf_field() }}
    <h3>Produtos</h3>
	<div class="shadow p-3 mb-5 bg-black rounded">

		<div class="row justify-content-md-center">
		    <div class="col col-md-auto">
		      <h5>Área de controle:</h5>
		    </div>

		    <div class="col-md-auto">
		     
		    	<div class="form-group form-check">
				    <input type="checkbox" class="form-check-input" id="desativar" >
				    <label class="form-check-label " for="exampleCheck1" >Atualizar</label>
				  </div>

		    </div>

		    <div class="col col-md-auto">
		       
		    </div>

		</div>


	</div>


<div class="row">
			<div class="form-group col-9">
			    <label for="nomeCliente">Empresa</label>
			    <input type="text" class="form-control" id="nomeEmpresa" aria-describedby="nomeEmpresa" placeholder="Empresa" name="empresa" value="{{$dadosFornecedor->empresa}}" readonly="true">
			    
			</div>
			<div class="form-group col-3">
			    <label for="cpfCliente">CNPJ</label>
			    <input type="text" class="form-control" id="cnpjForn" aria-describedby="cnpjForn"  name="cnpj" value="{{$dadosFornecedor->cnpj}}" readonly="true">
			   
			</div>
</div>

<div class="row">			
			<div class="form-group col-4">
			    <label for="nomeCliente">Fornecedor</label>
			    <input type="text" class="form-control" id="nomeforn" aria-describedby="nomeforn" placeholder="Nome" name="nomeForn" value="{{$dadosFornecedor->nomeforn}}" readonly="true">
			    
			</div>

			<div class="form-group col-2">
			    <label for="cpfCliente">CPF</label>
			    <input type="text" class="form-control" id="cpfForn" aria-describedby="cpfForn"  name="cpfForn"value="{{$dadosFornecedor->cpfforn}}" readonly="true">
			   
			</div>

			<div class="form-group col-4">
			    <label for="emailForn">E-mail</label>
			    <input type="email" class="form-control" id="emailForn" aria-describedby="emailforn" placeholder="email@email.com" name="email" value="{{$dadosFornecedor->emailforn}}" readonly="true">
			    <small id="emailHelp" class="form-text text-muted">Insira um email válido.</small>
			</div>
			
			<div class="form-group col-2">
			    <label for="telCliente">Telefone</label>
			    <input type="text" class="form-control" id="telForn" aria-describedby="telForn"  name="telForn" maxlength="15" value="{{$dadosFornecedor->telforn}}" readonly="true" onblur="mask_all(this.value);">
			   
			</div>
</div>
		<hr>
		
<div class="row">
		
		  <div class="col-2">
		  	<div class="form-group">
			    <label for="cepForn">Preencha o Cep</label>
			    <input type="text" class="form-control" id="cepForn" aria-describedby="cepForn" name="cepFornecedor" value="{{$dadosFornecedor->cepforn}}" required="true" readonly="true" >
			    
			</div>

		  </div>
		  
		

		
		  <div class="col-3">
		  	
			<div class="form-group">
			    <label for="ruaForn">Rua</label>
			    <input type="text" class="form-control" id="ruaForn" aria-describedby="ruaForn"  name="ruaForn" value="{{$dadosFornecedor->rua}}" readonly="true">
			    
			</div>


		  </div>
		  <div class="col-1">
		  	<div class="form-group">
			    <label for="numRuaForn">Nº</label>
			    <input type="text" class="form-control" id="numRuaForn" aria-describedby="numRuaCliente"  name="numRuaForn" value="{{$dadosFornecedor->numero}}" readonly="true">
			    
			</div>


		  </div>
		  <div class="col-2">
		  	<div class="form-group">
			    <label for="cidadeForn">Cidade</label>
			    <input type="text" class="form-control" id="cidadeForn" aria-describedby="cidadeCliente"  name="cidadeForn" value="{{$dadosFornecedor->cidade}}" readonly="true">
			    
			</div>


		  </div>
		  <div class="col-2">
		  	<div class="form-group">
			    <label for="bairroForn">Bairro</label>
			    <input type="text" class="form-control" id="bairroForn" aria-describedby="bairroCliente"  name="bairroForn" value="{{$dadosFornecedor->bairro}}" readonly="true">
			    
			</div>


		  </div>

		  <div class="col-2">
		  	<div class="form-group">
			    <label for="ufForn">Estado</label>
			    <input type="text" class="form-control" id="ufForn" aria-describedby="ufForn"  name="ufForn" value="{{$dadosFornecedor->estado}}" readonly="true">
			    
			</div>


		  </div>
</div>		  

		
			<div class="form-group">
			    <label for="obsForn">Obs</label>
			    <input type="text" class="form-control" id="obsForn" aria-describedby="obsForn"  name="obsForn" value="{{$dadosFornecedor->obsforn}}" readonly="true">
			    
			</div>

			<hr class="my-4">

	    <div class="row justify-content-md-center">

	    	<div class="col col-md-auto">
		      <button type="submit" class="btn btn-success form-control" id="edicao" disabled="true"  >Salvar Edição</button>
		    </div>

		    <div class="col col-md-auto">
		      <a class="btn btn-primary" href="{{route('fornecedorListar')}}"  role="button">Listar Itens</a>
		    </div>

		    <div class="col-md-auto">
		      <a class="btn btn-warning" href="{{route('imprime_fornecedor',$dadosFornecedor->id_forn)}}" target="_blank"  role="button">Imprimir</a>
		    </div>

		    <div class="col col-md-auto">
		       <button type="button" class="btn btn-danger form-control" data-toggle="modal" data-target="#confirm{{$dadosFornecedor->id_forn}}">Apagar</button>
		    </div>

		</div>
	</div>
  <!-- Enviar um campo hidden-->
  <input type="hidden" id="id" name="id" value="{{$dadosFornecedor->id_forn}}"  >
</form>

					<div class="modal fade" id="confirm{{$dadosFornecedor->id_forn}}" role="dialog">
							  <div class="modal-dialog modal-md">

							    <div class="modal-content">
							      <div class="modal-body">
							            <p> Deseja excluir os dados de:</p>
							            <p> {{$dadosFornecedor->empresa}} </p>
							      </div>
							      <div class="modal-footer">
							        <a href="{{route('delete_fornecedor',$dadosFornecedor->id_forn)}}" type="button" class="btn btn-danger" id="delete">Apagar Registo</a>
							            <button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
							      </div>
							    </div>

							  </div>
					</div>

<script type="text/javascript">

		 $(document).ready(function(e) { 
		   $("#desativar").click(function(e) {  
		      if($(this).is(':checked')) //Retornar true ou false      
		      $('.form-control').prop('readonly', false);  
		        else      
		        $('.form-control').prop('readonly', true);
          });
		});

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