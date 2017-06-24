
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



<form class="form" method="post" action="{{ route('produtos.store') }}">
	{!! csrf_field() !!}
	<div class="form-group">
		<input type="text" name="name" placeholder="Nome:" class="form-control" value="{{old('name')}}">
	</div>
	
	<div class="form-group">
		<input type="checkbox" name="active" value="1"><label for="active"> Ativo?</label>
	</div>
	
	<div class="form-group">
		<input type="text" name="number" placeholder="Número:" class="form-control" value="{{old('number')}}">
	</div>
	
	<div class="form-group">
		<select name="category" class="form-control">
			<option value="">Escolha a Categoria</option>
			@foreach($categorias as $categoria)
				<option value="{{ $categoria }}">{{ $categoria }}</option>
			@endforeach
		</select>
	</div>
	
	<div class="form-group">
		<textarea name="description" placeholder="Descrição" class="form-control" 
				value="{{old('description')}}"></textarea>
	</div>
	
	<div class="form-group">
		<button class="btn btn-primary">Enviar</button>
	</div>
</form>

@endsection
