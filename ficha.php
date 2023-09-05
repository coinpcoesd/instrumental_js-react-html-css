<?php 
require('./inc/header.html'); 

// Verifique se o usuário está autenticado.
session_start();
// if(!isset($_SESSION['autenticado'])) {
//     header("Location: login.php");
//     exit();
// }
// Verifica as credenciais do usuário no banco de dados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'cpdrogas';

    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

    try {
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM users WHERE username = :username AND password = :password";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array('username' => $username, 'password' => $password));

        if ($stmt->rowCount() == 1) {
            $_SESSION['autenticado'] = true;
            header("Location: dashboard.php");
            exit();
        } else {
            $error_message = "Credenciais inválidas.";
        }
    } catch(PDOException $e) {
        echo "Conexão falhou: " . $e->getMessage();
    }
}


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Adicione os links para os arquivos CSS do Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <form action="/config/receber-db.php" method="POST">

        <div class="container text-center">

            <div class="card bg-light mb-3">

                <div class="card-header"><h4 class="card-title">Ficha de acolhimento individual</h4></div>
        
                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6 offset-md-3">
                            <h1>Formulário de Registro</h1>
                        
                            <div class="form-group form-inline">
                                <label for="ficha">Número da Ficha:</label>
                                <input type="text" class="form-control" id="ficha" placeholder="Digite o número da ficha" name="numero_da_ficha">
                            </div>

                            <div class="form-group form-inline">
                                <label for="cpf">CPF:</label>
                                <input type="text" class="form-control" id="cpf" placeholder="000.000.000-00" name="cpf">
                            </div>
                        
                    
                            <div class="mb-3">
                                <label class="form-label">Qual é o tipo de atendimento realizado?</label>
                                <select name="tipo_de_atendimento" class="form-select" >
                                    <option value="" data-info="" data-info-primaria=""></option>
                                    <option value="Teleatendimento psicossocial via SISGEP">Teleatendimento psicossocial via SISGEP</option>
                                    <option value="Teleatendimento psicossocial realizado via demanda espontânea">Teleatendimento psicossocial realizado via demanda espontânea</option>
                                    <option value="Teleatendimento psicossocial presencial realizado externamente">Teleatendimento psicossocial presencial realizado externamente</option>
                                    <option value="Outro tipo de atendimento realizado">Outro tipo de atendimento realizado</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Quem procurou ajuda/tratamento?</label>
                                <select class="form-select" name="quem_procurou_ajuda">
                                    <option value="" data-info="" data-info-primaria=""></option>
                                    <option value="Usuário">Usuário</option>
                                    <option value="Usuário e família">Usuário e família</option>
                                    <option value="Família">Família</option>
                                    <option value="Amigos e conhecidos">Amigos e conhecidos</option>
                                    <option value="Promotorias de Justiça">Promotorias de Justiça</option>
                                    <option value="Técnicos de instituições">Técnicos de instituições</option>
                                    <option value="Outras pessoas">Outras pessoas</option>
                                </select>
                            </div>
    
                            <div class="mb-3">
                                <label class="form-label">Como ficou sabendo do serviço?</label>
                                <input type="text" class="form-control" name="como_ficou_sabendo" />
                            </div>
    
                            <h5 class="mb-3">Dados Sociodemográficos</h5>
                            
                            <div class="mb-3">
                                <label class="form-label">Gênero</label>
                                
                                <label>
                                    <input type="radio" name="genero" value="feminino" onclick="exibirCampoOutro()"> Feminino
                                </label>
                                <label>
                                    <input type="radio" name="genero" value="masculino" onclick="exibirCampoOutro()"> Masculino
                                </label>
                                <label>
                                    <input type="radio" name="genero" value="outro" onclick="exibirCampoOutro()"> Outro
                                </label>

                                <div class="mb-3" id="outro" style="display: none;">
                                    <label class="form-label">Qual gênero?</label>
                                    <input type="text" class="form-control" name="outro-genero" />
                                </div>

                            </div>
    
                            
                                    
                            <div><label class="form-label">Você é gestante?</label></div>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio gestante" class="form-check-input" value="sim" id="field1">
                                    <label class="form-check-label" for="field1">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio gestante" class="form-check-input" value="nao" id="field2">
                                    <label class="form-check-label" for="field2">Não</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio gestante" class="form-check-input" value="naosei" id="field3">
                                    <label class="form-check-label" for="field3">Não sabe/não informou</label>
                                </div>
                            </div>

            
                            <div class="mb-3">
                                <label class="form-label">Idade</label>
                                <input type="number" class="form-control" min="0" max="150" name="idade" required />
                            </div>

                            <div><label class="form-label">Você é uma pessoa com deficiência?</label></div>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio pessoa_com_deficiencia" class="form-check-input" value="sim" id="field1">
                                    <label class="form-check-label" for="field1">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio pessoa_com_deficiencia" class="form-check-input" value="nao" id="field2">
                                    <label class="form-check-label" for="field2">Não</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio pessoa_com_deficiencia" class="form-check-input" value="naodefinido" id="field3">
                                    <label class="form-check-label" for="field3">Não sabe/não informou</label>
                                </div>
                            </div>

                            <div><label class="form-label">Você está em situação de rua? </label></div>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio em_situacao_de_rua" class="form-check-input" value="sim" id="field1">
                                    <label class="form-check-label" for="field1">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio em_situacao_de_rua" class="form-check-input" value="nao" id="field2">
                                    <label class="form-check-label" for="field2">Não</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio em_situacao_de_rua" class="form-check-input" value="naodefinido" id="field3">
                                    <label class="form-check-label" for="field3">Não sabe/não informou</label>
                                </div>
                            </div>
                                
            
                            <div class="mb-3">
                                <label class="form-label">Endereço:</label>
                                <input type="text" class="form-control" name="endereco" required />
                            </div>
            
                            <div class="mb-3">
                                <label class="form-label">Bairro:</label>
                                <select name="bairro" onchange="exibirBairro(this)">
                                    <option value="" data-info="" data-info-primaria=""></option>
                                    <option value="Aldeota|Regional 2|Território 7">Aldeota</option>
                                    <option value="Alto da Balança|Regional 6|Território 26">Alto da Balança</option>
                                    <option value="Amadeu Furtado|Regional 3|Território 14">Amadeu Furtado</option>
                                    <option value="Ancuri|Regional 9|Território 33">Ancuri</option>
                                    <option value="Aracape|Regional 10|Território 34">Aracapé</option>
                                    <option value="Autran Nunes|Regional 11|Território 37">Autran Nunes</option>
                                    <option value="Barroso|Regional 9|Território 31">Barroso</option>
                                    <option value="Barra do Ceará|Regional 1|Território 3">Barra do Ceará</option>
                                    <option value="Bela Vista|Regional 11|Território 36">Bela Vista</option>
                                    <option value="Benfica|Regional 4|Território 15">Benfica</option>
                                    <option value="Boa Vista|Regional 8|Território 20">Boa Vista</option>
                                    <option value="Bonsucesso|Regional 5|Território 39">Bonsucesso</option>
                                    <option value="Cais do Porto|Regional 2|Território 9">Cais do Porto</option>
                                    <option value="cajazeiras|Regional 9|Território 31">Cajazeiras</option>
                                    <option value="Cambeba|Regional 6|Território 28">Cambeba</option>
                                    <option value="Canindezinho|Regional 10|Território 34">Canindezinho</option>
                                    <option value="Carlito Pamplona|Regional 1|Território 5">Carlito Pamplona</option>
                                    <option value="Centro|Regional 12|Território 1">Centro</option>
                                    <option value="Cidade 2000|Regional 7|Território 25">Cidade 2000</option>
                                    <option value="Cocó|Regional 7|Território 23">Cocó</option>
                                    <option value="Coacu|Regional 6|Território 30">Coaçu</option>
                                    <option value="Conjunto Palmeiras|Regional 9|Território 32">Conjunto Palmeiras</option>
                                    <option value="Conjunto Ceará I|Regional 11|Território 38">Conjunto Ceará I</option>
                                    <option value="Conjunto Ceará II|Regional 11|Território 38">Conjunto Ceará II</option>
                                    <option value="Couto Fernandes|Regional 11|Território 36">Couto Fernandes</option>
                                    <option value="Cristo Redentor|Regional 1|Território 4">Cristo Redentor</option>
                                    <option value="Curió|Regional 6|Território 29">Curió</option>
                                    <option value="Damas|Regional 4|Território 16">Damas</option>
                                    <option value="Dendê|Regional 8|Território 19">Dendê</option>
                                    <option value="Dias Macedo|Regional 8|Território 20">Dias Macêdo</option>
                                    <option value="Dionísio Torres|Regional 2|Território 10">Dionísio Torres</option>
                                    <option value="Dom Lustosa|Regional 11|Território 37">Dom Lustosa</option>
                                    <option value="Edson Queiroz|Regional 7|Território 25">Edson Queiroz</option>
                                    <option value="Farias Brito|Regional 3|Território 13">Farias Brito</option>
                                    <option value="Fátima|Regional 4|Território 15">Fátima</option>
                                    <option value="Floresta|Regional 1|Território 6">Floresta</option>
                                    <option value="Genibau|Regional 11|Território 38">Genibaú</option>
                                    <option value="Granja Lisboa|Regional 5|Território 39">Granja Lisboa</option>
                                    <option value="Granja Portugal|Regional 5|Território 39">Granja Portugal</option>
                                    <option value="Guajeru|Regional 6|Território 29">Guajeru</option>
                                    <option value="Guararapes|Regional 7|Território 24">Guararapes</option>
                                    <option value="Henrique Jorge|Regional 11|Território 37">Henrique Jorge</option>
                                    <option value="Itaoca|Regional 4|Território 17">Itaoca</option>
                                    <option value="Itaperi|Regional 8|Território 19">Itaperi</option>
                                    <option value="Jardim das Oliveiras|Regional 6|Território 27">Jardim das Oliveiras</option>
                                    <option value="Jardim Cearense|Regional 10|Território 35">Jardim Cearense</option>
                                    <option value="Joaquim Távaro|Regional 2|Território 10">Joaquim Távora</option>
                                    <option value="João XXIII|Regional 11|Território 37">João XXIII</option>
                                    <option value="Jóquei Clube|Regional 11|Território 37">Jóquei Clube</option>
                                    <option value="José de Alencar|Regional 6|Território 29">José de Alencar</option>
                                    <option value="Lagoaredonda|Regional 6|Território 29">Lagoa Redonda</option>
                                    <option value="Lucianocavalcante|Território 24">Luciano Cavalcante</option>
                                    <option value="Manuel Dias Branco|Regional 7|Território 23">Manuel Dias Branco</option>
                                    <option value="Maraponga|Regional 10|Território 35">Maraponga</option>
                                    <option value="Mondubim|Regional 10|Território 35">Mondubim</option>
                                    <option value="Monte Castelo|Regional 3|Território 13">Monte Castelo</option>
                                    <option value="Montese|Regional 4|Território 16">Montese</option>
                                    <option value="Moura Brasil|Regional 12|Território 1">Moura Brasil</option>
                                    <option value="Novo Mondubim|Regional 10|Território 34">Novo Mondubim</option>
                                    <option value="Olavo Oliveira|Regional 3|Território 11">Olavo Oliveira</option>
                                    <option value="Padre Andrade|Regional 3|Território 12">Padre Andrade</option>
                                    <option value="Parque Iracema|Regional 6|Território 28">Parque Iracema</option>
                                    <option value="Parque Santa Rosa|Regional 10|Território 34">Parque Santa Rosa</option>
                                    <option value="Parque São José|Regional 10|Território 34">Parque São José</option>
                                    <option value="Parque Presidente Vargas |Regional 10|Território 34">Parque Presidente Vargas</option>
                                    <option value="Parangaba|Regional 4|Território 17">Parangaba</option>
                                    <option value="Parquelandia|Regional 3|Território 14">Parquelândia</option>
                                    <option value="Paupina |Regional 6|Território 30">Paupina</option>
                                    <option value="Pirambu|Regional 1|Território 4">Pirambu</option>
                                    <option value="Pici|Regional 11|Território 36">Pici</option>
                                    <option value="Planalto Ayrton Senna |Regional 8|Território 21">Planalto Ayrton Senna</option>
                                    <option value="Praia de Iracema |Regional 12|Território 1">Praia de Iracema</option>
                                    <option value="Praia do Futuro I|Regional 7|Território 22">Praia do Futuro I</option>
                                    <option value="Praia do Futuro II|Regional 7|Território 22">Praia do Futuro II</option>
                                    <option value="Prefeito José Walter|Regional 8|Território 21">Prefeito José Walter</option>
                                    <option value="Quintino Cunha|Regional 3|Território 11">Quintino Cunha</option>
                                    <option value="Rodolfo Teófilo |Regional 3|Território 14">Rodolfo Teófilo</option>
                                    <option value="Salinas|Regional 7|Território 24">Salinas</option>
                                    <option value="São Bento|Regional 6|Território 30">São Bento</option>
                                    <option value="São João do Taupe|Regional 2|Território 10">São João do Tauape</option>
                                    <option value="Serrinha|Regional 8|Território 19">Serrinha</option>
                                    <option value="Siqueira|Regional 5|Território 39">Siqueira</option>
                                    <option value="Varjota|Regional 2|Território 8">Varjota</option>
                                    <option value="Vicente Pinzón|Regional 2|Território 9">Vicente Pinzón</option>
                                    <option value="Vila Manoel Sátiro |Regional 10|Território 35">Vila Manoel Sátiro</option>
                                    <option value="Vila Velha|Regional 1|Território 2">Vila Velha</option>
                                    <option value="Vila Peri|Regional 4|Território 17">Vila Peri</option>
                                    <option value="Vila União|Regional 4|Território 18">Vila União</option>
                                </select>


                            </div>
                            
    
                            <div class="mb-3">
                                <label class="form-label">Número de crianças que residem na casa (usuário ou familiar):</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="number" min="0" class="form-control" name ="criancas_faixa_etaria_0_5"/>
                                    </div>
                                    <div class="col">
                                        <p>Crianças de 0-5 anos</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="number" min="0" class="form-control" name ="criancas_faixa_etaria_6_11" />
                                    </div>
                                    <div class="col">
                                        <p>Crianças de 6-11 anos</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="number" min="0" class="form-control" name ="criancas_faixa_etaria_12_17" />
                                    </div>
                                    <div class="col">
                                        <p>Crianças de 12-17 anos</p>
                                    </div>
                                </div>
                            </div>

            
                            <h5 class="mb-3">Caracterização do Usuário e da Situação Problema</h5>
            
                            <div class="mb-3">
                                <label class="form-label">Qual(is) tipo(s) de substâncias psicoativas já fez uso na vida?</label>
                                <div class="row">
                                    <div class="col">
                                        <ul class="list-group" name ="substancias_usadas">
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field" value="Álcool">
                                                <label class="form-check-label" for="field">Álcool</label>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field" value="Tabaco, cigarro, vaping">
                                                <label class="form-check-label" for="field">Tabaco, cigarro, vaping</label>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field" value="Crack(Mesclado, pitio, raspa)"> 
                                                <label for="field" class="form-check-label">Crack(Mesclado, pitio, raspa)</label>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field" value="Maconha(Shank, haxixe, k2)">
                                                <label for="field" class="form-check-label">Maconha(Shank, haxixe, k2)</label>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field" value="Cocaína(Merla, oxi...)">
                                                <label for="field" class="form-check-label">Cocaína(Merla, oxi...)</label>
                                            </li>
                                            <li class="list-group-item">    
                                                <input type="checkbox" id="field" value="Solventes(Cola, loló, lança perfume, anti-respingo de solda)">
                                                <label for="field" class="form-check-label">Solventes(Cola, loló, lança perfume, anti-respingo de solda)</label>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field" value="Tranquilizantes(Diazepam, rivotril, ripinol...)">
                                                <label for="field" class="form-check-label">Tranquilizantes(Diazepam, rivotril, ripinol...)</label>
                                            </li>

                                            <li class="list-group-item">
                                                <input type="checkbox" id="field" value="Anestésicos(Boa noite cinderela, ketamina)">
                                                <label for="field" class="form-check-label">Anestésicos(Boa noite cinderela, ketamina)</label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <ul class="list-group" name="substancias_usadas">
                                            
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field" value="Alucinógenos sintéticos(LSD, Doce, DMT, aranha)">
                                                <label for="field" class="form-check-label">Alucinógenos sintéticos(LSD, Doce, DMT, aranha)</label>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field" value="Alucinógenos naturais(Cogumelo, zabumba, Ahayuaska, Sto Daime, Ibogaína)">
                                                <label for="field" class="form-check-label">Alucinógenos naturais(Cogumelo, zabumba, Ahayuaska, Sto Daime, Ibogaína)</label>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field" value="Anfetaminas(Rebite, speed, ritalina)">
                                                <label for="field" class="form-check-label">Anfetaminas(Rebite, speed, ritalina)</label>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field" value="Opióides(Remédios para dor, morfina, metadona, tramal)">
                                                <label for="field" class="form-check-label">Opióides(Remédios para dor, morfina, metadona, tramal)</label>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <ul class="list-group" name="substancias_usadas">
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field" value="Ecstasy(Bala, MDMA, MD, Mandy)">
                                                <label for="field" class="form-check-label">Ecstasy(Bala, MDMA, MD, Mandy)</label>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field" value="Heroína">
                                                <label for="field" class="form-check-label">Heroína</label>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field" value="Não sabe/Não respondeu">
                                                <label for="field" class="form-check-label">Não sabe/Não respondeu</label>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field" value="Outro">
                                                <label for="field" class="form-check-label">Outro</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

            
                            <div class="mb-3">
                                <label class="form-label">Qual é a primeira substância que você fez uso?</label>
                                <input type="text" class="form-control" name="primeira_substancia"/>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Qual ou quais substâncias faz uso atualmente</label>
                                <input type="text" class="form-control" name="quais_substancias_usa" />
                            </div>
            
                            <div class="mb-3">
                                <label class="form-label">Usa há quanto tempo?</label>
                                <input type="text" class="form-control" name="quanto_tempo_usa" />
                            </div>
            
                            <div class="mb-3">
                                <label class="form-label">Quanto tempo após iniciar o uso procurou tratamento pela primeira vez?</label>
                                <input type="text" class="form-control" name="quanto_tempo_apos_tratamento_procurou_ajuda_primeira_vez" />
                            </div>
            
                            <div class="mb-3">
                                <label class="form-label">Onde procurou ajuda/tratamento pela primeira vez?</label>
                                <input type="text" class="form-control" name="onde_procurou_ajuda_primeira_vez" />
                            </div>
                            
                            
        
                            <div class="mb-3">
                            <label class="form-label">Qual ou quais órgãos/instituições que faz atendimento a usuários de álcool e/ou outras drogas você já foi atendido?</label>
                            <div class="row">
                                <div class="col">
                                    <ul class="list-group" name="orgaos_atendimentos">
                                        <li class="list-group-item">
                                            <input type="checkbox" id="field" name="orgaos_atendimentos" value="CAPS AD">
                                            <label class="form-check-label" for="field">CAPS AD</label>
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" id="field" name="orgaos_atendimentos" value="Unidade básica de saúde">
                                            <label class="form-check-label" for="field">Unidade básica de saúde</label>
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" id="field" name="orgaos_atendimentos" value="SHR AD">
                                            <label for="field" class="form-check-label">SHR AD</label>
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" id="field" name="orgaos_atendimentos" value="Hospital Psiquiátrico">
                                            <label for="field" class="form-check-label">Hospital Psiquiátrico</label>
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" id="field" name="orgaos_atendimentos" value="Comunidade terapêutica">
                                            <label for="field" class="form-check-label">Comunidade terapêutica</label>
                                        </li>
                                    </ul>
                                </div>   

                                <div class="col">
                                    <ul class="list-group" name="orgaos_atendimentos">
                                        <li class="list-group-item">
                                            <input type="checkbox" id="field" name="orgaos_atendimentos" value="Instituições religiosas">
                                            <label for="field" class="form-check-label">Instituições religiosas</label>
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" id="field" name="orgaos_atendimentos" value="Atendimento Psicológico">
                                            <label for="field" class="form-check-label">Atendimento Psicológico</label>
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" id="field" name="orgaos_atendimentos" value="Atendimento Psiquiátrico">
                                            <label for="field" class="form-check-label">Atendimento Psiquiátrico</label>
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" id="field" name="orgaos_atendimentos" value="Grupos de ajuda mútua">
                                            <label for="field" class="form-check-label">Grupos de ajuda mútua</label>
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" id="field" name="orgaos_atendimentos" value="Unidade de acolhimento">
                                            <label for="field" class="form-check-label">Unidade de acolhimento</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                            <div><label class="form-label">Já pensou em suicídio alguma vez? </label></div>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio pensou_em_suicidio" class="form-check-input" value="sim" id="field1">
                                    <label class="form-check-label" for="field1">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio pensou_em_suicidio" class="form-check-input" value="nao" id="field2">
                                    <label class="form-check-label" for="field2">Não</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio pensou_em_suicidio" class="form-check-input" value="naosei" id="field3">
                                    <label class="form-check-label" for="field3">Não sabe/não informou</label>
                                </div>
                            </div>
            
                            <div class="mb-3">
                                <label class="form-label">Se sim, de qual forma tentou suicídio?</label>
                                <div class="form-check">
                                    <input type="text" class="form-control" name="tentou_suicidio" />
                                </div>

                                <label class="form-label">Há quanto tempo?</label>
                                <div class="form-check">
                                    <input type="text" class="form-control" name="quanto_tempo" /> 
                                </div>
                
                            </div>
            
                            <div class="mb-3">
                                <label class="form-label">Qual é a expectativa do usuário e/ou da família em relação a esse atendimento?</label>
                                <div class="row">
                                    <div class="col">
                                        <ul class="list-group" name="expectativa_relacao_esse_atendimento">
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field" name="expectativa_relacao_esse_atendimento" value="Internação voluntária">
                                                <label class="form-check-label" for="field">Internação voluntária</label>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field" name="expectativa_relacao_esse_atendimento" value="Internação involuntária">
                                                <label class="form-check-label" for="field">Internação involuntária</label>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field" name="expectativa_relacao_esse_atendimento" value="Orientação">
                                                <label class="form-check-label" for="field">Orientação</label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <ul class="list-group" name="expectativa_relacao_esse_atendimento">
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field" name="expectativa_relacao_esse_atendimento" value="Suporte Psicológico">
                                                <label class="form-check-label" for="field">Suporte Psicológico</label>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field" name="expectativa_relacao_esse_atendimento" value="Tratamento na rede intersetorial álcool e drogas municipal">
                                                <label class="form-check-label" for="field">Tratamento na rede intersetorial álcool e drogas municipal</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                            <div><label class="form-label">Gostaria de atendimento presencial na CPDrogas? </label></div>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio atendimento_presencial_cpdrogas" class="form-check-input" value="sim" id="field1">
                                    <label class="form-check-label" for="field1">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio atendimento_presencial_cpdrogas" class="form-check-input" value="nao" id="field2">
                                    <label class="form-check-label" for="field2">Não</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio atendimento_presencial_cpdrogas" class="form-check-input" value="naosei" id="field3">
                                    <label class="form-check-label" for="field3">Não sabe/não informou</label>
                                </div>
                            </div>
            
                    
                            <div class="mb-3">
                                <label class="form-label">Relato do atendimento</label>
                                <input type="text" class="form-control" name="relato_atendimento" />
                            </div>
            
                            <div class="mb-3">
                                <label class="form-label">Encaminhamento</label>
                                <input type="text" class="form-control" name="encaminhamento" />
                            </div>
            
                            <p>Fortaleza</p>
                            <input type="datetime-local" class="form-control" name="data_atendimento" />
            
                            <p>Profissional responsável pelo acolhimento/encaminhamento</p>
                            <input type="text" class="form-control" name="profissional" />

                            <div class="m-3">
                            <label class="form-label">Você autoriza que os dados pessoais e sensíveis coletados nesse atendimento sejam utilizados para a elaboração do painel de dados abertos da Coordenadoria Especial de Políticas sobre Drogas da Prefeitura Municipal de Fortaleza? Independente da autorização, você terá acesso ao atendimento. </label></div>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio autorizacao_dados" class="form-check-input" value="sim" id="field1">
                                    <label class="form-check-label" for="field1">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio autorizacao_dados" class="form-check-input" value="nao" id="field2">
                                    <label class="form-check-label" for="field2">Não</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio autorizacao_dados" class="form-check-input" value="naodefinido" id="field3">
                                    <label class="form-check-label" for="field3">Não sabe/não informou</label>
                                </div>
                            </div>
            
                    
                        </div>    
                    </div>   
                    <input type="submit" class="btn btn-primary" value="Enviar">Enviar ficha de acolhimento individual />    
                </form>
            </div>
        </div>
    </div>
</body>
</html>


<?php require('./inc/footer.html'); ?>

<script> 
function exibirBairro(selectElement) {
    var regionalDiv = document.getElementById('regional');
    var territorioDiv = document.getElementById('territorio');
    var selectedOption = selectElement.options[selectElement.selectedIndex];

    var bairroValue = selectedOption.value;
    var bairroInfo = bairroValue.split('|');
    var regionalValue = bairroInfo[1];
    var territorioValue = bairroInfo[2];

    if (regionalValue && territorioValue) {
        regionalDiv.textContent = `Regional: ${regionalValue}`;
        territorioDiv.textContent = `Território: ${territorioValue}`;
    } else {
        regionalDiv.textContent = "";
        territorioDiv.textContent = "";
    }
  }
  function exibirCampoOutro() {
  var outroRadio = document.querySelector('input[name="genero"][value="outro"]');
  var outroDiv = document.getElementById('outro');
  
  if (outroRadio.checked) {
    outroDiv.style.display = 'block';
  } else {
    outroDiv.style.display = 'none';
  }
}

  // Monitorar mudanças nos inputs radio
  var radioInputs = document.querySelectorAll('input[type="radio"][name="genero"]');
  for (var i = 0; i < radioInputs.length; i++) {
    radioInputs[i].addEventListener('change', exibirCampoOutro);
  }

  exibirBairro();
</script>

<?php

if (isset($_POST['nomeusuario'])) {
    echo $_POST['nomeusuario'] . '</br>';
}

if (isset($_POST['cpf'])) {
    echo $_POST['cpf'] . '</br>';
}

if (isset($_POST['tipo_de_atendimento'])) {
    echo $_POST['tipo_de_atendimento'] . '</br>';
}

if(isset($_POST['quem_procurou_ajuda'])) {
    echo $_POST['quem_procurou_ajuda'] . '</br>';
}

if (isset($_POST['genero'])) {
    echo $_POST['genero'] . '</br>';
  }
  
if (isset($_POST['gestante'])) {      
    echo $_POST['gestante'] . '</br>';
}

if (isset($_POST['idade'])) {      
    echo $_POST['idade'] . '</br>';
}

if (isset($_POST['pessoa_com_deficiencia'])) {      
    echo $_POST['pessoa_com_deficiencia'] . '</br>';
}

if (isset($_POST['em_situacao_de_rua'])) {      
    echo $_POST['em_situacao_de_rua'] . '</br>';
}

if (isset($_POST['endereco'])) {      
    echo $_POST['endereco'] . '</br>';
}

if (isset($_POST['regional'])) {
  echo $_POST['regional'] . '</br>';
}

if (isset($_POST['territorio'])) {
  echo $_POST['territorio'] . '</br>';
}

if(isset($_POST['primeira_substancia'])) {
    echo $_POST['primeira_substancia'] . '</br>';
}

if(isset($_POST['quais_substancias_usa'])) {
    echo $_POST['quais_substancias_usa'] . '</br>';
}

if(isset($_POST['quanto_tempo_usa'])) {
    echo $_POST['quanto_tempo_usa'] . '</br>';
}


if(isset($_POST['quanto_tempo_apos_tratamento_procurou_ajuda_primeira_vez'])) {
    echo $_POST['quanto_tempo_apos_tratamento_procurou_ajuda_primeira_vez'] . '</br>';
}

if(isset($_POST['onde_procurou_ajuda_primeira_vez'])) {
    echo $_POST['onde_procurou_ajuda_primeira_vez'] . '</br>';
}

if(isset($_POST['pensou_em_suicidio'])) {
    echo $_POST['pensou_em_suicidio'] . '</br>';
}

if(isset($_POST['tentou_suicidio'])) {
    echo $_POST['tentou_suicidio'] . '</br>';
}

if(isset($_POST['quanto_tempo'])) {
    echo $_POST['quanto_tempo'] . '</br>';
}

if(isset($_POST['expectativa_relacao_esse_atendimento'])) {
    echo $_POST['expectativa_relacao_esse_atendimento'] . '</br>';
}

if(isset($_POST['atendimento_presencial_cpdrogas'])) {
    echo $_POST['atendimento_presencial_cpdrogas'] . '</br>';
}

if(isset($_POST['relato_atendimento'])) {
    echo $_POST['relato_atendimento'] . '</br>';
}

if(isset($_POST['encaminhamento'])) {
    echo $_POST['encaminhamento'] . '</br>';
}

if(isset($_POST['data_atendimento'])) {
    echo $_POST['data_atendimento'] . '</br>';

}

if(isset($_POST['profissional'])) {
    echo $_POST['profissional'] . '</br>';

}

if(isset($_POST['autorizacao_dados'])) {
    echo $_POST['autorizacao_dados'] . '</br>';

}


?>