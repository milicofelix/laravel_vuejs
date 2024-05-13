@extends('site.layouts.basic')

@section('title', $title)

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <div style="width:30%; margin-left: auto; margin-right: auto;">
                <form action={{ route('site.login') }} method="post">
                    @csrf
                    <input name="user" value="{{ old('user') }}" type="text" placeholder="Usuário" class="borda-preta">
                    <span style="color: crimson">{{ $errors->has('user') ? $errors->first('user') : '' }}</span>

                    <input name="password" value="{{ old('password') }}" type="password" placeholder="Senha" class="borda-preta">
                    <span style="color: crimson">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>

                    <button type="submit" class="borda-preta">Acessar</button>
                </form>
                <span style="color: crimson">{{ isset($error) && $error != '' ? $error : '' }}</span>
            </div>
        </div>
    </div>

    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{ asset('img/facebook.png') }}">
            <img src="{{ asset('img/linkedin.png') }}">
            <img src="{{ asset('img/youtube.png') }}">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.png') }}">
        </div>
    </div>
@endsection
