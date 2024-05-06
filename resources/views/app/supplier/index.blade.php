{{-- Comentarios no blade --}}
{{-- @dd($suppliers); --}}
{{-- @if (count($suppliers) > 0 && count($suppliers) < 10)
    <h3>Existem {{count($suppliers)}} Fornecedores cadastrados.</h3>
    @elseif(count($suppliers) > 10)
    <h3>Existem muitos Fornecedores cadastrados.</h3>
    @else
    <h3>Não existem Fornecedores cadastrados.</h3>
@endif --}}

<h3>Fornecedor</h3>

@php
    /*
    if(empty($variavel)) {} //retornar true se a variável estiver vazia
    - ''
    - 0
    - 0.0
    - '0'
    - null
    - false
    - array()
    - $var
    */
@endphp

@isset($suppliers)

    @forelse($suppliers as $indice => $fornecedor)
        Iteração atual: {{ $loop->iteration }}
        <br>
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? '' }}
        <br>
        Telefone: ({{ $fornecedor['ddd'] ?? '' }}) {{ $fornecedor['telefone'] ?? '' }}
        <br>
        @if($loop->first)
            Primeira iteração no loop

            <br>
            Total de registros: {{ $loop->count }}
        @endif

        @if($loop->last)
            Última iteração no loop
        @endif
        <hr>
    @empty
        Não existem fornecedores cadastrados!!!
    @endforelse
@endisset

