<section class="servico site wow animate__animated animate__fadeInUp">
    <header>
         <h2>Serviços</h2>
    </header>

    <div class="site carrossel-serv wow animate__animated animate__fadeInUp">
        <?php foreach ($servicos as $servicoItem): ?>
            <article>
                <a class="servico-card-link" href="<?php echo htmlspecialchars($servicoItem['arquivo']); ?>" aria-label="Abrir serviço <?php echo htmlspecialchars($servicoItem['nome']); ?>">
                    <img src="<?php echo htmlspecialchars($servicoItem['imagem_card']); ?>" alt="<?php echo htmlspecialchars($servicoItem['nome']); ?>">
                </a>
            </article>
        <?php endforeach; ?>
    </div>
</section>
