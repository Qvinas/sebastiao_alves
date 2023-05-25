<?php

require_once("config/config.php");
require_once("config/base_dados.php");

$rota = "contactos";

?>

<?php require("componentes/header.php") ?>

<main>

  <div class="contactos-horario">
    <div class="contactos">
      <h1>telefone</h1>
      <p class="conteudo">+351 123 456 789</p>
    </div>

    <div class="contactos">
      <h1>morada</h1>
      <p class="conteudo">lorem ipsum dolor sit amet, 12 <br> 1234-543 Lorem</p>
    </div>

    <div class="contactos">
      <h1>email</h1>
      <p class="conteudo">lorem@lorem.pt</p>
    </div>
  </div>

  <hr class="separador-contactos">

  <div class="contactos-horario horario">
    <div class="contactos">
      <h1>horário</h1>
      <p class="conteudo">De segunda a Sexta das 00:00h às 00:00h</p>
    </div>
  </div>
</main>

<?php require("componentes/footer.php") ?>