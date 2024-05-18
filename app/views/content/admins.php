<div class="container pt-3">
    <h1>Administradores</h1>
    <div class="card border-first">
        <div class="card-header bg-first">Buscar Administradores</div>
        <div class="card-body">
            <div class="mb-2">
                <label for="exampleFormControlInput1" class="form-label">Pesquisar</label>
                <input type="text" class="form-control w-45" id="searchInput" placeholder="Digite o nome do administrador" />
            </div>


            <div class="form-check form-check-inline">
                <input class="form-check-input input-check-admin" type="radio" name="inlineRadioOptions" id="radioTodos" value="Todos" checked>
                <label class="form-check-label" for="radioTodos">Todos</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input input-check-admin"  type="radio" name="inlineRadioOptions" id="radioAtivo" value="Ativos">
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
        <div class="card-header bg-first">Lista de Administradores</div>
        <div class="card-body">
            <button type="button" class="btn btn-first-color mb-3 ps-2" data-bs-toggle="modal" data-bs-target="#adminModal">
                <i class="bi bi-plus-lg"></i>
                Nova
            </button>
            <table class="table table-hover text-center border">

                <thead class="table-head-color">
                    <th class="bg-first text-light" scope="col">#</th>
                    <th class="bg-first text-light" scope="col">Nome</th>
                    <th class="bg-first text-light" scope="col">Email</th>
                    <th class="bg-first text-light" scope="col">Senha</th>
                    <th class="bg-first text-light" scope="col">Ativo</th>
                    <th class="bg-first text-light" scope="col">Ações</th>
                </thead>
                <tbody id="table-admins">
                </tbody>
            </table>
        </div>
    </div>


</div>

<!-- Modal adicionar Administrador -->
<div class="modal fade" id="adminModal" tabindex="-1" aria-labelledby="adminModalLabel" aria-hidden="true">
    <div class=" modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-first">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Administrador</h1>
            </div>
            <div class="modal-body">
                <form action="../../app/helpers/admin/cadastrar.php" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Digite seu nome" name="nome" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Senha</label>
                            <input autocomplete="senha" type="password" class="form-control" id="nameInput" placeholder="Digite sua senha" name="senha" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="emailInput" placeholder="Digite seu email" name="email" required>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ativo" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Administrador Ativo
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
<!-- Fim do Modal adicionar Adminstrador -->

<!-- Modal editar Administrador -->

<div class="modal fade" id="adminModalEdit" tabindex="-1" aria-labelledby="adminModalEditLabel" aria-hidden="true">
    <div class=" modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-first">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Administrador</h1>
            </div>
            <div class="modal-body">
                <form action="../../app/helpers/admin/editar.php" method="post">
                    <div class="modal-body">
                        <div class="mb-3">

                            <input type="text" class="form-control" id="editIdInput" placeholder="Digite o nome do produto" name="id" hidden>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="editNameInput" placeholder="Digite o nome do produto" name="nome" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="editSenhaInput" placeholder="Digite sua senha" name="senha" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editEmailInput" placeholder="Digite seu email" name="email" required>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ativo" id="editCheck">
                            <label class="form-check-label" for="flexCheckDefault">
                                Administrador Ativo
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
<!-- Fim do Modal editar Administrador -->

<!-- Modal excluir Administrador -->
<div class="modal fade" id="adminModalDelete" tabindex="-1" aria-labelledby="adminModalDeleteLabel" aria-hidden="true">
    <div class=" modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-first">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Administrador</h1>
            </div>

            <form action="../../app/helpers/admin/excluir.php" method="post">
                <div class="modal-body text-center pb-0">
                    <p class="fs-5 fw-bold">Deseja realmente excluir o administrador?</p>
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
<script src="../../assets/js/admin.js"></script>