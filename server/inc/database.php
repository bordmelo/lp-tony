<?php

mysqli_report(MYSQLI_REPORT_STRICT);

/**
 *  Abre conexão com banco
 */
function open_database() {
	try {
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		return $conn;
	} catch (Exception $e) {
		echo $e->getMessage();
		return null;
	}
}

/**
 *  Fecha conexão com banco
 */
function close_database($conn) {
	try {
		mysqli_close($conn);
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}

/**
 *  Pesquisa apenas uma informação na tabela
 */
function find( $table = null, $id = null, $table2 = null, $innerJoin = null ) {
  
	$database = open_database();
	$found = null;

	try {
		if($table2) {
			if ($id) {
				$sql = "SELECT * FROM ".$table." INNER JOIN ".$table2." ON (".$table2.".".$innerJoin." = ".$table.".id".$table.") WHERE ".$table.".id".$table." = ".$id;
				$result = $database->query($sql);
				if ($result->num_rows > 0) {
					$found = $result->fetch_all(MYSQLI_ASSOC);
				}   
			} else {
				$sql = "SELECT * FROM ".$table." INNER JOIN ".$table2." ON (".$table2.".".$innerJoin." = ".$table.".id".$table.")";
				$result = $database->query($sql);
				
				if ($result) {
					$found = $result->fetch_all(MYSQLI_ASSOC);
				}
			}
		} else {
			if ($id) {
				$sql = "SELECT * FROM ".$table." WHERE id".$table." = ".$id;
				$result = $database->query($sql);
				
				if ($result->num_rows > 0) {
					$found = $result->fetch_all(MYSQLI_ASSOC);
				}   
			} else {
				$sql = "SELECT * FROM ".$table;
				$result = $database->query($sql);
				
				if ($result) {
					$found = $result->fetch_all(MYSQLI_ASSOC);
				}
			}
		}
	} catch (Exception $e) {
	  $_SESSION['message'] = $e->GetMessage();
	  $_SESSION['type'] = 'danger';
  }
	
	close_database($database);
	return $found;
}

/**
 *  Pesquisa todos registros de uma tabela
 */
function find_all( $table ) {
  return find($table);
}

/**
*  Agrupa array por indice(key) repetido
*/
function group_by( $key, $data ) {
	$result = array();

	foreach($data as $val) {
			if(array_key_exists($key, $val)){
					$result[$val[$key]][] = $val;
			}else{
					$result[""][] = $val;
			}
	}

	return $result;
}

/**
*  Insere um registro no banco
*/
function save( $table = null, $data = null ) {

  $database = open_database();

  $columns = null;
	$values = null;
	$result = null;

  foreach ($data as $key => $value) {
    $columns .= trim($key, "'") . ",";
    $values .= "'$value',";
  }

  $columns = rtrim($columns, ',');
  $values = rtrim($values, ',');
  
  $sql = "INSERT INTO " . $table . "($columns)" . " VALUES " . "($values);";

	try {
    $database->query($sql);

    $_SESSION['message'] = 'Registro cadastrado com sucesso.';
		$_SESSION['type'] = 'success';
		
		$result = $database->insert_id;
  
  } catch (Exception $e) { 
    $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
		$_SESSION['type'] = 'danger';
		
		$result = 0;
  } 

	close_database($database);

	return $result;
}

/**
 *  Remove um registro do banco
 */
function remove( $table = null, $id = null ) {
  $database = open_database();
	
  try {
    if ($id) {
			if($table == 'telephones') {
				$sql = "DELETE FROM " . $table . " WHERE client_id = " . $id;
			} else {
				$sql = "DELETE FROM " . $table . " WHERE id".$table." = " . $id;
			}
      $result = $database->query($sql);

      if ($result) {   	
        $_SESSION['message'] = "Registro Removido com Sucesso.";
        $_SESSION['type'] = 'success';
      }
    }
  } catch (Exception $e) { 

    $_SESSION['message'] = $e->GetMessage();
    $_SESSION['type'] = 'danger';
  }

  close_database($database);
}

/**
 *  Atualiza o registro no banco
 */
function update($table = null, $id = 0, $data = null) {
	$database = open_database();
	
  $items = null;
  foreach ($data as $key => $value) {
		$items .= trim($key, "'") . "='$value',";
  }
	
  $items = rtrim($items, ',');
	
  $sql  = "UPDATE " . $table;
  $sql .= " SET $items";
	$sql .= " WHERE id".$table."=" . $id . ";";
	
  try {
		$database->query($sql);
		
    $_SESSION['message'] = 'Registro atualizado com sucesso.';
    $_SESSION['type'] = 'success';
		
  } catch (Exception $e) { 

    $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
    $_SESSION['type'] = 'danger';
  } 

  close_database($database);
}