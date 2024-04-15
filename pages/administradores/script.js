const editIdInput = document.querySelector("#editIdInput");
const editNameInput = document.querySelector("#editNameInput");
const editEmailInput = document.querySelector("#editEmailInput");
const editSenhaInput = document.querySelector("#editSenhaInput");
const editCheck = document.querySelector("#editCheck");
const hamBurger = document.querySelector(".toggle-btn");

async function editarAdministrador(id) {
  const data = await fetch(`actions/pegarPorId.php?id=${id}`);
  const { erro, dados } = await data.json();

  editIdInput.value = dados.ADM_ID;
  editNameInput.value = dados.ADM_NOME;
  editEmailInput.value = dados.ADM_EMAIL;
  editSenhaInput.value = dados.ADM_SENHA;
  if (dados.ADM_ATIVO == 1) {
    editCheck.checked = true;
  } else {
    editCheck.checked = false;
  }
}

hamBurger.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("expand");
});
