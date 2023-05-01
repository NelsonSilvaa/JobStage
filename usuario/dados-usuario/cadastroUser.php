<?php 
session_start();

    if(empty($_SESSION)){
        header("Location: ../../index.php");
    }
    include("../../src/conexao.php");

$user_id = $_SESSION['ID_USUARIO'];

    $sql_formacao = "SELECT  COUNT(*) as total FROM formacao WHERE ID_USUARIO = $user_id";
    $sql_experiencia = "SELECT COUNT(*) as total FROM experiencia WHERE ID_USUARIO = $user_id";
    $sql_cursos = "SELECT COUNT(*) as total FROM curso_extra WHERE ID_USUARIO = $user_id";

    $resultado_F = mysqli_query($conn, $sql_formacao);
    $resultado_E = mysqli_query($conn, $sql_experiencia);
    $resultado_C = mysqli_query($conn, $sql_cursos);

    // // Verifica se houve erro na consulta
    // if (!$resultado) {
    //     die('Erro ao executar consulta: ' . mysqli_error($conn));
    // }


    $total_F = mysqli_fetch_assoc($resultado_F);
    // $total_registros_F = $resultado_F['total'];

    $total_E = mysqli_fetch_assoc($resultado_E);
    // $total_registros_E = $total_registros_E['total'];

    $total_C = mysqli_fetch_assoc($resultado_C);
    // $total_registros_C = $total_registros_C['total'];



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/index.css">
    <meta http-equiv="Cache-Control" content="no-cache" />
</head>
<body>
<div class="card">


<div class="container">
    <div class="container-dados">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="dados-tab" data-toggle="tab" href="#dados" role="tab" aria-controls="dados" aria-selected="true">Dados</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="formacao-tab" data-toggle="tab" href="#formacao" role="tab" aria-controls="formacao" aria-selected="false">Formação</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="experiencia-tab" data-toggle="tab" href="#experiencia" role="tab" aria-controls="experiencia" aria-selected="false">Experiência</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="escolaridade-tab" data-toggle="tab" href="#escolaridade" role="tab" aria-controls="Escolaidade" aria-selected="false">Escolaridade</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="cursos-tab" data-toggle="tab" href="#cursos" role="tab" aria-controls="cursos" aria-selected="false">Cursos</a>
            </li>
        </ul>
        <div class="card">
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
            <!-- dados -->
                    <div class="tab-pane fade show active" id="dados" role="tabpanel" aria-labelledby="dados-tab">
                        <form method="post" action="../../src/read-inputs/dados.php">
                            <div class="form-row">
                                <div class="col">
                                    <label for="Nome">Nome Completo <span style="color: red;">*</span> </label>
                                    <input type="text" class="form-control" placeholder="" name="nome" id="nome">
                                </div>
                                <div class="col">
                                    <label for="email">Email<span style="color: red;">*</span></label>
                                    <input type="email" class="form-control" placeholder="" name="email" id="email" require>
                                </div>
                            </div>
                    
                            <div class="form-row">
                                <div class="col">
                                    <label for=" ">CPF<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" placeholder="" name="cpf" id="cpf">
                                </div>
                                <div class="col">
                                    <label for="data-nasc">Data Nasc.<span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" placeholder="" name="data-nasc" id="data-nasc">
                                </div>
                                <div class="col">
                                    <label for=" ">Idade<span style="color: red;">*</span></label>
                                    <input type="number" class="form-control" placeholder="" name="idade" id="idade">
                                </div>
                            
                            </div>
                    
                            
                            <div class="form-row">
                                <div class="col">
                                    <label for=" ">Nome da mãe<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" placeholder=""  name="nome-mae" id="nome-mae">
                                </div>
                                <div class="col">
                                    <label for=" ">Nome do pai</label>
                                    <input type="text" class="form-control" placeholder="" name="nome-pai" id="nome-pai">
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="col">
                                    <label for="rg">RG<span style="color: red;">*</span></label>
                                    <input type="number" class="form-control" placeholder="" name="rg" id="rg">
                                </div>
                                <div class="col">
                                    <label for="data-emissao">Data emissão<span style="color: red;">*</span></label>
                                    <input type="date" class="form-control" placeholder="" name="data-emissao" id="data-emissao">
                                </div>
                                <div class="col">
                                    <label for="orgao-emissor">Orgão Emissor<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" placeholder="" name="orgao-emissor" id="orgao-emissor">
                                </div>
                                <div class="col">
                                    <label for="estado">Estado<span style="color: red;">*</span></label>
                                    <select type="text" class="form-control" placeholder="" name="estado" id="estado">
                                        <option value=""></option>
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espírito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PR">Paraná</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="TO">Tocantins</option>
                                    </select>
                                </div>
                            </div>
                        <div style="margin-top: 20px;">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" value="salvar">Salvar</button>
                        </div>
                        </form>
                    </div>
            <!-- FORMAÇAO -->
                    <div class="tab-pane fade" id="formacao" role="tabpanel" aria-labelledby="formacao-tab">
                        <!-- se não existir nenhuma frmação cadastrada no banco ele nãpo mostra a tabela -->

                        <?php if($total_F['total'] > 0) {
                            $sql = "SELECT * FROM formacao WHERE ID_USUARIO = $user_id";
                            
                            $res = $conn->query($sql);

                            $qtd = $res->num_rows;
                        ?>  

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col">Nível</th>
                                    <th scope="col">Instituição</th>
                                    <th scope="col">Curso</th>
                                    <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <!-- LOOP para mostrar cformação cadastrada -->
                                <?php if($qtd > 0) { 
                                    while ($row = $res->fetch_object()){    
                                        print "<tr>";
                                        print    "<td scope='row'>".$row->NIVEL."</td>";
                                        print    "<td>".$row->INSTITUICAO."</td>";
                                        print    "<td>".$row->CURSO."</td>";
                                        print    "<td>".$row->STATUS."</td>";
                                        print    "<td>"."EDITAR"."</td>";
                                        print "</tr>";
                                    }
                                ?>

                                </tbody>
                            </table>
                        <?php } ?>
                        <?php 
                        } else { 
                            echo '<p style="color: red; font-size:20px">Nenhuma formação encontrada!</p>';
                        }
                        ?>

                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="margin: 0 auto">
                                Nova formação
                            </a>
                        </p>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                            
                            <form method="post" action="../../src/read-inputs/formacao.php">
                                <div class="form-row">
                                    <div class="col">
                                        <label for="curso">Curso<span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" placeholder="" name="curso" id="curso">
                                    </div>
                                    <div class="col">
                                        <label for="instituicao">Instituição<span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" placeholder="" name="instituicao" id="instituicao">
                                    </div>
                                </div>
                        
                                <div class="form-row">
                                    <div class="col">
                                        <label for="nivel">Nível<span style="color: red;">*</span></label>
                                        <select type="text" class="form-control" placeholder="" name="nivel" id="nivel">
                                            <option value="AAA">Fundamental</option>
                                            <option value="ensino médio">Ensino médio</option>
                                            <option value="tecnico">Técnico</option>
                                            <option value="tecnologo">Tecnólogo</option>
                                            <option value="bacharelado">Bacharelado</option>
                                            <option value="mestrado">Mestrado</option>
                                            <option value="doutorado">Doutorado</option>
                                            <option value="livre">Livre</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="duracao">Duração<span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" placeholder="" name="duracao" id="duracao">
                                    </div>
                                    <div class="col">
                                        <label for="status">Status<span style="color: red;">*</span></label>
                                        <select type="text" class="form-control" placeholder="" name="status" id="status">
                                            <option value=""></option>
                                            <option value="completo">Completo</option>
                                            <option value="em andamento">Em andamento</option>
                                            <option value="interrompido">Interrompido</option>
                                        </select>
                                    </div>
                                </div>
                                <div style="margin-top: 20px;">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" value="salvar">Salvar</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>

            <!-- EXPERIENCIA  -->
            
                    <div class="tab-pane fade" id="experiencia" role="tabpanel" aria-labelledby="experiencia-tab">
                        <?php if(!(1<10)) {?>  
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                        <th scope="col">Empresa</th>
                                        <th scope="col">Cargo</th>
                                        <th scope="col">contrato</th>
                                        <th scope="col">inicio</th>
                                        <th scope="col">fim</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <th scope="row">45</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>Editar</td>
                                        </tr>
                                        <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                        </tr>
                                        <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php 
                            }else{ echo '<p style="color: red; font-size:20px">Nenhuma experiência encontrada!</p>';}
                            ?>
                         <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="margin: 0 auto">
                                Nova Experiência
                            </a>
                        </p>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">        


                                <form method="post" action="../../src/read-inputs/experiencia.php">
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="empresa">Empresa</label>
                                            <input type="text" class="form-control" placeholder="" name="empresa" id="empresa">
                                        </div>
                                        <div class="col">
                                            <label for="cargo">Cargo</label>
                                            <input type="text" class="form-control" placeholder="" name="cargo" id="cargo">
                                        </div>
                                    </div>
                            
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="data-inicio">Inicio</label>
                                            <input type="date" class="form-control" placeholder="" name="data-inicio" id="inicio">
                                        </div>
                                        <div class="col">
                                            <label for="data-fim">Fim</label>
                                            <input type="date" class="form-control" placeholder="" name="data-fim" id="fim">
                                        </div>
                                        <div class="col">
                                            <label for="tipo_contrato">Tipo contrato</label>
                                            <select type="text" class="form-control" placeholder="" name="tipo_contrato" id="tipo_contrato">
                                                <option value=""></option>
                                                <option value="CLT">CLT</option>
                                                <option value="PJ">PJ</option>
                                                <option value="estagio">Estágio</option>
                                                <option value="temporario">Temporário</option>
                                            </select>
                                        </div>
                                    </div>
                            
                                    <div class="form-group">
                                        <label for="atividades">Atividades</label>
                                        <textarea class="form-control" name="atividades" id="atividades" rows="3"></textarea>
                                    </div>
                                    <div style="margin-top: 20px;">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" value="salvar">Salvar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            <!-- ESCOLARIDADE -->
                    <div class="tab-pane fade" id="escolaridade" role="tabpanel" aria-labelledby="escolaridade-tab">
                        <form method="post" action="../../src/read-inputs/escolaridade.php">

                            <div class="form-row">
                                <div class="col">
                                    <label for="curso-escolaridade">Curso<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" placeholder="" name="curso-escolaridade" id="curso-escolaridade">
                                </div>
                                <div class="col">
                                    <label for="instituicao-escolaridade">Instituição<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" placeholder="" name="instituicao-escolaridade" id="instituicao-escolaridade">
                                </div>
                            </div>
                    
                            <div class="form-row">
                                <div class="col">
                                    <label for="contato">Contato<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" placeholder="" name="contato" id="contato">
                                </div>
                                <div class="col">
                                    <label for="turno">Turno<span style="color: red;">*</span></label>
                                    <select type="text" class="form-control" placeholder="" name="turno" id="turno">
                                        <option value="manha">Manhã</option>
                                        <option value="tarde">Tarde</option>
                                        <option value="noite">Noite</option>
                                    </select>
                                </div>
                            </div>
                    
                            <div class="form-row">
                                <div class="col">
                                    <label for="prev-formatura">Previsao formatura<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" placeholder="" name="prev-formatura" id="prev-formatura">
                                </div>
                                <div class="col">
                                    <label for="periodo">Período<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" placeholder="" name="periodo" id="periodo">
                                        
                                </div>
                                <div class="col">
                                    <label for="duracao">Duração<span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" placeholder="" name="duracao" id="duracao">
                                </div>
                            </div>
                    
                            <div class="form-row">
                                <div class="col">
                                    <label for="">DECLARAÇÃO MATRÍCULA<span style="color: red;">*</span></label>
                                    <input type="file" class="form-control" placeholder="" name="declaracao" id="declaracao">
                                </div>
                            </div>
                        <div style="margin-top: 20px;">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" value="salvar">Salvar</button>
                        </div>
                        </form>
                    </div>
            <!-- CURSOS -->
                    <div class="tab-pane fade" id="cursos" role="tabpanel" aria-labelledby="cursos-tab">
                        <?php if(!(1<10)) {?>  
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col">Nivel</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">instituição</th>
                                    <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th scope="row">45</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>Editar</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php 
                        }else{ echo  '<p style="color: red; font-size:20px">Nenhum curso encontrado!</p>';}
                        ?>
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="margin: 0 auto">
                                Novo Curso
                            </a>
                        </p>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body"> 

                                <form method="post" action="../../src/read-inputs/cursos.php">
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="nome-curso">Nome</label>
                                            <input type="text" class="form-control" placeholder="" name="nome-curso" id="nome-curso">
                                        </div>
                                        <div class="col">
                                            <label for="instituicao-curso">Instituição</label>
                                            <input type="text" class="form-control" placeholder="" name="instituicao-curso" id="instituicao-curso">
                                        </div>
                                    </div>
                            
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="status-curso">Status</label>
                                            <select type="text" class="form-control" placeholder="" name="status-curso" id="status-curso">
                                                <option value=""></option>
                                                <option value="completo">Completo</option>
                                                <option value="em andamento">Em andamento</option>
                                                <option value="interrompido">Interrompido</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="duracao-curso">Duração</label>
                                            <input type="text" class="form-control" placeholder="" name="duracao-curso" id="duracao-curso">
                                        </div>
                                        <div class="col">
                                            <label for="n-tecnico">Nivel Técnico</label>
                                            <input type="text" class="form-control" placeholder="" name="n-tecnico" id="n-tecnico">
                                        </div>
                                        
                                    </div>
                                    <div style="margin-top: 20px;">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" value="salvar">Salvar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        





        <a href="../../src/logout.php"><button type="submit" class="btn btn-danger btn-lg btn-block" value="enviar">Sair</button><a>
    




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script 
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-kSpN/7CfdBjN9+RY5DhN5Hz5zr+ZnysK8W1ufX0ZN0SPR20BpZiDgmWwfdKvSGtl"
        crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>