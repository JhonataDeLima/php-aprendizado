<?php 
require_once "funcoes.php";
require_once "layout/header.php";


?>

<form method="POST">
    <label>Nome da Turma: </label><br>
    <input type="text" name="turma" value="<?php echo $_POST["turma"] ?? ""; ?>"><br><br>
    <label>Curso: </label><br>
    <input type="text" name="curso" value="<?php echo $_POST["curso"] ?? ""; ?>"><br><br>
    <input type="submit" value="Salvar"><br>
    <input type="submit" name ="limpar" value="Limpar Turmas">
    <input type="hidden" name="formulario" value="turma">
</form>

<?php 

if (isset($_POST["formulario"]) && $_POST["formulario"] === "turma"){

    if(isset($_POST["limpar"])){
        unset($_SESSION["turmas"]);
        echo "✔️ Turmas apagadas!";
    }else{
        
        $erros = validarFormularioTurma($_POST);
        $nomeTurma = $_POST["turma"];
        $curso = $_POST["curso"];

        if (empty($erros)){
            if($_SERVER["REQUEST_METHOD"] === "POST"){
                if(!isset($_SESSION["turmas"][$nomeTurma])){
                    $_SESSION["turmas"][$nomeTurma] = [];
                }

                if(!in_array($curso, $_SESSION["turmas"][$nomeTurma])){
                    $_SESSION["turmas"][$nomeTurma][] = $curso;
                    echo "✅ Curso: $curso adicionado!<br><br>";

                }else{
                    echo "❌ $curso já existe na $nomeTurma!<br><br>";
                }
            }
        }else{
            foreach ($erros as $erro){
                echo "$erro <br>";
            }
        }
    }
}

require_once "layout/footer.php";
?>