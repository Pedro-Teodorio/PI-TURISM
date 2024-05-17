<div class="container pt-3">
    <h1>Produtos</h1>
    <div class="card border-first">
        <div class="card-header bg-first">Buscar Produtos</div>
        <div class="card-body">
            <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label">Pesquisar</label>
                <input type="text" class="form-control w-45" id="searchInput" placeholder="Digite o nome do produto" />
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" />
                <label class="form-check-label" for="inlineCheckbox1">Todos</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" />
                <label class="form-check-label" for="inlineCheckbox2">Ativos</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" />
                <label class="form-check-label" for="inlineCheckbox2">Inativos</label>
            </div>

            <a href="#" class="btn btn-success border-0">Buscar</a>

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
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Desconto</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Ativo</th>
                    <th scope="col">Estoque</th>
                    <th scope="col">Ações</th>
                </thead>
                <tbody id="table-produto">
                </tbody>
            </table>
        </div>
    </div>


</div>

<!-- Modal adicionar Categoria -->
<div class="modal fade" id="categoriaModal" tabindex="-1" aria-labelledby="categoriaModalLabel" aria-hidden="true">
    <div class=" modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-first">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Categoria</h1>
            </div>
            <div class="modal-body">
                <form action="../../app/helpers/categorias/cadastrar.php" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Digite o nome da categoria" name="nome" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Descrição</label>
                            <input type="descricao" class="form-control" id="descricaoInput" placeholder="Digite a descrição da categoria" name="descricao" required>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ativo" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Categoria Ativa
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fim do Modal adicionar Categoria -->

<!-- Modal editar Categoria -->

<div class="modal fade" id="categoriaModalEdit" tabindex="-1" aria-labelledby="categoriaModalEditLabel" aria-hidden="true">
    <div class=" modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-first">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Categoria</h1>
            </div>
            <div class="modal-body">
                <form action="../../app/helpers/categorias/editar.php" method="post">
                    <div class="modal-body">
                        <div class="mb-3">

                            <input type="text" class="form-control" id="editIdInput" placeholder="Digite o nome da categoria" name="id" hidden>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="editNameInput" placeholder="Digite o nome da categoria" name="nome" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Descrição</label>
                            <textarea class="form-control" id="editDescricaoInput" placeholder="Digite a descricao da categoria" name="descricao" required></textarea>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ativo" id="editCheck">
                            <label class="form-check-label" for="flexCheckDefault">
                                Categoria Ativa
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fim do Modal editar Categoria -->

<!-- Modal excluir Categoria -->
<div class="modal fade" id="categoriaModalDelete" tabindex="-1" aria-labelledby="categoriaModalDeleteLabel" aria-hidden="true">
    <div class=" modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-first">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Categoria</h1>
            </div>
            
                <form action="../../app/helpers/categorias/excluir.php" method="post">
                    <div class="modal-body text-center pb-0">
                        <p class="fs-5 fw-bold">Deseja realmente excluir a categoria?</p>
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
<!-- Fim do Modal excluir Administrador -->