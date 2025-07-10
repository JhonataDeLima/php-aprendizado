<?php 
    function exibirErro($mensagem){
        if ($mensagem){
            return $mensagem;
        }
    }


    $tecnologias = ["HTML", "CSS", "JAVASCRIPT", "PHP"];

    $erro = null;
    $sucesso = null;
    $tecnologiaSelecionada = [];

    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        if (empty($_POST["tecnologia"])){
            $erro = "Selecione uma Tecnologia";
        }

        $tecnologiaSelecionada = $_POST["tecnologia"] ?? [];

        if (count($tecnologiaSelecionada) != 1){
            $erro = "Selecione apenas 1 Tecnologia";
        }elseif($tecnologiaSelecionada[0] != "HTML"){
            $erro = "Você deve selecionar HTML";
        }else{
            $sucesso = "HTML Selecionado!!!";
        }
    }

?>

<h1>Selecione o HTML</h1>
<form method="POST">
    <?php if (exibirErro($erro)) : ?>
        <p style="color:red;"><?= $erro; ?></p>
    <?php endif; ?>

    <?php if (exibirErro($sucesso)) : ?>
        <p style="color:green;"><?= $sucesso; ?></p>
    <?php endif; ?>

    <?php foreach ($tecnologias as $tecnologia) : ?>
        
        <label> <?=$tecnologia ?> </label>
        <input type="checkbox" <?= in_array($tecnologia, $tecnologiaSelecionada) ? "checked" : "";?> name="tecnologia[]" value="<?=$tecnologia?>">
        <hr>
        <?php endforeach; ?><br>
        <input type="submit" value="Enviar"/>
</form>