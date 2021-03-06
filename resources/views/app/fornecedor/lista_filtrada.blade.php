@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Lista filtrada</p>
        </div>
        
        @include('app.layouts._partials.menu')

        <div class="informacao-pagina">
            <div style ="width:80%; margin-left:auto; margin-right:auto">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>E-mail</th>
                            <th></th> <!--excluir atualizar o registro-->
                            <th></th> <!--atualizar o registro-->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fornecedores as $fornecedor)
                            <tr>
                                <td>{{ $fornecedor->nome }}</td>
                                <td>{{ $fornecedor->site }}</td>
                                <td>{{ $fornecedor->uf }}</td>
                                <td>{{ $fornecedor->email }}</td>
                                <td><a href="{{route('app.fornecedor.editar',$fornecedor->id)}}">Editar</a></td>
                                <td><a href="">Excluir</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$fornecedores->append($request)->links()}}
                
            </div>
        </div>
    </div>
@endsection