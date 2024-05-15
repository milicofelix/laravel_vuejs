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
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="post" action="{{ route('app.suppliers.list') }}">
                    @csrf
                    <input type="text" name="name" placeholder="Nome" class="borda-preta">
                    <input type="text" name="site" placeholder="Site" class="borda-preta">
                    <input type="text" name="uf" placeholder="UF" class="borda-preta">
                    <input type="text" name="email" placeholder="E-mail" class="borda-preta">
                    <button type="submit" class="borda-preta">Pesquisar</button>
                </form>
            </div>
        </div>

    </div>

@endsection
