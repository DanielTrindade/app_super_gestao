@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor</p>
        </div>

        @include('app.layouts._partials.menu')

        <div class="informacao-pagina">
            <div style ="width:30%; margin-left:auto; margin-right:auto">
                    <form method = "post" action = "{{ route('app.fornecedor.listar') }}">
                        @csrf
                        <input type = "text" name = "nome" placeholder = "Nome" class = "borda-preta">
                        {{$errors->has('nome') ? $errors->first('nome'): ''}}
                        <input type = "text" name = "site" placeholder = "Site" class = "borda-preta">
                        {{$errors->has('site') ? $errors->first('site'): ''}}
                        <input type = "text" name = "uf" placeholder = "UF" class = "borda-preta">
                        {{$errors->has('uf') ? $errors->first('uf'): ''}}
                        <input type = "text" name = "email" placeholder = "Email" class = "borda-preta">
                        {{$errors->has('email') ? $errors->first('email'): ''}}
                        <button type = "submit" class = "borda-preta">Pesquisar</button>
                    </form>
            </div>
        </div>
    </div>
@endsection