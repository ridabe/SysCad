<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('css/app.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/main.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css' )}}" rel="stylesheet" type="text/css">
   <link href="{{asset('vendor/datatables/dataTables.bootstrap4.css' )}}" rel="stylesheet">
   <link href="{{asset('css/sb-admin.css' )}}" rel="stylesheet">
  
  

    <title>Sistema Interno </title>
  </head>
  <body class="fixed-nav sticky-footer bg-ligth" id="page-top">
<div class="container-fluid">
   
<!--
    <div class="row">

      <div class="col col-lg-2">
        @include('inc.lateral_interno')
      </div>

      <div class="col">
       
      </div>-->
       @yield('conteudo')

    </div>
   <div>
     @include('inc.footer_interno')
   </div>


   


</div>
<!-- Scroll to Top Button-->
   


    <!-- JavaScript (Opcional) -->
    <script src="{{asset('js/app.js')}}"> </script>
    
    <script src="{{asset('js/jquery-1.2.6.pack.js')}}"> </script>
    <script src="{{asset('js/jquery.maskedinput-1.1.4.pack.js')}}"> </script>
    <script src="{{asset('js/sb-admin.min.js')}}"> </script>
    <script src="{{asset('js/sb-admin-datatables.min.js')}}"> </script>

    <script src="{{asset('vendor/jquery/jquery.min.js')}}"> </script>
   
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"> </script>
    <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"> </script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"> </script>

    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <!--script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
     <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"> </script>
     <script src="{{asset('js/bootstrap.min.js')}}"> </script>
    <!--script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script-->
  </body>
</html>
