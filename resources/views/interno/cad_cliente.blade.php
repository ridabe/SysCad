@extends('layouts.temp_interno')



@section('conteudo')



<div class="alert alert-secondary" role="alert">

	 <div class="alert alert-primary" role="alert">
		        <h3 class="alert-heading">Cadastrar Clientes</h3>
		        <hr>
	</div>
	
        
        <form method="POST" action="{{route('clienteStore')}}">
{{ csrf_field() }}
<div class="row">
			<div class="form-group col-9">
			    <label for="nomeCliente"><b>Nome</b></label>
			    <input type="text" class="form-control" id="nomeCliente" aria-describedby="nomeCliente" placeholder="Nome" name="nome" >
			    
			</div>

			<div class="form-group col-3">
			    <label for="cpfCliente"><b>CPF</b></label>
			    <input type="text" class="form-control" id="cpfCliente" aria-describedby="cpfCliente"  name="cpfCliente" >
			   
			</div>
			
</div>	

<div class="row">
			<div class="form-group col-9">
			    <label for="emailCliente"><b>E-mail</b></label>
			    <input type="email" class="form-control" id="emailCliente" aria-describedby="emailCliente" placeholder="email@email.com" name="emailCliente">
			    
			</div>	
			
			<div class="form-group col-3">
			    <label for="telCliente"><b>Telefone</b></label>
			    <input type="text" class="form-control" id="telCliente" aria-describedby="telCliente"  name="telCliente" >
			   
			</div>
</div>
		<hr class="my-4">



<div class="row">
		  <div class="col-2">
		  	<div class="form-group">
			    <label for="emailCliente"><b>Preencha o Cep</b></label>
			    <input type="text" class="form-control" id="cepCliente" aria-describedby="cepCliente" placeholder="99999-999" name="cepCliente" onblur="pesquisacep(this.value)">
			    
			</div>

		  </div>

		  <div class="col-3">
		  	
			<div class="form-group">
			    <label for="ruaCliente"><b>Rua</b></label>
			    <input type="text" class="form-control" id="ruaCliente" aria-describedby="ruaCliente"  name="ruaCliente" >
			    
			</div>


		  </div>

		   <div class="col-1">
		  	<div class="form-group">
			    <label for="numRuaCliente"><b>Nº</b></label>
			    <input type="text" class="form-control" id="numRuaCliente" aria-describedby="numRuaCliente"  name="numRuaCliente">
			    
			</div>

		  </div>

		  <div class="col-2">
		  	<div class="form-group">
			    <label for="cidadeCliente"><b>Cidade</b></label>
			    <input type="text" class="form-control" id="cidadeCliente" aria-describedby="cidadeCliente"  name="cidadeCliente">
			    
			</div>
		  
		</div>
		<div class="col-2">
		  	<div class="form-group">
			    <label for="ufCliente"><b>Bairro</b></label>
			    <input type="text" class="form-control" id="bairroCliente" name="bairroCliente">
			    
			</div>
		</div>

		<div class="col-2">
		  	<div class="form-group">
			    <label for="ufCliente"><b>Estado</b></label>
			    <input type="text" class="form-control" id="ufCliente" aria-describedby="ufCliente"  name="ufCliente">
			    
			</div>


		  </div>



</div>		  


			<div class="form-group">
			    <label for="obsCliente">Obs</label>
			    <input type="text" class="form-control" id="obsCliente" aria-describedby="obsCliente"  name="obsCliente">
			    
			</div>

				

			<div class="row justify-content-md-center">

		    	<div class="col col-md-auto">
			      <button type="submit" class="btn btn-success form-control" id="edicao">Salvar</button>
			    </div>		   

		    </div>


        </form>
        <hr>
       
</div>


	


<!--Area para JS-->


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