
	@extends('layouts.temp_interno')
	

@section('conteudo')



<div class="alert alert-secondary" role="alert">

	 <div class="alert alert-primary" role="alert">
		        <h3 class="alert-heading">Cadastrar Fornecedor</h3>
		        <hr>
	</div>
	
        
        <form method="POST" action="{{route('fornecedorStore')}}">
{{ csrf_field() }}

<div class="row">
			<div class="form-group col-9">
			    <label for="nomeCliente"><b>Empresa</b></label>
			    <input type="text" class="form-control" id="nomeEmpresa" aria-describedby="nomeEmpresa" placeholder="Empresa" name="empresa">
			    
			</div>
			<div class="form-group col-3">
			    <label for="cpfCliente"><b>CNPJ</b></label>
			    <input type="text" class="form-control" id="cnpjForn" aria-describedby="cnpjForn"  name="cnpj">
			   
			</div>
</div>

<div class="row">			
			<div class="form-group col-4">
			    <label for="nomeCliente"><b>Fornecedor</b></label>
			    <input type="text" class="form-control" id="nomeforn" aria-describedby="nomeforn" placeholder="Nome" name="nomeForn">
			    
			</div>

			<div class="form-group col-3">
			    <label for="cpfCliente"><b>CPF</b></label>
			    <input type="text" class="form-control" id="cpfForn" aria-describedby="cpfForn"  name="cpfForn">
			   
			</div>

			<div class="form-group col-3">
			    <label for="emailForn"><b>E-mail</b></label>
			    <input type="email" class="form-control" id="emailForn" aria-describedby="emailforn" placeholder="email@email.com" name="email">
			    <small id="emailHelp" class="form-text text-muted">Insira um email válido.</small>
			</div>
			
			<div class="form-group col-2">
			    <label for="telCliente"><b>Telefone</b></label>
			    <input type="text" class="form-control" id="telForn" aria-describedby="telForn"  name="telForn" maxlength="15" onblur="mask_all(this.value);">
			   
			</div>
</div>			
		<hr>

<div class="row">		
		
		  <div class="col-2">
		  	<div class="form-group">
			    <label for="cepForn"><b>Preencha o Cep</b></label>
			    <input type="text" class="form-control" id="cepForn" aria-describedby="cepForn" placeholder="99999-999" name="cepFornecedor" required="true" onblur="pesquisacep(this.value);">
			    
			</div>

		  </div>
		  
		  <div class="col-3">
		  	
			<div class="form-group">
			    <label for="ruaForn"><b>Rua</b></label>
			    <input type="text" class="form-control" id="ruaForn" aria-describedby="ruaForn"  name="ruaForn">
			    
			</div>


		  </div>
		  <div class="col-1">
		  	<div class="form-group">
			    <label for="numRuaForn"><b>Nº</b></label>
			    <input type="text" class="form-control" id="numRuaForn" aria-describedby="numRuaCliente"  name="numRuaForn">
			    
			</div>


		  </div>
		  <div class="col-2">
		  	<div class="form-group">
			    <label for="cidadeForn"><b>Cidade</b></label>
			    <input type="text" class="form-control" id="cidadeForn" aria-describedby="cidadeCliente"  name="cidadeForn">
			    
			</div>


		  </div>
		  <div class="col-2">
		  	<div class="form-group">
			    <label for="bairroForn"><b>Bairro</b></label>
			    <input type="text" class="form-control" id="bairroForn" aria-describedby="bairroCliente"  name="bairroForn">
			    
			</div>


		  </div>

		  <div class="col-2">
		  	<div class="form-group">
			    <label for="ufForn"><b>Estado</b></label>
			    <input type="text" class="form-control" id="ufForn" aria-describedby="ufForn"  name="ufForn">
			    
			</div>


		  </div>
</div>		  


			<div class="form-group">
			    <label for="obsForn"><b>Obs</b></label>
			    <input type="text" class="form-control" id="obsForn" aria-describedby="obsForn"  name="obsForn">
			    
			</div>
		<div class="row justify-content-md-center">	
			<button type="submit" class="btn btn-primary">Enviar</button>
		</div>	

        </form>
        <hr>
       
</div>


	<script>
		 $(document).ready(function(){
				$("#cepForn").mask("99999-999");
			});

	 </script>


<!--Area para JS-->

<script type="text/javascript">
function mask_all() {	
$(document).ready(function(){
  $("telForn").inputmask("99-9999999");  //static mask
  $(selector).inputmask({"mask": "(999) 999-9999"}); //specifying options
  $(selector).inputmask("9-a{1,3}9{1,3}"); //mask with dynamic syntax
});
}
</script>





<script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('ruaForn').value=("");
            document.getElementById('bairroForn').value=("");
            document.getElementById('cidadeForn').value=("");
            document.getElementById('ufForn').value=("");
            
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('ruaForn').value=(conteudo.logradouro);
            document.getElementById('bairroForn').value=(conteudo.bairro);
            document.getElementById('cidadeForn').cidadevalue=(conteudo.localidade);
            document.getElementById('ufForn').value=(conteudo.uf);
            
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
                document.getElementById('ruaForn').value="...";
                document.getElementById('bairroForn').value="...";
                document.getElementById('cidadeForn').value="...";
                document.getElementById('ufForn').value="...";
               

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