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
            $em_situcao_de_rua = $_POST['em_situacao_de_rua'];
            $endereco = $_POST['endereco'];
            $bairro = $_POST['bairro'];
            $criancas_faixa_etaria_0_5 = $_POST['criancas_faixa_etaria_0_5'];
            $criancas_faixa_etaria_6_11 = $_POST['$criancas_faixa_etaria_6_11'];
            $criancas_faixa_etaria_12_17 = $_POST['$criancas_faixa_etaria_12_17'];
            $substancias_usadas = $_POST['substancias_usadas'];
            $primeira_substancia = $_POST['primeira_substancia'];
            $quais_substancias_usa = $_POST['$quais_substancias_usa'];
            $quanto_tempo_usa = $_POST['quanto_tempo_usa'];
            $quanto_tempo_apos_tratamento_procurou_ajuda_primeira_vez['quanto_tempo_apos_tratamento_procurou_ajuda_primeira_vez'];
            $onde_procurou_ajuda_primeira_vez = $_POST['onde_procurou_ajuda_primeira_vez'];
            $orgaos_atendimentos = $_POST['orgaos_atendimentos'];
            $pensou_em_suicidio = $_POST['pensou_em_suicidio'];
            $quanto_tempo = $_POST['quanto_tempo'];
            $expectativa_relacao_esse_atendimento = $_POST['expectativa_relacao_esse_atendimento'];
            $atendimento_presencial_cpdrogas = $_POST['atendimento_presencial_cpdrogas'];
            $relato_atendimento = $_POST['relato_atendimento'];
            $encaminhamento = $_POST['encaminhamento'];
            $data_atendimento = $_POST['data_atendimento'];
            $profissional = $_POST['profissional'];
            $autorizacao_dados = $_POST['autorizacao_dados'];




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