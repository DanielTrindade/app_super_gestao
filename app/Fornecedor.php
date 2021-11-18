<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use SoftDeletes;
    // classe fornecedor
    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'site','uf','email'];
}
