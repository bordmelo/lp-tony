<?php
  require_once 'server/config.php';
  require_once 'server/inc/database.php';
  $db = open_database();
  require_once 'server/models/client.php';
  store();
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Encode+Sans:200,400,500&display=swap" rel="stylesheet">
    <style>
      body {
        font-family: Encode Sans;
      }
      body section{
        background-image: url('img/negativado_background.png');
        background-position: center top;
      }
      h1 {
        font-weight: 500;
        font-size: 70px;
      }
      h2 {
        font-weight: 500;
        font-size: 40px;
        line-height: 50px;
      }
      h3 {
        font-weight: 500;
        font-size: 30px;
      }
      p {
        font-weight: 200; 
        font-size: 20px; 
        line-height: 25px;
      }
      .btn-primary {
        background-color:#28377A;
        border-color: #28377A;
        width: 50%;
      }
      .btn-primary:disabled{
        background-color:#525a80;
        border-color: #525a80;
        width: 50%;
      }
      .btn-primary:hover {
        background-color: rgb(31, 43, 94);
        border-color: rgb(31, 43, 94);
      }
      footer {
        background-color: #2B2B2B;
        font-size: 15px;
        font-weight: 500;
      }
    </style>

    <title>Tony Veículos</title>
  </head>
  <body>
    <header>
      <div class="d-flex flex-column align-items-center p-1 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <img src="img/logo.png" height="55" alt="">
      </div>
    </header>
    <section>
      <div class="container p-4 text-center">
        <div class="row">
          <div class="col-sm-12">
            <h2>Ficou muito mais simples ter um carro!</h2>
          </div>
          <div class="col-sm-12 mt-2">
            <p>
              Só aqui na Tony mesmo você que está com o <strong>Nome Sujo</strong> pode ter<br>
              seu carro novo e sem burocracia.<br>
              A Tony acredita em Você!<br>
            </p>
          </div>
          <div class="col-sm-12 mt-5 text-left">
            <h3 class="mb-1">Renegade 2017 - 1.8 Autom.</h3>
            <p style="margin-bottom: -5px;">De</p>
            <h2 style="margin-bottom: -5px;">R$ 80.000,00</h2>
            <p style="margin-bottom: -10px;">Por</p>
            <h1>R$ 69.900,00</h1>
          </div>
          <div class="col-sm-12">
            <img src="img/carro.png" class="float-right img-fluid">
            <p class="text-left mt-5"><img src="img/marcacao.png" class="pull-left mr-2">1 Ano de Garantia</p>
            <p class="text-left mt-5"><img src="img/marcacao.png" class="pull-left mr-2">Completo</p>
            <p class="text-left mt-5"><img src="img/marcacao.png" class="pull-left mr-2">Câmbio Automático</p>
            <p class="text-left mt-5"><img src="img/marcacao.png" class="pull-left mr-2">Roda de Liga Leve</p>
          </div>
          <div class="col-sm-12">
            <h2 class="mb-0" style="color: #28377A;">SAIBA MAIS</h2>
            <span style="font-weight: 500;">Para mais informações preencha seus dados e entraremos em contato</span>
          </div>
          <div class="col-sm-12 mt-2" style="align-items: center; justify-content: center; display: flex;">
            <form id="form" class="col-sm-8" action="index.php" method="post">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Nome" name="client['name']" required>
              </div>
              <div class="form-group number-input">
                <input type="text" class="form-control sp_celphones" placeholder="Telefone" name="telephones[]" required>
                <img id="plus" src="img/plus.png" style="cursor: pointer; margin-right: -35px; margin-top: -33px;" class="float-right">
              </div>
              <button type="submit" class="btn btn-primary" id="form-button">ENVIAR</button>
            </form>
          </div>
          <div class="col-sm-12 mt-5">
            <h2>Como Funciona?</h2>
            <p>Entenda as condições que criamos para você sair de carro novo</p>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-sm-4">
            <img src="img/cel.png" class="img-fluid">
          </div>
          <div class="col-sm-8 text-left">
            <p><strong>A Tony vende para mim que estou com o nome sujo?</strong></p>
            <p>
              Tony Veículos acredita que mesmo você que está negativado<br>
              tem o direito de ter um carro novo.
            </p>
            <p><strong>Posso parcelar a entrada?</strong></p>
            <p>
              Infelizmente para essas condições não podemos parcelar a entrada, <br>
              porem a Tony tem um produto chamado Compra Programada que <br>
              ajuda você que quer comprar um carro mas está com o nome sujo e <br>
              não tem entrada. <a href="#">para saber mais clique aqui.</a>
            </p>
            <p><strong>Não tenho CNH, posso comprar mesmo assim?</strong></p>
            <p>
              Infelizmente é necessário ter a CNH para vendermos nessas condições.
            </p>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-sm-12 mt-5">
            <h2>Outras dúvidas</h2>
            <p>Entenda as condições que criamos para você sair de carro novo</p>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-sm-8 text-left">
            <p class="mt-2"><strong>Como posso dar a entrada?</strong></p>
            <p class="mt-4">Para essas condições a entrada precisa ser feita em dinheiro.</p>
            
            <p class="mt-4"><strong>Posso dar um carro como entrada?</strong></p>
            <p class="mt-4">Sim, aceitamos o seu usado como entrada.</p>
            
            <p class="mt-4"><strong>O que a garantia de 1 ano cobre?</strong></p>
            <p class="mt-4">A garantia cobre: motor, câmbio e partes internas.</p>
          </div>
          <div class="col-sm-4">
            <img src="img/cel2.png" class="img-fluid">
          </div>
        </div>
      </div>
    </section>
    <div class="jumbotron jumbotron-fluid">
      <div class="container text-center">
        <h2>Você está esperando o que para começar ?</h2>
        <p>Prencha seus dados agora e entraremos em contato</p>
        <button class="btn btn-primary mt-4 col-sm-4">SAIBA MAIS</button>
      </div>
    </div>
    <section>
      <div class="container text-center">
        <div class="row">
          <div class="col-sm-12">
            <img src="img/garantia.png" class="img-fluid">
            <img src="img/negativado.png" class="img-fluid ml-5">
          </div>
          <div class="col-sm-12 mt-5">
            <img src="img/40anos.png" class="img-fluid ml-5"><br>
            <img src="img/3maior.png" class="img-fluid mt-3">
            <img src="img/1000.png" class="img-fluid ml-5">
          </div>
        </div>
      </div>
    </section>
    <footer class="footer mt-5 py-3">
      <div class="container">
        <div class="row">
          <div class="col-sm-8">
            <img src="img/logo.png" height="45" class="float-left">
            <span class="text-muted ml-5" style="color: #fff !important;">Todos direitos reservados<br> <span class="ml-5">©Tony veiculos</span></span>
          </div>
          <div class="col-sm-4 mt-1">
            <img src="img/insta.png" class="float-right">
            <img src="img/yb.png" class="float-right">
            <img src="img/face.png" class="float-right">
          </div>
        </div>
      </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body text-center">
            <div class="col-sm-12">
              <center>
                <lottie-player 
                  src="https://assets5.lottiefiles.com/datafiles/K6S8jDtSdQ7EPjH/data.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"    autoplay >
                </lottie-player>
              </center>
            </div>
            <div class="col-sm-12">
              <h2>Seu contato foi registrado com sucesso!</h2>
            </div>
          </div>
          <div class="text-center p-3">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/core.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="js/jquery.mask.js"></script>
  </body>
</html>
<script>
  var SPMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
  }, spOptions = {
    onKeyPress: function(val, e, field, options) {
        field.mask(SPMaskBehavior.apply({}, arguments), options);
      }
  };

  $('.sp_celphones').mask(SPMaskBehavior, spOptions);

  $( document ).ready(function() {

    $('#plus').click(function(e){
      e.preventDefault();
      $(".number-input").append('<div style="margin-top: 1rem;"><input type="text" class="form-control sp_celphones" placeholder="Telefone" name="telephones[]"/><img class="remove float-right" src="img/delete.png" style="cursor: pointer; margin-right: -29px; margin-top: -32px;"></div>');
      $('.sp_celphones').mask(SPMaskBehavior, spOptions);
    });

    $(".number-input").on("click",".remove", function(e){ //user click on remove text
      e.preventDefault(); 
      $(this).parent('div').remove();
    })

    $("#form").submit(function(e) {
      e.preventDefault(); 

      var form = $(this);
      var url = form.attr('action');

      $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(), 
        success: function(data)
        {
          $('input').val('');
          $("#successModal").modal("show");
        },
        error: function(error) 
        {
          console.log(error);
        }
      });
    });
  });
</script>