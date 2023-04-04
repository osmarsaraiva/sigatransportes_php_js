<?php
include('conexao.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8"/>
  <title>Destinos</title>



 
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
        <input name="txtpesquisardestino" class="form-control mr-sm-2" type="search" placeholder="Buscar pelo Destino" aria-label="Pesquisar">
        <button name="buttonPesquisarDestino" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
      </form>

      <form class="form-inline my-2 my-lg-0">
        <input name="txtpesquisarOrigem" class="form-control mr-sm-2" type="search" placeholder="Buscar pela origem" aria-label="Pesquisar">
        <button name="buttonPesquisarOrigem" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
  </nav>





  <div class="container">




    <br>


    <div class="row">
      <div class="col-sm-12">
        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modalExemplo">Inserir Novo Destino </button>

      </div>


    </div>


    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Cadastro de Destinos</h4>
            </div>

            <div class="card-body">
              <div class="table-responsive">

                <!--LISTAR TODOS OS DESTINOS -->

                <?php


                if (isset($_GET['buttonPesquisarDestino']) and $_GET['txtpesquisardestino'] != '') {
                  $destino = $_GET['txtpesquisardestino'] . '%';
                  $query = "select * from tb_destinos where destino LIKE '$destino'  order by destino asc";

                } else if (isset($_GET['buttonPesquisarOrigem']) and $_GET['txtpesquisarOrigem'] != '') {
                  $origem = $_GET['txtpesquisarOrigem'];
                  $query = "select * from tb_destinos where origem = '$origem'  order by origem asc";

                } else {
                  $query = "select * from tb_destinos order by id_destino asc";
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
                        Nome da Origem
                      </th>
                      <th>
                        Nome do Destino
                      </th>
                     
                      </th>
                      <th>
                        Ações
                      </th>
                    </thead>
                    <tbody>

                      <?php

                      while ($res_1 = mysqli_fetch_array($result)) {
                        $origem = $res_1["origem"];
                        $destino = $res_1["destino"];
                        $id_destino = $res_1["id_destino"];

                      //$data_compra_br = implode('/', array_reverse(explode ('-', $data_compra)));
                      //$data_inicio_br = implode('/', array_reverse(explode ('-', $data_inicio)));
                     // $data_venda_br = implode('/', array_reverse(explode ('-', $data_venda)));
                     

                      ?>

                        <tr>

                          <td><?php echo $origem; ?></td>
                          <td><?php echo $destino; ?></td>
                       
                       

                          <td>
                            <a class="btn btn-info" title="Editar" href="cadastrar_destinos.php?painel=edita&id_destino=<?php echo $id_destino; ?>"><i class="fa fa-pencil-square-o"></i></a>

                            <a class="btn btn-danger" title="Excluir" href="cadastrar_destinos.php?painel=deleta&id_destino=<?php echo $id_destino; ?>"><i class="fa fa-minus-square"></i></a>

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

              <h4 class="modal-title">Destinos</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
                <div class="form-group">
                  <label for="origem">Informe a Origem</label>
                  <input type="text" class="form-control mr-2" name="txtnomeorigem" placeholder="Informe a Origem" value="" required>
                </div>
                <div class="form-group">
                  <label for="destino">Informe o Destino</label>
                  <input type="text" class="form-control mr-2" name="txtnomedestino" id="txtnomedestino" placeholder="Informe o Destino" value="" required>
                </div>

                

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
  $origem= $_POST['txtnomeorigem'];
  $destino = $_POST['txtnomedestino'];
  
  //VERIFICAR SE O DESTINO JÁ ESTÁ CADASTRADO
  $query_verificar = "select * from tb_destinos where destino = '$destino' and origem = '$origem' ";
  $result_verificar = mysqli_query($conexao, $query_verificar);
  $row_verificar = mysqli_num_rows($result_verificar);

if ($row_verificar > 0) {
    echo "<script language='javascript'> window.alert('Destino e/ou origem já Cadastrado(s)!'); </script>";
    exit();


}else {

    $query = "INSERT into tb_destinos (origem, destino) VALUES ('$origem', '$destino')";

    $result = mysqli_query($conexao, $query);

    if ($result == '') {
      echo "<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar!'); </script>";
    } else {
      echo "<script language='javascript'> window.alert('Salvo com Sucesso!'); </script>";
      echo "<script language='javascript'> window.location='cadastrar_destinos.php'; </script>";
    }
  }
}

?>


<!--EXCLUIR -->
<?php
if (@$_GET['painel'] == 'deleta') { //se o método GET de nome painel tem o valor deleta
  $id_destino = $_GET['id_destino'];
  $query = "DELETE FROM tb_destinos where id_destino = '$id_destino'";
  mysqli_query($conexao, $query);
  echo "<script language='javascript'> window.location='cadastrar_destinos.php'; </script>";
}
?>



<!--EDITAR -->
<?php
if (@$_GET['painel'] == 'edita') {
  $id_destino = $_GET['id_destino'];
  $query = "select * from tb_destinos where id_destino = '$id_destino'";
  $result = mysqli_query($conexao, $query);

  while ($res_1 = mysqli_fetch_array($result)) {


?>

    <!-- Modal  para editar cadastro-->
     <div id="modalEditar" class="modal fade" role="dialog">
      <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">

              <h4 class="modal-title">Destinos</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
                <div class="form-group">
                  <label for="origem">Informe a origem</label>
                  <input type="text" class="form-control mr-2" name="txtnomeorigem" placeholder="Informe a origem" value="<?php echo $res_1['origem']; ?>" required>
                </div>
                <div class="form-group">
                  <label for="destino">Informe o destino</label>
                  <input type="text" class="form-control mr-2" name="txtnomedestino" id="txtnomedestino" placeholder="Informe o destino" value="<?php echo $res_1['destino']; ?>" required>
                </div>

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
      $origem = $_POST['txtnomeorigem'];
      $destino = $_POST['txtnomedestino'];
 

      #if ($res_1['destino'] != $destino) {

      //VERIFICAR SE O placas JÁ ESTÁ CADASTRADO
      # $query_verificar = "select * from tb_destinos where nome_destino = '$nome_destino' ";

      # $result_verificar = mysqli_query($conexao, $query_verificar);
      # $row_verificar = mysqli_num_rows($result_verificar);

     # if ($row_verificar > 0) {
     #   echo "<script language='javascript'> window.alert('Destino já Cadastrado!'); </script>";
     #          exit();
     #        }
     # }

    $query_editar = "UPDATE tb_destinos set origem = '$origem', destino = '$destino' where id_destino = '$id_destino' ";

      $result_editar = mysqli_query($conexao, $query_editar);

      if ($result_editar == '') {
        echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
      } else {
        echo "<script language='javascript'> window.alert('Editado com Sucesso!'); </script>";
        echo "<script language='javascript'> window.location='cadastrar_destinos.php'; </script>";
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

