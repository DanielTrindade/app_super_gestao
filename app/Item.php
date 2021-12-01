<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao','preco','unidade_id'];

    public function itemDetalhe() {


        return $this->hasOne('\App\ItemDetalhe', 'produto_id', 'id');

        //produto tem 1 produtoDetalhe
    }
}
