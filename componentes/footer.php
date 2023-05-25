<footer>
    <div class="nav-footer">
        <hr class="separador-nav-footer">

        <nav>
            <ul role="list" class="navlist rodape">
            <li><a class="<?= ($rota=="home") ? "active" : ""; ?>" href="index.php">home</a></li>
            <li><a class="<?= ($rota=="autor") ? "active" : ""; ?>" href="autor.php">Autor</a></li>
            <li><a class="<?= ($rota=="livros") ? "active" : ""; ?>" href="#" onclick="aguarde()" >Livros</a></li>
            <li><a class="<?= ($rota=="imprensa") ? "active" : ""; ?>" href="imprensa.php">Imprensa</a></li>
            <li><a class="<?= ($rota=="contactos") ? "active" : ""; ?>" href="contactos.php">contactos</a></li>
            </ul>
        </nav>
    </div>

    <hr class="separador-footer">

    <div class="footer-links">
        <div class="wrapper-main-contactos <?= ($rota=="contactos") ? "d-none d-lg-block" : ""; ?>">
            <h1 class="contactos-footer">Contactos</h1>

            <div class="wrapper-contactos">
            <div class="contactos">
                <h1>morada</h1>
                <p  class="conteudo">lorem ipsum dolor sit amet, 12 <br> 1234-543 Lorem</p>
            </div>

            <div class="contactos">
                <h1>telefone</h1>
                <p class="conteudo">+351 123 456 789</p>
            </div>

            <div class="contactos">
                <h1>email</h1>
                <p class="conteudo">lorem@lorem.pt</p>
            </div>
            </div>
        </div>

        <div class="redes-sociais">
            <h1>siga-me nas redes sociais</h1>
            <div class="grupo-icones">
            <a href="#" class="icone"><img src="Recursos\imagens_para_site\desktop\instagram1.svg" alt=""></a>
            <a href="#" class="icone"><img src="Recursos\imagens_para_site\desktop\facebook1.svg" alt=""></a>
            <a href="#" class="icone"><img src="Recursos\imagens_para_site\desktop\linkedin1.svg" alt=""></a>
            </div>
        </div>

        <div class="links-consumidor">
            <a class="reclamacoes" href="https://www.livroreclamacoes.pt/Inicio/"><img src="Recursos\imagens_para_site\desktop\livroreclamacoes.svg" alt="Livro de Reclamações"></a>
            <a  class="ralc" href="https://sebastiaoalves.com/ralc"><img src="Recursos\imagens_para_site\desktop\ralc.svg" alt="RALC"></a>              
        </div>

        <div class="cookies">
            <p>
            Política de Cookies. <br>
            Copyright © 2021 Grupo MediaMaster. 
            Todos os direitos reservados.
            </p>
        </div>
    </div>
</footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="config/main.js"></script>
        <script>
            <?php if($rota != "home"): ?>
                document.getElementById("target").scrollIntoView();
            <?php endif; ?>
        </script>
</body>
</html>