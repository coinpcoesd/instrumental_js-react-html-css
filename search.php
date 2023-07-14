<?php require('./inc/header.html'); ?>

<div class="container">
    <div class="card bg-light mb-3">
        <div class="card-header">
            <h5>Pesquise aqui!</h5>
        </div>
        <div class="card-body col-md-5 offset-md-3 text-center">
            <div class="row">
                <div class="col">
                    <input type="search" name="" id="" placeholder="digite aqui :)" class="form-control" />
                    <p>nome | cpf | nº da ficha </p>
                </div>
                <div class="col">
                    <select name="" id="" class="form-control mb-1">
                        <option value="naodefinido"></option>
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
                <div class="col">
                    <button type="submit" class="btn btn-success btn-block">pesquisar</button>
                </div>
            </div>
        </div>
    </div>
</div>



<?php require('./inc/footer.html'); ?>