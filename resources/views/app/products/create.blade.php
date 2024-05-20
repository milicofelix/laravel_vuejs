@extends('app.layouts.basic')

@section('title', 'Produto')

@section('content')

    <div class="conteudo-pagina">

        <div class="titulo-pagina">
            <p>Produto</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('products.index')}}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="post" action="{{ route('products.store') }}">
                    @csrf
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Nome" class="borda-preta">
                    {{ $errors->has('name') ? $errors->first('name') : '' }}

                    <input type="text" name="weight" value="{{ old('weight') }}" placeholder="Peso" class="borda-preta">
                    {{ $errors->has('weight') ? $errors->first('weight') : '' }}

                    <input type="text" name="description" value="{{ old('description') }}" placeholder="Descrição" class="borda-preta">
                    {{ $errors->has('description') ? $errors->first('description') : '' }}
                    <select name="unit_id" id="unit_id">
                        <option>-- Selecione a unidade de medida --</option>
                        @foreach ($units as $unit )
                            <option value="{{$unit->id}} {{ old('unit_id') == $unit->id ? 'selected' : '' }}">{{$unit->unit}}</option>
                        @endforeach
                    </select>
                    {{ $errors->has('unit_id') ? $errors->first('unit_id') : '' }}
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>

    </div>

@endsection
