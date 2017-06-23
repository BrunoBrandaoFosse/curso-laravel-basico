<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{$titulo or 'Painel Curso'}}</title>
        <link rel="shortcut icon" href="">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Mogra" rel="stylesheet">
        
        <style>
		*{font-family:Arial;font-size:14px;}
		body{background-color:#f6f6f6;}
		</style>
    </head>
    <body>
        <div class="container">
            
            @yield('conteudo')
            
        </div><!-- /.container -->
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="{{ asset('js/bootstrap.js') }}"></script>
    </body>
</html>