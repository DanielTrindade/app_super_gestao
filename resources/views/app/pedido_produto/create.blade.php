@extends('app.layouts.basico')

@section('titulo', 'Pedido Produto')

@section('conteudo')
    
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Adicionar Produtos ao Pedido</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedidos.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">

            <h4>Detalhes do pedido</h4>
            <p>ID do pedido: {{ $pedido->id }}</p>
            <p>Cliente: {{ $pedido->cliente_id }}</p>
            
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <h4>Itens do pedido</h4>
                <table border="1" width = "100%">
                    <thead>
                        <th>ID</th>
                        <th>Nome do produto</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ( $pedido->produtos as $produto )
                            <tr>
                                <td>{{$produto->id}}</td>
                                <td>{{$produto->nome}}</td>
                                <td>
                                    <form id="form_{{$pedido->id}}_{{$produto->id}}" method="post" action="{{ route('pedido-produto.destroy', ['pedido' => $pedido->id, 'produto' => $produto->id])}}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{$pedido->id}}_{{$produto->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr> 
                        @endforeach
                    </tbody>
                </table>


                @component('app.pedido_produto._components.form_create_edit', ['pedido' => $pedido, 'produtos' => $produtos])
                @endcomponent 
            </div>
        </div>

    </div>

@endsection

