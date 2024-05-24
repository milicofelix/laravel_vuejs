@if(isset($product_detail->id))
    <form method="post" action="{{ route('product.update', ['product' => $productDetail->id]) }}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{ route('product-details.store') }}">
        @csrf
@endif
    <input type="text" name="product_id" value="{{ $productDetail->product_id ?? old('product_id') }}" placeholder="ID do Produto" class="borda-preta">
    {{ $errors->has('product_id') ? $errors->first('product_id') : '' }}

    <input type="text" name="length" value="{{ $productDetail->length ?? old('length') }}" placeholder="Comprimento" class="borda-preta">
    {{ $errors->has('length') ? $errors->first('length') : '' }}

    <input type="text" name="width" value="{{ $productDetail->width ?? old('width') }}"  placeholder="Largura" class="borda-preta">
    {{ $errors->has('width') ? $errors->first('width') : '' }}

    <input type="text" name="height" value="{{ $productDetail->height ?? old('height') }}"  placeholder="Altura" class="borda-preta">
    {{ $errors->has('height') ? $errors->first('height') : '' }}

    <select name="unit_id">
        <option>-- Selecione a Unidade de Medida --</option>

        @foreach($units as $unit)
            <option value="{{ $unit->id }}" {{ ($productDetail->unit_id ?? old('unit_id')) == $unit->id ? 'selected' : '' }} >{{ $unit->unit }}</option>
        @endforeach
    </select>
    {{ $errors->has('unit_id') ? $errors->first('unit_id') : '' }}
    
    <button type="submit" class="borda-preta">{{isset($productDetail->id) ? 'Atualizar': 'Cadastrar'}}</button>
<form>