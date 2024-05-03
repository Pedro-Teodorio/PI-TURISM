const hamBurger = document.querySelector(".toggle-btn");
const btn_close_modal = document.querySelector(".btn_close_modal");

const inputNameEdit = document.querySelector("#editNameInput");

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
  inputNameEdit.value = dados[0].produto_nome;

  
  // const data = await fetch(`actions/pegarPorId.php?id=${id}`);
  // console.log(data);

 

}