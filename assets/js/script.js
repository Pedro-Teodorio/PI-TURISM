const hamBurger = document.querySelector(".toggle-btn");
function toggleSidebar() {
  document.querySelector("#sidebar").classList.toggle("expand");
}

//#region Scripts for Admin Dashboard
const link_admin = document.querySelector("#link_admin");
const table_admins = document.querySelector("#table-admins");

async function listAllAdmins() {
  const data = await fetch(`../../app/helpers/admin/listar.php`);
  const { erro, dados } = await data.json();
  dados.forEach((admin) => {
    const { ADM_ID, ADM_NOME, ADM_SENHA, ADM_EMAIL, ADM_ATIVO } = admin;
    const tr = document.createElement("tr");
    let status =
      ADM_ATIVO === 1
        ? "<span class=' text-bg-success p-2 rounded-3'>Ativo</span>"
        : "<span class=' text-bg-danger p-2 rounded-3'>Inativo</span>";
    tr.innerHTML = `
			<td>${ADM_ID}</td>
			<td>${ADM_NOME}</td>
			<td>${ADM_EMAIL}</td>
			<td>${ADM_SENHA}</td>
			<td>${status}</td>
			<td>
			<button data-bs-toggle="modal" data-bs-target="#adminModalEdit" onclick="editarAdministrador(${ADM_ID})" class="btn btn-first-color"><i class="bi bi-pencil-square"></i></button>
			<button data-bs-toggle="modal" data-bs-target="#adminModalDelete" onclick="deletarAdministrador(${ADM_ID})"  class="btn btn-first-color"><i class="bi bi-trash"></i></button>
			</td>
		`;
    table_admins.appendChild(tr);
  });
}
async function listAdminsAtivos() {
  const data = await fetch(`../../app/helpers/admin/listar_admin_ativos.php`);
  const { erro, dados } = await data.json();
  dados.forEach((admin) => {
    const { ADM_ID, ADM_NOME, ADM_SENHA, ADM_EMAIL, ADM_ATIVO } = admin;
    const tr = document.createElement("tr");
    let status =
      ADM_ATIVO === 1
        ? "<span class=' text-bg-success p-2 rounded-3'>Ativo</span>"
        : "<span class=' text-bg-danger p-2 rounded-3'>Inativo</span>";
    tr.innerHTML = `
			  <td>${ADM_ID}</td>
			  <td>${ADM_NOME}</td>
			  <td>${ADM_EMAIL}</td>
			  <td>${ADM_SENHA}</td>
			  <td>${status}</td>
			  <td>
			  <button data-bs-toggle="modal" data-bs-target="#adminModalEdit" onclick="editarAdministrador(${ADM_ID})" class="btn btn-first-color"><i class="bi bi-pencil-square"></i></button>
			  <button data-bs-toggle="modal" data-bs-target="#adminModalDelete" onclick="deletarAdministrador(${ADM_ID})"  class="btn btn-first-color"><i class="bi bi-trash"></i></button>
			  </td>
		  `;
    table_admins.appendChild(tr);
  });
}
async function listAdminsInativos() {
  const data = await fetch(`../../app/helpers/admin/listar_admin_inativos.php`);
  const { erro, dados } = await data.json();
  dados.forEach((admin) => {
    const { ADM_ID, ADM_NOME, ADM_SENHA, ADM_EMAIL, ADM_ATIVO } = admin;
    const tr = document.createElement("tr");
    let status =
      ADM_ATIVO === 1
        ? "<span class=' text-bg-success p-2 rounded-3'>Ativo</span>"
        : "<span class=' text-bg-danger p-2 rounded-3'>Inativo</span>";
    tr.innerHTML = `
			  <td>${ADM_ID}</td>
			  <td>${ADM_NOME}</td>
			  <td>${ADM_EMAIL}</td>
			  <td>${ADM_SENHA}</td>
			  <td>${status}</td>
			  <td>
			  <button data-bs-toggle="modal" data-bs-target="#adminModalEdit" onclick="editarAdministrador(${ADM_ID})" class="btn btn-first-color"><i class="bi bi-pencil-square"></i></button>
			  <button data-bs-toggle="modal" data-bs-target="#adminModalDelete" onclick="deletarAdministrador(${ADM_ID})"  class="btn btn-first-color"><i class="bi bi-trash"></i></button>
			  </td>
		  `;
    table_admins.appendChild(tr);
  });
}

async function editarAdministrador(id) {
  const editIdInput = document.querySelector("#editIdInput");
  const editNameInput = document.querySelector("#editNameInput");
  const editEmailInput = document.querySelector("#editEmailInput");
  const editSenhaInput = document.querySelector("#editSenhaInput");
  const editCheck = document.querySelector("#editCheck");
  const data = await fetch(`../../app/helpers/admin/pegar_por_id.php?id=${id}`);
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
function deletarAdministrador(id) {
  const deleteIdInput = document.querySelector("#deleteIdInput");
  deleteIdInput.value = id;
}
function verifySearchRadioAdmin() {
	let btn_search_admin = document.querySelector(".btn-search-admin");
  
	btn_search_admin.addEventListener("click", () => {
	  const searchInput = document.querySelector("#searchInput");
	  const searchValue = searchInput.value;
	  const searchRadio = document.querySelector(
		".input-check-admin:checked"
	  ).value;
	  if (!searchValue === "") {
		alert("O campo de busca não pode ser vazio!");
		return;
	  } else {
		if (searchRadio === "Todos") {
		  table_admins.innerHTML = "";
		  listAllAdmins();
  
		  return;
		}
		if (searchRadio === "Ativos") {
		  table_admins.innerHTML = "";
		  listAdminsAtivos();
		  return;
		}
		if (searchRadio === "Inativos") {
		  table_admins.innerHTML = "";
		  listAdminsInativos();
		  return;
		}
	  }
	});
  }
//#endregion

//#region Scripts for Categorias Dashboard
const link_categoria = document.querySelector("#link_categoria");
const table_categoria = document.querySelector("#table-categoria");

async function listAllCategorias() {
	const data = await fetch(`../../app/helpers/categorias/listar.php`);
	const { erro, dados } = await data.json();
	dados.forEach((categoria) => {
		const { CATEGORIA_ID, CATEGORIA_NOME, CATEGORIA_DESC, CATEGORIA_ATIVO } = categoria;
		const tr = document.createElement("tr");
		let status = CATEGORIA_ATIVO === 1 ? "<span class=' text-bg-success p-2 rounded-3'>Ativo</span>" : "<span class=' text-bg-danger p-2 rounded-3'>Inativo</span>";
		tr.innerHTML = `
			<td>${CATEGORIA_ID}</td>
			<td>${CATEGORIA_NOME}</td>
			<td>${CATEGORIA_DESC}</td>
			<td>${status}</td>
			<td>
			<button data-bs-toggle="modal" data-bs-target="#categoriaModalEdit" onclick="editarCategoria(${CATEGORIA_ID})" class="btn btn-first-color"><i class="bi bi-pencil-square"></i></button>
			<button data-bs-toggle="modal" data-bs-target="#categoriaModalDelete" onclick="deletarCategoria(${CATEGORIA_ID})"  class="btn btn-first-color"><i class="bi bi-trash"></i></button>
			</td>
		`;
		table_categoria.appendChild(tr);
	});
}

async function editarCategoria(id) {
	const editIdInput = document.querySelector("#editIdInput");
	const editNameInput = document.querySelector("#editNameInput");
	const editDescricaoInput = document.querySelector("#editDescricaoInput");
	const editCheck = document.querySelector("#editCheck");
	const data = await fetch(`../../app/helpers/categorias/pegar_por_id.php?id=${id}`);
	const { erro, dados } = await data.json();

	editIdInput.value = dados.CATEGORIA_ID;
	editNameInput.value = dados.CATEGORIA_NOME;
	editDescricaoInput.value = dados.CATEGORIA_DESC;
	if (dados.CATEGORIA_ATIVO == 1) {
		editCheck.checked = true;
	} else {
		editCheck.checked = false;
	}
}

function deletarCategoria(id) {
	const deleteIdInput = document.querySelector("#deleteIdInput");
	deleteIdInput.value = id;
}
//#endregion

function main() {
	hamBurger.addEventListener("click", toggleSidebar);
	listAllAdmins();
	verifySearchRadioAdmin()
	listAllCategorias();
}

main();
