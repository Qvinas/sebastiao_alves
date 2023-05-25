<?php

require_once("config/config.php");
require_once("config/base_dados.php");

$rota="autor";

require("componentes/header.php");

$texto_autor = $autor["texto"];
$texto_concatenado = concatenar($texto_autor,1200);

?>
<main>
  <div class="main-autor">

    <img src="<?= $autor["imagem"] ?>" alt="Sebastiao Alves">

    <div id="texto-autor">
      <script>
        var texto_autor = <?= json_encode($texto_autor, JSON_UNESCAPED_UNICODE); ?>;
        var texto_concatenado = <?= json_encode($texto_concatenado, JSON_UNESCAPED_UNICODE); ?>;
        var texto_div = true;

        function getWindowSize(){
          let windowSize = window.innerWidth;
            if(windowSize > 809){
               texto_div = true
            }
            else(
              texto_div = false
            )
            textPrint()
        }

        function verMais(){
          if(texto_div){
              texto_div = false;
            }
          else{
            texto_div = true;
          }

          textPrint()
        }

        function textPrint(){
          let div = document.getElementById("texto-autor");
          let result

          if(texto_div){
              result = texto_autor;
            }
          else{
              result = texto_concatenado;
            }
          return div.innerHTML = result
        }

        textPrint()
        window.addEventListener('resize', getWindowSize)
      </script>
    </div>

    <div class="butoes-autor">
      <button onclick="verMais(), verMaisText()" id="botao-ver-mais" class="ver-mais">Ver Mais</button>
      <a onclick="history.back()"><button class="voltar-atras">Voltar atras</button></a>
    </div>

  </div>
</main>
<?php require("componentes/footer.php") ?>
