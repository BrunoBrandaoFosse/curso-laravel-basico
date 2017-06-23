
@extends('painel.templates.template')

@section('conteudo')

<div style="max-width:1200px;margin:0 auto;">
<h1>Listagem dos produtos</h1>
	<table class="table table-striped">
	<thead>
		<tr>
	    	<th style="width:10%;">Nome</th>
	    	<th>Descrição</th>
	  	</tr>
	</thead>
	<tbody>
	
	  	@foreach($products as $product)
	  	<tr>
	    	<td>{{ $product->name }}</td>
	    	<td>{{ $product->description }}</td>
	  	</tr>
	  	@endforeach
	  	
	</tbody>
	</table>
</div>

@endsection