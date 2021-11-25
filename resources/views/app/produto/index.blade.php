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
                            <th>Preço</th>
                            <th>Unidade ID</th>
                            <th></th> <!--excluir atualizar o registro-->
                            <th></th> <!--atualizar o registro-->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->preco }}</td>
                                <td>{{ $produto->unidade_id }}</td>
                                <td><a href="{{route('app.fornecedor.editar', $produto->id)}}">Editar</a></td>
                                <td><a href=" {{route('app.fornecedor.excluir', $produto->id)}} ">Excluir</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$produtos->appends($request)->links()}}
            </div>
        </div>
    </div>
@endsection