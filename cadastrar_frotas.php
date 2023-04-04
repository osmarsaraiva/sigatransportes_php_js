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
      <input name="txtpesquisarNome" id="txtpesquisarNome" class="form-control mr-sm-2" type="search" placeholder="Buscar por Frota" aria-label="Pesquisar">
      <button name="buttonPesquisarNome" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
    </form>

    <form class="form-inline my-2 my-lg-0 mr-5">
      <input name="txtEmpresa"  id="txtEmpresa" class="form-control mr-sm-2" type="search" placeholder="Buscar Empresa" aria-label="Pesquisar">
      <button name="buttonPesquisarEmpresa" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</nav>




  <div class="container">




    <br>


    <div class="row">
      <div class="col-sm-12">
        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modalExemplo">Inserir Nova Frota </button>

      </div>


    </div>


    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Cadastrar Frotas</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                <!--LISTAR TODOS AS Frotas -->

                <?php


                  if (isset($_GET['buttonPesquisarNome']) and $_GET['txtpesquisarNome'] != '') {

                  $nome_frota = $_GET['txtpesquisarNome'];

                  $query = "select f.id_frota, f.numero_frota, f.id_empresa, f.id_caminhao, f.id_carreta, e.nome_empresa, c.placas_caminhao, ct.placas_carreta from tb_frotas as f INNER JOIN tb_empresas as e ON f.id_empresa = e.id_empresa INNER JOIN tb_caminhoes as c ON f.id_caminhao = c.id_caminhao INNER JOIN tb_carretas as ct ON f.id_carreta = ct.id_carreta where f.numero_frota LIKE '$nome_frota' order by f.numero_frota asc";


                } else if (isset($_GET['buttonPesquisarEmpresa']) and $_GET['txtEmpresa'] != '') {
                 
                  $nome_empresa = $_GET['txtEmpresa'];

                  $query = "select f.id_frota, f.numero_frota, f.id_empresa, f.id_caminhao, f.id_carreta, e.nome_empresa, c.placas_caminhao, ct.placas_carreta from tb_frotas as f INNER JOIN tb_empresas as e ON f.id_empresa = e.id_empresa INNER JOIN tb_caminhoes as c ON f.id_caminhao = c.id_caminhao INNER JOIN tb_carretas as ct ON f.id_carreta = ct.id_carreta where e.nome_empresa LIKE '$nome_empresa' order by e.nome_empresa asc";
                
                } else {

                  $query = "select f.id_frota, f.numero_frota, f.id_empresa, f.id_caminhao, f.id_carreta, e.nome_empresa, c.placas_caminhao, ct.placas_carreta from tb_frotas as f INNER JOIN tb_empresas as e ON f.id_empresa = e.id_empresa INNER JOIN tb_caminhoes as c ON f.id_caminhao = c.id_caminhao INNER JOIN tb_carretas as ct ON f.id_carreta = ct.id_carreta where e.nome_empresa LIKE e.nome_empresa order by e.nome_empresa asc";

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
                            Numero Frota
                          </th>
                          <th>
                            Empresa
                          </th>
                           <th>
                            Caminhão
                          </th>
                          <th>
                            Carreta
                          </th>
                           </th>
                          <th>
                           Ações
                            </th>
                        </thead>
                        <tbody>
                         
                         <?php 

                          while($res_1 = mysqli_fetch_array($result)){
                            $numero_frota = $res_1["numero_frota"];
                            $id_empresa = $res_1["nome_empresa"];
                            $id_caminhao = $res_1["placas_caminhao"];
                            $id_carreta = $res_1["placas_carreta"];//o campo que quero da consulta JOIN  
                            $id_frota = $res_1["id_frota"];

                      //$data_compra_br = implode('/', array_reverse(explode ('-', $data_compra)));
                      //$data_inicio_br = implode('/', array_reverse(explode ('-', $data_inicio)));
                      //$data_venda_br = implode('/', array_reverse(explode ('-', $data_venda)));
                     

                      ?>

                        <tr>

                             <td><?php echo $numero_frota; ?></td> 
                             <td><?php echo $id_empresa; ?></td>
                             <td><?php echo $id_caminhao; ?></td>
                             <td><?php echo $id_carreta; ?></td>
                            
                       

                          <td>
                            <a class="btn btn-info" title="Editar" href="cadastrar_frotas.php?painel=edita&id_frota=<?php echo $id_frota; ?>"><i class="fa fa-pencil-square-o"></i></a>

                            <a class="btn btn-danger" title="Excluir" href="cadastrar_frotas.php?painel=deleta&id_frota=<?php echo $id_frota; ?>"><i class="fa fa-minus-square"></i></a>

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

              <h4 class="modal-title">Cadastrar Frotas</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
              <div class="form-group">
                <label for="frota">Número da Frota</label>
                <input type="text" class="form-control mr-2" name="txtfrota" id="txtfrota" placeholder="Número da Frota" required>
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
  $numero_frota = $_POST['txtfrota'];
  $id_empresa = $_POST['nome_empresa'];
  $id_caminhao = $_POST['caminhao'];
  $id_carreta = $_POST['carreta'];
 

  //VERIFICAR SE O CPF JÁ ESTÁ CADASTRADO
  $query_verificar = "select * from tb_frotas where numero_frota = '$numero_frota' ";

  $result_verificar = mysqli_query($conexao, $query_verificar);
  $row_verificar = mysqli_num_rows($result_verificar);

  if($row_verificar > 0){
  echo "<script language='javascript'> window.alert('Número de Frota já Cadastrada!'); </script>";
  exit();

  }else{

$query = "INSERT into tb_frotas(numero_frota, id_empresa, id_caminhao, id_carreta) VALUES ('$numero_frota', '$id_empresa', '$id_caminhao', '$id_carreta')";

$result = mysqli_query($conexao, $query);

if($result == ''){
  echo "<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar!'); </script>";
}else{
    echo "<script language='javascript'> window.alert('Salvo com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location='cadastrar_frotas.php'; </script>";
    }
  }
}
?>


<!--EXCLUIR -->
<?php
if (@$_GET['painel'] == 'deleta'){
  $id_frota = $_GET['id_frota'];
  $query = "DELETE FROM tb_frotas where id_frota = '$id_frota'";
  mysqli_query($conexao, $query);
  echo "<script language='javascript'> window.location='cadastrar_frotas.php'; </script>";
}
?>


<!--EDITAR -->
<?php
if (@$_GET['painel'] == 'edita'){  
  $id_frota = $_GET['id_frota'];
  $query = "select * from tb_frotas where id_frota = '$id_frota'";
  $result = mysqli_query($conexao, $query);

 $exibenoform = mysqli_fetch_array($result);
 $empresaSelecionada = mysqli_query("select * from tb_frotas where id = '".$exibenoform["id_frota"]."'"); //Busco o dado que foi cadastrada no Registro atual
 $empselecionada = mysqli_fetch_array($empresaSelecionada); 

}             
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
                <label for="Caminhão">Empresa</label>

               <select class="form-control mr-2" id="empresa" name="empresa">
                  <?php
                  while ($rest_1 = mysql_fetch_array($result)){
                  if ($result["id_empresa"]==$empselecionada["id_empresa"]){
                  $selecionada = 'select="selected"';
                  }
                  echo '<option value="'.$res_1["id_empresa"].' $selecionada">'.$rest_1["empresa"].'</option>'
                  
                
                  ?>

              </select>

              </div>

        
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
?>


<!--MASCARAS -->

<script type="text/javascript">
    $(document).ready(function(){
      $('#txtnummas').mask('00-0000');
      $('#txtnumascadastra').mask('00-0000');
      $('#txtnumasedita').mask('00-0000');
      });
    
</script>
