@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Cliente - Editar</p>
        </div>
        
        <div class="menu">
            <ul>
                <li><a href= " {{ route('cliente.index') }} ">Voltar</a></li>
                <li><a href="">consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 26%; margin-left: auto; margin-right: auto;">
               <h4>
                    Detalhes do pedido
               </h4>
               <p>ID do pedido: {{$pedido->id}}</p>
               <p>Cliente: {{$pedido->cliente_id}}</p>

            </div>
        </div>
    </div>
@endsection