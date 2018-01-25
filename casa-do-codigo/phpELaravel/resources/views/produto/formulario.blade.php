@extends('layout.principal')
@section('conteudo')

<h1>Novo Produto</h1>
@if(count($errors) > 0)
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<form action="/produtos/adiciona" method="post">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	<div class="form-group">
		<label>Nome:</label>
		<input name="nome" value="{{ old('nome') }}" class="form-control" />
	</div>
	<div class="form-group">
		<label>Descrição</label>
		<input name="descricao" value="{{ old('descricao') }}" class="form-control" />
	</div>
	<div class="form-group">
		<label>Valor</label>
		<input name="valor" value="{{ old('valor') }}" class="form-control" />
	</div>
	<div class="form-group">
		<label>Quantidade</label>
		<input name="quantidade" value="{{ old('quantidade') }}" type="number" class="form-control" />
	</div>
	<button type="submit" class="btn btn-primary btn-block">Adicionar</button>
</form>
@stop