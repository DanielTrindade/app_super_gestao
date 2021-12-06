<?php

namespace App\Http\Controllers;

use App\Item;
use App\Unidade;
use App\ItemDetalhe;
use App\Fornecedor;
use App\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //eager loading usando o metodo with
        $produtos = Item::with(['itemDetalhe','fornecedor','pedidos'])->paginate(15);
        return view('app.produto.index',['produtos' => $produtos , 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //validação das minha entradas
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|max:40',
            'preco' => 'required|numeric',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedbacks = [
            'required' => 'O campo :attribute não foi preenchido',
            'max' => 'O campo :attribute não pode ter mais de 40 caracteres',
            'min' => 'O campo :attribute não pode ter menos de 3 caracteres',
            'nome.max' => 'O campo nome não pode ter mais de 100 caracteres',
            'required' => 'O campo :attribute precisa ser preenchido',
            'numeric' => 'O campo preço pode apenas ser preenchido com números',
            'unidade_id.exists' => 'unidade de medida selecionada não existe',
            'fornecedor_id.exists' => 'O fornecedor selecionado não existe'
        ];
        $request->validate($regras,$feedbacks);
        Item::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Item $produto)
    {
        return view('app.produto.show',['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.edit',['produto' => $produto,'unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $produto
     * @return \Illuminate\Http\Response
     **/

    public function update(Request $request, Item $produto)
    {   
        
        //validação das minha entradas
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|max:40',
            'preco' => 'required|numeric',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedbacks = [
            'required' => 'O campo :attribute não foi preenchido',
            'max' => 'O campo :attribute não pode ter mais de 40 caracteres',
            'min' => 'O campo :attribute não pode ter menos de 3 caracteres',
            'nome.max' => 'O campo nome não pode ter mais de 100 caracteres',
            'required' => 'O campo :attribute precisa ser preenchido',
            'numeric' => 'O campo preço pode apenas ser preenchido com números',
            'unidade_id.exists' => 'unidade de medida selecionada não existe',
            'fornecedor_id.exists' => 'O fornecedor selecionado não existe'
        ];
        $request->validate($regras,$feedbacks);
        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
