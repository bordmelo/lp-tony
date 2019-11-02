<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Encode+Sans:200,400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
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
				<img src="../img/logo.png" height="55" alt="">
			</div>
		</header>
		<section>
      <?php require_once 'config.php'; ?>
      <?php require_once DBAPI; ?>
      <?php $db = open_database(); ?>
      <?php require_once('models/client.php'); ?>
      <?php edit(); ?>

			<?php if ($db) : ?>

				<div class="container p-4 text-center">
					<div class="row text-center">
						<div class="col-sm-12">
              <?php if (!empty($_SESSION['message'])) : ?>
                <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <?php echo $_SESSION['message']; ?>
                </div>
                <hr>
                <?php clear_messages(); ?>
              <?php endif; ?>
            </div>
            <div class="col-sm-12">
              <h2 class="">Editar Contato</h2>
            </div>
            <div class="col-sm-12 mt-2" style="align-items: center; justify-content: center; display: flex;">
              <form id="form" class="col-sm-8" action="edit.php?id=<?php echo $client[0]['idclients']?>" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Nome" name="client['name']" value="<?php echo $client[0]['name']; ?>" required>
                </div>
                <div class="number-input">
                  <?php foreach ($client as $key => $number) : ?>
                    <div class="form-group">
                      <input type="text" class="form-control sp_celphones" placeholder="Telefone" name="telephones[<?php echo $key ?>]['number']" value="<?php echo $number['number']; ?>" required>
                      <input type="hidden" name="telephones[<?php echo $key ?>]['idtelephones']" value="<?php echo $number['idtelephones']; ?>">
                    </div>
                  <?php endforeach; ?>
                </div>
                <button type="submit" class="btn btn-primary" id="form-button">SALVAR</button>
              </form>
            </div>
          </div>
      <?php endif; ?>
    </section>
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="../js/jquery.mask.js"></script>
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
</script>