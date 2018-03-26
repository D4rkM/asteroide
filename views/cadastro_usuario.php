
<!--
  Autor: BRUNA
  Data de modificação: 25/03/2018
  Detalhes: Está pagina tem como objetivo fazer o cadastro de usuarios
  Obs: Página principal contém menu e rodapé para inserir as outras páginas
  -->

<!-- Conteúdo da página -->
<div class="conteuno_cadastro">
  <!--Container que segura todas as informações da pagina -->
  <div class="cadastro_container">
    <!--Container responsael por segurar o titulo da pagima -->
     <div class="title_cadastro">
      <h1>Cadastro de Usuario</h1>
     </div>
      
      <div class="cadastro">
          <form action="cadastro_usuario.php" method="post">
              <div class="text">Foto de Perfil</div>
              <div class="imagem_usuario">
              </div>
              <input class="botao_foto_perfil" type="file" name="flefoto"/>
              <br>
              <br>
              <div class="text_left">Nome completo</div>
              <input class="box_text" type="text" name="txtnome">
              
              <div class="text_left">E-mail</div>
              <input class="box_text" type="text" name="txtemail">
              
              <div class="text_left">Usuario</div>
              <input class="box_text" type="text" name="txtusuario">
              
              <div class="text_left">Senha</div>
              <input class="box_text" type="password" name="txtsenha">
              <br>
              <br>
              <div class="text">Dados Pessoais</div>
              <br>
              <br>
              <table class="tabela_cadastro">
                  <tr>
                      <td class="colunas_cadastro_nome">
                          <div class="text_box">Data de Nascimento</div>
                      </td>
                      <td class="colunas_cadastro_nome">
                          <div class="text_box">Sexo</div>
                      </td>
                  </tr>
                  <tr>
                      <td class="colunas_cadastro_caixa">
                          <input class="box_text2" type="date" name="txtdatenasc">
                      </td>
                      <td class="colunas_cadastro_caixa">
                          <input type="radio" name="rdoSexo" value="M" >Masculino
                        <input type="radio" name="rdoSexo" value="F" checked>Feminino
                      </td>
                  </tr>
                 <tr>
                      <td class="colunas_cadastro_nome">
                           <div class="text_box">Telefone</div>
                     </td>
                      <td class="colunas_cadastro_nome">
                           <div class="text_box">Celular</div>
                     </td>
                  </tr>
                  <tr>
                      <td class="colunas_cadastro_caixa">
                          <input class="box_text2" type="telefone" name="txttelefone">
                      </td>
                      <td class="colunas_cadastro_caixa">
                          <input class="box_text2" type="telefone" name="txtcelular">
                      </td>
                  </tr>
                  <tr>
                      <td class="colunas_cadastro_nome">
                           <div class="text_box">CPF</div>
                      </td>
                      <td class="colunas_cadastro_nome">
                           <div class="text_box">RG</div>
                      </td>
                  </tr>
                  <tr>
                      <td class="colunas_cadastro_caixa">
                          <input class="box_text2" type="number" name="txtcpf">
                      </td>
                      <td class="colunas_cadastro_caixa">
                          <input class="box_text2" type="number" name="txtrg">
                      </td>
                  </tr>
                  <tr>
                      <td class="colunas_cadastro_nome">
                           <div class="text_box">CEP </div>
                      </td>
                      <td class="colunas_cadastro_nome">
                           <div class="text_box">Logradouro </div>
                      </td>
                  </tr>
                  <tr>
                      <td class="colunas_cadastro_caixa">
                      <input class="box_text2" type="number" name="txtcep">
                      </td>
                      <td class="colunas_cadastro_caixa">
                      <input class="box_text2" type="number" name="txtlogradouro">
                      </td>
                  </tr>
                  <tr>
                      <td class="colunas_cadastro_nome">
                          <div class="text_box">Numero</div>
                          
                      </td>
                      <td class="colunas_cadastro_nome">
                          <div class="text_box">Complemento</div>
                      </td>
                  </tr>
                  <tr>
                      <td class="colunas_cadastro_caixa">
                      <input class="box_text2" type="number" name="txtnumero">
                      </td>
                      <td class="colunas_cadastro_caixa">
                          <input class="box_text2" type="text" name="txtcomplemento">
                      </td>
                  </tr>
                  <tr>
                      <td class="colunas_cadastro_nome">
                           <div class="text_box">Cidade</div>
                      </td>
                      <td class="colunas_cadastro_nome">
                           <div class="text_box">Estado</div>
                      </td>
                  </tr>
                  <tr>
                      <td class="colunas_cadastro_caixa">
                      <input class="box_text2" type="text" name="txtcidade">
                      </td>
                      <td class="colunas_cadastro_caixa">
                          <input class="box_text2" type="text" name="txtestado">
                      </td>
                  </tr>
              </table>
              <br>
              <br>
              <input class="btnsalvar" type="submit" name="btncadastrar" value="Salvar">
          </form>
      </div>
  </div>
</div>