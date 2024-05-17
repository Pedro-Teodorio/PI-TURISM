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
async function listCategoriasAtivas() {
	const data = await fetch(`../../app/helpers/categorias/listar_categorias_ativas.php`);
	const { erro, dados } = await data.json();
	console.log(dados);
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
async function listCategoriasInativas() {
	const data = await fetch(`../../app/helpers/categorias/listar_categorias_inativas.php`);
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

function verifySearchRadioCategorias() {
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
			table_categoria.innerHTML = "";
		  	listAllCategorias();
		  return;
		}
		if (searchRadio === "Ativos") {
			table_categoria.innerHTML = "";
		  	listCategoriasAtivas();
		  return;
		}
		if (searchRadio === "Inativos") {
			table_categoria.innerHTML = "";
		  listCategoriasInativas();
		  return;
		}
	  }
	});
  }

listAllCategorias();
verifySearchRadioCategorias()