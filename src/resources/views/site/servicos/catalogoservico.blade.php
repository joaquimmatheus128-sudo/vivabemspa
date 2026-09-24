<section class="pagina-servicos">
            <section class="servico site wow animate__animated animate__fadeInDown">
                <header>
                    <h2>Nossos Serviços</h2>
                    <p>Escolha a terapia ideal para desacelerar, restaurar energias e cuidar do seu bem-estar.</p>
                </header>

                <div class="site itens-servico wow animate__animated animate__fadeInDown">
                    <?php foreach ($servicos as $servicoItem): ?>
                        <a class="card-servico" href="<?php echo htmlspecialchars($servicoItem['arquivo']); ?>" aria-label="Abrir serviço <?php echo htmlspecialchars($servicoItem['nome']); ?>">
                            <span class="card-servico-imagem">
                                <img src="<?php echo htmlspecialchars($servicoItem['imagem_card']); ?>" alt="<?php echo htmlspecialchars($servicoItem['nome']); ?>">
                            </span>
                            <span class="card-servico-texto"><?php echo htmlspecialchars($servicoItem['resumo']); ?></span>
                            <span class="card-servico-botao">Saiba Mais</span>
                        </a>
                    <?php endforeach; ?>
                </div>
</section>