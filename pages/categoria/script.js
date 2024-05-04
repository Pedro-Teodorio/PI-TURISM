const editIdInput = document.querySelector("#editIdInput");
const editNameInput = document.querySelector("#editNameInput");
const editDescInput = document.querySelector("#editDescInput");
const editCheck = document.querySelector("#editCheck");
const hamBurger = document.querySelector(".toggle-btn");

async function editarCategoria(id) {
  const data = await fetch(`actions/pegarPorId.php?id=${id}`);
  const { erro, dados } = await data.json();

  editIdInput.value = dados.CATEGORIA_ID;
  editNameInput.value = dados.CATEGORIA_NOME;
  editDescInput.value = dados.CATEGORIA_DESC;
  
  if (dados.CATEGORIA_ATIVO == 1) {
    editCheck.checked = true;
  } else {
    editCheck.checked = false;
  }
}

hamBurger.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("expand");
});
