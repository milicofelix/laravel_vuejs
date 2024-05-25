@if(isset($client->id))
    <form method="post" action="{{ route('clients.update', ['cliente' => $client->id]) }}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{ route('clients.store') }}">
        @csrf
@endif

    <input type="text" name="name" value="{{ $client->name ?? old('name') }}" placeholder="Nome" class="borda-preta">
    {{ $errors->has('name') ? $errors->first('name') : '' }}

    <button type="submit" class="borda-preta">Cadastrar</button>
<form>