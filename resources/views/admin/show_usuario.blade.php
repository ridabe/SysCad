@extends('layouts.temp_interno')

@section('conteudo')


<div class="alert alert-secondary" role="alert">

	
	<div class="shadow p-3 mb-5 bg-black rounded">
<h3>Clientes</h3>
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
	
        
        <form method="POST" action="#">
{{ csrf_field() }}



<div class="row">
			<div class="form-group col-9">
			    <label for="nomeCliente"><b>Nome</b></label>
			    <input type="text" class="form-control" id="nomeCliente" aria-describedby="nomeCliente" placeholder="Nome" name="nome" value="{{$dadosUsuario->usuario}}" readonly="true">
			    
			</div>

			<div class="form-group col-3">
			    <label for="cpfCliente"><b>Email</b></label>
			    <input type="text" class="form-control" id="cpfCliente" aria-describedby="cpfCliente"  name="cpfCliente" value="{{$dadosUsuario->email}}" readonly="true">
			   
			</div>
			
</div>	


		<hr class="my-4">



<div class="row">
	

</div>		  

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
		      <a class="btn btn-warning" href="#" target="_blank"  role="button">Imprimir</a>
		    </div>

		    <div class="col col-md-auto">
		       <button type="button" class="btn btn-danger form-control" data-toggle="modal" data-target="#confirm{{$dadosUsuario->id_usuario}}">Apagar</button>
		    </div>

		</div>
	
  <!-- Enviar um campo hidden-->
  <input type="hidden" id="id" name="id" value="{{$dadosUsuario->id_usuario}}"  >
</form>

					<div class="modal fade" id="confirm{{$dadosUsuario->id_usuario}}" role="dialog">
							  <div class="modal-dialog modal-md">

							    <div class="modal-content">
							      <div class="modal-body">
							            <p> Deseja excluir os dados de:</p>
							            <p>{{$dadosUsuario->usuario}} </p>
							      </div>
							      <div class="modal-footer">
							        <a href="#" type="button" class="btn btn-danger" id="delete">Apagar Registo</a>
							            <button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
							      </div>
							    </div>

							  </div>
					</div>


        </form>
    

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
       
<script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('ruaCliente').value=("");
            document.getElementById('bairroCliente').value=("");
            document.getElementById('cidadeCliente').value=("");
            document.getElementById('ufCliente').value=("");
            
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('ruaCliente').value=(conteudo.logradouro);
            document.getElementById('bairroCliente').value=(conteudo.bairro);
            document.getElementById('cidadeCliente').cidadevalue=(conteudo.localidade);
            document.getElementById('ufCliente').value=(conteudo.uf);
            
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('ruaCliente').value="...";
                document.getElementById('bairroCliente').value="...";
                document.getElementById('cidadeCliente').value="...";
                document.getElementById('ufCliente').value="...";
               

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };
//Mask de telefone

    </script>


@endsection