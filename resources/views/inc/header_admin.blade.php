<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">Bem-Vindo Adm: {{ session('usuario') }}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('interno')}}">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Cliente
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{route('clienteCreate')}}">Adicionar</a>
          <a class="dropdown-item" href="{{route('clienteListar')}}">Pesquisar/Alterar</a>
          
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Fornecedor
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{route('fornecedorCreate')}}">Adicionar</a>
          <a class="dropdown-item" href="{{route('fornecedorListar')}}">Pesquisar/Alterar</a>
          
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Produtos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{route('produtosCreate')}}">Adicionar</a>
          <a class="dropdown-item" href="{{route('produtosListar')}}">Pesquisar/Alterar</a>
         
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Administrador
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{route('usuarioListar')}}">Administrar User</a>
          <a class="dropdown-item" href="#">Enviar Mensagens</a>
         
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">Manual</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('index')}}">Logout</a>
      </li>
    </ul>
  </div>
</nav>