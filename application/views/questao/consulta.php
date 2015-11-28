  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height: 946px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Provas
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Provas</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
               <?php echo $this->session->flashdata('sucesso'); ?>
                <a href="<?php echo base_url('prova/insert')?>"><button type="button" class="btn btn-success "><i class="fa fa-save"> Cadastrar nova Prova</i></button></a><br /><br />
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Consulta de Perfis</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Descrição</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                      <?php foreach($conteudo as $value): ?>
                      
                      <!-- MODAL excluir -->
                      <div id="myModal<?php echo $value->idprovas ?>" class="modal modal-danger">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Atenção!</h4>
                              </div>
                              <div class="modal-body">
                                <p>Deseja realmente excluir esta Prova?</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Fechar</button>
                                <a href="<?php echo base_url('prova/excluir').'/'.$value->idprovas; ?>"><button type="button" class="btn btn-outline">Salvar</button></a>
                              </div>
                            </div><!-- /.modal-content -->
                          </div><!-- /.modal-dialog -->
                        </div><!-- /.modal-excluir -->
                      
                      <!-- MODAL adicionar questão -->
                      <div id="modal_questao<?php echo $value->idprovas ?>" class="modal modal-warning">
                          <div class="modal-dialog">
                            
                            <!-- Formulario das Questoes -->
                            <?php echo form_open('prova/questao/'.$value->idprovas); ?>
                            <?php echo validation_errors(); ?>
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Adicionar Questão</h4>
                              </div>
                              <div class="modal-body">
                                 
                                 <!-- Quantidade de Perguntas -->
                                  <label>Quantidade de Perguntas</label>
                                  <div class="row">
                                     <div class="col-md-3">
                                            <select name="questoes" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" >
                                           <?php for($i=1; $i <= 10; $i++){echo '<option value="'.$i.'">'.$i.'</option>';} ?>
                                          </select>
                                     </div><!-- / Coluna 4 input -->
                                  </div><!-- / Numero de Tentativas div -->
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-outline">Enviar</button>
                              </div>
                            </div><!-- /.modal-content -->
                          </div><!-- /.modal-dialog -->
                          <!-- /.Formulario das Questoes -->
                          <?php form_close(); ?>
                        </div><!-- /.modal-excluir -->
                      
                      <tr>
                        <td><?php echo $value->idprovas ?></td>
                        <td><?php echo $value->nome ?></td>
                        <td><?php echo $value->inicio ?></td>
                        <td><?php echo $value->termino ?>
                        <div  class="btn-group" style="float: right;">
                          <a href="#modal_questao<?php echo $value->idprovas ?>" data-toggle="modal"><button type="button" class="btn btn-warning "><i class="fa fa-plus-circle"> Adicionar Questão</i></button></a>
                          <a href="<?php echo base_url('prova/update').'/'.$value->idprovas; ?>"><button type="button" class="btn btn-primary "><i class="fa fa-edit"> Editar</i></button></a>
                          <a href="#myModal<?php echo $value->idprovas ?>" data-toggle="modal"><button type="button" class="btn btn-danger"><i class="fa fa-close "> Excluir</i></button></a>
                        </div>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th></th>
                        
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        </div></div>

     