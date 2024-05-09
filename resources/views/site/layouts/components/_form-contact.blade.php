@if($errors->any())
    <div style="position:absolute; top:0px; width:100%; background:red">

        @foreach ($errors->all() as $erro)
            {{ $erro }}
            <br >
        @endforeach

    </div>
@endif
<form action={{ route('site.contato') }} method="post">
    @csrf
    <input name="name" type="text" placeholder="Digite seu nome" class="{{$class}}" value="{{old('name')}}">
    {{$errors->has('name') ? $errors->first('name') : ''}}
    <br>
    <input name="phone" type="text" placeholder="Digite seu telefone" class="{{$class}}" value="{{old('phone')}}">
    {{$errors->has('phone') ? $errors->first('phone') : ''}}
    <br>
    <input name="email" type="text" placeholder="Digite seu E-mail" class="{{$class}}" value="{{old('email')}}">
    {{$errors->has('email') ? $errors->first('email') : ''}}
    <br>
    <select name="contact_reason_id" class="{{$class}}">
        {{-- <option value="">Qual o motivo do contato?</option>
        <option value="1" {{old('contact_reason') == 1 ? 'selected' : ''}}>Dúvida</option>
        <option value="2" {{old('contact_reason') == 2 ? 'selected' : ''}}>Elogio</option>
        <option value="3" {{old('contact_reason') == 3 ? 'selected' : ''}}>Reclamação</option> --}}
        @foreach ($contact_reason as $k => $reason )
            <option value="{{$reason->id}}" {{old('contact_reason_id') == $reason->id ? 'selected' : ''}}>{{$reason->contact_reason}}</option>      
        @endforeach
    </select>
    {{$errors->has('contact_reason_id') ? $errors->first('contact_reason_id') : ''}}
    <br>
    <textarea name="msg" class="{{$class}}">{{empty(old('msg')) ? 'Preencha aqui a sua mensagem' : old('msg')}}</textarea>
    {{$errors->has('msg') ? $errors->first('msg') : ''}}
    <br>
    <button type="submit" class="{{$class}}">ENVIAR</button>
</form>