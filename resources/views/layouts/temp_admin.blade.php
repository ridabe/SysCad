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
 <script src="https://code.jquery.com/jquery-2.1.3.min.js" type="application/javascript" language="javascript"></script>
  

    <title>Área Admin </title>




  </head>
  <body class="fixed-nav sticky-footer bg-ligth" id="page-top">
<div class="container-fluid">
    @include('inc.header_admin')

       @yield('conteudo')

    </div>
   <div>
     @include('inc.footer_interno')
   </div>

   


</div>
<!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>


    <!-- JavaScript (Opcional) -->
    <script src="{{asset('js/app.js')}}"> </script>
    
    <script src="{{asset('js/jquery-1.2.6.pack.js')}}"> </script>
    <!--script src="{{asset('js/jquery.maskedinput-1.1.4.pack.js')}}"> </script-->
    <script src="{{asset('js/sb-admin.min.js')}}"> </script>
    <script src="{{asset('js/sb-admin-datatables.min.js')}}"> </script>

    <script src="{{asset('vendor/jquery/jquery.min.js')}}"> </script>
   
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"> </script>
    <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"> </script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"> </script>
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script-->
    <!--script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script-->

    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <!--script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
     <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"> </script>
     <script src="{{asset('js/bootstrap.min.js')}}"> </script>
    <!--script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script-->
  </body>
</html>