const editIdInput = document.querySelector("#editIdInput");
const editNameInput = document.querySelector("#editNameInput");
const editDescInput = document.querySelector("#editDescInput");
const editCheck = document.querySelector("#editCheck");

async function editarCategoria(id) {
  const data = await fetch(`services/pegarCategoriaId.php?id=${id}`);
  const { erro, dados } = await data.json();

  console.log(dados);

  editIdInput.value = dados.CATEGORIA_ID;
  editNameInput.value = dados.CATEGORIA_NOME;
  editDescInput.value = dados.CATEGORIA_DESC;
  if (dados.CATEGORIA_ATIVO == 1) {
    editCheck.checked = true;
  } else {
    editCheck.checked = false;
  }
}
