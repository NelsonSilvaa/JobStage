<?php 
session_start();

    if(empty($_SESSION)){
        header("Location: ../../index.html");
    }
    include("../../src/configs/conexao.php");

    $user_id = $_SESSION['ID_USUARIO'];

?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/layout.css">
    <link rel="stylesheet" href="../../css/sweetalert2.css">
    <link rel="stylesheet" href="../../css/validacoes.css">
    <link rel="stylesheet" href="../../css/curriculo.css">
    <meta http-equiv="Cache-Control" content="no-cache" />
    <script src="../../src/JS/jquery-3.6.4.js"></script>
</head>
<body>
<header>
    <h1 style="text-align: center; color:white; font-family: Ubuntu;">JOB'STAGE</h1>
</header>

<div class="sec-dados">
    
    <div class="navegacao">
        <nav class="navbarP">
        <ul>
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="dadosUser.php">Dados</a></li>
            <li><a href="../vagas.php">Vagas</a></li>
            <li><a href="../candidaturas.php">Candidaturas</a></li>
            <li><a href="curriculo.php">Currículo</a></li>
            <li style="background-color: red;"> <a href="../../src/configs/logout.php">Sair</a></li>
        </ul>
    </div>

    <div class="container-dados">
        <div class="conteudo-principal" style="width: 794px; min-height: 1123px; border: 1px solid black;">
        <?php
            $sqlUser = "SELECT * FROM usuario
            WHERE ID_USUARIO = $user_id";

            $resultadoU = mysqli_query($conn, $sqlUser);
            $queryU = mysqli_fetch_assoc($resultadoU);

            $dataNascimento = $queryU['DATA_NASC'];


            // Cria um objeto DateTime para a data de nascimento
            $dataNascimentoObj = date_create($dataNascimento);

            // Cria um objeto DateTime para a data atual
            $dataAtualObj = date_create();

            // Calcula a diferença entre as duas datas
            $diferenca = date_diff($dataNascimentoObj, $dataAtualObj);

            // Obtém a idade a partir da diferença de anos
            $idade = $diferenca->y;

        
        ?>
            <div class="header_curriculo">
                <div class="nome">
                    <h3> <?php echo $queryU['NOME'] ?> </h3>
                </div>
                <div class="dados-pessoais">
                    <div class="dados-idade">
                        <?php echo $idade ?> anos 
                    </div>
                    <div class="dados-civil">
                        <?php echo $queryU['ESTADO_CIVIL'] ?> 
                    </div>
                    <div class="daos-localidade">
                        Curitiba - PR 
                    </div>
                </div>
            </div>
            <main>
                <div class="Contato">
                    <hr>
                    <h3><b>Contato</b></h3>
                    <div class="contato-email">
                        <b>E-mail:</b>  <?php echo $queryU['EMAIL'] ?>
                    </div>
                    <div class="contato-linkedin">
                        <b>LinkedIn:</b>  <?php echo $queryU['LINKEDIN'] ?>
                    </div>
                    <div class="contato-telefone">
                        <b>Telefone:</b>  <?php echo $queryU['TELEFONE'] ?>
                    </div>
                </div>
               <div class="sobre">
                    <hr>
                    <h3><b>Sobre</b></h3>
                    <div class="conteudo-sobre">
                        <?php echo $queryU['SOBRE'] ?>
                    </div>
                   
               </div>
                <?php
                $sqlExp = "SELECT * FROM experiencia
                WHERE ID_USUARIO = $user_id";
    
                $res = $conn->query($sqlExp);

                $qtd = $res->num_rows;

                if($qtd > 0){
                ?>
                <div class="experiencia">
                        <hr>
                        <h3><b style="font-style: normal !important;">Experiência Profissional:</b></h3>
                        <?php
                        
                            while ($row = $res->fetch_object()){
                                echo '  <div class="empresa-cargo" style="font-size: 22px; font-weight: 600;">
                                            <b>' . $row->EMPRESA . ' - ' . $row->CARGO . '</b>
                                        </div>
                                        <div class="periodo-exp">
                                            <b>Periodo:</b> ' . $row->INICIO . ' - ' . ($row->FIM? $row->FIM : "Atual") . '
                                        </div>
                                        <div class="atv-exp">
                                            <b>Atividades exercidas:</b>
                                            <br>
                                            ' . $row->ATIVIDADES . '
                                        </div>';
                            }
                        ?>
                    </div>
          <?php } ?>
          <?php
             $sqlFormacao = "SELECT * FROM formacao
             WHERE ID_USUARIO = $user_id";
 
             $res = $conn->query($sqlFormacao);

             $qtd = $res->num_rows;
          
             if($qtd > 0){
          ?>
                <div class="formacao">
                    <hr>
                    <h3><b>Formação Acadêmica:</b></h3>
                    <?php
                        while ($row = $res->fetch_object()){
                            echo '  <div>
                                        <div class="nivel">
                                            Ensino '.$row->NIVEL.' - <b>'.$row->STATUS.'</b>
                                        </div>
                                        <div class="instituicao_curso">
                                            '.$row->INSTITUICAO.' - '.$row->CURSO.' - '.$row->DURACAO.' Anos
                                        </div>
                                    </div>';
                        }
                    ?>
                </div>
      <?php } ?>
      <?php
        $sqlFormacao = "SELECT * FROM curso_extra
        WHERE ID_USUARIO = $user_id";

        $res = $conn->query($sqlFormacao);

        $qtd = $res->num_rows;

        if($qtd > 0){
      ?>
            <div class="curso-extra">
                <hr>
                <h3><b>Cursos Extras:</b></h3>
                <?php
                    
                    while ($row = $res->fetch_object()){
                        echo '  <div class="curso_extra">
                                    '.$row->NOME.' - ('.$row->STATUS.') - <b>'. strtoupper($row->INSTITUICAO) .'</b></b>
                                </div>';
                    }
                ?>
                </div>
  <?php } ?>

                
            </main>
        </div>
    </div>
    
    
</div>



    <script src="../../src/JS/processos.js"></script>
    <script src="../../src/JS/swetalert2.js"></script>
    <script src="../../src/JS/jquery-3.6.4.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-kSpN/7CfdBjN9+RY5DhN5Hz5zr+ZnysK8W1ufX0ZN0SPR20BpZiDgmWwfdKvSGtl" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>