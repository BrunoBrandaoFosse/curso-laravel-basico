
@extends('painel.templates.template')

@section('conteudo')

<h1>Cadastrar Produto</h1>

{{-- 'errors' é do próprio Laravel --}}
@if(isset($errors) && count($errors) > 0)
	<div class="alert alert-danger">
	@foreach($errors->all() as $error)
		<p>{{ $error }}</p>
	@endforeach
	</div>
@endif

@if(isset($product))
	<form class="form" method="post" action="{{ route('produtos.update', $product->id) }}">
	{!! method_field('PUT')  !!}
@else
	<form class="form" method="post" action="{{ route('produtos.store') }}">
@endif
	{!! csrf_field() !!}
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
	
</form>

@endsection
