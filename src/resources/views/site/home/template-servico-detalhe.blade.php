<?php
require_once(__DIR__ . '/servicos-dados.php');

if (!isset($slugServico) || !isset($servicos[$slugServico])) {
    http_response_code(404);
    exit('Serviço não encontrado.');
}

$servicoAtual = $servicos[$slugServico];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars($servicoAtual['resumo']); ?>">
    <meta name="keywords" content="massoterapia, spa, <?php echo htmlspecialchars(strtolower($servicoAtual['nome'])); ?>">
    <meta name="author" content="Guilherme Pignataro">
    <meta property="og:title" content="<?php echo htmlspecialchars($servicoAtual['nome']); ?> | VivaBem Spa">
    <meta property="og:description" content="<?php echo htmlspecialchars($servicoAtual['resumo']); ?>">
    <meta property="og:image" content="https://">
    <meta property="og:type" content="website">

    <link rel="apple-touch-icon" sizes="57x57" href="assets/icon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/icon/favicon-16x16.png">
    <link rel="manifest" href="assets/icon/manifest.json">
    <meta name="msapplication-TileColor" content="#9aa63f">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#9aa63f">

    <title><?php echo htmlspecialchars($servicoAtual['nome']); ?> | VivaBem Spa</title>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/responsivo.css">
</head>
<body>
    <?php require_once(__DIR__ . '/topo.php'); ?>

    <main>
        <section class="pagina-servico-detalhe">
            <div class="site servico-detalhe-grid">
                <div class="servico-detalhe-imagem">
                    <img src="<?php echo htmlspecialchars($servicoAtual['imagem_detalhe']); ?>" alt="<?php echo htmlspecialchars($servicoAtual['nome']); ?>">
                </div>

                <article class="servico-detalhe-conteudo">
                    <span class="servico-detalhe-kicker">VivaBem Spa</span>
                    <h2><?php echo htmlspecialchars($servicoAtual['nome']); ?></h2>
                    <p><?php echo htmlspecialchars($servicoAtual['descricao']); ?></p>

                    <div class="servico-detalhe-lista">
                        <h3>Indicada para:</h3>
                        <ul>
                            <?php foreach ($servicoAtual['indicacoes'] as $indicacao): ?>
                                <li><?php echo htmlspecialchars($indicacao); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="servico-detalhe-acoes">
                        <a href="contato.php" class="servico-detalhe-botao">Agendar atendimento</a>
                        <a href="servico.php" class="servico-detalhe-botao servico-detalhe-botao-secundario">Ver todos os serviços</a>
                    </div>
                </article>
            </div>
        </section>
    </main>

    <?php require_once(__DIR__ . '/rodape.php'); ?>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
