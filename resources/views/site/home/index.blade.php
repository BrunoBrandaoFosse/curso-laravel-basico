
@extends('site.template.template1')

@section('conteudo')<!-- inicia a minha seção conteúdo -->

<h1>{{$mensagem}}</h1>

<!-- Trabalhar com variáveis não definida -->
<h3>{{ $var1 or 'Não existe esta variável definida no controller.' }}</h3>

@if($senha == '123')
	<h3><strong style='color:green'>Senha Válida!</strong></h3>
@else
	<h3><strong style='color:red'>Senha Inválida!</strong></h3>
@endif

<!-- Inverso do IF. IF verifica se a condição é verdadeira e 
Unless verifica se é falsa. -->
@unless($senha == '1234')
	<h3><strong style='color:red'>Senha Inválida - Unless!</strong></h3>
@endunless()

<h3><strong>For:</strong>
@for($i = 0; $i < 10; $i++)
	Valor:{{$i}}
	@unless($i == 9),@endunless<!-- Senão for igual ao último elemento põem vírgula -->
@endfor
</h3>

{{-- Estou comentando este trecho de código do template blade.
<h3><strong>Foreach:</strong>
@if(count($dados) > 0)
	@foreach($dados as $data)
		{{$data}}
	@endforeach
@else
	<h3><strong style='color:red'>Array está vázio!</strong></h3>
@endif
</h3>
--}}


<h3><strong>Forelse:</strong>
@forelse($dadosVazio as $dados)
	{{$dados}}
@empty
	<strong style='color:red'>Array está vázio!</strong>
@endforelse
</h3>

{{-- Comentário no Sistema de Template Blade --}}


@php
{{-- Aqui dentro eu trabalho com PHP --}}
$email = 'contato@dominio.com.br';
@endphp

{{-- Incluindo o arquivo sidebar.blade.php. Eu também posso passar parâmetro para o template --}}
@include('site.includes.sidebar', compact('email'))


@endsection


@push('scripts')
<!-- 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
@endpush

@push('seo')
	<meta name="description" content="Descrição da Página Inicial">
	<meta name="keywords" content="página inicial">
	<meta name="author" content="">
@endpush
