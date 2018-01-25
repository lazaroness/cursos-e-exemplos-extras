@extends('layout.principal')
@section('conteudo')

<h1>Editar Produto</h1>
@if(count($errors) > 0)
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<form action="/produtos/update_do" method="post">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<input type="hidden" name="id" value="{{{ $obj->id }}}" />
	<div class="form-group">
		<label>Nome:</label>
		<input name="nome" value="{{{ $obj->nome }}}" class="form-control" />
	</div>
	<div class="form-group">
		<label>Descrição</label>
		<input name="descricao" value="{{{ $obj->descricao }}}" class="form-control" />
	</div>
	<div class="form-group">
		<label>Valor</label>
		<input name="valor" value="{{{ $obj->valor }}}" class="form-control" />
	</div>
	<div class="form-group">
		<label>Quantidade</label>
		<input name="quantidade" value="{{{ $obj->quantidade }}}" type="number" class="form-control" />
	</div>
	<button type="submit" class="btn btn-primary btn-block">Atualizar</button>
</form>
@stop