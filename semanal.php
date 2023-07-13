<?php require('./inc/header.html'); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<body>
    <form action="/config/db.php" method="POST">
        <div class="container">
            <div class="card bg-light mb-3">
                <div class="card-header text-center">
                    <h5>Acompanhamento itinerário terapêutico do usuário</h5>
                </div>
                <div class="card-body text-center">
                    
                <div class="row text-center">
                    <div class="col">
                        <input type="search" name="" id="" placeholder="digite aqui :)" class="form-control" />
                        <p>nome | cpf | nº da ficha </p>
                    </div>
                
                    <div class="col">
                        <button type="submit" class="btn btn-success btn-block">pesquisar</button>
                    </div>
                </div>

                    <h3 class="text-center mt-4">Você está na ficha de x</h3>

                    <div class="form-group">
                        <label for="">Semana que você deseja editar ou adicionar:</label>
                        <select name="" id="" class="form-control mb-2">
                            <option value=""></option>
                            <option value="ficha">ficha</option>
                            <option value="1semana">1º semana</option>
                            <option value="2semana">2º semana</option>
                            <option value="3semana">3º semana</option>
                            <option value="4semana">4º semana</option>
                            <option value="5semana">5º semana</option>
                            <option value="6semana">6º semana</option>
                            <option value="7semana">7º semana</option>
                            <option value="8semana">8º semana</option>
                            <option value="9semana">9º semana</option>
                            <option value="10semana">10º semana</option>
                            <option value="11semana">11º semana</option>
                            <option value="12semana">12º semana</option>
                        </select>
                    </div>

                    <div>
                        <label class="form-label">O contato foi realizado: </label></div>
                        <div class="mb-3">
                            <div class="form-check form-check-inline">
                                <input type="radio" name="contato" class="form-check-input">
                                <label class="form-check-label" for="field1">Com o usuário</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" name="radio" class="form-check-input" value="nao" id="field2">
                                <label class="form-check-label" for="field2">Com o familiar</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" name="radio" class="form-check-input" value="naosei" id="field3">
                                <label class="form-check-label" for="field3">Com ambos</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" name="radio" class="form-check-input" value="naosei" id="field3">
                                <label class="form-check-label" for="field3">Não realizdo</label>
                            </div>

                        </div>
                    </div>

                    <div class="text-center">

                        <div class="form-group">
                            <label class="form-label">Motivo do contato:</label>

                            <div class="form-check">
                                <input type="text" name="motivoContato" class="form-control" />
                            </div>
                            
                        </div>

                    </div>

                    

                    <div class="form-group">
                        <label for="">Qual é a situação do tratamento? </label>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="tratamento" class="form-check-input" id=""> Em tratamento
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="tratamento" class="form-check-input" id=""> Desistiu do tratamento
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="tratamento" class="form-check-input" id=""> Não iniciou o tratamento
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Motivo:</label>
                        <input type="text" name="motivoTratamento" class="form-control mb-2" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Qual é a relação com o uso de substâncias? </label>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="substancias" class="form-check-input" id=""> Está em abstinência
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="substancias" class="form-check-input" id=""> Continua em uso nocivo
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="substancias" class="form-check-input" id=""> Reduziu o uso
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Observações do atendimento:</label>
                        <input type="text" name="observacoes" class="form-control mb-2" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Data:</label>
                        <input type="datetime" name="data" class="form-control" id="" />
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                </div>
            
            </div>
        </div>
    </form>
</body>
