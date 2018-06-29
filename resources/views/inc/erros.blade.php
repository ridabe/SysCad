@if (count($errors) !=0)

<div class="alert alert-warning alert-dismissible fade show" role="alert">

       @if(count($errors) == 1)

       <strong>Erro:</strong>
       @else
       <strong>Erros:</strong>
        @endif

        <ul>
            @foreach($errors->all() as $erro)
            <li>{{ $erro }}</li>
            @endforeach


        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>
 </div>
@endif

<!--Erros do Banco -->
@if(isset($erros_bd))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    @foreach ($erros_bd as $erro )
        <p>{{ $erro }}</p>
    @endforeach

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
    </button>
</div>

@endif


<!--Confirmacao -->
@if(isset($confirmacao))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    @foreach ($confirmacao as $confirma )
        <p>{{ $confirma }}</p>
    @endforeach

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
    </button>
</div>

@endif

