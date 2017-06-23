<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{$titulo or 'Curso de Laravel Básico'}}</title>{{-- Senão existir a variável $titulo, então, será exibido a mensagem 'curso de laravel básico'. --}}
        
        @stack('seo'){{-- passar dinamicamente --}}
        
        <link rel="shortcut icon" href="">
        <link rel="stylesheet" type="text/css" href="">
        <link href="https://fonts.googleapis.com/css?family=Mogra" rel="stylesheet">
        
        <style>
            html, body { font-family: 'Mogra', cursive; background-color: #fff; color: #636b6f; font-weight: 100; height: 100vh; margin: 0; font-size: 28px;}
            .container{text-align:center;padding-top:5%;}
            h1 {font-size:78px;color:#666;}
            h3{font:14px Arial;}
        </style>

    </head>
    <body>
        <div class="container">
            
            @yield('conteudo')<!-- Área dinâmica, onde virá o conteúdo do meu site. -->
            
        </div><!-- /.container -->
        
        @stack('scripts'){{-- Muito bom para trabalhar com SEO --}}
        
    </body>
</html>