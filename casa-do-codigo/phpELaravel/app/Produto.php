<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model {
    /* O LARAVEL JA COLOCA COMO PADRAO QUE A TABELA DA CLASSE SERÁ
    O NOME DA CLASSE NO PLURAL, CASO PREFERIR USAR UM OUTRO NOME
    DEVE SER ADICIONADA A LINHA ABAIXO COM O NOME DA TABELA.
    protected $table = 'produtos';
    */
    protected $table = 'produtos';
    public $timestamps = false;
    protected $fillable = array('nome', 'descricao', 'valor', 'quantidade');
}
