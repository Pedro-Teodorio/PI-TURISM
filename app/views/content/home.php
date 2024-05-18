<?php
require_once("../helpers/home/listar.php");
require_once("../helpers/home/contador_produtos_ativos.php");
require_once("../helpers/home/contador_produtos_estoque.php");
require_once("../helpers/home/contador_categorias_ativas.php");
require_once("../helpers/home/contador_administradores_ativos.php");
?>

<div class="container">
    <h1 class="fs-3 pt-3">Painel do administrador</h1>

    <div class="row mt-4">
        <div class="col-sm-3">
            <div class="card rounded-3">
                <div class="card-body row d-flex justify-content-center align-items-center">
                    <div class="col-1 me-5">
                        <p class="card-text mb-0">
                            <i class="lni lni-checkmark bg-color-logo text-light p-2 rounded-circle fs-3"></i>
                        </p>
                    </div>
                    <div class="col">
                        <p class="card-text mb-0 fs-6">
                            <strong>Produtos Ativos :</strong>
                        </p>
                        <?php foreach (contadorDeProdutosAtivos() as $ativo) { ?>
                            <h4 class="mb-0"><?= $ativo['produtos_ativos']; ?></h4>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card rounded-3">
                <div class="card-body row d-flex justify-content-center align-items-center">
                    <div class="col-1 me-5">
                        <p class="card-text">
                            <i class="lni lni-archive bg-color-logo text-light p-2 rounded-circle fs-3"></i>
                        </p>
                    </div>
                    <div class="col">
                        <p class="card-text mb-0 fs-6">
                            <strong>Produtos em estoque :</strong>
                        </p>
                        <?php foreach (contadorDeProdutosEmEstoque() as $estoque) { ?>
                            <h4 class="mb-0"><?= $estoque['produtos_em_estoque']; ?></h4>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card rounded-3">
                <div class="card-body row d-flex justify-content-center align-items-center">
                    <div class="col-1 me-5">
                        <p class="card-text">
                            <i class="lni lni-notepad bg-color-logo text-light p-2 rounded-circle fs-3"></i>
                        </p>
                    </div>
                    <div class="col">
                        <p class="card-text mb-0">
                            <strong>Categorias Ativas :</strong>
                        </p>
                        <?php foreach (contadorDeCategoriasAtivas() as $categoria) { ?>
                            <h4 class="mb-0"><?= $categoria['categorias_ativas']; ?></h4>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card rounded-3">
                <div class="card-body row d-flex justify-content-center align-items-center">
                    <div class="col-1 me-5">
                        <p class="card-text">
                            <i class="lni lni-users bg-color-logo text-light p-2 rounded-circle fs-2"></i>
                        </p>
                    </div>
                    <div class="col">
                        <p class="card-text mb-0">
                            <strong>Administradores Ativos :</strong>
                        </p>
                        <?php foreach (contadorDeAdministradoresAtivos() as $administrador) { ?>
                            <h4 class="mb-0"><?= $administrador['administradores_ativos']; ?></h4>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4 rounded-3">
        <div class="card-body">
            <table class="table table-hover text-center border">
                <caption class="caption-top fs-5 text-black-50">
                    10 produtos ativos com maior quantidade em estoque
                </caption>
                <thead>
                    <th class="bg-first text-light" scope="col">Ranking</th>
                    <th class="bg-first text-light" scope="col">ID</th>
                    <th class="bg-first text-light" scope="col">Nome</th>
                    <th class="bg-first text-light" scope="col">Categoria</th>
                    <th class="bg-first text-light" scope="col">Descrição</th>
                    <th class="bg-first text-light" scope="col">Preço</th>
                    <th class="bg-first text-light" scope="col">Quantidade</th>
                </thead>
                <tbody>
                    <?php foreach (listarProdutosAltoEstoque() as $produto) { ?>
                        <tr class="vertical-align">
                            <td><?= $produto['ranking']; ?></td>
                            <td><?= $produto['PRODUTO_ID']; ?></td>
                            <td><?= $produto['PRODUTO_NOME']; ?></td>
                            <td><?= $produto['CATEGORIA_NOME']; ?></td>
                            <td><?= $produto['PRODUTO_DESC']; ?></td>
                            <td><?= $produto['PRODUTO_PRECO']; ?></td>
                            <td><?= $produto['produto_qtd']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>