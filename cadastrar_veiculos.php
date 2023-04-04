<?php
include('conexao.php');
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8"/>
  <title>Veículos</title>


 
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
        <input name="txtpesquisarmarca" class="form-control mr-sm-2" type="search" placeholder="Buscar pela marca" aria-label="Pesquisar">
        <button name="buttonPesquisarmarca" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
      </form>

      <form class="form-inline my-2 my-lg-0">
        <input name="txtpesquisarplaca" class="form-control mr-sm-2" type="search" placeholder="Buscar pela placa" aria-label="Pesquisar">
        <button name="buttonPesquisarplaca" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
  </nav>





  <div class="container">




    <br>


    <div class="row">
      <div class="col-sm-12">
        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modalExemplo">Inserir Novo Veículo</button>

      </div>


    </div>


    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Cadastro de Veículos</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                <!--LISTAR TODOS AS Veículos -->

                <?php


                if (isset($_GET['buttonPesquisarplaca']) and $_GET['txtpesquisarplaca'] != '') {
                  $placas = $_GET['txtpesquisarplaca'] . '%';
                  $query = "select * from tb_veiculos where placas LIKE '$placas'  order by placas asc";
                } else if (isset($_GET['buttonPesquisarmarca']) and $_GET['txtpesquisarmarca'] != '') {
                  $marca_veiculo = $_GET['txtpesquisarmarca'];
                  $query = "select * from tb_veiculos where marca_veiculo = '$marca_veiculo'  order by marca_veiculo asc";
                } else {
                  $query = "select * from tb_veiculos order by id_veiculo asc";
                }


                $result = mysqli_query($conexao, $query);
                //$dado = mysqli_fetch_array($result);
                $row = mysqli_num_rows($result);

                if ($row == '') {

                  echo "<h3> Não existem dados cadastrados no banco </h3>";
                } else {

                ?>



                  <table class="table">
                    <thead class=" text-primary">

                      <th>
                        Marca Veículo
                      </th>
                      <th>
                        Modelo
                      </th>
                      <th>
                       Placas
                      </th>
                      <th>
                        Data de compra
                      </th>
                      </th>
                      <th>
                       Data de venda
                      </th>
                      <th>
                       Empresa
                      </th>
                    
                      </th>
                      <th>
                        Ações
                      </th>
                    </thead>
                    <tbody>

                      <?php

                      while ($res_1 = mysqli_fetch_array($result)) {
                        $marca_veiculo = $res_1["marca_veiculo"];
                        $modelo = $res_1["modelo"];
                        $placas = $res_1["placas"];
                        $data_compra = $res_1["data_compra"];
                        $data_venda = $res_1["data_venda"];
                        $empresa = $res_1["empresa"];
                        $id_veiculo = $res_1["id_veiculo"];

                      $data_compra_br = implode('/', array_reverse(explode ('-', $data_compra)));
                      #$data_inicio_br = implode('/', array_reverse(explode ('-', $data_inicio)));
                      $data_venda_br = implode('/', array_reverse(explode ('-', $data_venda)));
                     

                      ?>

                        <tr>

                          <td><?php echo $marca_veiculo; ?></td>
                          <td><?php echo $modelo; ?></td>
                          <td><?php echo $placas; ?></td>
                          <td><?php echo $data_compra_br; ?></td>
                          <td><?php echo $data_venda_br; ?></td>
                          <td><?php echo $empresa; ?></td>
                  
                       

                          <td>
                            <a class="btn btn-info" title="Editar" href="cadastrar_veiculos.php?painel=edita&id_veiculo=<?php echo $id_veiculo; ?>"><i class="fa fa-pencil-square-o"></i></a>

                            <a class="btn btn-danger" title="Excluir" href="cadastrar_veiculos.php?painel=deleta&id_veiculo=<?php echo $id_veiculo; ?>"><i class="fa fa-minus-square"></i></a>

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

              <h4 class="modal-title">Veiculos</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
                <div class="form-group">
                  <label for="marca">Marca</label>
                  <input type="text" class="form-control mr-2" name="txtmarca" placeholder="Marca" value="" required>
                </div>
                <div class="form-group">
                  <label for="modelo">Modelo</label>
                  <input type="text" class="form-control mr-2" name="txtmodelo" id="txtmodelo" placeholder="Modelo" value="" required>
                </div>

                <div class="form-group">
                  <label for="placas">Placas</label>
                  <input type="txt" class="form-control mr-2" name="txtplacas" id="txtplacas" placeholder="Placas" value="" required>
                </div>


                <div class="form-group">
                  <label for="data_compra">Data da compra</label>
                  <input type="date" class="form-control mr-2" name="txtdatacompra" id="txtdatacompra" placeholder="Data de Compra">
                </div>

                <div class="form-group">
                  <label for="data_venda">Data da venda</label>
                  <input type="date" class="form-control mr-2" name="txtdatavenda" id="txtdatavenda" placeholder="Data de Venda">
                </div>

              <label for="Empresa">Empresa</label>

              <select class="form-control mr-2" id="nome_empresa" name="nome_empresa">
                  <?php
                  
                  $query = "SELECT * FROM tb_empresas ORDER BY nome_empresa asc";
                  $result = mysqli_query($conexao, $query);

                  if(count($result)){
                    while($res_2 = mysqli_fetch_array($result)){
                         ?>                                             
                    <option value="<?php echo $res_2['nome_empresa']; ?>"><?php echo $res_2['nome_empresa']; ?></option> 
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
if (isset($_POST['button'])) { //se vier o post
  $marca_veiculo = $_POST['txtmarca'];
  $modelo = $_POST['txtmodelo'];
  $placas = $_POST['txtplacas'];
  $data_compra = $_POST['txtdatacompra'];
  $data_venda = $_POST['txtdatavenda'];
  $empresa = $_POST['nome_empresa'];
 


  //VERIFICAR SE A PLACA JÁ ESTÁ CADASTRADA
  $query_verificar = "select * from tb_veiculos where placas = '$placas' ";
  $result_verificar = mysqli_query($conexao, $query_verificar);
  $row_verificar = mysqli_num_rows($result_verificar);

  if ($row_verificar > 0) {
    echo "<script language='javascript'> window.alert('PLACAS já Cadastrada!'); </script>";
    exit();
  } else {

    $query = "INSERT into tb_veiculos (marca_veiculo, modelo, placas, data_compra, data_venda, empresa) VALUES ('$marca_veiculo', '$modelo', '$placas', '$data_compra', '$data_venda', '$empresa')";

    $result = mysqli_query($conexao, $query);

    if ($result == '') {
      echo "<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar!'); </script>";
    } else {
      echo "<script language='javascript'> window.alert('Salvo com Sucesso!'); </script>";
      echo "<script language='javascript'> window.location='cadastrar_veiculos.php'; </script>";
    }
  }
}
?>


<!--EXCLUIR -->
<?php
if (@$_GET['painel'] == 'deleta') { //se o método GET de nome painel tem o valor deleta
  $id_veiculo = $_GET['id_veiculo'];
  $query = "DELETE FROM tb_veiculos where id_veiculo = '$id_veiculo'";
  mysqli_query($conexao, $query);
  echo "<script language='javascript'> window.location='cadastrar_veiculos.php'; </script>";
}
?>



<!--EDITAR -->
<?php
if (@$_GET['painel'] == 'edita') {
  $id_veiculo = $_GET['id_veiculo'];
  $query = "select * from tb_veiculos where id_veiculo = '$id_veiculo'";
  $result = mysqli_query($conexao, $query);

  while ($res_1 = mysqli_fetch_array($result)) {


?>

    <!-- Modal  para editar cadastro-->
     <div id="modalEditar" class="modal fade" role="dialog">
      <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">

              <h4 class="modal-title">veiculos</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <form method="POST" action="">
                <div class="form-group">
                  <label for="marca">Marca</label>
                  <input type="text" class="form-control mr-2" name="txtmarca" placeholder="Marca" value="<?php echo $res_1['marca_veiculo']; ?>" required>
                </div>
                <div class="form-group">
                  <label for="modelo">Modelo</label>
                  <input type="text" class="form-control mr-2" name="txtmodelo" id="txtmodelo" placeholder="Modelo" value="<?php echo $res_1['modelo']; ?>" required>
                </div>

                <div class="form-group">
                  <label for="placas">Placas</label>
                  <input type="txt" class="form-control mr-2" name="txtplacas" id="txtplacas" placeholder="Placas" value="<?php echo $res_1['placas']; ?>" required>
                </div>


                <div class="form-group">
                  <label for="data_compra">Data da compra</label>
                  <input type="date" class="form-control mr-2" name="txtdatacompra" id="txtdatacompra" placeholder="Data de Compra" value="<?php echo $res_1['data_compra']; ?>">
                </div>

                  <div class="form-group">
                  <label for="data_compra">Data da venda</label>
                  <input type="date" class="form-control mr-2" name="txtdatavenda" id="txtdatavenda" placeholder="Data de Venda" value="<?php echo $res_1['data_venda']; ?>">
                </div>




              <label for="Empresa">Empresa</label>

              <select class="form-control mr-2" id="nome_empresa" name="nome_empresa">
                  <?php
                  
                  $query = "SELECT * FROM tb_empresas ORDER BY nome_empresa asc";
                  $result = mysqli_query($conexao, $query);

                  if(count($result)){
                    while($res_2 = mysqli_fetch_array($result)){
                         ?>                                             
                    <option value="<?php echo $res_2['nome_empresa']; ?>"><?php echo $res_2['nome_empresa']; ?></option> 
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
      $("#modalEditar").modal("show");
    </script>


    <!--Comando para editar os dados UPDATE -->
    <?php
    if (isset($_POST['buttonEditar'])) {
        $marca_veiculo = $_POST['txtmarca'];
        $modelo = $_POST['txtmodelo'];
        $placas = $_POST['txtplacas'];
        $data_compra = $_POST['txtdatacompra'];
        $data_venda = $_POST['txtdatavenda'];
        $empresa = $_POST['nome_empresa'];

    

      if ($res_1['placas_veiculo'] != $placas_veiculo) {

      //VERIFICAR SE O placas JÁ ESTÁ CADASTRADO
       $query_verificar = "select * from tb_veiculos where placas_veiculo = '$placas_veiculo' ";

       $result_verificar = mysqli_query($conexao, $query_verificar);
       $row_verificar = mysqli_num_rows($result_verificar);

      if ($row_verificar > 0) {
        echo "<script language='javascript'> window.alert('Placas já Cadastrada!'); </script>";
               exit();
             }
      }

    $query_editar = "UPDATE tb_veiculos set marca_veiculo = '$marca_veiculo', placas = '$placas', data_compra = '$data_compra', data_venda = '$data_venda', empresa = '$empresa' where id_veiculo = '$id_veiculo' ";

      $result_editar = mysqli_query($conexao, $query_editar);

      if ($result_editar == '') {
        echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
      } else {
        echo "<script language='javascript'> window.alert('Editado com Sucesso!'); </script>";
        echo "<script language='javascript'> window.location='cadastrar_veiculos.php'; </script>";
      }
    }
    ?>


<?php }
}  ?>


<!--MASCARAS -->

<script type="text/javascript">
  $(document).ready(function() {
    $('#txtcnpj1').mask('00.000.000/0000-00');
    $('#txttelefone').mask('(00) 00000-0000');
    
  });
</script>

