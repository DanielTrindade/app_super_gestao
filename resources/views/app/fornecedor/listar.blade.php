@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Listar</p>
        </div>
        
        @component('app.Components.menu')
        @endcomponent

        <div class="informacao-pagina">
            <div style ="width:30%; margin-left:auto; margin-right:auto">
                    <p>Lista de fornecedores adicionados</p>
            </div>
        </div>
    </div>
@endsection