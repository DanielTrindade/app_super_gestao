@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produtos - Listar</p>
        </div>
        
        <div class="menu">
            <ul>
                <li><a href= " {{ route('produto.create')}} ">Novo</a></li>
                <li><a href=" {{route('app.fornecedor')}} ">consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style ="width:80%; margin-left:auto; margin-right:auto">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Fornecedor</th>
                            <th>Preço</th>
                            <th>Unidade ID</th>
                            <th>Comprimento</th>
                            <th>Altura</th>
                            <th>Largura</th>
                            <th></th> <!--coluna de visualização-->
                            <th></th> <!--excluir atualizar o registro-->
                            <th></th> <!--atualizar o registro-->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->fornecedor->nome ?? '' }}</td>
                                <td>{{ $produto->preco }}</td>
                                <td>{{ $produto->unidade_id }}</td>
                                <td>{{ $produto->itemDetalhe->comprimento ?? ''}}</td>
                                <td>{{ $produto->itemDetalhe->largura ?? ''}}</td>
                                <td>{{ $produto->itemDetalhe->altura ?? ''}}</td>
                                <td><a href="{{ route('produto.show', ['produto' => $produto->id])}}">Visualizar</a></td>
                                <td><a href="{{route('produto.edit', ['produto' => $produto->id])}}">Editar</a></td>
                                <td>
                                    <form id="form_{{$produto->id}}" method = "POST" action=" {{route('produto.destroy', ['produto' => $produto->id])}} ">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                                    </form> 
                                </td>
                            </tr>

                            <tr>
                                <td colspan="12">
                                    <p>Pedidos</p>
                                    @foreach($produto->pedidos as $pedido)
                                        <a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">
                                            Pedido: {{ $pedido->id }},
                                        </a>
                                    @endforeach
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
                {{$produtos->appends($request)->links()}}
                <br>
                Exibindo {{ $produtos->count() }} produtos de {{ $produtos->total() }} (de {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }})
            </div>
        </div>
    </div>
@endsection