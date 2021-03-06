<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientes = Cliente::paginate(15);
        return view('app.cliente.index',['clientes' => $clientes, 'request' => $request->all() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('app.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $regras = [
            'nome' => 'required|min:3|max:40'
        ];

        $feedback = [
            'required' => 'Campo não preenchido',
            'nome.max' => 'O campo nome não pode ter mais de 40 caracteres',
            'nome.min' => 'O campo nome não pode ter menos de 3 caracteres'
        ];
        
        $request->validate($regras,$feedback);
        Cliente::create($request->all());
        return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
        return view('app.cliente.edit',['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
        $regras = [
            'nome' => 'required|max:20'
        ];

        $feedback = [
            'required' => 'Campo não preenchido',
            'nome.max' => 'O campo nome não pode ter mais de 20 caracteres'
        ];
        $request->validate($regras,$feedback);
        $cliente->update($request->all());
        return redirect()->route('cliente.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
