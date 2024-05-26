@extends('app.layouts.basic')

@section('title', 'Pedido Produto')

@section('content')
    
    <div class="conteudo-pagina">

        <div class="titulo-pagina">
            <p>Adicionar Produtos ao Pedido</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('orders.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <h4>Detalhes do order</h4>
            <p>ID do order: {{ $order->id }}</p>
            <p>Cliente: {{ $order->client_id }}</p> 
            
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <h4>Itens do order</h4>
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome do product</th>
                            <th>Data de inclusão do item no pedido</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->pivot->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <form id="form_{{$order->id}}_{{$product->id}}" method="post" action="{{ route('product-orders.destroy', ['order' => $order->id, 'product' => $product->id])}}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{$order->id}}_{{$product->id}}').submit()">Excluir</a>
                                    </form>
                                </td>   
                            </tr>
                        @endforeach
                    <tbody>
                </table>
                @component('app.product-orders._components.form_create', ['order' => $order, 'products' => $products])
                @endcomponent 
            </div>
        </div>

    </div>

@endsection

