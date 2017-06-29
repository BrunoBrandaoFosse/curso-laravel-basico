
@extends('painel.templates.template')

@section('conteudo')

<div style="max-width:1200px;margin:0 auto;">
<h1>Listagem dos produtos</h1>

	<a href="{{ route('produtos.create') }}" class="btn btn-primary btn-add">
		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Cadastrar
	</a>

	<table class="table table-striped">
	<thead>
		<tr>
	    	<th style="width:10%;">Nome</th>
	    	<th>Descrição</th>
	    	<th style="width:100px;">Ações</th>
	  	</tr>
	</thead>
	<tbody>
	  	@foreach($products as $product)
	  	<tr>
	    	<td>{{ $product->name }}</td>
	    	<td>{{ $product->description }}</td>
	    	<td>
	    		<a href="{{route('produtos.edit', $product->id)}}" class="action edit">
	    			<span class="glyphicon glyphicon-pencil"></span>
	    		</a>
	    		<a href="{{route('produtos.show', $product->id)}}" class="action delete"><span class="glyphicon glyphicon-eye-open"></span></a>
	    	</td>
	  	</tr>
	  	@endforeach
	</tbody>
	</table>
	{{-- Para fazer páginação --}}
	{!! $products->links() !!}
</div>

@endsection