<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //
    protected $fillable = ['cliente_id'];

    public function produtos() {
        // se os nomes estão padronizados
        //return $this->belongsToMany('\App\Produto', 'pedidos_produtos');

        //se os nomes não estão padronizados
        return $this->belongsToMany('\App\Item', 'pedidos_produtos','pedido_id', 'produto_id')->withPivot('id');
        /*  
            1 - Modelo do relacionamento NxN em relação ao modelo  que estamos implementando
            2 - É a tabela auxiliar que armazena os registros de relacionamento
            3 - Representa o nome da FK da tabela mapeada pelo model na tabela de relacionamento
            4 - Represeta o nome da FK da tabela mapeada pelo model utilizada no relacionamento 
        */

    }
}
