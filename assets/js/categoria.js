const table_categoria = document.querySelector("#table-categoria");

async function listAllCategorias(nome) {
	let url_vazia = nome === "" ? "../../app/helpers/categorias/listar.php" : `../../app/helpers/categorias/listar.php?nome=${nome}`;
	const data = await fetch(url_vazia);
	const { erro, dados } = await data.json();
	if (dados.length === 0) {
		table_categoria.innerHTML = "";
		const tr = document.createElement("tr");
		tr.innerHTML = `
			<td colspan="6" class="text-center text-danger fw-bold">Nenhuma categoria encontrada com esse nome</td>
		`;
		table_categoria.appendChild(tr);
	}
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
async function listCategoriasAtivas(nome) {
	let url_vazia = nome === "" ? "../../app/helpers/categorias/listar_categorias_ativas.php" : `../../app/helpers/categorias/listar_categorias_ativas.php?nome=${nome}`;
	const data = await fetch(url_vazia);
	const { erro, dados } = await data.json();
	if (dados.length === 0) {
		table_categoria.innerHTML = "";
		const tr = document.createElement("tr");
		tr.innerHTML = `
			<td colspan="6" class="text-center text-danger fw-bold">Nenhuma categoria ativa encontrada com esse nome</td>
		`;
		table_categoria.appendChild(tr);
	}
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
async function listCategoriasInativas(nome) {
	let url_vazia = nome === "" ? "../../app/helpers/categorias/listar_categorias_inativas.php" : `../../app/helpers/categorias/listar_categorias_inativas.php?nome=${nome}`;
	const data = await fetch(url_vazia);
	const { erro, dados } = await data.json();
	if (dados.length === 0) {
		table_categoria.innerHTML = "";
		const tr = document.createElement("tr");
		tr.innerHTML = `
			<td colspan="6" class="text-center text-danger fw-bold">Nenhuma categoria inativa encontrada com esse nome</td>
		`;
		table_categoria.appendChild(tr);
	}
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


function verifySearchRadioCategorias() {
	let btn_search_admin = document.querySelector(".btn-search-admin");

	btn_search_admin.addEventListener("click", () => {
		const searchInput = document.querySelector("#searchInput");
		const searchValue = searchInput.value;
		const searchRadio = document.querySelector(".input-check-admin:checked").value;
		if (searchValue.length === 0) {
			if (searchRadio === "Todos") {
				table_categoria.innerHTML = "";
				listAllCategorias("");

				return;
			}
			if (searchRadio === "Ativos") {
				table_categoria.innerHTML = "";
				listCategoriasAtivas("");
				return;
			}
			if (searchRadio === "Inativos") {
				table_categoria.innerHTML = "";
				listCategoriasInativas("");
				return;
			}
		} else {
			if (searchRadio === "Ativos" && searchValue.length > 0) {
				table_categoria.innerHTML = "";
				listCategoriasAtivas(searchValue);
				return;
			}
			if (searchRadio === "Inativos" && searchValue.length > 0) {
				table_categoria.innerHTML = "";
				listCategoriasInativas(searchValue);
				return;
			}
			if (searchRadio === "Todos" && searchValue.length > 0) {
				table_categoria.innerHTML = "";
				listAllCategorias(searchValue);
				return;
			}
		}
	});
}


function addCategoria() {
	const formAddCategoria = document.querySelector("#formAddCategoria");
	const categoriaModal = new bootstrap.Modal("#categoriaModal");
	const msg_success = document.querySelector("#msg-success");
	const msg_error = document.querySelector("#msg-error");
	formAddCategoria.addEventListener("submit", async (e) => {
		e.preventDefault();
		const formData = new FormData(formAddCategoria);
		formData.append("edit",1)
		const url = "../../app/helpers/categorias/cadastrar.php";
		const data = await fetch(url, {
			method: "POST",
			body: formData,
		});
		const { erro, mensagem } = await data.json();
		if (!erro) {
			formAddCategoria.reset();
			categoriaModal.hide();
			table_categoria.innerHTML = "";
			listAllCategorias("");
			msg_success.innerHTML = mensagem;
		} else {
			msg_error.innerHTML = mensagem;
		}
	});
}

function updateCategoria() {
	const formEditCategoria = document.querySelector("#formEditCategoria");
	const categoriaModalEdit = new bootstrap.Modal("#categoriaModalEdit");
	const msg_success = document.querySelector("#msg-success");
	const msg_error = document.querySelector("#msg-error-edit");
	formEditCategoria.addEventListener("submit", async (e) => {
		e.preventDefault();
		const formData = new FormData(formEditCategoria);
		formData.append("edit",1)
		const url = "../../app/helpers/categorias/editar.php";
		const data = await fetch(url, {
			method: "POST",
			body: formData,
		});
		const { erro, mensagem } = await data.json();
		if (!erro) {
			formEditCategoria.reset();
			categoriaModalEdit.hide();
			table_categoria.innerHTML = "";
			listAllCategorias("");
			msg_success.innerHTML = mensagem;
		} else {
			msg_error.innerHTML = mensagem;
		}
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

function deleteCategoria() {
	const formDeleteCategoria = document.querySelector("#formDeleteCategoria");
	const categoriaModalDelete = new bootstrap.Modal("#categoriaModalDelete");
	const msg_success = document.querySelector("#msg-success");
	const msg_error = document.querySelector("#msg-error-delete");
	formDeleteCategoria.addEventListener("submit", async (e) => {
		e.preventDefault();
		alert("Não é possível excluir categorias")
		// const formData = new FormData(formDeleteCategoria);
		// formData.append("delete",1)
		// const url = "../../app/helpers/categorias/excluir.php";
		// const data = await fetch(url, {
		// 	method: "POST",
		// 	body: formData,
		// });
		// const { erro, mensagem } = await data.json();
		// if (!erro) {
		// 	categoriaModalDelete.hide();
		// 	table_categoria.innerHTML = "";
		// 	listAllCategorias("");
		// 	msg_success.innerHTML = mensagem;
		// } else {
		// 	msg_error.innerHTML = mensagem;
		// }
	});
}
function deletarCategoria(id) {
	const deleteIdInput = document.querySelector("#deleteIdInput");
	deleteIdInput.value = id;
}

function cleanSearch(){
	const searchInput = document.querySelector("#searchInput");
	const searchRadioTodos = document.querySelector("#radioTodos");
	searchRadioTodos.checked = true;
	searchInput.value = "";
	table_categoria.innerHTML = "";
	listAllCategorias("");
}

const btn_clean = document.querySelector(".btn-clean-search-admin");
btn_clean.addEventListener("click", cleanSearch);

listAllCategorias("");
verifySearchRadioCategorias();

addCategoria();
updateCategoria();
deleteCategoria();