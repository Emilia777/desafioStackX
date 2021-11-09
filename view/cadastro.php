<?php include_once 'dependencias.php'; 

include_once '../model/Conexao.class.php';

?>


<html lang="pt-BR">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="cadastro.css" />
  
  </head>
    <h2 class="text-center">
        Cadastro de Funcionalidades 
    </h2>

    <form method="post" action="../controller/insertFunc.php">

        <div class="container">
            <div class="form-row">

                <div class="col-md-6"><b>Nome da Funcionalidade:</b>
                    <input class="form-control" type="text" name="nome" placeholder="Digite aqui..." required autofocus><br>
                </div>

                <div class="col-md-6"><b>Data do Cadastro:</b>
                    <input class="form-control" type="date" name="criacao" required id="data"><br>
                </div>

                <div class="col-md-12"><b>Descrição:</b>
                    <textarea class="form-control"  name="descricao" placeholder="Digite aqui..." required></textarea><br>
                </div>
                
                <div class="col-md-10">
                    <label id="votar"><b>Votação:</b>
                        Sim <input class="inputRadio" type="radio" name="votacao"  id="votacaoS" value="S">
                        Não <input class="inputRadio" type="radio" name="votacao"  id="votacaoN" value="N"><br>
                    </label>
                </div>
                <div class="col-md-10">
                    <label id="desenvolvido"><b>Desenvolvido:</b>
                    Sim <input class="inputRadio" type="radio" name="desenvolvimento" id="desenvolvidoS" value="S">
                    Não <input class="inputRadio" type="radio" name="desenvolvimento" id="desenvolvidoN" value="N">   
                    </label>
                </div>
                <div class="col-md-12">
                    <input type="submit" name="cadastrar" value="Cadastrar"/>
                    <br><br>
                    <a href="../index.php">
                         Voltar
                    </a>
                </div>
            </div>
        </div>

    </form>

    <?php
