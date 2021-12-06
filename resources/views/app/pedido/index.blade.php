@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Pedidos</p>
        </div>
        
        <div class="menu">
            <ul>
                <li><a href= " {{ route('pedidos.create')}} ">Novo Pedido</a></li>
                <li><a href=" {{route('app.fornecedor')}} ">consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style ="width:50%; margin-left:auto; margin-right:auto">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>Cliente</th> <!--coluna de visualização-->
                            <th></th> <!--excluir atualizar o registro-->
                            <th></th> <!--atualizar o registro-->
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->cliente_id }}</td>
                                <td><a href="{{route('pedido-produto.create',['pedido' => $pedido->id])}}">Adicionar Produtos</a></td>
                                <td><a href="{{ route('pedidos.show', ['pedido' => $pedido->id])}}">Visualizar</a></td>
                                <td><a href="{{route('pedidos.edit', ['pedido' => $pedido->id])}}">Editar</a></td>
                                <td>
                                    <form id="form_{{$pedido->id}}" method = "POST" action=" {{route('pedidos.destroy', ['pedido' => $pedido->id])}} ">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a>
                                    </form> 
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
                {{$pedidos->appends($request)->links()}}
                <br>
                Exibindo {{ $pedidos->count() }} produtos de {{ $pedidos->total() }} (de {{ $pedidos->firstItem() }} a {{ $pedidos->lastItem() }})
            </div>
        </div>
    </div>
@endsection