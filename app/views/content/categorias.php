<div class="container pt-3">
    <h1>Categorias</h1>
    <div class="card border-first">
        <div class="card-header bg-first">Buscar Categorias</div>
        <div class="card-body">
            <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label">Pesquisar</label>
                <input type="text" class="form-control w-45" id="searchInput" placeholder="Digite o nome da categoria" />
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

            <button class="btn btn-danger border-0 btn-clean-search-admin ms-1 me-3">Limpar</button>
            <button class="btn btn-success border-0 btn-search-admin">Buscar</button>

        </div>
    </div>
    <div class="card mt-4 mb-4 rounded-3 border-first">
        <div class="card-header bg-first">Lista de Categorias</div>
        <div class="card-body">
            <button type="button" class="btn btn-first-color mb-3 ps-2" data-bs-toggle="modal" data-bs-target="#categoriaModal">
                <i class="bi bi-plus-lg"></i>
                Nova
            </button>
            <table class="table table-hover text-center border">

                <thead class="table-head-color">
                    <th class="bg-first text-light" scope="col">#</th>
                    <th class="bg-first text-light" scope="col">Nome</th>
                    <th class="bg-first text-light" scope="col">Descrição</th>
                    <th class="bg-first text-light" scope="col">Ativo</th>
                    <th class="bg-first text-light" scope="col">Ações</th>
                </thead>
                <tbody id="table-categoria">
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
                <form id="formAddCategoria" method="post">
                    <div class="modal-body">
                        <div id="msg-error">

                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Digite o nome da categoria" name="nome" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Descrição</label>
                            <textarea  class="form-control" id="descricaoInput" placeholder="Digite a descrição da categoria" name="descricao" required></textarea>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ativo" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Categoria Ativa
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
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
                <form id="formEditCategoria" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <div id="msg-error-edit"></div>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Editar</button>
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

            <form id="formDeleteCategoria" method="post">
                <div class="modal-body text-center pb-0">
                    <div id="msg-error-delete"></div>
                    <p class="fs-5 fw-bold">Deseja realmente excluir a categoria?</p>
                    <input type="number" class="form-control" id="deleteIdInput" name="id" hidden>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Excluir</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Fim do Modal excluir Administrador -->
<div id="msg-success">

</div>
<script src="../../assets/js/categoria.js"></script>