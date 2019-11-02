<?php

$clients = null;
$client = null;

/**
 *  Listagem de Clientes
 */
function index() {
	global $clients;
	$clients = find('clients', null, 'telephones', 'client_id');

	$clients = group_by("client_id", $clients);
}

function store() {
  if (!empty($_POST['client'])) {
    $today = date_create('now', new DateTimeZone('America/Sao_Paulo'));
    
    $client = $_POST['client'];
    $client['updated_at'] = $client['created_at'] = $today->format("Y-m-d H:i:s");
    
		if($result = save('clients', $client)) {
      if(!empty($_POST['telephones'])) {
        $telephones = $_POST['telephones'];
				foreach($telephones as $telephone) {
          $number['number'] = $telephone;
					$number['client_id'] = $result;
					save('telephones', $number);
				}
			}
		}
  }
}

function edit() {
  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
  
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    if (isset($_POST['client'])) {
      $client = $_POST['client'];
			$client['updated_at'] = $now->format("Y-m-d H:i:s");
      
      $telephones = $_POST['telephones'];
      foreach($telephones as $telephone) {
        $result['number'] = $telephone["'number'"];
        update('telephones', $telephone["'idtelephones'"], $result);
      }

      update('clients', $id, $client);
      header('location: index.php');
    } else {
      global $client;
      $client = find('clients', $id, 'telephones', 'client_id');
    } 
  } else {
    header('location: index.php');
  }
}

function destroy() {
  if (!empty($_POST['idclients'])) {
    remove('clients', $_POST['idclients']);
    remove('telephones', $_POST['idclients']);
    header('location: index.php');
  }
}

?>