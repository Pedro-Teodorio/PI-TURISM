<div class="container pt-3">
    <h1>Produtos</h1>
    <div class="card border-first">
        <div class="card-header bg-first">Buscar Produtos</div>
        <div class="card-body">
            <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label">Pesquisar</label>
                <input type="text" class="form-control w-45" id="searchInput" placeholder="Digite o nome do Produto" />
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input input-check-admin" type="radio" name="inlineRadioOptions" id="radioTodos" value="Todos" checked>
                <label class="form-check-label" for="radioTodos">Todos</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input input-check-admin" type="radio" name="inlineRadioOptions" id="radioAtivo" value="Ativos">
                <label class="form-check-label" for="radioAtivo">Ativos</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input input-check-admin" type="radio" name="inlineRadioOptions" id="radioInativos" value="Inativos">
                <label class="form-check-label" for="radioInativos">Inativos</label>
            </div>

            <button class="btn btn-success border-0 btn-search-admin">Buscar</button>

        </div>
    </div>
    <div class="card mt-4 mb-4 rounded-3 border-first">
        <div class="card-header bg-first">Lista de Produtos</div>
        <div class="card-body">
            <button type="button" class="btn btn-first-color mb-3 ps-2" data-bs-toggle="modal" data-bs-target="#produtoModal">
                <i class="bi bi-plus-lg"></i>
                Nova
            </button>
            <table class="table table-hover text-center border">

                <thead class="table-head-color">
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Categoria</th>
                        <th>Ativo</th>
                        <th>Desconto</th>
                        <th>Estoque</th>
                        <th>Imagem</th>
                        <th>Ordem</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody class="table-produto">


                </tbody>
            </table>
        </div>
    </div>


</div>

<!-- Modal adicionar Produtos -->
<div class="modal fade " id="produtoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-first">
                <h5 class="modal-title" id="exampleModalLabel">
                    Cadastrar Produto
                </h5>
            </div>
            <div class="modal-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="myTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">Produto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Imagens</a>
                    </li>
                    <!-- Add more tabs as needed -->
                </ul>

                <!-- Tab content -->
                <form action="../../app/helpers/produtos/cadastrar.php" method="post">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                            <div class="mb-3 mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Digite o nome do produto" name="nome" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descricao"></textarea>
                            </div>
                            <div class="mb-3 mt-3 row">
                                <div class="col-6">
                                    <label for="exampleFormControlInput1" class="form-label">Preço</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Digite o preço" name="preco" step="0.01"/>
                                </div>
                                <div class="col-6">
                                    <label for="exampleFormControlInput1" class="form-label">Desconto do
                                        produto</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Digite o desconto" name="desconto" step="0.01" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <label for="select_categoria" class="form-label">Categoria</label>
                                    <select class="form-select" aria-label="Default select example" id="select_categoria" name="categoria_id">

                                    </select>

                                </div>
                                <div class="col-6">
                                    <label for="exampleFormControlInput1" class="form-label">Quantidade de
                                        Produto</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Digite a quantidade" name="quantidade" step="0.01" />
                                </div>
                            </div>
                            <div class="mb-3"></div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Produto Ativo
                                    </label>
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="ativo" />
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                            <div class="mb-3 mt-3">
                                <label for="exampleFormControlInput1" class="form-label">URL Imagem</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Digite a URL da imagem" name="imagem_url[]" />
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Ordem da Imagem</label>
                                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Digite a ordem da imagem" min="1" name="imagem_ordem[]" />
                                <div class="container_images">

                                </div>
                                <div class="mb-3 mt-3">
                                    <button type="button" class="btn btn-primary" onclick="adicionarImages()">Adicionar Imagens</button>
                                </div>
                            </div>

                        </div>
                        <!-- Add more tab content as needed -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn_close_modal" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>
<!-- Fim do Modal adicionar Produtos -->

<!-- Modal editar Produtos -->
<div class="modal fade " id="produtoModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-first">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Editar Produto
                    </h5>
                </div>
                <div class="modal-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" id="myTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#tabEdit1" role="tab"
                                aria-controls="tab1" aria-selected="true">Produto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tabEdit2" role="tab"
                                aria-controls="tab2" aria-selected="false">Imagens</a>
                        </li>
                        <!-- Add more tabs as needed -->
                    </ul>

                    <!-- Tab content -->
                    <form action="../../app/helpers/produtos/editar.php" method="post">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tabEdit1" role="tabpanel"
                                aria-labelledby="tab1-tab">
                                <div class="mb-3 mt-3">
                                    <input type="text" class="form-control" id="editIdInput"
                                        placeholder="Digite o nome do produto" name="id" hidden />
                                    <label for="exampleFormControlInput1" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="editNameInput"
                                        placeholder="Digite o nome do produto" name="nome" />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
                                    <textarea class="form-control" rows="3" name="descricao"
                                        id="editDescInput"></textarea>
                                </div>
                                <div class=" mb-3 mt-3 row">
                                    <div class="col-6">
                                        <label for="exampleFormControlInput1" class="form-label">Preço</label>
                                        <input type="number" class="form-control" placeholder="Digite o preço"
                                            name="preco" id="editPrecoInput" step="0.01" />
                                    </div>
                                    <div class="col-6">
                                        <label for="exampleFormControlInput1" class="form-label">Desconto do
                                            produto</label>
                                        <input type="number" class="form-control" id="editDescontoInput"
                                            placeholder="Digite o desconto" name="desconto" step="0.01" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <label for="select_categoria" class="form-label">Categoria</label>
                                        <select class="form-select" aria-label="Default select example"
                                            id="select_categoria_edit" name="categoria_id">
                                           
                                        </select>

                                    </div>
                                    <div class="col-6">
                                        <label for="exampleFormControlInput1" class="form-label">Quantidade de
                                            Produto</label>
                                        <input type="number" class="form-control" id="editQuantidadeInput"
                                            placeholder="Digite o desconto" name="quantidade" />
                                    </div>
                                </div>
                                <div class="mb-3"></div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Produto Ativo
                                        </label>
                                        <input class="form-check-input" type="checkbox" id="editCheck" name="ativo" />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade tab-images" id="tabEdit2" role="tabpanel"
                                aria-labelledby="tab2-tab">


                            </div>
                            <!-- Add more tab content as needed -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn_close_modal_edit"
                                data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
</div>
<!-- Fim do Modal editar Categoria -->

<!-- Modal excluir Categoria -->
<div class="modal fade" id="produtoModalDelete" tabindex="-1" aria-labelledby="categoriaModalDeleteLabel" aria-hidden="true">
    <div class=" modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-first">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Produto</h1>
            </div>

            <form action="../../app/helpers/produtos/excluir.php" method="post">
                <div class="modal-body text-center pb-0">
                    <p class="fs-5 fw-bold">Deseja realmente excluir o produto?</p>
                    <input type="number" class="form-control" id="deleteIdInput" name="id" hidden>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Excluir</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Fim do Modal excluir  -->

<script src="../../assets/js/produtos.js"></script>