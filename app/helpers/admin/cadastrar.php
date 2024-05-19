<?php 
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$sql = "INSERT INTO ADMINISTRADOR (ADM_NOME, ADM_SENHA, ADM_EMAIL, ADM_ATIVO ) VALUES (:nome, :senha, :email ,:ativo)";
$ativo = isset($dados['ativo']) ? 1 : 0;
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nome', $dados["nome"], PDO::PARAM_STR);
$stmt->bindParam(':senha', $dados["senha"], PDO::PARAM_STR);
$stmt->bindParam(':email', $dados["email"], PDO::PARAM_STR);
$stmt->bindParam(':ativo', $ativo, PDO::PARAM_INT);
$stmt->execute();

if ($stmt->rowCount()) {
    $retorna = ['erro' => false, 'mensagem' => ' 
    <div class="alert alert-success alert-dismissible position-fixed bottom-0 end-0 m-4" role="alert">
        <div>
           Administrador cadastrada com sucesso!
        </div> 
        <button type="button" class="btn-close border-0 shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'
];
} else {
    $retorna = ['erro' => true, 'mensagem' => ' 
    <div class="alert alert-success alert-dismissible" role="alert">
        <div>
              Erro ao cadastrar administrador!
        </div> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'
];
}
echo json_encode($retorna);
?>