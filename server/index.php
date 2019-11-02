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
      <?php index(); ?>
      <?php destroy(); ?>

			<?php if ($db) : ?>

				<div class="container p-4 text-center">
					<div class="row">
						<div class="col-sm-12">
              <?php if (!empty($_SESSION['message'])) : ?>
                <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <?php echo $_SESSION['message']; ?>
                </div>
                <hr>
                <?php clear_messages(); ?>
              <?php endif; ?>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th width="30%">Cliente</th>
                    <th>Telefones</th>
                    <th>Opções</th>
                  </tr>
                </thead>
                <tbody>
                <?php if ($clients) : ?>
                <?php foreach ($clients as $client) : ?>
                  <tr>
                    <td><?php echo $client[0]['idclients']; ?></td>
                    <td><?php echo $client[0]['name']; ?></td>
                    <td>
                      <?php foreach ($client as $telephone) : ?>
                      <?php echo "| " .$telephone['number']. " | " ?>
                      <?php endforeach; ?>
                    </td>
                    <td class="actions">
                      <form action="index.php" method="post">
                        <a href="edit.php?id=<?php echo $client[0]['idclients']; ?>" class="btn btn-sm btn-warning">Editar</a>
                        <input type="hidden" name="idclients" value="<?php echo $client[0]['idclients']; ?>">
                        <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                      </form>
                    </td>  
                  </tr>
                <?php endforeach; ?>
                <?php else : ?>
                  <tr>
                    <td colspan="4">Nenhum registro encontrado.</td>
                  </tr>
                <?php endif; ?>
                </tbody>
                </table>
						</div>
					</div>
				</div>
			
			<?php else : ?>
				<div class="container p-4 text-center">
					<div class="row">
						<div class="col-sm-12">
							Não foi possível conectar no banco de dados!
						</div>
					</div>
				</div>
			<?php endif; ?>
    </section>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	</body>
</html>