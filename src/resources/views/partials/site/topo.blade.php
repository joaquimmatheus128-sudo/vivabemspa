<header class="topo" id="topoFixo">

    <!-- LOGO -->
    <h1>VivaBem Spa</h1>
        
    <!-- MENU -->
    <button class="abrir-menu"></button>
        <nav class="menu">
            <button class="fechar-menu"></button>
            <ul>
                <li>
                    <a class="{{ request()->routeIs('home') ? 'menu-ativo' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('sobre') ? 'menu-ativo' : '' }}" href="{{ route('sobre') }}">Sobre</a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('servico*') ? 'menu-ativo' : '' }}" href="{{ route('servico') }}">Serviços</a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('home') ? 'menu-ativo' : '' }}" href="{{ route('home') }}">Eventos</a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('home') ? 'menu-ativo' : '' }}" href="{{ route('home') }}">Galeria</a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('contato') ? 'menu-ativo' : '' }}" href="{{ route('contato') }}">Contato</a>
                </li>

                <li class="menu-acoes">
                    <ul class="redeSocial redeSocial-menu">
                        <li><a href="#" target="_blank"><img src="assets/instagram-24.png" alt="Instagram"></a></li>
                        <li><a href="#" target="_blank"><img src="assets/facebook-24.png" alt="Facebook"></a></li>
                        <li><a href="https://wa.me/551199999999" target="_blank"><img src="assets/whatsapp-24.png" alt="Whatsapp"></a></li>
                    </ul>

                    <a href="{{ route('login') }}" class="login login-menu-link {{ request()->routeIs('login') ? 'login-ativo' : '' }}"><img src="assets/login_mob.png" alt="Login - VivaBem Spa"></a>
                </li>
            </ul>
        </nav>
        <!-- REDES SOCIAIS -->
        <ul class="redeSocial">
            <li><a href="#" target="_blank"><img src="assets/instagram-24.png" alt="Instagram"></a></li>
            <li><a href="#" target="_blank"><img src="assets/facebook-24.png" alt="Facebook"></a></li>
            <li><a href="https://wa.me/551199999999" target="_blank"><img src="assets/whatsapp-24.png" alt="Whatsapp"></a></li>
        </ul>

        <!-- LOGIN -->
        <a href="{{ route('login') }}" class="login {{ request()->routeIs('login') ? 'login-ativo' : '' }}"><img src="assets/login1.png" alt="Login - VivaBem Spa"></a>
</header>