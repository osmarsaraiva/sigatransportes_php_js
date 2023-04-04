<?php
include('conexao.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8"/>
  <title>Documentos</title>


 
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
        <input name="txtpesquisarnumdoc" class="form-control mr-sm-2" type="search" placeholder="Buscar pelo número do documento" aria-label="Pesquisar">
        <button name="buttonPesquisarNumdoc" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
      </form>

      <form class="form-inline my-2 my-lg-0">
        <input name="txtpesquisarnomedoc" class="form-control mr-sm-2" type="search" placeholder="Buscar pelo nome do docuemento" aria-label="Pesquisar">
        <button name="buttonPesquisarNomeDoc" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
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
              <h4 class="card-title"> Cadastro de Documentos</h4>
            </div>

            <div class="card-body">
              <div class="table-responsive">

                <!--LISTAR TODOS OS DESTINOS -->

                <?php


                if (isset($_GET['buttonPesquisarNumdoc']) and $_GET['txtpesquisarnumdoc'] != '') {
                  $num_doc = $_GET['txtpesquisarnumdoc'] . '%';
                  $query = "select * from tb_documentos where num_doc LIKE '$num_doc' order by num_doc asc";

                } else if (isset($_GET['buttonPesquisarNomeDoc']) and $_GET['txtpesquisarnomedoc'] != '') {
                  $nome_doc = $_GET['txtpesquisarnomedoc'];
                  $query = "select * from tb_documentos where nome_doc= '$nome_doc'  order by nome_doc asc";

                } else {
                  $query = "select * from tb_documentos order by id_doc asc";
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
                        Número documento/fiscal
                      </th>
                      <th>
                        Nome do documento/fiscal
                      </th>
                     
                      </th>
                      <th>
                        Ações
                      </th>
                    </thead>
                    <tbody>

                      <?php

                    while ($res_1 = mysqli_fetch_array($result)) {
                        $num_doc = $res_1["num_doc"];
                        $nome_doc = $res_1["nome_doc"];
                        $id_doc = $res_1["id_doc"];

                      //$data_compra_br = implode('/', array_reverse(explode ('-', $data_compra)));
                      //$data_inicio_br = implode('/', array_reverse(explode ('-', $data_inicio)));
                     // $data_venda_br = implode('/', array_reverse(explode ('-', $data_venda)));
                     

                      ?>

                        <tr>

                          <td><?php echo $num_doc; ?></td>
                          <td><?php echo $nome_doc; ?></td>
                       
                       

                          <td>
                            <a class="btn btn-info" title="Editar" href="cadastrar_documentos.php?painel=edita&id_doc=<?php echo $id_doc; ?>"><i class="fa fa-pencil-square-o"></i></a>

                            <a class="btn btn-danger" title="Excluir" href="cadastrar_documentos.php?painel=deleta&id_doc=<?php echo $id_doc; ?>"><i class="fa fa-minus-square"></i></a>

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

              <h4 class="modal-title">Documentos/Fiscais</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
                <div class="form-group">
                  <label for="num_doc">Informe o número do documento</label>
                  <input type="text" class="form-control mr-2" name="txtnumdoc" placeholder="Informe o número do documento" value="" required>
                </div>
                <div class="form-group">
                  <label for="nome_doc">Informe o nome do documento</label>
                  <input type="text" class="form-control mr-2" name="txtnomedoc" id="txtnomedoc" placeholder="nome do documento" value="" required>
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
  $num_doc = $_POST['txtnumdoc'];
  $nome_doc = $_POST['txtnomedoc'];
  


  //VERIFICAR SE O ESTADO JÁ ESTÁ CADASTRADO
  $query_verificar = "select * from tb_documentos where num_doc = '$num_doc' AND nome_doc = '$nome_doc' ";
  $result_verificar = mysqli_query($conexao, $query_verificar);
  $row_verificar = mysqli_num_rows($result_verificar);

  if ($row_verificar > 0) {
    echo "<script language='javascript'> window.alert('Documento já Cadastrado!'); </script>";
    exit();
  } else {

    $query = "INSERT into tb_documentos (num_doc, nome_doc) VALUES ('$num_doc', '$nome_doc')";

    $result = mysqli_query($conexao, $query);

    if ($result == '') {
      echo "<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar!'); </script>";
    } else {
      echo "<script language='javascript'> window.alert('Salvo com Sucesso!'); </script>";
      echo "<script language='javascript'> window.location='cadastrar_documentos.php'; </script>";
    }
  }
}
?>


<!--EXCLUIR -->
<?php
if (@$_GET['painel'] == 'deleta') { //se o método GET de nome painel tem o valor deleta
  $id_doc = $_GET['id_doc'];
  $query = "DELETE FROM tb_documentos where id_doc = '$id_doc'";
  mysqli_query($conexao, $query);
  echo "<script language='javascript'> window.location='cadastrar_documentos.php'; </script>";
}
?>



<!--EDITAR -->
<?php
if (@$_GET['painel'] == 'edita') {
  $id_doc = $_GET['id_doc'];
  $query = "select * from tb_documentos where id_doc = '$id_doc'";
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
                  <label for="num_doc">Informe o número do documento</label>
                  <input type="text" class="form-control mr-2" name="txtnumdoc" placeholder="Informe o número do documento" value="<?php echo $res_1['num_doc']; ?>" required>
                </div>
                <div class="form-group">
                  <label for="nome_doc">Informe o nome do documento</label>
                  <input type="text" class="form-control mr-2" name="txtnomedoc" id="txtnomedoc" placeholder="Nome do documento" value="<?php echo $res_1['nome_doc']; ?>" required>
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
     $num_doc = $_POST['txtnumdoc'];
     $nome_doc = $_POST['txtnomedoc'];
 

      if (($res_1['nome_doc'] != $nome_doc) || ($res_1['num_doc'] != $num_doc)){

      //VERIFICAR SE os dados JÁ ESTÃO CADASTRADOs
       $query_verificar = "select * from tb_documentos where nome_doc = '$nome_doc' AND num_doc = '$num_doc'";

       $result_verificar = mysqli_query($conexao, $query_verificar);
       $row_verificar = mysqli_num_rows($result_verificar);

      if ($row_verificar > 0) {
        echo "<script language='javascript'> window.alert('Documento já Cadastrado!'); </script>";
               exit();
             }
      }

    $query_editar = "UPDATE tb_documentos set num_doc = '$num_doc', nome_doc = '$nome_doc' where id_doc = '$id_doc' ";

      $result_editar = mysqli_query($conexao, $query_editar);

      if ($result_editar == '') {
        echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
      } else {
        echo "<script language='javascript'> window.alert('Editado com Sucesso!'); </script>";
        echo "<script language='javascript'> window.location='cadastrar_documentos.php'; </script>";
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

