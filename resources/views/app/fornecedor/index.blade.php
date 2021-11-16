<h3>Fornecedores</h3>

{{-- IF ELSE ELSEIF--}}

{{-- @if (count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados!!</h3>
@elseif(count($fornecedores) >= 10) 
    <h3>Existem vários fornecedores cadastrados!</h3>
@else 
    <h3>Não existem fornecedores cadastrados!</h3>
@endif --}}

{{-- isset verifica se uma variavel está definida--}}
@isset($fornecedores)
    @forelse ($fornecedores as $fornecedor) 
        iteração atual: {{$loop->iteration}}
        <br>
        Fornecedor: {{$fornecedor['nome']}}
        <br>
        Status: {{$fornecedor['status']}}
        <br>
        CNPJ: {{$fornecedor['cnpj'] ?? 'Dado não preenchido'}}
        <br>
        DDD: {{$fornecedor['ddd']?? ''}} Telefone: {{$fornecedor['telefone']}}
        <br>
        Cidade: 
        @switch($fornecedor['ddd'])
            @case('11')
                São Paulo - SP
                @break
            @case('92')
                Manaus - AM
                @break
            @case('32')
                Juiz de Fora - MG
            @break
            @default
                Estado não identificado
        @endswitch
        <br>
        @if ($loop->first)
           Primeira iteração do loop 
        @endif
        @if ($loop->last)
            Ultima iteração do loop <br>
            Total de registros {{$loop->count}}
        @endif
        <hr> 
    @empty
        Não existem dados cadastrados!!
    @endforelse
@endisset

{{-- 
@if($fornecedores[0]['status'] == 'N') 
    <h3>Fornecedor inativo</h3>
@else 
    <h3>Fornecedor ativo</h3>
@endif --}}

{{--usando o comando unless (quando um resultado for falso)--}}
{{-- <h3>
    @unless ($fornecedores[0]['nome'] == 'S')
        Fornecedor inativo
    @endunless
</h3> --}}




