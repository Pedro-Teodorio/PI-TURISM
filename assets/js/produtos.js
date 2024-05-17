//#region Scripts for Produtos Dashboard
const table_produto = document.querySelector(".table-produto");
const btn_close_modal = document.querySelector(".btn_close_modal");
const btn_close_modal_edit = document.querySelector(".btn_close_modal_edit");
const tab_images = document.querySelector(".tab-images");

async function listAllProdutos() {
	const data = await fetch(`../../app/helpers/produtos/listar.php`);
	const { erro, dados } = await data.json();
	dados.forEach((produto) => {
		const { PRODUTO_ID, PRODUTO_NOME, PRODUTO_DESC, PRODUTO_PRECO, PRODUTO_DESCONTO, PRODUTO_ATIVO, CATEGORIA_NOME, PRODUTO_QTD, IMAGEM_URL, IMAGEM_ORDEM } = produto;
		const tr = document.createElement("tr");
		let status = PRODUTO_ATIVO === 1 ? "<span class=' text-bg-success p-2 rounded-3'>Ativo</span>" : "<span class=' text-bg-danger p-2 rounded-3'>Inativo</span>";
		console.log(IMAGEM_URL);
		tr.innerHTML = `
			<td>${PRODUTO_ID}</td>
			<td>${PRODUTO_NOME}</td>
			<td>${PRODUTO_DESC}</td>
			<td>${PRODUTO_PRECO}</td>
			<td>${CATEGORIA_NOME}</td>
			<td>${status}</td>
			<td>${PRODUTO_DESCONTO}</td>
			<td>${PRODUTO_QTD}</td>
			
			<td>
            <img src="${IMAGEM_URL}" alt="${PRODUTO_NOME}" width="50" height="50">
            </td>
			<td>${IMAGEM_ORDEM}</td>
		
			<td>
				<button data-bs-toggle="modal" data-bs-target="#produtoModalEdit" onclick="editarProduto(${PRODUTO_ID})" class="btn btn-first-color">
					<i class="bi bi-pencil-square"></i>
				</button>
				<button data-bs-toggle="modal" data-bs-target="#produtoModalDelete" onclick="deletarProduto(${PRODUTO_ID})"  class="btn btn-first-color">
					<i class="bi bi-trash"></i>
				</button>
			</td>
		`;
		table_produto.appendChild(tr);
	});
}

async function listProdutosAtivos() {
	const data = await fetch(`../../app/helpers/produtos/listar_produtos_ativos.php`);
	const { erro, dados } = await data.json();
	dados.forEach((produto) => {
		const { PRODUTO_ID, PRODUTO_NOME, PRODUTO_DESC, PRODUTO_PRECO, PRODUTO_DESCONTO, PRODUTO_ATIVO, CATEGORIA_NOME, PRODUTO_QTD, IMAGEM_URL, IMAGEM_ORDEM } = produto;
		const tr = document.createElement("tr");
		let status = PRODUTO_ATIVO === 1 ? "<span class=' text-bg-success p-2 rounded-3'>Ativo</span>" : "<span class=' text-bg-danger p-2 rounded-3'>Inativo</span>";
		console.log(IMAGEM_URL);
		tr.innerHTML = `
			<td>${PRODUTO_ID}</td>
			<td>${PRODUTO_NOME}</td>
			<td>${PRODUTO_DESC}</td>
			<td>${PRODUTO_PRECO}</td>
			<td>${CATEGORIA_NOME}</td>
			<td>${status}</td>
			<td>${PRODUTO_DESCONTO}</td>
			<td>${PRODUTO_QTD}</td>
			
			<td>
            <img src="${IMAGEM_URL}" alt="${PRODUTO_NOME}" width="50" height="50">
            </td>
			<td>${IMAGEM_ORDEM}</td>
		
			<td>
				<button data-bs-toggle="modal" data-bs-target="#produtoModalEdit" onclick="editarProduto(${PRODUTO_ID})" class="btn btn-first-color">
					<i class="bi bi-pencil-square"></i>
				</button>
				<button data-bs-toggle="modal" data-bs-target="#produtoModalDelete" onclick="deletarProduto(${PRODUTO_ID})"  class="btn btn-first-color">
					<i class="bi bi-trash"></i>
				</button>
			</td>
		`;
		table_produto.appendChild(tr);
	});
}

async function listProdutosInativos() {
	const data = await fetch(`../../app/helpers/produtos/listar_produtos_inativos.php`);
	const { erro, dados } = await data.json();
	dados.forEach((produto) => {
		const { PRODUTO_ID, PRODUTO_NOME, PRODUTO_DESC, PRODUTO_PRECO, PRODUTO_DESCONTO, PRODUTO_ATIVO, CATEGORIA_NOME, PRODUTO_QTD, IMAGEM_URL, IMAGEM_ORDEM } = produto;
		const tr = document.createElement("tr");
		let status = PRODUTO_ATIVO === 1 ? "<span class=' text-bg-success p-2 rounded-3'>Ativo</span>" : "<span class=' text-bg-danger p-2 rounded-3'>Inativo</span>";
		console.log(IMAGEM_URL);
		tr.innerHTML = `
			<td>${PRODUTO_ID}</td>
			<td>${PRODUTO_NOME}</td>
			<td>${PRODUTO_DESC}</td>
			<td>${PRODUTO_PRECO}</td>
			<td>${CATEGORIA_NOME}</td>
			<td>${status}</td>
			<td>${PRODUTO_DESCONTO}</td>
			<td>${PRODUTO_QTD}</td>
			
			<td>
            <img src="${IMAGEM_URL}" alt="${PRODUTO_NOME}" width="50" height="50">
            </td>
			<td>${IMAGEM_ORDEM}</td>
		
			<td>
				<button data-bs-toggle="modal" data-bs-target="#produtoModalEdit" onclick="editarProduto(${PRODUTO_ID})" class="btn btn-first-color">
					<i class="bi bi-pencil-square"></i>
				</button>
				<button data-bs-toggle="modal" data-bs-target="#produtoModalDelete" onclick="deletarProduto(${PRODUTO_ID})"  class="btn btn-first-color">
					<i class="bi bi-trash"></i>
				</button>
			</td>
		`;
		table_produto.appendChild(tr);
	});
}

async function editarProduto(id) {
	const editIDInput = document.querySelector("#editIdInput");
	const inputNameEdit = document.querySelector("#editNameInput");
	const inputDescEdit = document.querySelector("#editDescInput");
	const inputPrecoEdit = document.querySelector("#editPrecoInput");
	const inputDescontoEdit = document.querySelector("#editDescontoInput");
	const inputQuantidadeEdit = document.querySelector("#editQuantidadeInput");

	const select_categoria = document.querySelectorAll("#select_categoria_edit option");

	const tab_images = document.querySelector(".tab-images");
	const editCheck = document.querySelector("#editCheck");
	const data = await fetch(`../../app/helpers/produtos/pegar_por_id.php?id=${id}`);
	const { erro, dados } = await data.json();

	console.log(dados);

	editIDInput.value = dados[0].PRODUTO_ID;
	inputNameEdit.value = dados[0].PRODUTO_NOME;
	inputDescEdit.value = dados[0].PRODUTO_DESC;
	inputPrecoEdit.value = dados[0].PRODUTO_PRECO;
	inputDescontoEdit.value = dados[0].PRODUTO_DESCONTO;
	inputQuantidadeEdit.value = dados[0].PRODUTO_QTD;

	select_categoria.forEach((option) => {
		if (option.value == dados[0].CATEGORIA_ID) {
			option.selected = true;
		}
	});
	editCheck.checked = dados[0].PRODUTO_ATIVO === 1 ? true : false;

	let images = [];

	dados.forEach((dado) => {
		images.push({ id: dado.IMAGEM_ID, url: dado.IMAGEM_URL, ordem: dado.IMAGEM_ORDEM });
	});

	console.log(images);

	images.forEach((image) => {
		tab_images.innerHTML += `
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Digite a URL da imagem" name="imagem_id[]" value="${image.id}" hidden />
			<div class="row mb-3 mt-3">
				<div class="col-6">
					<label for="exampleFormControlInput1" class="form-label">URL Imagem</label>
					<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Digite a URL da imagem" name="imagem_url[]" value="${image.url}"/>
				</div>
				<div class="col-6">
					<label for="exampleFormControlInput1" class="form-label">Ordem da Imagem</label>
					<input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Digite a ordem da imagem" min="1" name="imagem_ordem[]" value="${image.ordem}" />
			  	</div>
			</div>

    
   `;
	});
}

function deletarProduto(id) {
	const deleteIdInput = document.querySelector("#deleteIdInput");
	deleteIdInput.value = id;
}

async function loadSelectCategorias() {
	const selectCategoria = document.querySelector("#select_categoria");
	await fetch("../../app/helpers/categorias/listar_categorias_ativas.php")
		.then((response) => response.json())
		.then((data) => {
			data.dados.forEach((categoria) => {
				const { CATEGORIA_ID, CATEGORIA_NOME } = categoria;
				const option = document.createElement("option");
				option.value = CATEGORIA_ID;
				option.innerText = CATEGORIA_NOME;
				selectCategoria.appendChild(option);
			});
		});
}
async function loadSelectCategoriasEdit() {
	const selectCategoria = document.querySelector("#select_categoria_edit");
	await fetch("../../app/helpers/categorias/listar_categorias_ativas.php")
		.then((response) => response.json())
		.then((data) => {
			data.dados.forEach((categoria) => {
				const { CATEGORIA_ID, CATEGORIA_NOME } = categoria;
				const option = document.createElement("option");
				option.value = CATEGORIA_ID;
				option.innerText = CATEGORIA_NOME;
				selectCategoria.appendChild(option);
			});
		});
}
function adicionarImages() {
	const container_images = document.querySelector(".container_images");
	container_images.innerHTML += `
      <div class="mb-3 mt-3">
          <label for="exampleFormControlInput1" class="form-label">URL Imagem</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Digite a URL da imagem" name="imagem_url[]"/>
      </div>
      <div class="mb-3 mt-3">
          <label for="exampleFormControlInput1" class="form-label">Ordem da Imagem</label>
          <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Digite a ordem da imagem" name="imagem_ordem[]"/>
      </div>
      `;
}

btn_close_modal.addEventListener("click", () => {
	const container_images = document.querySelector(".container_images");
	container_images.innerHTML = "";
});

btn_close_modal_edit.addEventListener("click", () => {
	tab_images.innerHTML = "";
});

function verifySearchRadioProdutos() {
	let btn_search_admin = document.querySelector(".btn-search-admin");

	btn_search_admin.addEventListener("click", () => {
		const searchInput = document.querySelector("#searchInput");
		const searchValue = searchInput.value;
		const searchRadio = document.querySelector(".input-check-admin:checked").value;
		if (!searchValue === "") {
			alert("O campo de busca não pode ser vazio!");
			return;
		} else {
			if (searchRadio === "Todos") {
				table_produto.innerHTML = "";
				listAllProdutos();
				return;
			}
			if (searchRadio === "Ativos") {
				table_produto.innerHTML = "";
				listProdutosAtivos();
				return;
			}
			if (searchRadio === "Inativos") {
				table_produto.innerHTML = "";
				listProdutosInativos();
				return;
			}
		}
	});
}

listAllProdutos();
loadSelectCategorias();
loadSelectCategoriasEdit();
verifySearchRadioProdutos();
//#endregion
