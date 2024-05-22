@extends('app.layouts.basic')

@section('title', 'Detalhes do Produto')

@section('content')
    
    <div class="conteudo-pagina">

        <div class="titulo-pagina">
            <p>Adicionar Detalhes do Produto</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="#">Voltar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.product-details._components.form_create_edit', ['units' => $units])
                @endcomponent             
            </div>
        </div>

    </div>

@endsection

