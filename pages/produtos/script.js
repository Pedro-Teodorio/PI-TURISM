const hamBurger = document.querySelector(".toggle-btn");
const btn_close_modal = document.querySelector(".btn_close_modal");
const btn_close_modal_edit = document.querySelector(".btn_close_modal_edit");

const editIDInput = document.querySelector("#editIdInput");
const inputNameEdit = document.querySelector("#editNameInput");
const inputDescEdit = document.querySelector("#editDescInput");
const inputPrecoEdit = document.querySelector("#editPrecoInput");
const inputDescontoEdit = document.querySelector("#editDescontoInput");
const inputQuantidadeEdit = document.querySelector("#editQuantidadeInput");
const select_categoria = document.querySelectorAll("#select_categoria option");

const tab_images = document.querySelector(".tab-images");
const editCheck = document.querySelector("#editCheck");

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

hamBurger.addEventListener("click", function () {
	document.querySelector("#sidebar").classList.toggle("expand");
});

async function editarProduto(id) {
	const data = await fetch(`actions/pegarPorId.php?id=${id}`);
	const { erro, dados } = await data.json();
	editIDInput.value = dados[0].produto_id;
	inputNameEdit.value = dados[0].produto_nome;
	inputDescEdit.value = dados[0].produto_desc;
	inputPrecoEdit.value = dados[0].produto_preco;
	inputDescontoEdit.value = dados[0].produto_desconto;
	inputQuantidadeEdit.value = dados[0].produto_qtd;

	select_categoria.forEach((option) => {
		if (option.value == dados[0].categoria_id) {
			option.selected = true;
		}
	});
	console.log(dados);
	let images = [];

	dados.forEach((dado) => {
		images.push({ id: dado.imagem_id, url: dado.imagem_url, ordem: dado.imagem_ordem });
	});

	images.forEach((image) => {
		tab_images.innerHTML += `
       
      
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Digite a URL da imagem" name="imagem_id[]" value= "${image.id}" hidden />
   
        <div class="mb-3 mt-3">
            <label for="exampleFormControlInput1" class="form-label">URL Imagem</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Digite a URL da imagem" name="imagem_url[]" value= "${image.url}" />
          </div>
          <div class="mb-3 mt-3">
            <label for="exampleFormControlInput1" class="form-label">Ordem da Imagem</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Digite a ordem da imagem" min="1" name="imagem_ordem[]" value= "${image.ordem}" />
          </div>
   `;
	});

	if (dados[0].produto_ativo == 1) {
		editCheck.checked = true;
	} else {
		editCheck.checked = false;
	}

	// const data = await fetch(`actions/pegarPorId.php?id=${id}`);
	// console.log(data);
}
