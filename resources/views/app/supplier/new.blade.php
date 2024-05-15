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

        <div class="informacao-pagina">
            {{ $msg ?? '' }}
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="post" action="{{ route('app.suppliers.new') }}">
                    <input type="hidden" name="id" value="{{ $supplier->id ?? '' }}">
                    @csrf
                    <input type="text" name="name" value="{{ $supplier->name ?? old('name') }}" placeholder="Nome" class="borda-preta">
                    {{ $errors->has('name') ? $errors->first('name') : '' }}

                    <input type="text" name="site" value="{{ $supplier->site ?? old('site') }}" placeholder="Site" class="borda-preta">
                    {{ $errors->has('site') ? $errors->first('site') : '' }}

                    <input type="text" name="uf" value="{{ $supplier->uf ?? old('uf') }}" placeholder="UF" class="borda-preta">
                    {{ $errors->has('uf') ? $errors->first('uf') : '' }}

                    <input type="text" name="email" value="{{ $supplier->email ?? old('email') }}" placeholder="E-mail" class="borda-preta">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}

                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>

    </div>

@endsection
