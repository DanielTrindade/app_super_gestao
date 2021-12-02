@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Cliente - Criar</p>
        </div>
        
        <div class="menu">
            <ul>
                <li><a href= " {{ route('cliente.index') }} ">Voltar</a></li>
                <li><a href="">consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 26%; margin-left: auto; margin-right: auto;">
                @component('app.cliente._components.create_edit_form');
                @endcomponent
            </div>
        </div>
    </div>
@endsection