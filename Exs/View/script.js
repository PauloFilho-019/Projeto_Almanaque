const urlnome_prod = "http://localhost/EXS/src/controll/routes/route.produto.php?id_prod=";
const nome_prod = document.getElementById("nome_prod");
const quantidade = document.getElementById("quantidade");
const preco_de_venda_unitario = document.getElementById("preco_de_venda_unitario");
const tableBody = document.getElementById("tableBody");
const ultima = document.getElementById("ultima");

let estoque = 0;
let soma = 0;
botao.addEventListener("click", adicionarLinhas);

function adicionarLinhas() {
  if (nome_prod.value != "" && quantidade.value != "" && preco_de_venda_unitario.value !="") {
    if(quantidade.value <= 0) {
      alert ("Insira um valor maior que 0");
      return;
    }
    // erro que fala que o estoque está exedido quando na verdade ele não está, tenho que corrigir
    //if(quantidade.value > estoque){
  //    alert ("Quantidade Excedida, insira um valor menor");
  //    return;
   //}
    const preco_final = quantidade.value * preco_de_venda_unitario.value;
    const tr = document.createElement("tr");
    const jaca1 = document.createElement("td");
    const jaca2 = document.createElement("td");
    const jaca3 = document.createElement("td");

    jaca1.innerText = nome_prod.options[nome_prod.selectedIndex].text;
   
    jaca2.innerText = quantidade.value;

    jaca3.innerText = preco_final;
      
    tr.appendChild(jaca1);
    tr.appendChild(jaca2);
    tr.appendChild(jaca3);

    tableBody.appendChild(tr);

    //limpa os campos
    nome_prod.value = "";
    quantidade.value = "";
    preco_de_venda_unitario.value = "";

    soma += preco_final;

    ultima.innerHTML="$"+ soma;
  }
}


 
function excluirLinhas(e) {
  e.parentNode.parentNode.remove();
}

function carregaNome() {
  fetch(urlnome_prod+'0')
      .then(function (resp) {
          //Obtem a resposta da URL no formato JSONval
          if (!resp.ok)
              throw new Error("Erro ao executar requisição: " + resp.status);
          return resp.json();
      })
      .then(function (data) {
          //Se obteve a resposta explora os dados recebidos
          data.forEach((val) => {
            var option = document.createElement("option");
            option.text = val.nome_prod;
            option.value = val.id_prod;;
            nome_prod.add(option);
           });
      })  //Se obteve erro no processo exibe no console do navegador
      .catch(function (error) {
          console.error(error);
      });
    }
 
    function carregaDadosRest(id_prod) {
      
      fetch(urlnome_prod+id_prod)
          .then(function (resp) {
              //Obtem a resposta da URL no formato JSON
              if (!resp.ok)
                  throw new Error("Erro ao executar requisição: " + resp.status);
              return resp.json();
          })
          .then(function (data) {
              //Se obteve a resposta explora os dados recebidos
              data.forEach((val) => {
              
                quantidade.value = 1;
                estoque = val.quantidade;
                preco_de_venda_unitario.value  = val.preco_de_venda_unitario * quantidade.value;
      
              });
          })  //Se obteve erro no processo exibe no console do navegador
          .catch(function (error) {
              console.error(error);
          });
        }
      