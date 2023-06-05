<?php   
  function login() {
   
    $response = array(
      'TYPE' => 'SUCCESS',
      'MSG' => 'Usuário autenticado',
      'TOKEN' => 'Bearer eyJhbGciOiJIUzUxMiJ9.eyJpbnN0aXRl19.wSunuaC6iQkxEFcckDGzE3lFeI2lQXnFffy0FZWKK8V-5945z1GMHzeeqknWajiT-F0wKlKKBZ7phfBBaLTfREA'
    );
  
    $jsonResponse = json_encode($response);
  
    header('Content-Type: application/json');
  
    echo $jsonResponse;
  }
  
  login(); 
?>