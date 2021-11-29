@if (isset($produto->id))
    <form method="post" action="{{ route('produto.update',['produto' => $produto->id]) }}">
    @csrf
    @method('PUT')
@else
    <form method="post" action="{{ route('produto.store') }}">
        @csrf
@endif
    <input type="text" name="nome" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

    <input type="text" name="descricao" value="{{ $produto->descricao ?? old('descricao') }}" placeholder="Descrição" class="borda-preta">
    {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

    <input type="text" name="preco" value="{{ $produto->preco ?? old('preco') }}" placeholder="Preço" class="borda-preta">
    {{ $errors->has('preco') ? $errors->first('preco') : '' }}

    <select name="unidade_id">
        <option>-- Selecione a Unidade de Medida --</option>

        @foreach ($unidades as $unidade)
            <option value="{{ $unidade->id }}" {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>{{ $unidade->descricao }}</option>
        @endforeach
    </select>
    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
    @if (isset($produto->id))
        <button type="submit" class="borda-preta">Editar</button>
    @else
        <button type="submit" class="borda-preta">Cadastrar</button>
    @endif
</form>