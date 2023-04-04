<?php
include('conexao.php');
?>

<!DOCTYPE html>
<meta charset="utf-8">
<html>

<head>
  <title>Clientes</title>


 
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
        <input name="txtpesquisarcnpj" id="txtcnpj1" class="form-control mr-sm-2" type="search" placeholder="Buscar pelo CNPJ" aria-label="Pesquisar">
        <button name="buttonPesquisarCNPJ" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
      </form>

      <form class="form-inline my-2 my-lg-0">
        <input name="txtpesquisar" class="form-control mr-sm-2" type="search" placeholder="Buscar pelo nome do cliente" aria-label="Pesquisar">
        <button name="buttonPesquisar" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
  </nav>





  <div class="container">




    <br>


    <div class="row">
      <div class="col-sm-12">
        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modalExemplo">Inserir Novo Cliente </button>

      </div>


    </div>


    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"> Cadastro de Clientes</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                <!--LISTAR TODOS OS CLIENTES -->

                <?php


                if (isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != '') {
                  $nome_cliente = $_GET['txtpesquisar'] . '%';
                  $query = "select * from tb_clientes where nome_cliente LIKE '$nome_cliente'  order by nome_cliente asc";
                } else if (isset($_GET['buttonPesquisarCNPJ']) and $_GET['txtpesquisarcnpj'] != '') {
                  $cnpj_cliente = $_GET['txtpesquisarcnpj'];
                  $query = "select * from tb_clientes where cnpj_cliente = '$cnpj_cliente'  order by cnpj_cliente asc";
                } else {
                  $query = "select * from tb_clientes order by nome_cliente asc";
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
                        Nome do Cliente
                      </th>
                      <th>
                        Endereço
                      </th>
                      <th>
                        CNPJ
                      </th>
                      <th>
                        Telefone
                      </th>
                      </th>
                      <th>
                        Email
                      </th>
                      </th>
                      <th>
                        Ações
                      </th>
                    </thead>
                    <tbody>

                      <?php

                      while ($res_1 = mysqli_fetch_array($result)) {
                        $nome_cliente = $res_1["nome_cliente"];
                        $end_cliente = $res_1["end_cliente"];
                        $cnpj_cliente = $res_1["cnpj_cliente"];
                        $telefone_cliente = $res_1["telefone_cliente"];
                        $email_cliente = $res_1["email_cliente"];
                        $id_cliente = $res_1["id_cliente"];


                      ?>

                        <tr>

                          <td><?php echo $nome_cliente; ?></td>
                          <td><?php echo $end_cliente; ?></td>
                          <td><?php echo $cnpj_cliente; ?></td>
                          <td><?php echo $telefone_cliente; ?></td>
                          <td><?php echo $email_cliente; ?></td>

                          <td>
                            <a class="btn btn-info" title="Editar" href="cadastrar_clientes.php?painel=edita&id_cliente=<?php echo $id_cliente; ?>"><i class="fa fa-pencil-square-o"></i></a>

                            <a class="btn btn-danger" title="Excluir" href="cadastrar_clientes.php?painel=deleta&id_cliente=<?php echo $id_cliente; ?>"><i class="fa fa-minus-square"></i></a>

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

              <h4 class="modal-title">Clientes</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
                <div class="form-group">
                  <label for="nome_cliente">Nome do Cliente</label>
                  <input type="text" class="form-control mr-2" name="txtnome" placeholder="Nome" value="" required>
                </div>
                <div class="form-group">
                  <label for="endereco">Endereço</label>
                  <input type="text" class="form-control mr-2" name="txtendereco" id="txtendereco" placeholder="endereco" value="" required>
                </div>

                <div class="form-group">
                  <label for="cnpj">CNPJ</label>
                  <input type="text" class="form-control mr-2" name="txtcnpj1" id="txtcnpj1" placeholder="CNPJ" value="" required>
                </div>

                <div class="form-group">
                  <label for="Telefone">Telefone</label>
                  <input type="text" class="form-control mr-2" name="txttelefone" id="txttelefone" placeholder="Telefone" value="" required>
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control mr-2" name="txtemail" placeholder="Email" value="" required>
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
  $nome_cliente = $_POST['txtnome'];
  $end_cliente = $_POST['txtendereco'];
  $cnpj_cliente = $_POST['txtcnpj1'];
  $telefone_cliente = $_POST['txttelefone'];
  $email_cliente = $_POST['txtemail'];


  //VERIFICAR SE O CNPJ JÁ ESTÁ CADASTRADO
  $query_verificar = "select * from tb_clientes where cnpj_cliente = '$cnpj_cliente' ";
  $result_verificar = mysqli_query($conexao, $query_verificar);
  $row_verificar = mysqli_num_rows($result_verificar);

  if ($row_verificar > 0) {
    echo "<script language='javascript'> window.alert('CNPJ já Cadastrado!'); </script>";
    exit();
  } else {

    $query = "INSERT into tb_clientes (nome_cliente, end_cliente, cnpj_cliente, telefone_cliente, email_cliente) VALUES ('$nome_cliente', '$end_cliente', '$cnpj_cliente', '$telefone_cliente', '$email_cliente')";

    $result = mysqli_query($conexao, $query);

    if ($result == '') {
      echo "<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar!'); </script>";
    } else {
      echo "<script language='javascript'> window.alert('Salvo com Sucesso!'); </script>";
      echo "<script language='javascript'> window.location='cadastrar_clientes.php'; </script>";
    }
  }
}
?>


<!--EXCLUIR -->
<?php
if (@$_GET['painel'] == 'deleta') { //se o método GET de nome painel tem o valor deleta
  $id_cliente = $_GET['id_cliente'];
  $query = "DELETE FROM tb_clientes where id_cliente = '$id_cliente'";
  mysqli_query($conexao, $query);
  echo "<script language='javascript'> window.location='cadastrar_clientes.php'; </script>";
}
?>



<!--EDITAR -->
<?php
if (@$_GET['painel'] == 'edita') {
  $id_cliente = $_GET['id_cliente'];
  $query = "select * from tb_clientes where id_cliente = '$id_cliente'";
  $result = mysqli_query($conexao, $query);

  while ($res_1 = mysqli_fetch_array($result)) {


?>

    <!-- Modal  para editar cadastro-->
    <div id="modalEditar" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">

            <h4 class="modal-title">Clientes</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">
              <div class="form-group">
                <label for="nome">Nome do Cliente</label>
                <input type="text" class="form-control mr-2" name="txtnome" placeholder="Nome" value="<?php echo $res_1['nome_cliente']; ?>" required>
              </div>
              <div class="form-group">
                <label for="endereco">Endereço</label>
                <input type="text" class="form-control mr-2" name="txtendereco" placeholder="Endereço" value="<?php echo $res_1['end_cliente']; ?>" required>
              </div>
              <div class="form-group">
                <label for="cnpj">CNPJ</label>
                <input type="text" class="form-control mr-2" name="txtcnpj1" id="txtcnpj1" placeholder="cnpj" value="<?php echo $res_1['cnpj_cliente']; ?>" required>

              </div>
              <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control mr-2" name="txttelefone" id="txttelefone" placeholder="Telefone" value="<?php echo $res_1['telefone_cliente']; ?>" required>

              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control mr-2" name="txtemail" placeholder="Email" value="<?php echo $res_1['email_cliente']; ?>" required>
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
      $nome_cliente = $_POST['txtnome'];
      $end_cliente = $_POST['txtendereco'];
      $cnpj_cliente = $_POST['txtcnpj1'];
      $telefone_cliente = $_POST['txttelefone'];
      $email_cliente = $_POST['txtemail'];


      if ($res_1['cnpj_cliente'] != $cnpj_cliente) {

        //VERIFICAR SE O CNPJ JÁ ESTÁ CADASTRADO
        $query_verificar = "select * from tb_clientes where cnpj_cliente = '$cnpj_cliente' ";

        $result_verificar = mysqli_query($conexao, $query_verificar);
        $row_verificar = mysqli_num_rows($result_verificar);

        if ($row_verificar > 0) {
          echo "<script language='javascript'> window.alert('CNPJ já Cadastrado!'); </script>";
          exit();
        }
      }

      $query_editar = "UPDATE tb_clientes set nome_cliente = '$nome_cliente', telefone_cliente = '$telefone_cliente', end_cliente = '$end_cliente', email_cliente = '$email_cliente', cnpj_cliente = '$cnpj_cliente' where id_cliente = '$id_cliente' ";

      $result_editar = mysqli_query($conexao, $query_editar);

      if ($result_editar == '') {
        echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
      } else {
        echo "<script language='javascript'> window.alert('Editado com Sucesso!'); </script>";
        echo "<script language='javascript'> window.location='cadastrar_clientes.php'; </script>";
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

