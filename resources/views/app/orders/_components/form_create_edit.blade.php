@if(isset($order->id))
    <form method="post" action="{{ route('orders.update', ['order' => $order->id]) }}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{ route('orders.store') }}">
        @csrf
@endif

    <select name="client_id">
        <option>-- Selecione um Cliente --</option>

        @foreach($clients as $client)
            <option value="{{ $client->id }}" {{ ($order->client_id ?? old('client_id')) == $client->id ? 'selected' : '' }} >{{ $client->name }}</option>
        @endforeach
    </select>
    {{ $errors->has('client_id') ? $errors->first('client_id') : '' }}

    <button type="submit" class="borda-preta">Cadastrar</button>
<form>