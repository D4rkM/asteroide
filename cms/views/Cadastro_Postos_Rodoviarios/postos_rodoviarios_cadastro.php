
<?php
  require_once("../../controllers/postos_rodoviarios_controller.php");
  require_once("../../models/postos_rodoviarios_class.php");
?>
<form class="frmCadDuvida" method="post" action="router.php?controller=postos_rodoviarios&modo=novo" enctype="multipart/form-data">
  <div class="cadastro_rodoviarios">
    <div class="text_duvida">Nome do posto</div>
    <input class="box_duvida" type="text" name="nome">
    <!--Botão para selecionar a foto-->
    <div class="input-foto">
      <input id="foto" class="botao_foto_perfil" type="file" name="imagem"/>
    </div>
    <div class="text_duvida">Cep</div>
    <input class="box_duvida" type="text" name="cep">
    <div class="text_duvida">Logradouro</div>
    <input class="box_duvida" type="text" name="logradouro">
    <div class="text_duvida">Numero</div>
    <input class="box_duvida" type="text" name="numero">
    <div class="text_duvida">Complemento</div>
    <input class="box_duvida" type="text" name="complemento">
    <div class="text_duvida">Bairro</div>
    <input class="box_duvida" type="text" name="bairro">
    <div class="text_duvida">Cidade</div>
      <select class="select_postos_rodoviarios" name="cidade">
        <?php
            require_once("../../controllers/cidade_controller.php");
            require_once("../../models/cidade_class.php");

            $controllerCidade = new controllerCidade();
            $list=$controllerCidade::Listar();
            $cont = 0;

            while($cont < count($list)){
             ?>

             <option value="<?php echo $list[$cont]->id?>">
               <?php echo($list[$cont]->nome_cidade) ?></option>
             <?php
             $cont+=1;
           }
              ?>
      </select>
    <input class="salvar_postos_rodoviarios" type="submit" name="btnCadastrar" value="Cadastrar">
  </div>
</form>
