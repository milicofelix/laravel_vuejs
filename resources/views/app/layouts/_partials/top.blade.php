<div class="topo">
    <div class="logo">
        <img src="{{ asset('img/logo.png') }}">
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.home') }}">Home</a></li>
            <li><a href="{{ route('clients.index') }}">Cliente</a></li>
            <li><a href="{{ route('app.suppliers.list') }}">Fornecedor</a></li>
            <li><a href="{{ route('products.index') }}">Produto</a></li>
            <li><a href="{{ route('app.logoff') }}">Sair</a></li>
        </ul>
    </div>
</div>
