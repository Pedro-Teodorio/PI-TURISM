//#region Scripts for Produtos Dashboard
const table_produto = document.querySelector(".table-produto");
const btn_close_modal = document.querySelector(".btn_close_modal");
const btn_close_modal_edit = document.querySelector(".btn_close_modal_edit");
const tab_images = document.querySelector(".tab-images");

async function listAllProdutos(nome) {
	let url_vazia = nome === "" ? "../../app/helpers/produtos/listar.php" : `../../app/helpers/produtos/listar.php?nome=${nome}`;
	const data = await fetch(url_vazia);
	const { erro, dados } = await data.json();
	
	if (dados.length === 0) {
		
		table_produto.innerHTML = "";
		const tr = document.createElement("tr");
		tr.innerHTML = `
			<td colspan="11" class="text-center text-danger fw-bold">Nenhum produto encontrado</td>
		`;
		table_produto.appendChild(tr);
	}
	dados.forEach((produto) => {
		const { PRODUTO_ID, PRODUTO_NOME, PRODUTO_DESC, PRODUTO_PRECO, PRODUTO_DESCONTO, PRODUTO_ATIVO, CATEGORIA_NOME, PRODUTO_QTD, IMAGEM_URL, IMAGEM_ORDEM } = produto;
		const tr = document.createElement("tr");
		let status = PRODUTO_ATIVO === 1 ? "<span class=' text-bg-success p-2 rounded-3'>Ativo</span>" : "<span class=' text-bg-danger p-2 rounded-3'>Inativo</span>";
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
				<button data-bs-toggle="modal" data-bs-target="#produtoModalDetalhes" onclick="detalhesProduto(${PRODUTO_ID})"  class="btn btn-first-color">
					<i class="bi bi-eye"></i>
				</button>
			</td>
		`;
		table_produto.appendChild(tr);
	});
}

async function listProdutosAtivos(nome) {
	let url_vazia = nome === "" ? "../../app/helpers/produtos/listar_produtos_ativos.php" : `../../app/helpers/produtos/listar_produtos_ativos.php?nome=${nome}`;
	const data = await fetch(url_vazia);
	const { erro, dados } = await data.json();
	if (dados.length === 0) {
		table_produto.innerHTML = "";
		const tr = document.createElement("tr");
		tr.innerHTML = `
			<td colspan="11" class="text-center text-danger fw-bold">Nenhum produto ativo encontrado com esse nome</td>
		`;
		table_produto.appendChild(tr);
	}
	dados.forEach((produto) => {
		const { PRODUTO_ID, PRODUTO_NOME, PRODUTO_DESC, PRODUTO_PRECO, PRODUTO_DESCONTO, PRODUTO_ATIVO, CATEGORIA_NOME, PRODUTO_QTD, IMAGEM_URL, IMAGEM_ORDEM } = produto;
		const tr = document.createElement("tr");
		let status = PRODUTO_ATIVO === 1 ? "<span class=' text-bg-success p-2 rounded-3'>Ativo</span>" : "<span class=' text-bg-danger p-2 rounded-3'>Inativo</span>";
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
				<button data-bs-toggle="modal" data-bs-target="#produtoModalDetalhes" onclick="detalhesProduto(${PRODUTO_ID})"  class="btn btn-first-color">
					<i class="bi bi-eye"></i>
				</button>
			</td>
		`;
		table_produto.appendChild(tr);
	});
}

async function listProdutosInativos(nome) {
	let url_vazia = nome === "" ? "../../app/helpers/produtos/listar_produtos_inativos.php" : `../../app/helpers/produtos/listar_produtos_inativos.php?nome=${nome}`;
	const data = await fetch(url_vazia);
	const { erro, dados } = await data.json();
	if (dados.length === 0) {
		table_produto.innerHTML = "";
		const tr = document.createElement("tr");
		tr.innerHTML = `
			<td colspan="11" class="text-center text-danger fw-bold">Nenhum produto inativo encontrado com esse nome</td>
		`;
		table_produto.appendChild(tr);
	}
	dados.forEach((produto) => {
		const { PRODUTO_ID, PRODUTO_NOME, PRODUTO_DESC, PRODUTO_PRECO, PRODUTO_DESCONTO, PRODUTO_ATIVO, CATEGORIA_NOME, PRODUTO_QTD, IMAGEM_URL, IMAGEM_ORDEM } = produto;
		const tr = document.createElement("tr");
		let status = PRODUTO_ATIVO === 1 ? "<span class=' text-bg-success p-2 rounded-3'>Ativo</span>" : "<span class=' text-bg-danger p-2 rounded-3'>Inativo</span>";
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
				<button data-bs-toggle="modal" data-bs-target="#produtoModalDetalhes" onclick="detalhesProduto(${PRODUTO_ID})"  class="btn btn-first-color">
					<i class="bi bi-eye"></i>
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


	images.forEach((image) => {
		tab_images.innerHTML += `
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Digite a URL da imagem" name="imagem_id[]" value="${image.id}" hidden />
			<div class="row mb-3 mt-3">
				<div class="col-6">
					<label for="exampleFormControlInput1" class="form-label">URL Imagem</label>
					<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Digite a URL da imagem" name="imagem_url[]" value="${image.url}" />
				</div>
				<div class="col-6">
					<label for="exampleFormControlInput1" class="form-label">Ordem da Imagem</label>
					<input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Digite a ordem da imagem" min="1" name="imagem_ordem[]" value="${image.ordem}"  />
			  	</div>
			</div>

    
   `;
	});
}

async function detalhesProduto(id) {
	const data = await fetch(`../../app/helpers/produtos/pegar_por_id.php?id=${id}`);
	const { erro, dados } = await data.json();
	const { PRODUTO_NOME, PRODUTO_DESC, PRODUTO_PRECO, PRODUTO_DESCONTO, PRODUTO_ATIVO, CATEGORIA_NOME, PRODUTO_QTD } = dados[0];
	const detalhesNameInput = document.querySelector("#detalhesNameInput");
	const detalhesDescInput = document.querySelector("#detalhesDescInput");
	const detalhesPrecoInput = document.querySelector("#detalhesPrecoInput");
	const detalhesDescontoInput = document.querySelector("#detalhesDescontoInput");
	const detalhesQuantidadeInput = document.querySelector("#detalhesQuantidadeInput");
	const select_categoria_detalhes = document.querySelectorAll("#select_categoria_detalhes option");
	const carrousel_content = document.getElementById("carrousel-content")

	detalhesNameInput.value = PRODUTO_NOME;
	detalhesDescInput.value = PRODUTO_DESC;
	detalhesPrecoInput.value = PRODUTO_PRECO;
	detalhesDescontoInput.value = PRODUTO_DESCONTO;
	detalhesQuantidadeInput.value = PRODUTO_QTD;



	select_categoria_detalhes.forEach((option) => {
		if (option.innerText == CATEGORIA_NOME) {
			option.selected = true;
		}
	});
	const detalhesCheck = document.querySelector("#detalhesCheck");
	detalhesCheck.checked = PRODUTO_ATIVO === 1 ? true : false;

	let images = [];

	dados.forEach((dado) => {
		images.push({ url: dado.IMAGEM_URL, ordem: dado.IMAGEM_ORDEM });
	});

	let ordem_imagens = images.map((image) => image.ordem);
	ordem_imagens.sort((a, b) => a - b);
	let menor_ordem = ordem_imagens[0];

	carrousel_content.innerHTML = "";

	images.forEach((image) => {
		if (image.ordem == menor_ordem) {
			carrousel_content.innerHTML += `
			<div class="carousel-item active">
				<img src="${image.url}" class="d-block w-100 object-fit-cover image-carrousel" alt="..." style="height: 350px;">
			</div>
			`;
			return;
		}
		carrousel_content.innerHTML += `
		<div class="carousel-item h-100">
			<img src="${image.url}" class="d-block w-100 image-carrousel object-fit-cover" alt="..." style="height: 350px;">
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
async function loadSelectCategoriasDetalhes() {
	const selectCategoria = document.querySelector("#select_categoria_detalhes");
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
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Digite a URL da imagem" name="imagem_url[]" required/>
      </div>
      <div class="mb-3 mt-3">
          <label for="exampleFormControlInput1" class="form-label">Ordem da Imagem</label>
          <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Digite a ordem da imagem" name="imagem_ordem[]" required/>
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
		if (searchValue.length === 0) {
			if (searchRadio === "Todos") {
				table_produto.innerHTML = "";
				listAllProdutos("");
				return;
			}
			if (searchRadio === "Ativos") {
				table_produto.innerHTML = "";
				listProdutosAtivos("");
				return;
			}
			if (searchRadio === "Inativos") {
				table_produto.innerHTML = "";
				listProdutosInativos("");
				return;
			}
		} else {
			if (searchRadio === "Ativos" && searchValue.length > 0) {
				table_produto.innerHTML = "";
				listProdutosAtivos(searchValue);
				return;
			}
			if (searchRadio === "Inativos" && searchValue.length > 0) {
				table_produto.innerHTML = "";
				listProdutosInativos(searchValue);
				return;
			}
			if (searchRadio === "Todos" && searchValue.length > 0) {
				table_produto.innerHTML = "";
				listAllProdutos(searchValue);
				return;
			}
		}
	});
}

function addProdutos(){
	const formProdutosAdd = document.querySelector("#formProdutosAdd");
	const produtoModal = new bootstrap.Modal("#produtoModal");
	const msg_success = document.querySelector("#msg-success");
	const msg_error = document.querySelector("#msg-error");
	formProdutosAdd.addEventListener("submit", async (e) => {
		e.preventDefault();
		const formData = new FormData(formProdutosAdd);
		formData.append("addProdutos",1)
		const url = "../../app/helpers/produtos/cadastrar.php";
		const data = await fetch(url, {
			method: "POST",
			body: formData,
		});
		const {erro,mensagem} = await data.json();
		if(!erro){
			formProdutosAdd.reset();
			produtoModal.hide();
			table_produto.innerHTML = "";
			listAllProdutos("");
			msg_success.innerHTML = mensagem;
		}
		else{
			msg_error.innerHTML = mensagem;
		}
	});
}

function updateProdutos(){
	const formProdutosEdit = document.querySelector("#formProdutosEdit");
	const produtoModalEdit = new bootstrap.Modal("#produtoModalEdit");
	const msg_success = document.querySelector("#msg-success");
	const msg_error = document.querySelector("#msg-error-edit");
	formProdutosEdit.addEventListener("submit", async (e) => {
		e.preventDefault();
		const formData = new FormData(formProdutosEdit);
		formData.append("editProdutos",1)
		const url = "../../app/helpers/produtos/editar.php";
		const data = await fetch(url, {
			method: "POST",
			body: formData,
		});
		const {erro,mensagem} = await data.json();
		if(!erro){
			tab_images.innerHTML = "";
			formProdutosEdit.reset();
			produtoModalEdit.hide();
			table_produto.innerHTML = "";
			listAllProdutos("");
			msg_success.innerHTML = mensagem;
		}
		else{
			msg_error.innerHTML = mensagem;
		}
	});

}

function deleteProduto(){
	const formProdutosDelete = document.querySelector("#formProdutosDelete");
	const produtoModalDelete = new bootstrap.Modal("#produtoModalDelete");
	const msg_success = document.querySelector("#msg-success");
	const msg_error = document.querySelector("#msg-error-delete");
	formProdutosDelete.addEventListener("submit", async (e) => {
		e.preventDefault();
		alert("Não é possível excluir um produto, pois ele pode estar associado a um pedido.");
		// const formData = new FormData(formProdutosDelete);
		// formData.append("deleteProdutos",1)
		// const url = "../../app/helpers/produtos/excluir.php";
		// const data = await fetch(url, {
		// 	method: "POST",
		// 	body: formData,
		// });
		// const {erro,mensagem} = await data.json();
		// if(!erro){
		// 	formProdutosDelete.reset();
		// 	produtoModalDelete.hide();
		// 	table_produto.innerHTML = "";
		// 	listAllProdutos("");
		// 	msg_success.innerHTML = mensagem;
		// }
		// else{
		// 	msg_error.innerHTML = mensagem;
		// }
	});

}

listAllProdutos("");
loadSelectCategorias();
loadSelectCategoriasEdit();
loadSelectCategoriasDetalhes();
verifySearchRadioProdutos();
//#endregion

addProdutos();
updateProdutos();
deleteProduto();
