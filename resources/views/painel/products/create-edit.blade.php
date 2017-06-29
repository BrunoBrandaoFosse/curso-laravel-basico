
@extends('painel.templates.template')

@section('conteudo')

<h1>
<a href="{{route('produtos.index')}}"><span class="glyphicon glyphicon-fast-backward"></span>Voltar</a>
@if(isset($product))Editar Produto: {{$product->name}}@else Cadastrar Produto @endif</h1>

{{-- 'errors' é do próprio Laravel --}}
@if(isset($errors) && count($errors) > 0)
	<div class="alert alert-danger">
	@foreach($errors->all() as $error)
		<p>{{ $error }}</p>
	@endforeach
	</div>
@endif

@if(isset($product))
	{{-- Com model eu consigo usar um modelo. Assim eu recupero os valores de um produto. --}}
	{!! Form::model($product, ['route' => ['produtos.update', $product->id], 'class' => 'form', 'method' => 'put']) !!}
@else
	{!! Form::open(['route' => 'produtos.store', 'class' => 'form']) !!}
@endif
	<div class="form-group">
		{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome:']) !!}
	</div>
	
	<div class="form-group">
		<label>
			{!! Form::checkbox('active') !!}
			Ativo?
		</label>
	</div>
	
	<div class="form-group">
		<input type="text" name="number" placeholder="Número:" class="form-control" value="{{$product->number or old('number')}}">
	</div>
	
	<div class="form-group">
		{!! Form::select('category', $categorias, null, ['class' => 'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Descrição']) !!}
	</div>
	
	{!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@endsection
