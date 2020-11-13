<?php

    echo("abriu server <br>");

    if (isset($_POST['matricula'])) {
        
        $nome       = $_POST['nome'];
        $matricula  = $_POST['matricula'];
        $nascimento = $_POST['nascimento'];
        $inserir    = $_POST['inserir'];
        $deletar    = $_POST['deletar'];
        $listar     = $_POST['listar'];
        $alterar    = $_POST['alterar'];

        include_once "conn.php";

       // echo($nome.'-'.$matricula.'-'.$nascimento.'-'.$deletar.'-'.$inserir);
        if ($inserir == 1) {
            echo("inserindo.. <br>");

            $sql = "INSERT INTO `cadastro` (`nome`,`matricula`,`nascimento`)
                    VALUES ('$nome','$matricula','$nascimento');";

            if($conn->query($sql,$resultmode = MYSQLI_STORE_RESULT) === TRUE ){
                echo("inseriu corretamente o usuário<br>");
                echo($nome.'-'.$matricula.'-'.$nascimento);
            } else {
                echo("erro ao inserir <br>" . $resultmode);
            }
            
        }else if($deletar == 1) {
            // $matricula = $_POST['matricula'];
            echo("deletando.. <br>");

            $sql = "DELETE FROM `cadastro` WHERE `matricula` = '$matricula'";
            echo($sql);

            if(mysqli_query($conn, $sql) === TRUE ){
                echo("<br>deletou corretamente o usuário<br>");
            } else {
                echo("<br>erro ao deletar <br>" );
            }
   
        }else if($alterar == 1) {

            echo("alterando.. <br>");

            $sql = "UPDATE `cadastro` SET `matricula` = '$matricula', `nome` = ' $nome', `nascimento`= '$nascimento' where `matricula` = '$matricula'"; 

            if($conn->query($sql) === TRUE ){
                echo("alterou corretamente o usuário<br>");
            }else {
                echo "<br>erro ao alterar <br>";
            }

        }else if($listar == 1) {
            echo("listando cadastros..<br><br>");

            $sql = "SELECT nome, matricula, nascimento FROM cadastro";
            $dados = mysqli_query($conn, $sql);
            if($dados->num_rows > 0){
                echo("Cadastros <br><br>");

                while($linha = mysqli_fetch_array($dados)){
                    echo "<p>";
                    echo "Nome: " . $linha["nome"] . " | Matrícula: " . $linha["matricula"] . " | Nascimento: " . $linha["nascimento"];
                    echo "</p>";
                }
            }else {
                echo "Nenhum Aluno na base de dados";
            }
        }
        
    }
    echo("<a href=index.html > Voltar </a>");
    $conn->close();
?>
