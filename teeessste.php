<!DOCTYPE html>
<html>
<head>
  <script>
    function changePassword() {
      var currentPassword = prompt("Digite seu Email:");
      var newPassword = prompt("Digite sua nova senha:");
      var confirmPassword = prompt("Confirme sua nova senha:");

      // Aqui você pode adicionar a lógica para verificar a senha atual e validar a nova senha

      if (currentPassword && newPassword && confirmPassword) {
        if (newPassword === confirmPassword) {
          // Aqui você pode adicionar a lógica para enviar a nova senha ao servidor ou fazer outras ações necessárias
          // Por exemplo, fazer uma chamada AJAX para um endpoint no servidor para atualizar a senha

          // Exemplo de chamada AJAX usando a biblioteca fetch:
          fetch("MySQL:3306/alterar_senha", {
            method: "POST",
            body: JSON.stringify({ currentPassword: currentPassword, newPassword: newPassword }),
            headers: {
              "Content-Type": "application/json"
            }
          })
            .then(function(response) {
              // Verifique a resposta do servidor aqui
              if (response.ok) {
                // Trate a resposta de sucesso aqui
                alert("Senha alterada com sucesso!");
              } else {
                // Trate a resposta de erro aqui
                alert("Ocorreu um erro ao alterar a senha.");
              }
            })
            .catch(function(error) {
              // Trate os erros de rede aqui
              alert("Ocorreu um erro de rede ao alterar a senha.");
            });
        } else {
          alert("As senhas não coincidem. Por favor, tente novamente.");
        }
      } else {
        alert("Por favor, preencha todos os campos.");
      }
    }
  </script>
</head>
<body>
  <button onclick="changePassword()">Alterar Senha</button>
</body>
</html>
