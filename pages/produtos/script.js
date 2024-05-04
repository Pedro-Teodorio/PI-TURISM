const hamBurger = document.querySelector(".toggle-btn");
const btn_close_modal = document.querySelector(".btn_close_modal");

const editNameInput = document.querySelector("#editNameInput");
const editDescInput = document.querySelector("#editDescInput");
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

hamBurger.addEventListener("click", function () {
	document.querySelector("#sidebar").classList.toggle("expand");
});

async function editarProduto(id) {
	const data = await fetch(`actions/pegarPorId.php?id=${id}`);
	const { erro, dados } = await data.json();
	console.log(dados[0]);
	editNameInput.value = dados[0].produto_nome;

	let images = [];

	dados.forEach((dado) => {
		console.log(dado.imagem_url);
		console.log(dado.imagem_ordem);
		images.push({ url: dado.imagem_url, ordem: dado.imagem_ordem });
	});

	console.log(images);

	images.forEach(image => {
		tab_images.innerHTML += `
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

  if(dados[0].produto_ativo == 1){
    editCheck.checked = true;
  }
  else{
    editCheck.checked = false;
  }

	// const data = await fetch(`actions/pegarPorId.php?id=${id}`);
	// console.log(data);
}
