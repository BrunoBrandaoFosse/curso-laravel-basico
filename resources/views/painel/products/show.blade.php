
@extends('painel.templates.template')

@section('conteudo')

<h1>
<a href="{{route('produtos.index')}}"><span class="glyphicon glyphicon-fast-backward"></span>Voltar</a>
@if(isset($product))Editar Produto: {{$product->name}}@else Cadastrar Produto @endif</h1>

<p><b>Ativo:</b> {{ $product->active }}</p>
<p><b>Número:</b> {{ $product->number }}</p>
<p><b>Categoria:</b> {{ $product->category }}</p>
<p><b>Descrição:</b> {{ $product->description }}</p>

{{-- Form por default é do tipo 'post'. Para deletar tem que ser do tipo 'DELETE' --}}

{!! Form::open(['route' => ['produtos.destroy', $product->id], 'class' => 'form', 'method' => 'DELETE']) !!}
	{!! Form::submit("Deletar Produto: {$product->name}", ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}

@endsection
