<?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $cnpj = $_POST['cnpj'];
        $status = $_POST['status'];

        $response = array(
            'TYPE' => 'SUCCESS',
            'MESSAGE' => 'Dados atualizados com sucesso!'
        );

        header('Content-Type: application/json');

        echo json_encode($response);
  } else {
      $response = array(
        'TYPE' => 'ERROR',
        'MESSAGE' => 'Método de requisição inválido!'
      );
      header('Content-Type: application/json');
      echo json_encode($response);
    }
?>
