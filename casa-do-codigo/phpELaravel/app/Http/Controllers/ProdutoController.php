<?php namespace App\Http\Controllers;
use App\Produto;
use Request;
use App\Http\Requests\ProdutosRequest;

class ProdutoController extends Controller {
	public function lista(){
		$produtos = Produto::all();
		return view('produto.listagem', ['produtos' => $produtos]);
	}

	public function mostra($id){
		$produto = Produto::find($id);
		if(empty($produto)){
			return "Objeto não encontrado";
		}
		return view('produto.detalhes', ['obj' => $produto]);
	}

	public function novo(){
		return view('produto.formulario');
	}

	public function adiciona(ProdutosRequest $request){
		/*
		$params  = Request::all();
		$produto = new Produto($params);
		$produto->save();
		*/
		Produto::create($request->all());
		return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
	}

	public function listaJson(){
		$produtos = Produto::all();
		return response()->json($produtos);
	}

	public function remove($id){
		$produto = Produto::find($id);
		$produto->delete();
		return redirect()->action('ProdutoController@lista');
	}

	public function update($id){
		$produto = Produto::find($id);
		return view('produto.formulario_editar', ['obj' => $produto]);
	}

	public function update_do(ProdutosRequest $request){
		$params  = $request::all();
		$produto = Produto::find($params['id']);
		$produto->nome = $params['nome'];
		$produto->descricao = $params['descricao'];
		$produto->valor = $params['valor'];
		$produto->quantidade = $params['quantidade'];
		$produto->save();
		return redirect()->action('ProdutoController@lista');
	}
}