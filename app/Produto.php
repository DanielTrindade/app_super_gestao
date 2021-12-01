<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao','preco','unidade_id'];

    public function produtoDetalhe() {


        return $this->hasOne('\App\ProdutoDetalhe');

        //produto tem 1 produtoDetalhe
    }
}