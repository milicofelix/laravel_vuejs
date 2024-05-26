@extends('app.layouts.basic')

@section('title', 'Pedido')

@section('content')
    
    <div class="conteudo-pagina">

        <div class="titulo-pagina">
            <p>Listagem de Pedidos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('orders.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>Cliente</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </head>

                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->client_id }}</td>
                                <td><a href="{{ route('product-orders.create', ['order' => $order->id]) }}">Adicionar Produtos</a></td>
                                <td><a href="{{ route('orders.show', ['order' => $order->id ]) }}">Visualizar</a></td>
                                <td>
                                    <form id="form_{{$order->id}}" method="post" action="{{ route('orders.destroy', ['order' => $order->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <!--<button type="submit">Excluir</button>-->
                                        <a href="#" onclick="document.getElementById('form_{{$order->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{ route('orders.edit', ['order' => $order->id ]) }}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                {{ $orders->appends($request)->links() }}

                <!--
                <br>
                {{ $orders->count() }} - Total de registros por página
                <br>
                {{ $orders->total() }} - Total de registros da consulta
                <br>
                {{ $orders->firstItem() }} - Número do primeiro registro da página
                <br>
                {{ $orders->lastItem() }} - Número do último registro da página

                -->
                <br>
                Exibindo {{ $orders->count() }} orders de {{ $orders->total() }} (de {{ $orders->firstItem() }} a {{ $orders->lastItem() }})
            </div>
        </div>

    </div>

@endsection