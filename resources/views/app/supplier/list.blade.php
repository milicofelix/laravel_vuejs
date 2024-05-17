@extends('app.layouts.basic')

@section('title', 'Fornecedor')

@section('content')

    <div class="conteudo-pagina">

        <div class="titulo-pagina">
            <p>Fornecedor</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.suppliers.new') }}">Novo</a></li>
                <li><a href="{{ route('app.suppliers') }}">Consulta</a></li>
            </ul>
        </div>
        <h3 {{ $style ?? '' }}>{{ $msg ?? '' }}</h3>
        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                @if($suppliers->total() > 0)
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>E-mail</th>
                            <th colspan="2">Ação</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($suppliers as $supplier)
                            <tr>
                                <td>{{ $supplier->id }}</td>
                                <td>{{ $supplier->name }}</td>
                                <td>{{ $supplier->site }}</td>
                                <td>{{ $supplier->uf }}</td>
                                <td>{{ $supplier->email }}</td>
                                <td><a href="{{ route('app.suppliers.destroy', $supplier->id) }}">Excluir</a></td>
                                <td><a href="{{ route('app.suppliers.edit', $supplier->id) }}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $suppliers->appends($request)->links()}}
                Exibinfo {{ $suppliers->count()}} Fornecedores de {{ $suppliers->total()}} (de {{$suppliers->firstItem()}} a {{$suppliers->lastItem()}})
            @else 
            <h3>Nenhum registro encontrado!</h3>
            @endif
            </div>
        </div>

    </div>

@endsection
