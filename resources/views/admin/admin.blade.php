@extends('layouts.temp_admin')



@section('conteudo')

<div class="alert alert-secondary" role="alert">
	<img src="{{asset('imagens/banner_interno.png')}}" class="img-fluid" alt="Algoritmum">
        
       <div class="alert alert-danger" role="alert">
  			@include('inc.erros')
		</div> 

       <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-address-card"></i>
              </div>
              <div class="mr-5"><b>{{$totalCli}}</b> Clientes Cadastrados</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('clienteListar')}}">
              <span class="float-left">Listar Clientes</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5"><b>{{$totalprod}}</b> Produtos Cadastrados</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="">
              <span class="float-left">Listar Produtos</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5"><b>{{$totalForn}}</b> Fornecedores Cadastrados</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('fornecedorListar')}}">
              <span class="float-left">Listar Fornecedores</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <!--div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5">13 New Tickets!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div-->
      </div>

       <!-- Fim Icon Cards-->


       <!-- Mensagens--> 
    <div class="row">

      	 @if($admin == 1)
     <div class="col col-lg-6">

            
                      <h5>Usuários On Line</h5>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nome</th>
                      <th>Email</th>
               
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>ID</th>
                      <th>Nome</th>
                      <th>Email</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($onLine as $line)
                <tr>
                  <th scope="row">{{$line->id_usuario}}</th>
                  <td>{{$line->usuario}}</td>
                  <td>{{$line->email}}</td>

                </tr>
               

             @endforeach
                    
                  </tbody>
                </table>
              </div>
             
          </div>
        @endif  
      	<div class="col col-lg-6">
      		<div class="alert alert-info" role="alert">
		        <h5>Mensagens do Adm</h5>
		        <hr>
			</div>

       
    	</div>
    </div>
	<!-- Fim Mensagens-->
        
       
</div>

@endsection
