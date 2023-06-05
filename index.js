function ajaxRequest(method, url, data, successCallback, errorCallback) {
  $.ajax({
    method: method,
    url: url,
    data: JSON.stringify(data),
    headers: {
    'contentType': 'application/json',
    //'Authorization': ''
    },
    success: successCallback,
    error: errorCallback
  });
}

function login() {
  event.preventDefault();

  var data = {
    user: $('#username').val(),
    pass: $('#password').val()
  };

  ajaxRequest('POST', 'https://somma.dirai.com.br/avaliacao.php?login', data, function(response) {
    const section = document.getElementById("login_container");   
    var token = response.TOKEN; 

    alert('Login bem-sucedido. ' + response.MSG);
    section.style.display = "none";
    showCorretorasTable();
  }, function(error) {
    console.log("falha no login")
    alert('Falha no login. Erro: ' + "error.responseJSON.error");
  });
}

function showCorretorasTable() {
  $('#tableList').show();
}

function listCorretoras() {
  $.ajax({
    url: 'https://somma.dirai.com.br/avaliacao.php?list', 
    type: 'GET',
    dataType: 'json',
    success: function(response) {
      if (response && response.TYPE === 'SUCCESS' && response.DADOS) {
        var corretoras = response.DADOS.VALORES;
        var tabela = $('#corretorasTable'); 

        tabela.empty();
        var cabecalho = $('<tr>');

        $.each(response.DADOS.HEADER, function(chave, valor) {
          cabecalho.append($('<th>').text(valor));
        });

        tabela.append(cabecalho);

        $.each(corretoras, function(index, corretora) {
          var linha = $('<tr>');
          $.each(corretora, function(chave, valor) {
            linha.append($('<td>').text(valor));
          });
          tabela.append(linha);
        });
      }
    }, error: function(xhr, status, error) {
      console.log('Erro na solicitação AJAX:', error);
    }
  });

}

function atualizarCorretora() {
  $('#tableList').hide();
  const section = document.getElementById("edit-form");
  section.style.display = "block";
}

function updateCorretoras() {
  var formData = {
    id: $('#nome-fantasia').val(),
    nome: $('#nome').val(),
    cnpj: $('#cnpj').val(),
    status: $('#status').val()
  };

  $.ajax({
    url: 'https://somma.dirai.com.br/avaliacao.php?update',
    method: 'POST',
    data: formData,
    success: function(response) {
      console.log('Atualizado com sucesso:', response);
      alert('Login bem-sucedido. ' + response.MESSAGE);
      showCorretorasTable();
      $('#edit-form').hide();
    }, error: function(error) {
      console.log('Erro na requisição:', error);
    }
  });
}

function deleteCorretora(id) {
  const section = document.getElementById("form-box");
  section.style.display = "block";

  $.ajax({
    url: 'https://somma.dirai.com.br/avaliacao.php?delete',
    method: 'DELETE',
    data: { id: id },
    success: function(response) {
      console.log('Remoção concluída:' + response.MSG);
    },
    error: function(error) {
      console.log('Erro na requisição:', error);
    }
  });
}