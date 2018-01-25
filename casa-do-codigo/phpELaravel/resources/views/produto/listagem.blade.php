@extends('layout.principal')
@section('conteudo')

<h1>Listagem de produtos</h1>

@if(old('nome'))
	<div class="alert alert-success">
		<strong>Sucesso!</strong>
		O produto {{ old('nome') }} foi adicionado.
	</div>
@endif

@if(empty($produtos))
	<div class="alert alert-danger">
		Não foi encontrado nenhum produto cadastrado.
	</div>
@else
	<table class="table table-striped table-bordered table-hover">
	<!--
		table-hover    = para efeito de hover nas linhas
		table-bordered = para adicionar bordas
		table-striped  = para zebrar as linhas
	-->
		@foreach ($produtos as $p)
			<tr class="{{$p->quantidade<=1 ? 'danger' : ''}}">
				<td>{{$p->nome}}</td>
				<td>{{$p->valor}}</td>
				<td>{{$p->descricao}}</td>
				<td>{{$p->quantidade}}</td>
				<td style="text-align: center;">
					<a href="{{action('ProdutoController@mostra', $p->id)}}" title="Visualizar">
						<img src="/img/search.png" />
					</a>
					<a href="{{action('ProdutoController@update', $p->id)}}">
						<img src="/img/edit.png" title="Editar" />
					</a>
					<a href="{{action('ProdutoController@remove', $p->id)}}">
						<img src="/img/delete.png" title="Remover" />
					</a>
				</td>
			</tr>
		@endforeach
	</table>
@endif

<h4>
	<span class="label label-danger pull-right">
		Um ou menos itens no estoque
	</span>
</h4>

@stop