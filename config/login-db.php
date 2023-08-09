<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $host = 'localhost';
        $usuario = 'root';
        $senha = '';
        $data = 'cpdrogas';

        $conn = mysqli_connect($host, $usuario, $senha, $data);

        if ($conn) {
            echo "Conexão estabelecida com sucesso.";

            $userEmail = $_POST['userEmail'];
            $password = $_POST['password'];
            
            $sql = "INSERT INTO users (userEmail, password) VALUES ('$userEmail', '$password')";

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

?>