<?php require('./inc/header.html'); ?>

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
    <form action="/config/db.php" method="POST">

        <div class="container text-center">

            <div class="card bg-light mb-3">

                <div class="card-header"><h4 class="card-title">Ficha de acolhimento individual</h4></div>
        
                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6 offset-md-3">
                            <h1>Formulário de Registro</h1>
                        
                            <div class="form-group form-inline">
                                <label for="ficha">Número da Ficha:</label>
                                <input type="text" class="form-control" id="ficha" placeholder="Digite o número da ficha">
                            </div>

                            <div class="form-group form-inline">
                                <label for="cpf">CPF:</label>
                                <input type="text" class="form-control" id="cpf" placeholder="000.000.000-00">
                            </div>
                        
                    
                            <div class="mb-3">
                                <label class="form-label">Qual é o tipo de atendimento realizado?</label>
                                <select name="select-atendimento" class="form-select">
                                    <option></option>
                                    <option>Teleatendimento psicossocial via SISGEP</option>
                                    <option>Teleatendimento psicossocial realizado via demanda espontânea</option>
                                    <option>Teleatendimento psicossocial presencial realizado externamente</option>
                                    <option>Outro tipo de atendimento realizado</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Quem procurou ajuda/tratamento?</label>
                                <select class="form-select">
                                    <option></option>
                                    <option>Usuário</option>
                                    <option>Usuário e família</option>
                                    <option>Família</option>
                                    <option>Amigos e conhecidos</option>
                                    <option>Promotorias de Justiça</option>
                                    <option>Técnicos de instituições</option>
                                    <option>Outras pessoas</option>
                                </select>
                            </div>
    
                            <div class="mb-3">
                                <label class="form-label">Como ficou sabendo do serviço?</label>
                                <input type="text" class="form-control" />
                            </div>
    
                            <h5 class="mb-3">Dados Sociodemográficos</h5>
                            
                            <div class="mb-3">
                                <label class="form-label">Gênero</label>
                                <select class="form-select" name="genero">
                                    <option value=""></option>
                                    <option value="masculino">Homem</option>
                                    <option value="feminino">Mulher</option>
                                    <option value="outrogenero"> Outro </option>
                                </select>
                            </div>
    
                            <div class="mb-3">
                                <label class="form-label">Se outro gênero, qual gênero?</label>
                                <input type="text" class="form-control" />
                            </div>
                                    
                            <div><label class="form-label">Você é gestante?</label></div>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio" class="form-check-input" value="sim" id="field1">
                                    <label class="form-check-label" for="field1">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio" class="form-check-input" value="nao" id="field2">
                                    <label class="form-check-label" for="field2">Não</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio" class="form-check-input" value="naosei" id="field3">
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
                                    <input type="radio" name="radio" class="form-check-input" value="sim" id="field1">
                                    <label class="form-check-label" for="field1">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio" class="form-check-input" value="nao" id="field2">
                                    <label class="form-check-label" for="field2">Não</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio" class="form-check-input" value="naosei" id="field3">
                                    <label class="form-check-label" for="field3">Não sabe/não informou</label>
                                </div>
                            </div>

                            <div><label class="form-label">Você está em situação de rua? </label></div>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio" class="form-check-input" value="sim" id="field1">
                                    <label class="form-check-label" for="field1">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio" class="form-check-input" value="nao" id="field2">
                                    <label class="form-check-label" for="field2">Não</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio" class="form-check-input" value="naosei" id="field3">
                                    <label class="form-check-label" for="field3">Não sabe/não informou</label>
                                </div>
                            </div>
                                
            
                            <div class="mb-3">
                                <label class="form-label">Endereço:</label>
                                <input type="text" class="form-control" name="endereco" required />
                            </div>
            
                            <div class="mb-3">
                                <label class="form-label">Bairro:</label>
                                <select class="form-select">
                                    <option value="naodefinido"></option>
                                    <option value="aeroporto">Aeroporto</option>
                                    <option value="aerolandia">Aerolândia</option>
                                    <option value="altodabalanca">Alto da Balança</option>
                                    <option value="alvaroweyne">Álvaro Weyne</option>
                                    <option value="ancuri">Ancuri</option>
                                    <option value="amadeufurtado">Amadeu Furtado</option>
                                    <option value="antoniobezerra">Antonio Bezerra</option>
                                    <option value="aracape">Aracapé</option>
                                    <option value="austrannunes">Austran Nunes</option>
                                    <option value="barradoceara">Barra do Ceará</option>
                                    <option value="barroso">Barroso</option>
                                    <option value="belavista">Bela Vista</option>
                                    <option value="benfica">Benfica</option>
                                    <option value="bomfuturo">Bom Futuro</option>
                                    <option value="boavista">Boa Vista</option>
                                    <option value="bomjardim">Bom Jardim</option>
                                    <option value="caisdoporto">Cais do Porto</option>
                                    <option value="cajazeiras">Cajazeiras</option>
                                    <option value="aldeota">Aldeota</option>
                                    <option value="cambeba">Cambeba</option>
                                    <option value="canindezinho">Canindezinho</option>
                                    <option value="carlitopamplona">Carlito Pamplona</option>
                                    <option value="centro">Centro</option>
                                    <option value="cidade2">Cidade 2</option>
                                    <option value="cidadedosf">Cidade dos Funcionários</option>
                                    <option value="coac">Coacu</option>
                                    <option value="coco">Coco</option>
                                    <option value="coite">Coité</option>
                                    <option value="conjuntoceara1">Conjunto Ceará 1</option>
                                    <option value="conjuntoceara2">Conjunto Ceará 2</option>
                                    <option value="conjuntoesperanca">Conjunto Esperança</option>
                                    <option value="conjuntopalmeiras">Conjunto Palmeiras</option>
                                    <option value="coutofernandes">Couto Fernandes</option>
                                    <option value="cristoredentor">Cristo Redentor</option>
                                    <option value="curio">Curió</option>
                                    <option value="damas">Damas</option>
                                    <option value="delourdes">De Lourdes</option>
                                    <option value="democritorocha">Demócrito Rocha</option>
                                    <option value="dende">Dendê</option>
                                    <option value="diasmacedo">Dias Macedo</option>
                                    <option value="dionisiotorres">Dionísio Torres</option>
                                    <option value="domlustosa">Dom Lustosa</option>
                                    <option value="dunas">Dunas</option>
                                    <option value="edsonqueiroz">Edson Queiroz</option>
                                    <option value="fariasbrito">Farias Brito</option>
                                    <option value="fatima">Fátima</option>
                                    <option value="floresta">Floresta</option>
                                    <option value="genibau">Genibaú</option>
                                    <option value="guajeru">Guajeru</option>
                                    <option value="guararapes">Guararapes</option>
                                    <option value="granjaportugal">Granja Portugal</option>
                                    <option value="granjalisboa">Granja Lisboa</option>
                                    <option value="henriquejorge">Henrique Jorge</option>
                                    <option value="itaoca">Itaoca</option>
                                    <option value="itaperi">Itaperi</option>
                                    <option value="jacarecanga">Jacarecanga</option>
                                    <option value="jangurussu">Jangurussu</option>
                                    <option value="jardimamerica">Jardim América</option>
                                    <option value="jardimcearense">Jardim Cearense</option>
                                    <option value="jardimguanabara">Jardim Guanabara</option>
                                    <option value="jardimdasoliveiras">Jardim das Oliveiras</option>
                                    <option value="jardimiracema">Jardim Miracema</option>
                                    <option value="joaquimtavora">Joaquim Távora</option>
                                    <option value="joaoxxiii">João XXIII</option>
                                    <option value="josebonifacio">José Bonifácio</option>
                                    <option value="josedealencar">José de Alencar</option>
                                    <option value="lagoaredonda">Lagoa Redonda</option>
                                    <option value="lucianocavalcante">Luciano Cavalcante</option>
                                    <option value="manueldiasbranco">Manuel Dias Branco</option>
                                    <option value="meireles">Meireles</option>
                                    <option value="messejana">Messejana</option>
                                    <option value="montese">Montese</option>
                                    <option value="bonsucesso">Bonsucesso</option>
                                    <option value="mondubim">Mondubim</option>
                                    <option value="montecastelo">Monte Castelo</option>
                                    <option value="mourabrasil">Moura Brasil</option>
                                    <option value="mucuripe">Mucuripe</option>
                                    <option value="novomondubim">Novo Mondubim</option>
                                    <option value="otaviobonfim">Otávio Bonfim</option>
                                    <option value="olavooliveira">Olavo Oliveira</option>
                                    <option value="padreandrade">Padre Andrade</option>
                                    <option value="panamericano">Panamericano</option>
                                    <option value="papicu">Papicu</option>
                                    <option value="paupina">Paupina</option>
                                    <option value="parangaba">Parangaba</option>
                                    <option value="parreao">Parreão</option>
                                    <option value="parquearaxa">Parque Araxá</option>
                                    <option value="parquedoisirmaos">Parque Dois Irmãos</option>
                                    <option value="parqueiracema">Parque Iracema</option>
                                    <option value="parquelandia">Parquelândia</option>
                                    <option value="parquemanibura">Parque Manibura</option>
                                    <option value="parquesantamaria">Parque Santa Maria</option>
                                    <option value="parquesaojose">Parque São José</option>
                                    <option value="passare">Passaré</option>
                                    <option value="pedras">Pedras</option>
                                    <option value="pici">Pici</option>
                                    <option value="pirambu">Pirambu</option>
                                    <option value="planaltoayrtonsenna">Planalto Ayrton Senna</option>
                                    <option value="praiadeiracema">Praia de Iracema</option>
                                    <option value="praiadofuturoi">Praia do Futuro I</option>
                                    <option value="praiadofuturoii">Praia do Futuro II</option>
                                    <option value="prefeitojosewalter">Prefeito José Walter</option>
                                    <option value="presidentekennedy">Presidente Kennedy</option>
                                    <option value="presidentevargas">Presidente Vargas</option>
                                    <option value="quintinocunha">Quintino Cunha</option>
                                    <option value="rodolfoteofilo">Rodolfo Teófilo</option>
                                    <option value="sabiguaba">Sabiguaba</option>
                                    <option value="maraponga">Maraponga</option>
                                    <option value="salinas">Salinas</option>
                                    <option value="saobento">São Bento</option>
                                    <option value="saogerardo">São Gerardo</option>
                                    <option value="saojoaodotauape">São João do Tauape</option>
                                    <option value="serrinha">Serrinha</option>
                                    <option value="siqueira">Siqueira</option>
                                    <option value="varjota">Varjota</option>
                                    <option value="vicentepizon">Vicente Pizon</option>
                                    <option value="vilaellery">Vila Ellery</option>
                                    <option value="vilamanuelsatiro">Vila Manuel Sátiro</option>
                                    <option value="vilaperi">Vila Peri</option>
                                    <option value="vilavelha">Vila Velha</option>
                                    <option value="vilauniao">Vila União</option>
                                </select>
                            </div>
                            
    
                            <div class="mb-3">
                                <label class="form-label">Número de crianças que residem na casa (usuário ou familiar):</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="number" min="0" class="form-control" />
                                    </div>
                                    <div class="col">
                                        <p>Crianças de 0-5 anos</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="number" min="0" class="form-control" />
                                    </div>
                                    <div class="col">
                                        <p>Crianças de 6-11 anos</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input type="number" min="0" class="form-control" />
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
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field">
                                                <label class="form-check-label" for="field">Álcool</label>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field">
                                                <label class="form-check-label" for="field">Tabaco, cigarro, vaping</label>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field"> 
                                                <label for="field" class="form-check-label">Crack(Mesclado, pitio, raspa)</label>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field">
                                                <label for="field" class="form-check-label">Macoha(Shank, haxixe, k2)</label>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field">
                                                <label for="field" class="form-check-label">Cocaína(Merla, oxi...)</label>
                                            </li>
                                            <li class="list-group-item">    
                                                <input type="checkbox" id="field">
                                                <label for="field" class="form-check-label">Solventes(Cola, loló, lança perfume, anti-respingo de solda)</label>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field">
                                                <label for="field" class="form-check-label">Tranquilizantes(Diazepam, rivotril, ripinol...)</label>
                                            </li>

                                            <li class="list-group-item">
                                                <input type="checkbox" id="field">
                                                <label for="field" class="form-check-label">Anestésicos(Boa noite cinderela, ketamina)</label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <ul class="list-group">
                                            
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field">
                                                <label for="field" class="form-check-label">Alucinógenos sintéticos(LSD, Doce, DMT, aranha)</label>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field">
                                                <label for="field" class="form-check-label">Alucinógenos naturais(Cogumelo, zabumba, Ahayuaska, Sto Daime, Ibogaína)</label>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field">
                                                <label for="field" class="form-check-label">Anfetaminas(Rebite, speed, ritalina)</label>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field">
                                                <label for="field" class="form-check-label">Opióides(Remédios para dor, morfina, metadona, tramal)</label>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field">
                                                <label for="field" class="form-check-label">Ecstasy(Bala, MDMA, MD, Mandy)</label>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field">
                                                <label for="field" class="form-check-label">Heroína</label>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field">
                                                <label for="field" class="form-check-label">Não sabe/Não respondeu</label>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field">
                                                <label for="field" class="form-check-label">Outro</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

            
                            <div class="mb-3">
                                <label class="form-label">Qual é a primeira substância que você fez uso?</label>
                                <input type="text" class="form-control" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Qual ou quais substâncias faz uso atualmente</label>
                                <input type="text" class="form-control" />
                            </div>
            
                            <div class="mb-3">
                                <label class="form-label">Usa há quanto tempo?</label>
                                <input type="text" class="form-control" />
                            </div>
            
                            <div class="mb-3">
                                <label class="form-label">Quanto tempo após iniciar o uso procurou tratamento pela primeira vez?</label>
                                <input type="text" class="form-control" />
                            </div>
            
                            <div class="mb-3">
                                <label class="form-label">Onde procurou ajuda/tratamento pela primeira vez?</label>
                                <input type="text" class="form-control" />
                            </div>
                            
                            
        
                            <div class="mb-3">
                            <label class="form-label">Qual ou quais órgãos/instituições que faz atendimento a usuários de álcool e/ou outras drogas você já foi atendido?</label>
                            <div class="row">
                                <div class="col">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <input type="checkbox" id="field">
                                            <label class="form-check-label" for="field">CAPS AD</label>
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" id="field">
                                            <label class="form-check-label" for="field">Unidade básica de saúde</label>
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" id="field">
                                            <label for="field" class="form-check-label">SHR AD</label>
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" id="field">
                                            <label for="field" class="form-check-label">Hospital Psiquiátrico</label>
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" id="field">
                                            <label for="field" class="form-check-label">Comunidade terapêutica</label>
                                        </li>
                                    </ul>
                                </div>   

                                <div class="col">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <input type="checkbox" id="field">
                                            <label for="field" class="form-check-label">Instituições religiosas</label>
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" id="field">
                                            <label for="field" class="form-check-label">Atendimento Psicológico</label>
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" id="field">
                                            <label for="field" class="form-check-label">Atendimento Psiquiátrico</label>
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" id="field">
                                            <label for="field" class="form-check-label">Grupos de ajuda mutua</label>
                                        </li>
                                        <li class="list-group-item">
                                            <input type="checkbox" id="field">
                                            <label for="field" class="form-check-label">Unidade de acolhimento</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                            <div><label class="form-label">Já pensou em suicídio alguma vez? </label></div>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio" class="form-check-input" value="sim" id="field1">
                                    <label class="form-check-label" for="field1">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio" class="form-check-input" value="nao" id="field2">
                                    <label class="form-check-label" for="field2">Não</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio" class="form-check-input" value="naosei" id="field3">
                                    <label class="form-check-label" for="field3">Não sabe/não informou</label>
                                </div>
                            </div>
            
                            <div class="mb-3">
                                <label class="form-label">Se sim, de qual forma tentou suicídio?</label>
                                <div class="form-check">
                                    <input type="text" class="form-control" />
                                </div>

                                <label class="form-label">Há quanto tempo?</label>
                                <div class="form-check">
                                    <input type="text" class="form-control" /> 
                                </div>
                
                            </div>
            
                            <div class="mb-3">
                                <label class="form-label">Qual é a expectativa do usuário e/ou da família em relação a esse atendimento?</label>
                                <div class="row">
                                    <div class="col">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field">
                                                <label class="form-check-label" for="field">Internação voluntária</label>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field">
                                                <label class="form-check-label" for="field">Internação involuntária</label>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field">
                                                <label class="form-check-label" for="field">Orientação</label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field">
                                                <label class="form-check-label" for="field">Suporte Psicológico</label>
                                            </li>
                                            <li class="list-group-item">
                                                <input type="checkbox" id="field">
                                                <label class="form-check-label" for="field">Tratamento na rede intersetorial álcool e drogas municipal</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                            <div><label class="form-label">Gostaria de atendimento presencial na CPDrogas? </label></div>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio" class="form-check-input" value="sim" id="field1">
                                    <label class="form-check-label" for="field1">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio" class="form-check-input" value="nao" id="field2">
                                    <label class="form-check-label" for="field2">Não</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio" class="form-check-input" value="naosei" id="field3">
                                    <label class="form-check-label" for="field3">Não sabe/não informou</label>
                                </div>
                            </div>
            
                    
                            <div class="mb-3">
                                <label class="form-label">Relato do atendimento</label>
                                <input type="text" class="form-control" />
                            </div>
            
                            <div class="mb-3">
                                <label class="form-label">Encaminhamento</label>
                                <input type="text" class="form-control" />
                            </div>
            
                            <p>Fortaleza</p>
                            <input type="datetime-local" class="form-control" />
            
                            <p>Profissional responsável pelo acolhimento/encaminhamento</p>
                            <input type="text" class="form-control" />

                            <div class="m-3">
                            <label class="form-label">Você autoriza que os dados pessoais e sensíveis coletados nesse atendimento sejam utilizados para a elaboração do painel de dados abertos da Coordenadoria Especial de Políticas sobre Drogas da Prefeitura Municipal de Fortaleza? Independente da autorização, você terá acesso ao atendimento. </label></div>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio" class="form-check-input" value="sim" id="field1">
                                    <label class="form-check-label" for="field1">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio" class="form-check-input" value="nao" id="field2">
                                    <label class="form-check-label" for="field2">Não</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="radio" class="form-check-input" value="naosei" id="field3">
                                    <label class="form-check-label" for="field3">Não sabe/não informou</label>
                                </div>
                            </div>
            
                    
                        </div>    
                    </div>   
                    <button type="submit" class="btn btn-primary">Enviar ficha de acolhimento individual</button>    
                </form>
            </div>
        </div>
    </div>
</body>
</html>


<?php require('./inc/footer.html'); ?>