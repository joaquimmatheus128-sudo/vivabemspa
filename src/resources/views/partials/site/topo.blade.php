<header class="topo" id="topoFixo">

    <!-- LOGO -->
    <h1>VivaBem Spa</h1>
        
    <!-- MENU -->
    <button class="abrir-menu"></button>
        <nav class="menu">
            <button class="fechar-menu"></button>
            <?php 
                $pgAtual = basename($_SERVER['PHP_SELF']);
                $paginasServico = [
                    'servico.php',
                    'quick-massage.php',
                    'drenagem.php',
                    'reflexologia.php',
                    'massagem-relaxante.php',
                    'shiatsu.php',
                    'massagem-modeladora.php',
                    'pedras-quentes.php',
                    'massagem-classica.php',
                    'acupuntura.php'
                ];
                $paginasLogin = [
                    'login.php',
                    'cadastro.php'
                ];
            ?>
            <ul>
                <li>
                    <a class="{{ request()->routeIs('home') ? 'menu-ativo' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li>
                    <a class="{{ request()->routeIs('sobre') ? 'menu-ativo' : '' }}" href="{{ route('sobre') }}">Sobre</a>
                </li>

                <li>
                    <a class="{{ request()->routeIs('servico') ? 'menu-ativo' : '' }}" href="{{ route('servico') }}">Servicos</a>
                </li>

                <li><a class="<?php if($pgAtual == 'evento.php') echo 'menu-ativo'; ?>" href="evento.php">Eventos</a></li>

                <li><a class="<?php if($pgAtual == 'galeria.php') echo 'menu-ativo'; ?>" href="galeria.php">Galeria</a></li>

                <li>
                    <a class="{{ request()->routeIs('contato') ? 'menu-ativo' : '' }}" href="{{ route('contato') }}">Contato</a>
                </li>

                <li class="menu-acoes">
                    <ul class="redeSocial redeSocial-menu">
                        <li><a href="#" target="_blank"><img src="assets/instagram-24.png" alt="Instagram"></a></li>
                        <li><a href="#" target="_blank"><img src="assets/facebook-24.png" alt="Facebook"></a></li>
                        <li><a href="https://wa.me/551199999999" target="_blank"><img src="assets/whatsapp-24.png" alt="Whatsapp"></a></li>
                    </ul>

                    <a href="login.php" class="login login-menu-link <?php if(in_array($pgAtual, $paginasLogin)) echo 'login-ativo'; ?>"><img src="assets/login_mob.png" alt="Login - VivaBem Spa"></a>
                </li>
            </ul>
        </nav>
        <!-- REDES SOCIAS -->
        <ul class="redeSocial">
            <li><a href="#" target="_blank"><img src="assets/instagram-24.png" alt="Instagram"></a></li>
            <li><a href="#" target="_blank"><img src="assets/facebook-24.png" alt="Facebook"></a></li>
            <li><a href="https://wa.me/551199999999" target="_blank"><img src="assets/whatsapp-24.png" alt="Whatsapp"></a></li>
        </ul>

        <!-- LOGIN -->
        <a href="login.php" class="login <?php if(in_array($pgAtual, $paginasLogin)) echo 'login-ativo'; ?>"><img src="assets/login1.png" alt="Login - VivaBem Spa"></a>
</header>
