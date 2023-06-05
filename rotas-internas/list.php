<?php   
  function listCorretoras() {
    $response = array(
        'TYPE' => 'SUCCESS',
        'DADOS' => array (
            'QTD' => '16',
            'HEADER' => array(
              'id' => 'ID',
              'nome' => 'Nome',
              'nome_fantasia' => 'Nome Fantasia',
              'cnpj' => 'CNPJ',
              'status' => 'Status',
            ),
            'VALORES' => array (
                array(
                  'id' => '1',
                  'nome' => 'Beta',
                  'nome_fantasia' => 'Beta Fantasia',
                  'cnpj' => '78878726272',
                  'status' => 'ativo',
                ),
                array(
                  'id' => '2',
                  'nome' => 'Gui',
                  'nome_fantasia' => 'React Invest',
                  'cnpj' => '07.188.368/0001-74',
                  'status' => 'inativo',
                ),
                array(
                  'id' => '3',
                  'nome' => 'XHTML',
                  'nome_fantasia' => 'HTML Finanças',
                  'cnpj' => '14.997.255/0001-85',
                  'status' => 'ativo',
                ),
                array(
                  'id' => '4',
                  'nome' => 'SOMMA',
                  'nome_fantasia' => 'SOMMA Invest',
                  'cnpj' => '86.544.272/0001-78',
                  'status' => 'ativo',
                ),
                array(
                  'id' => '5',
                  'nome' => 'BIN',
                  'nome_fantasia' => 'Binance',
                  'cnpj' => '21.657.656/0001-51',
                  'status' => 'inativo',
                ),
                array(
                  'id' => '6',
                  'nome' => 'EGN',
                  'nome_fantasia' => 'Engine',
                  'cnpj' => '21.657.656/0001-51',
                  'status' => 'ativo',
                ),
            )
          )
    );
    
    $jsonResponse = json_encode($response);
  
    header('Content-Type: application/json');
  
    echo $jsonResponse;
  }
  
  listCorretoras(); 
?>