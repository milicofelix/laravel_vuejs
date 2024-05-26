@extends('app.layouts.basic')

@section('title', 'Produto')

@section('content')

    <div class="conteudo-pagina">

        <div class="titulo-pagina">
            <p>Listagem de Produtos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('products.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                @if($products->total() > 0)
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Nome do Fornecedor</th>
                            <th>Peso</th>
                            <th>Unidade ID</th>
                            <th>Comprimento</th>
                            <th>Altura</th>
                            <th>Largura</th>
                            <th colspan="3">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->supplier->name }}</td>
                                <td>{{ $product->weight }}</td>
                                <td>{{ $product->unit_id }}</td>
                                <td>{{ $product->productDetails->length ?? '' }}</td>
                                <td>{{ $product->productDetails->width ?? '' }}</td>
                                <td>{{ $product->productDetails->height ?? '' }}</td>
                                <td><a href="{{ route('products.show', ['product' => $product->id ]) }}">Visualizar</a></td>
                                <td> <form id="form_{{ $product->id }}" method="post" action="{{ route('products.destroy', ['product' => $product->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <!--<button type="submit">Excluir</button>-->
                                    <a href="#" onclick="document.getElementById('form_{{ $product->id }}').submit()">Excluir</a>
                                </form></td>
                                <td><a href="{{ route('products.edit', $product->id) }}">Editar</a></td>
                            </tr>
                            <tr>
                                <td colspan="11">
                                    <p>Pedidos</p>
                                    @foreach ($product->orders as $order )
                                        <a href="{{route('product-orders.create', ['order' => $order->id])}}">Pedido: {{$order->id}}</a>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $products->appends($request)->links() }}

                <!--
                <br>
                {{ $products->count() }} - Total de registros por página
                <br>
                {{ $products->total() }} - Total de registros da consulta
                <br>
                {{ $products->firstItem() }} - Número do primeiro registro da página
                <br>
                {{ $products->lastItem() }} - Número do último registro da página

                -->
                <br>
                Exibindo {{ $products->count() }} products de {{ $products->total() }} (de {{ $products->firstItem() }} a {{ $products->lastItem() }})
                @else 
                <h3>Nenhum registro encontrado!</h3>
                @endif
            </div>
        </div>

    </div>
@endsection