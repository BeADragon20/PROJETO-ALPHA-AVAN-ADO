/// FUNÇÃO PARA ALTERAR AS FORMAS DE PAGAMENTO


function alternarFormaPagamento() {
    var opcaoPagamento = document.getElementById("opcao-pagamento").value;
    var camposBoleto = document.getElementById("campos-boleto");
    var camposCartao = document.getElementById("campos-cartao");
    
    if (opcaoPagamento === "boleto") {
      camposBoleto.classList.add("visivel");
      camposCartao.classList.remove("visivel");

    } else if (opcaoPagamento === "cartao") {
      camposBoleto.classList.remove("visivel");
      camposCartao.classList.add("visivel");

    }

  }

  
  
  function calculateInstallmentValue() {
    var installmentSelect = document.getElementById("installments-select");
    var installmentValue = document.getElementById("parcela");
    var valorTotal = document.getElementById("valor");
    var selectedInstallments = parseInt(installmentSelect.value);
    
    // Valor do produto
    var productValue = 0;
    
    if (selectedInstallments === 1) {
      installmentValue.textContent = "Valor: R$ " + productValue.toFixed(2);
    } else {
      var valor = installmentAmount;
      var installmentAmount = productValue / selectedInstallments;
      valorTotal.textContent = valor.toFixed(2);
      installmentValue.textContent = "Valor das Parcelas: R$ " + installmentAmount.toFixed(2);
    }
  }


    // FUNÇÃO PARA EXIBIR A DESCRIÇÃO E PREÇO DO PRODUTO

  
    function showDescription(title, description, price) {
      document.getElementById("product-title").innerText = title;
      document.getElementById("product-description").innerText = description;
      document.getElementById("product-price").innerText = price;
      document.getElementById("card-description").style.display = "block";
    }
    
    function addToCart() {
      var title = document.getElementById("product-title").innerText;
      // Adicione sua lógica para adicionar ao carrinho aqui
  
      alert(title + " foi adicionado ao carrinho!");
      document.getElementById("card-description").style.display = "none";
    }
    