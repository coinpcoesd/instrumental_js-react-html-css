<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nomeusuario']) && isset($_POST['senha']) && isset($_POST['bairro']) && isset($_POST['genero'])) {
        $host = 'localhost';
        $usuario = 'root';
        $senha = '';
        $data = 'cpdrogas';

        $conn = mysqli_connect($host, $usuario, $senha, $data);

        if ($conn) {
            echo "Conexão estabelecida com sucesso.";

            $numero_da_ficha = $_POST['numero_da_ficha'];
            $cpf = $_POST['cpf'];
            $atendimento = $_POST['atendimento'];
            $quem_procurou_ajuda = $_POST['quem_procurou_ajuda'];
            $como_ficou_sabendo = $_POST['como_ficou_sabendo'];
            $genero = $_POST['genero'];
            $gestante = $_POST['gestante'];
            $idade = $_POST['idade'];
            $pessoa_com_deficiencia = $_POST['pessoa_com_deficiencia'];




            // Separar os valores enviados usando explode
            list($bairroValue, $regionalValue, $territorioValue) = explode('|', $bairro);

            $sql = "INSERT INTO cadastro (nome, bairro, regional, territorio, genero, senha) VALUES ('$nome', '$bairroValue', '$regionalValue', '$territorioValue', '$genero', '$senha')";

            if (mysqli_query($conn, $sql)) {
                echo "Registro inserido com sucesso.";
            } else {
                echo "Erro ao inserir registro: " . mysqli_error($conn);
            }

            mysqli_close($conn);
        } else {
            echo "Falha na conexão: " . mysqli_connect_error();
        }
    } else {
        echo "Campos do formulário não estão definidos.";
    }  

} else {
    echo "Requisição inválida.";
}

// Defina a sessão para indicar que o usuário está autenticado
session_start();
$_SESSION['autenticado'] = true;
?>