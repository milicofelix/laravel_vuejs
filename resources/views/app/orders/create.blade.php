@extends('app.layouts.basic')

@section('title', 'Pedido')

@section('content')
    
    <div class="conteudo-pagina">

        <div class="titulo-pagina">
            <p>Adicionar Pedido</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('orders.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.orders._components.form_create_edit', ['clients' => $clients])
                @endcomponent             
            </div>
        </div>

    </div>

@endsection

