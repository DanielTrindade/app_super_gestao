<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{
    //classe fornecedor
    protected $fillable = ['nome','telefone','email','motivo_contatos_id','mensagem'];
}
