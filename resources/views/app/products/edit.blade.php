@extends('app.layouts.basic')

@section('title', 'Produto')

@section('content')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Editar Produto</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('products.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="post" action="{{ route('products.update', ['product' => $product->id]) }}">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" value="{{ $product->name ?? old('name') }}" placeholder="Nome" class="borda-preta">
                    {{ $errors->has('name') ? $errors->first('name') : '' }}

                    <input type="text" name="description" value="{{ $product->description ?? old('description') }}" placeholder="Descrição" class="borda-preta">
                    {{ $errors->has('description') ? $errors->first('description') : '' }}

                    <input type="text" name="weight" value="{{ $product->weight ?? old('weight') }}" placeholder="Peso" class="borda-preta">
                    {{ $errors->has('weight') ? $errors->first('weight') : '' }}

                    <select name="unit_id">
                        <option>-- Selecione a Unidade de Medida --</option>

                        @foreach ($units as $unit)
                            <option value="{{ $unit->id }}" {{ ( $product->unit_id ?? old('unit_id') ) == $unit->id ? 'selected' : '' }} >{{ $unit->description }}</option>
                        @endforeach
                    </select>
                    {{ $errors->has('unit_id') ? $errors->first('unit_id') : '' }}

                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>

    </div>

@endsection
