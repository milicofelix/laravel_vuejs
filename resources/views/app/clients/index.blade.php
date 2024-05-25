@extends('app.layouts.basic')

@section('title', 'Cliente')

@section('content')
    
    <div class="conteudo-pagina">

        <div class="titulo-pagina">
            <p>Listagem de Clientes</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('clients.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </head>

                    <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td>{{ $client->name }}</td>
                                <td><a href="{{ route('clients.show', ['client' => $client->id ]) }}">Visualizar</a></td>
                                <td>
                                    <form id="form_{{$client->id}}" method="post" action="{{ route('clients.destroy', ['client' => $client->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <!--<button type="submit">Excluir</button>-->
                                        <a href="#" onclick="document.getElementById('form_{{$client->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{ route('clients.edit', ['client' => $client->id ]) }}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                {{ $clients->appends($request)->links() }}

                <!--
                <br>
                {{ $clients->count() }} - Total de registros por página
                <br>
                {{ $clients->total() }} - Total de registros da consulta
                <br>
                {{ $clients->firstItem() }} - Número do primeiro registro da página
                <br>
                {{ $clients->lastItem() }} - Número do último registro da página

                -->
                <br>
                Exibindo {{ $clients->count() }} clients de {{ $clients->total() }} (de {{ $clients->firstItem() }} a {{ $clients->lastItem() }})
            </div>
        </div>

    </div>

@endsection

