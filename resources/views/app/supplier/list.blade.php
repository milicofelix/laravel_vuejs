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
                <li><a href="{{ route('app.suppliers.list') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>E-mail</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($suppliers as $supplier)
                            <tr>
                                <td>{{ $supplier->name }}</td>
                                <td>{{ $supplier->site }}</td>
                                <td>{{ $supplier->uf }}</td>
                                <td>{{ $supplier->email }}</td>
                                <td>Excluir</td>
                                <td><a href="{{ route('app.suppliers.edit', $supplier->id) }}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection
