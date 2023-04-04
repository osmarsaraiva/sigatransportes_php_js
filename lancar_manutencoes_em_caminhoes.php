<?php
include('conexao.php');
?>

<!DOCTYPE html>
<html>

<head>
  <title>Manutenções de Caminhões</title>


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
        <input name="txtpesquisarplaca" id="txtpesquisarplaca" class="form-control mr-sm-2" type="search" placeholder="Buscar pela Placa" aria-label="Pesquisar">
        <button name="buttonPesquisarPLACA" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
      </form>

      <form class="form-inline my-2 my-lg-0">
        <input name="txtpesquisarfornecedor" class="form-control mr-sm-2" type="search" placeholder="Buscar pelo Fornecedor" aria-label="Pesquisar">
        <button name="buttonPesquisarFornecedor" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
  </nav>





  <div class="container">




    <br>


    <div class="row">
      <div class="col-sm-12">
        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modalExemplo">Inserir Nova Manutenção de Caminhão </button>

      </div>


    </div>


    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"> Lançar Manutenções em Caminhões</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                <!--LISTAR TODAS AS MANUTENÇÕES -->

                <?php


                if (isset($_GET['buttonPesquisarPLACA']) and $_GET['txtpesquisarplaca'] != '') {
                    $placas = $_GET['txtpesquisarplaca'].'%';

                    $query = "select l.id_manutencao, l.data_manut, l.fk_placas_caminhao, l.fk_id_doc, l.fk_id_empresa,
                    l.historico, l.fk_id_frota, l.km_atual, l.fk_id_fornecedor, l.fk_id_plano_contas, l.valor, l.tipo, l.situacao,
                    c.placas_caminhao, d.nome_doc, e.nome_empresa, fr.numero_frota, f.nome_fornecedor,
                    pl.nome_conta from lancar_manutencoes_caminhao as l INNER JOIN tb_caminhoes
                    as c ON l.fk_placas_caminhao = c.id_caminhao INNER JOIN
                    tb_documentos as d ON l.fk_id_doc = d.id_doc INNER JOIN tb_empresas as e ON
                    l.fk_id_empresa = e.id_empresa
                    INNER JOIN tb_frotas as fr ON l.fk_id_frota = fr.id_frota
                    INNER JOIN tb_fornecedores as f ON l.fk_id_fornecedor = f.id_fornecedor
                    INNER JOIN tb_plano_de_contas as pl ON l.fk_id_plano_contas = pl.id_plano_de_contas where
                    c.placas_caminhao LIKE '$placas' order by c.placas_caminhao asc";

                } else if (isset($_GET['buttonPesquisarFornecedor']) and $_GET['txtpesquisarfornecedor'] != '') {
                  $nome = $_GET['txtpesquisarfornecedor'] . '%';

                  $query = "select l.id_manutencao, l.data_manut, l.fk_placas_caminhao, l.fk_id_doc, l.fk_id_empresa,
                  l.historico, l.fk_id_frota, l.km_atual, l.fk_id_fornecedor, l.fk_id_plano_contas, l.valor, l.tipo, l.situacao,
                  c.placas_caminhao, d.nome_doc, e.nome_empresa, fr.numero_frota, f.nome_fornecedor,
                  pl.nome_conta from lancar_manutencoes_caminhao as l INNER JOIN tb_caminhoes
                  as c ON l.fk_placas_caminhao = c.id_caminhao INNER JOIN
                  tb_documentos as d ON l.fk_id_doc = d.id_doc INNER JOIN tb_empresas as e ON
                  l.fk_id_empresa = e.id_empresa
                  INNER JOIN tb_frotas as fr ON l.fk_id_frota = fr.id_frota
                  INNER JOIN tb_fornecedores as f ON l.fk_id_fornecedor = f.id_fornecedor
                  INNER JOIN tb_plano_de_contas as pl ON l.fk_id_plano_contas = pl.id_plano_de_contas where
                  f.nome_fornecedor LIKE '$nome' order by f.nome_fornecedor asc";

                } else {
                  $query = "select l.id_manutencao, l.data_manut, l.fk_placas_caminhao, l.fk_id_doc, l.fk_id_empresa,
                  l.historico, l.fk_id_frota, l.km_atual, l.fk_id_fornecedor, l.fk_id_plano_contas, l.valor, l.tipo, l.situacao,
                  c.placas_caminhao, d.nome_doc, e.nome_empresa, fr.numero_frota, f.nome_fornecedor,
                  pl.nome_conta from lancar_manutencoes_caminhao as l INNER JOIN tb_caminhoes
                  as c ON l.fk_placas_caminhao = c.id_caminhao INNER JOIN
                  tb_documentos as d ON l.fk_id_doc = d.id_doc INNER JOIN tb_empresas as e ON
                  l.fk_id_empresa = e.id_empresa
                  INNER JOIN tb_frotas as fr ON l.fk_id_frota = fr.id_frota
                  INNER JOIN tb_fornecedores as f ON l.fk_id_fornecedor = f.id_fornecedor
                  INNER JOIN tb_plano_de_contas as pl ON l.fk_id_plano_contas = pl.id_plano_de_contas where
                  l.fk_id_fornecedor";
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
                                Data
                              </th>
                              <th>
                                Placas
                              </th>
                              <th>
                                Documento
                              </th>
                              <th>
                              Empresa
                              </th>
                              <th>
                              Histórico
                              </th>
                              <th>
                              Frota
                              </th>
                              <th>
                               Km atual
                              </th>
                              <th>
                                Fornecedor
                              </th>
                              <th>
                                Nome da conta
                              </th>
                              <th>
                                Valor
                              </th>
                              <th>
                                Tipo (Entrada/Saída)
                              </th>
                              <th>
                                Situação de pagamento
                              </th>
                              </th>
                              <th>
                                Ações
                              </th>
                            </thead>
                            <tbody>


                      <?php

                      while ($res_1 = mysqli_fetch_array($result)) {
                        $data = $res_1["data_manut"];
                        $placas = $res_1["placas_caminhao"];//chave
                        $documento = $res_1["nome_doc"];//chave
                        $empresa = $res_1["nome_empresa"];//
                        $historico = $res_1["historico"];
                        $frota = $res_1["numero_frota"];//chave
                        $km_atual = $res_1["km_atual"];
                        $fornecedor = $res_1["nome_fornecedor"];//chave
                        $nome_conta = $res_1["nome_conta"];//chave
                        $valor = $res_1["valor"];
                        $tipo = $res_1["tipo"];
                        $situacao = $res_1["situacao"];
                        $id_manutencao = $res_1["id_manutencao"];

                        $data_br = implode('/', array_reverse(explode ('-', $data)));

                      ?>

                        <tr>
                        <td><?php echo $data_br; ?></td>
                        <td><?php echo $placas; ?></td>
                        <td><?php echo $documento; ?></td>
                        <td><?php echo $empresa; ?></td>
                        <td><?php echo $historico; ?></td>
                        <td><?php echo $frota; ?></td>
                        <td><?php echo $km_atual; ?></td>
                        <td><?php echo $fornecedor; ?></td>
                        <td><?php echo $nome_conta; ?></td>
                        <td><?php echo "R$ ".$valor; ?></td>
                        <td><?php echo $tipo; ?></td>
                        <td><?php echo $situacao; ?></td>
                        <td>
                            <a class="btn btn-info" title="Editar" href="lancar_manutencoes_em_caminhoes.php?painel=edita&id_manutencao=<?php echo $id_manutencao; ?>"><i class="fa fa-pencil-square-o"></i></a>

                            <a class="btn btn-danger" title="Excluir" href="lancar_manutencoes_em_caminhoes.php?painel=deleta&id_manutencao=<?php echo $id_manutencao; ?>"><i class="fa fa-minus-square"></i></a>

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

              <h4 class="modal-title">Lançar Manutenções</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
                <div class="form-group">
                  <label for="data">Data</label>
                  <input type="date" class="form-control mr-2" name="data" placeholder="data" required>
                </div>

                <div class="form-group">
                <label for="placas">Placas do caminhão</label>

                <select class="form-control mr-2" id="placas" name="placas">
                  <?php

                  $query = "SELECT * FROM tb_caminhoes ORDER BY marca_caminhao asc";
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
                <label for="contas">Tipo de documento</label>

                <select class="form-control mr-2" id="documento" name="documento">
                  <?php

                  $query = "SELECT * FROM tb_documentos ORDER BY nome_doc asc";
                  $result = mysqli_query($conexao, $query);

                  if(count($result)){
                    while($res_1 = mysqli_fetch_array($result)){
                         ?>
                    <option value="<?php echo $res_1['id_doc']; ?>"><?php echo $res_1['nome_doc']; ?></option>
                         <?php
                       }
                   }
                  ?>
                  </select>
                </div>

                <div class="form-group">
                <label for="empresa">Empresa</label>

                <select class="form-control mr-2" id="empresa" name="empresa">
                  <?php

                  $query = "SELECT * FROM tb_empresas ORDER BY nome_empresa asc";
                  $result = mysqli_query($conexao, $query);

                  if(count($result)){
                    while($res_1 = mysqli_fetch_array($result)){
                         ?>
                    <option value="<?php echo $res_1['id_empresa']; ?>"><?php echo $res_1['nome_empresa']; ?></option>
                         <?php
                       }
                   }
                  ?>
                  </select>
                </div>


                <div class="form-group">
                  <label for="historico">Histórico</label>
                  <input type="text" class="form-control mr-2" id="historico" name="historico" placeholder="Histórico" required>
                </div>

                <div class="form-group">
                <label for="frota">Frota</label>

                <select class="form-control mr-2" id="frota" name="frota">
                  <?php

                  $query = "SELECT * FROM tb_frotas ORDER BY numero_frota asc";
                  $result = mysqli_query($conexao, $query);

                  if(count($result)){
                    while($res_1 = mysqli_fetch_array($result)){
                         ?>
                    <option value="<?php echo $res_1['id_frota']; ?>"><?php echo $res_1['numero_frota']; ?></option>
                         <?php
                       }
                   }
                  ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="fornecedor">KM Atual</label>
                  <input type="text" class="form-control mr-2" name="km_atual" id= "km_atual" placeholder="km atual" required>
                </div>

                <div class="form-group">
                 <label for="fornecedor">Fornecedor</label>

                <select class="form-control mr-2" id="fornecedor" name="fornecedor">
                  <?php

                  $query = "SELECT * FROM tb_fornecedores ORDER BY nome_fornecedor asc";
                  $result = mysqli_query($conexao, $query);

                  if(count($result)){
                    while($res_1 = mysqli_fetch_array($result)){
                         ?>
                    <option value="<?php echo $res_1['id_fornecedor']; ?>"><?php echo $res_1['nome_fornecedor']; ?></option>
                         <?php
                       }
                   }
                  ?>
                  </select>
                </div>

              <div class="form-group">
               <label for="contas">Conta</label>

                <select class="form-control mr-2" id="contas" name="contas">
                  <?php

                  $query = "SELECT * FROM tb_plano_de_contas ORDER BY num_conta asc";
                  $result = mysqli_query($conexao, $query);

                  if(count($result)){
                    while($res_1 = mysqli_fetch_array($result)){
                         ?>
                    <option value="<?php echo $res_1['id_plano_de_contas']; ?>"><?php echo $res_1['nome_conta']; ?></option>
                         <?php
                       }
                   }
                  ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="Valor">Valor</label>
                  <input type="text" class="form-control mr-2" name="valor" id="valor" placeholder="Valor" required>
                </div>

                <div class="form-group">
                 <label for="obs">Tipo de lançamento</label>
                 <select class="form-control mr-2" id="tipo" name="tipo" required>
                       <option value="saida">Saída</option>
                       <option value="entrada">Entrada</option>

                </select>
              </div>


              <div class="form-group">
                 <label for="obs">Situação de pagamento</label>
                 <select class="form-control mr-2" id="situacao" name="situacao" required>
                       <option value="deve">deve</option>
                       <option value="pago">pago</option>

                </select>
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
if(isset($_POST['button'])){

                            $data = $_POST['data'];
                            $placas = $_POST['placas'];
                            $documento = $_POST['documento'];
                            $empresa = $_POST['empresa'];
                            $historico = $_POST['historico'];
                            $frota = $_POST['frota'];
                            $km_atual = $_POST['km_atual'];
                            $fornecedor = $_POST['fornecedor'];
                            $nome_conta = $_POST['contas'];
                            $valor = $_POST['valor'];
                            $tipo = $_POST['tipo'];
                            $situacao = $_POST['situacao'];



  //VERIFICAR SE O ID JÁ ESTÁ CADASTRADO
  //$query_verificar = "select * from tb_ where tb_igrejas = '$tb_igrejas' and verif_ig_doc = $verif_ig_doc";

  //$result_verificar = mysqli_query($conexao, $query_verificar);
  //$row_verificar = mysqli_num_rows($result_verificar);

//if($row_verificar > 0){
// echo "<script language='javascript'> window.alert('Verificação já Cadastrada!'); </script>";
//  exit();

  //}else{

$query = "INSERT into lancar_manutencoes_caminhao(data_manut, fk_placas_caminhao,
  fk_id_doc, fk_id_empresa, historico, fk_id_frota, km_atual, fk_id_fornecedor, fk_id_plano_contas,
  valor, tipo, situacao) VALUES ('$data', '$placas', '$documento', '$empresa', '$historico',
     '$frota', '$km_atual', '$fornecedor', '$nome_conta', '$valor', '$tipo', '$situacao')";

$result = mysqli_query($conexao, $query);

if($result == ''){
  echo "<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar!'); </script>";
}else{
    echo "<script language='javascript'> window.alert('Salvo com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location='lancar_manutencoes_em_caminhoes.php'; </script>";
    }
  }

?>


<!--EXCLUIR -->
<?php
if (@$_GET['painel'] == 'deleta'){
  $id_manutencao = $_GET['id_manutencao'];
  $query = "DELETE FROM lancar_manutencoes_caminhao where id_manutencao = '$id_manutencao'";
  mysqli_query($conexao, $query);
  echo "<script language='javascript'>window.location='lancar_manutencoes_em_caminhoes.php'; </script>";
}
?>


<!--EDITAR -->
<?php
if (@$_GET['painel'] == 'edita'){
  $id_manutencao = $_GET['id_manutencao'];
  $query = "select * FROM lancar_manutencoes_caminhao where id_manutencao = '$id_manutencao'";
  $result = mysqli_query($conexao, $query);

 while($res_1 = mysqli_fetch_array($result)){

?>

<!-- Modal -->
<div id="modalEditar" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">

        <h4 class="modal-title">Dar baixar em Notas em Aberto</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
          <div class="form-group">
            <label for="data">Data</label>
            <input type="date" class="form-control mr-2" name="data" placeholder="data"
            value="<?php echo $res_1['data_manut']; ?>" required>
          </div>


          <div class="form-group">
            <label for="historico">Histórico</label>
            <input type="text" class="form-control mr-2" id="historico" name="historico" placeholder="Histórico"
            value="<?php echo $res_1['historico']; ?>" required>
          </div>


        <div class="form-group">
           <label for="obs">Situação de pagamento</label>
           <select class="form-control mr-2" id="situacao" name="situacao"
           value="<?php echo $res_1['situacao']; ?>" required>
                 <option value="deve">deve</option>
                 <option value="pago">pago</option>

          </select>
        </div>


      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-success mb-3" name="buttonEditar">Dar baixa</button>


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
    $data = $_POST['data'];
    $historico = $_POST['historico'];
    $situacao = $_POST['situacao'];


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


$query_editar = "UPDATE lancar_manutencoes_caminhao set data_manut = '$data', historico = '$historico',
situacao = '$situacao' where id_manutencao = '$id_manutencao' ";

$result_editar = mysqli_query($conexao, $query_editar);

if($result_editar == ''){
  echo "<script language='javascript'> window.alert('Ocorreu um erro na Baixa!'); </script>";
}else{
    echo "<script language='javascript'> window.alert('Baixado com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location='lancar_manutencoes_em_caminhoes.php'; </script>";
    }

  }
  ?>

<?php }
}  ?>


<!--MASCARAS -->

<script type="text/javascript">
    $(document).ready(function(){
      $('#txtnummas').mask('00-0000');
      $('#valor').mask('#.##0,00', {reverse: true});

      });

</script>
