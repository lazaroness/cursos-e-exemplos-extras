@extends('layout.principal')
@section('conteudo')
<h1>Detalhes do produto: {{$obj->nome}}</h1>
<ul>
	<li><b>Valor:</b> R$ {{$obj->valor}}</li>
	<li><b>Descrição:</b> {{$obj->descricao}}</li>
	<li><b>Quantidade em estoque:</b> {{$obj->quantidade}}</li>
</ul>
@stop