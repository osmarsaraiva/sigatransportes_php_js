<?php
include('conexao.php');
?>

<!DOCTYPE html>
<html>

<head>
  <title>Frotas</title>

 
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>




</head>



<body>



  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="painel_principal.php"><big><big><i class="fa fa-arrow-left"></i></big></big></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
      <ul class="navbar-nav mr-auto">

       </ul>
    <form class="form-inline my-2 my-lg-0 mr-5">
      <input name="txtpesquisarNome" id="txtpesquisarNome" class="form-control mr-sm-2" type="search" placeholder="Buscar por Nome" aria-label="Pesquisar">
      <button name="buttonPesquisarNome" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
    </form>

    <form class="form-inline my-2 my-lg-0 mr-5">
      <input name="txtcpf"  id="txtcpf" class="form-control mr-sm-2" type="search" placeholder="Buscar pelco CPF" aria-label="Pesquisar">
      <button name="buttonPesquisarEmpresa" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</nav>




  <div class="container">




    <br>


    <div class="row">
      <div class="col-sm-12">
        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modalExemplo">Inserir Novo Funcionário </button>

      </div>


    </div>


    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Cadastrar Funcionários</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                <!--LISTAR TODOS OS FUNCIONÁRIOS -->

                <?php


                  if (isset($_GET['buttonPesquisarNome']) and $_GET['txtpesquisarNome'] != '') {

                  $nome_funcionario = $_GET['txtpesquisarNome'];

                  $query = "select f.id_funcionario, f.nome_funcionario, f.cpf_funcionario, f.pis_funcionario, f.telefone_funcionario, f.funcao_funcionario, f.endereco_funcionario, f.admissao_funcionario, f.demissao_funcionario, f.situacao_funcionario, f.email, f.fk_empresa, e.nome_empresa from tb_funcionarios as f INNER JOIN tb_empresas as e ON f.fk_empresa = e.id_empresa where f.nome_funcionario LIKE '$nome_funcionario' order by f.nome_funcionario asc";


                } else if (isset($_GET['buttonPesquisarCPF']) and $_GET['txtcpf'] != '') {
                 
                  $cpf_funcionario = $_GET['txtcpf'];

                  $query = "select f.id_funcionario, f.nome_funcionario, f.cpf_funcionario, f.pis_funcionario, f.telefone_funcionario, f.funcao_funcionario, f.endereco_funcionario, f.admissao_funcionario, f.demissao_funcionario, f.situacao_funcionario, f.email, f.fk_empresa, e.nome_empresa from tb_funcionarios as f INNER JOIN tb_empresas as e ON f.fk_empresa = e.id_empresa where f.cpf_funcionario LIKE 'cpf_funcionario' order by f.cpf_funcionario asc";
                
                } else {

                  $query = "select f.id_funcionario, f.nome_funcionario, f.cpf_funcionario, f.pis_funcionario, f.telefone_funcionario, f.funcao_funcionario, f.endereco_funcionario, f.admissao_funcionario, f.demissao_funcionario, f.situacao_funcionario, f.email, f.fk_empresa, e.nome_empresa from tb_funcionarios as f INNER JOIN tb_empresas as e ON f.fk_empresa = e.id_empresa where f.nome_funcionario LIKE f.nome_funcionario order by f.nome_funcionario asc";

                }



                  $result = mysqli_query($conexao, $query);
                        //$dado = mysqli_fetch_array($result);
                        $row = mysqli_num_rows($result);

                        if($row == ''){

                            echo "<h3> Não existem dados cadastrados no banco </h3>";

                        }else{

                           ?>


                  <table class="table">
                    <thead class=" text-primary">

                          <th>
                            Nome Funcionario
                          </th>
                          <th>
                            CPF
                          </th>
                           <th>
                            PIS
                          </th>
                          <th>
                            Telefone
                          </th>
                          <th>
                            Função
                          </th>
                          <th>
                           Endereço
                          </th>
                          <th>
                           Admissão
                           </th>
                          <th>
                          Demissão
                          </th>
                             <th>
                         Situação 
                           </th>  
                           Email
                          <th>
                        </th>  
                           Empresa
                          <th>
                           Ações
                            </th>
                        </thead>
                        <tbody>
                         
                         <?php 

                          while($res_1 = mysqli_fetch_array($result)){
                        
                            $nome_funcionario = $res_1["nome_funcionario"];
                            $cpf_funcionario = $res_1["cpf_funcionario"];
                            $pis_funcionario = $res_1["pis_funcionario"];
                            $telefone_funcionario = $res_1["telefone_funcionario"];
                            $funcao_funcionario = $res_1["funcao_funcionario"];
                            $endereco_funcionario = $res_1["endereco_funcionario"];
                            $admissao_funcionario = $res_1["admissao_funcionario"];
                            $demissao_funcionario = $res_1["demissao_funcionario"];
                            $situacao_funcionario = $res_1["situacao_funcionario"];
                            $email = $res_1["email"];
                            $fk_empresa = $res_1["nome_empresa"];
                            $id_funcionario = $res_1["id_funcionario"];
                      

                      //$data_compra_br = implode('/', array_reverse(explode ('-', $data_compra)));
                      //$data_inicio_br = implode('/', array_reverse(explode ('-', $data_inicio)));
                      //$data_venda_br = implode('/', array_reverse(explode ('-', $data_venda)));
                     

                      ?>

                        <tr>

                            <td><?php echo $nome_funcionario; ?></td> 
                            <td><?php echo $cpf_funcionario; ?></td>
                            <td><?php echo $pis_funcionario; ?></td>
                            <td><?php echo $telefone_funcionario; ?></td>
                            <td><?php echo $funcao_funcionario; ?></td>
                            <td><?php echo $endereco_funcionario; ?></td>
                            <td><?php echo $admissao_funcionario; ?></td>
                            <td><?php echo $demissao_funcionario; ?></td>
                            <td><?php echo $situacao_funcionario; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $fk_empresa; ?></td>
                            
                            
                       

                          <td>
                            <a class="btn btn-info" title="Editar" href="cadastrar_funcionarios.php?painel=edita&id_funcionario=<?php echo $id_funcionario; ?>"><i class="fa fa-pencil-square-o"></i></a>

                            <a class="btn btn-danger" title="Excluir" href="cadastrar_funcionarios.php?painel=deleta&id_funcionario=<?php echo $id_funcionario; ?>"><i class="fa fa-minus-square"></i></a>

                          </td>

                        </tr>

                      <?php
                      }
                      ?>


                    </tbody>
                  </table>
                <?php
                }
                ?>
              </div>
            </div>
          </div>
        </div>

      </div>




      <!-- Modal -->
      <div id="modalExemplo" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">

              <h4 class="modal-title">Cadastrar Funcionários</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
              <div class="form-group">
                <label for="nome_funcionario">Nome do Funcionário</label>
                <input type="text" class="form-control mr-2" name="txtnome" id="txtnome" placeholder="Nome do Funcionário" required>
              </div>

               <div class="form-group">
                <label for="cpf_funcionario">CPF do Funcionário</label>
                <input type="text" class="form-control mr-2" name="txtcpf" id="txtcpf" placeholder="CPF do Funcionário" required>
              </div>

                <div class="form-group">
                <label for="pis_funcionario">PIS do Funcionário</label>
                <input type="number" class="form-control mr-2" name="txtnum" id="txtnum" placeholder="PIS do Funcionário" required>
              </div>

                <div class="form-group">
                <label for="telefone_funcionario">Telefone do Funcionário</label>
                <input type="text" class="form-control mr-2" name="txttelefone" id="txttelefone" placeholder="Telefone do Funcionário" required>
              </div>

                <div class="form-group">
                <label for="funcao_funcionario">Função do Funcionário</label>
                <input type="text" class="form-control mr-2" name="txtfuncao" id="txtfuncao" placeholder="Função do Funcionário" required>
              </div>

                <div class="form-group">
                <label for="endereco_funcionario">Endereço do Funcionário</label>
                <input type="text" class="form-control mr-2" name="txtendereco" id="txtendereco" placeholder="Endereço do Funcionário" required>
              </div>

                <div class="form-group">
                <label for="admissao_funcionario">Admissão do Funcionário</label>
                <input type="date" class="form-control mr-2" name="dataadmissao" id="dataadmissao" placeholder="Data de admissão do Funcionário" required>
              </div>

                <div class="form-group">
                <label for="demissao_funcionario">Demissão do Funcionário</label>
                <input type="date" class="form-control mr-2" name="datademissao" id="datademissao" placeholder="Demissão do Funcionário" required>
              </div>

              <div class="form-group">
                <label for="situacao">Situação Funcionário</label>

               <select class="form-control mr-2" id="situacao" name="situacao">
                  <option value="ativo">Ativo</option>
                  <option value="saab">Aposentado</option>
                  <option value="mercedes">Inativo</option>
                  <option value="audi">Licença Médica</option>
                  </select>

              </div>
            

              <div class="form-group">
                <label for="demissao_funcionario">Email do Funcionário</label>
                <input type="email" class="form-control mr-2" name="email" id="email" placeholder="Email do Funcionário" required>
              </div>
          


              <div class="form-group">
              <label for="Empresa">Empresa</label>

              <select class="form-control mr-2" id="nome_empresa" name="nome_empresa">
                  <?php
                  
                  $query = "SELECT * FROM tb_empresas ORDER BY nome_empresa asc";
                  $result = mysqli_query($conexao, $query);

                  if(count($result)){
                    while($res_2 = mysqli_fetch_array($result)){
                         ?>                                             
                    <option value="<?php echo $res_2['id_empresa']; ?>"><?php echo $res_2['nome_empresa']; ?></option> 
                         <?php      
                       }
                   }
                  ?>
              </select>
              



            <div class="modal-footer">
              <button type="submit" class="btn btn-success mb-3" name="button">Salvar </button>


              <button type="button" class="btn btn-danger mb-3" data-dismiss="modal">Cancelar </button>
              </form>
            </div>
          </div>
        </div>
      </div>




</body>

</html>



<!--CADASTRAR -->

<?php
if(isset($_POST['button'])){
                            
                            $nome_funcionario = $_GET["txtnome"];
                            $cpf_funcionario = $_GET["txtcpf"];
                            $pis_funcionario = $_GET["txtpis"];
                            $telefone_funcionario = $_GET["txttelefone"];;
                            $funcao_funcionario = $_GET["txtfuncao"];
                            $endereco_funcionario =$_GET["txtendereco"];
                            $admissao_funcionario = $_GET["dataademissao"];
                            $demissao_funcionario =$_GET["datademissao"];
                            $situacao_funcionario = $_GET["situacao"];
                            $email = $_GET["email"];
                            $fk_empresa = $_GET["nome_empresa"];
 

  //VERIFICAR SE O CPF JÁ ESTÁ CADASTRADO
  $query_verificar = "select * from tb_funcionarios where cpf_funcionario = '$cpf_funcionario' ";

  $result_verificar = mysqli_query($conexao, $query_verificar);
  $row_verificar = mysqli_num_rows($result_verificar);

  if($row_verificar > 0){
  echo "<script language='javascript'> window.alert('Número de Frota já Cadastrada!'); </script>";
  exit();

  }else{

$query = "INSERT into tb_funcionarios(nome_funcionario, cpf_funcionario, pis_funcionario, telefone_funcionario, funcao_funcionario, endereco_funcionario, admissao_funcionario, demissao_funcionario, situacao_funcionario, email, fk_empresa) VALUES ('$nome_funcionario', '$cpf_funcionario', '$pis_funcionario', '$telefone_funcionario', '$funcao_funcionario', '$endereco_funcionario', '$admissao_funcionario', '$demissao_funcionario', '$situacao_funcionario', '$email_funcionario', '$fk_empresa')";

$result = mysqli_query($conexao, $query);

if($result == ''){
  echo "<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar!'); </script>";
}else{
    echo "<script language='javascript'> window.alert('Salvo com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location='cadastrar_funcionarios.php'; </script>";
    }
  }
}
?>


<!--EXCLUIR -->
<?php
if (@$_GET['painel'] == 'deleta'){
  $id_funcionario = $_GET['id_funcionario'];
  $query = "DELETE FROM tb_funcionarios where id_funcionario = '$id_funcionario'";
  mysqli_query($conexao, $query);
  echo "<script language='javascript'> window.location='cadastrar_funcionarios.php'; </script>";
}
?>


<!--EDITAR -->
<?php
if (@$_GET['painel'] == 'edita'){  
  $id_funcionario = $_GET['id_funcionario'];
  $query = "select * from tb_funcionarios where id_funcionario = '$id_funcionario'";
  $result = mysqli_query($conexao, $query);

 while($res_1 = mysqli_fetch_array($result)){
                            
?>

      <!-- Modal -->
      <div id="modalEditar" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">

              <h4 class="modal-title">Editar Frotas</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
              <div class="form-group">
                <label for="frota">Número da Frota</label>
                <input type="text" class="form-control mr-2" name="txtfrota" id="txtfrota" placeholder="Número da Frota" value="<?php echo $res_1['numero_frota']; ?>" required>
              </div>
             
              <div class="form-group">
              <label for="Empresa">Empresa</label>

              <select class="form-control mr-2" id="nome_empresa" name="nome_empresa">
                  <?php
                  
                  $query = "SELECT * FROM tb_empresas ORDER BY nome_empresa asc";
                  $result = mysqli_query($conexao, $query);

                  if(count($result)){
                    while($res_2 = mysqli_fetch_array($result)){
                         ?>                                             
                    <option value="<?php echo $res_2['id_empresa']; ?>"><?php echo $res_2['nome_empresa']; ?></option> 
                         <?php      
                       }
                   }
                  ?>
              </select>
              

              <div class="form-group">
                <label for="Caminhão">Caminhão</label>

               <select class="form-control mr-2" id="caminhao" name="caminhao">
                  <?php
                  
                  $query = "SELECT * FROM tb_caminhoes ORDER BY placas_caminhao asc";
                  $result = mysqli_query($conexao, $query);

                  if(count($result)){
                    while($res_1 = mysqli_fetch_array($result)){
                         ?>                                             
                    <option value="<?php echo $res_1['id_caminhao']; ?>"><?php echo $res_1['placas_caminhao']; ?></option> 
                         <?php      
                       }
                   }
                  ?>
              </select>

              </div>
             
              <div class="form-group">
                <label for="carreta">Carreta</label>

              <select class="form-control mr-2" id="carreta" name="carreta">
                  <?php
                  
                  $query = "SELECT * FROM tb_carretas ORDER BY placas_carreta asc";
                  $result = mysqli_query($conexao, $query);

                  if(count($result)){
                    while($res_2 = mysqli_fetch_array($result)){
                         ?>                                             
                    <option value="<?php echo $res_2['id_carreta']; ?>"><?php echo $res_2['placas_carreta']; ?></option> 
                         <?php      
                       }
                   }
                  ?>
              </select>
              
            </div> 

            <div class="modal-footer">
               <button type="submit" class="btn btn-success mb-3" name="buttonEditar">Salvar </button>


                <button type="button" class="btn btn-danger mb-3" data-dismiss="modal">Cancelar </button>
            </form>
            </div>
          </div>
        </div>
      </div>    


 
<script>
      $("#modalEditar").appendTo("body").modal("show");
</script>


<!--Comando para editar os dados UPDATE -->
<?php
  if(isset($_POST['buttonEditar'])){
  $numero_frota = $_POST['txtfrota'];
  $id_empresa = $_POST['nome_empresa'];
  $id_caminhao = $_POST['caminhao'];
  $id_carreta = $_POST['carreta'];
                


    #if ($res_1['txtnummasc'] != $ig_numero){

       //VERIFICAR SE O NÚMERO JÁ ESTÁ CADASTRADO
   # $query_verificar = "select * from tb_igrejas where ig_numero = '$ig_numero' ";

   # $result_verificar = mysqli_query($conexao, $query_verificar);
   # $row_verificar = mysqli_num_rows($result_verificar);

   # if($row_verificar > 0){
   # echo "<script language='javascript'> window.alert('Número já Cadastrado!'); </script>";
   # exit();
    #  }

 # }

 

$query_editar = "UPDATE tb_frotas set id_frota = '$id_frota', id_empresa = '$id_empresa', id_caminhao = '$id_caminhao', id_carreta = '$id_carreta', where id_frota = '$id_frota' ";

$result_editar = mysqli_query($conexao, $query_editar);

if($result_editar == ''){
  echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
}else{
    echo "<script language='javascript'> window.alert('Editado com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location='cadastrar_frotas.php'; </script>";
    }

  }
  ?>

<?php }
}  ?>


<!--MASCARAS -->

<script type="text/javascript">
    $(document).ready(function(){
      $('#txtnummas').mask('00-0000');
      $('#txtnumascadastra').mask('00-0000');
      $('#txtnumasedita').mask('00-0000');
      });
    
</script>
