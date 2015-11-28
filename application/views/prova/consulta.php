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
                        <th>Data Inicio</th>
                        <th>Data Termino</th>
                        <th>Disciplina</th>
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
                      <div id="<?php echo 'modal_questao'.$value->idprovas; ?>" class="modal modal-warning">
                          <div class="modal-dialog">
                            <!-- Formulario das Questoes -->
                            <?php echo form_open('prova/Qtd_questao'); ?>
                            
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
                                       
                                          <select name="questoes<?php echo $value->idprovas;?>" class="form-control select2 select2-hidden-accessible"  >
                                          <?php for($i=1;$i <=10; $i++){?> 
                                          <?php echo '<option value="'.$i.'">'.$i.'</option>';?>
                                          <?php  }?>
                                          
                                          </select>
                                     </div><!-- / Coluna 4 input -->
                                  </div><!-- / Numero de Tentativas div -->
                              </div>
                              
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Fechar</button>
                                <button type="submit" name="submitForm" value="<?php echo $value->idprovas;?>" class="btn btn-outline">Enviar</button>
                                
                              </div>
                            </div><!-- /.modal-content -->
                            
                          </div><!-- /.modal-dialog -->
                          <!-- /.Formulario das Questoes -->
                        </div><!-- /.modal-excluir -->
                        
                        <?php form_close(); ?>
                      
                      
                      <tr>
                        <td><?php echo $value->idprovas ?></td>
                        <td><?php echo $value->nome ?></td>
                        <td><?php echo date('d/m/Y H:i:s', strtotime($value->inicio))  ?></td>
                        <td><?php echo date('d/m/Y H:i:s', strtotime($value->termino))?></td>
                        <td><?php echo $value->disciplina?>
                        
                        <div  class="btn-group" style="float: right;">
                          <?php if($value->aplicada == 1){
                            echo "<a><button type=\"button\" class=\"btn btn-success\" disabled><i class=\"fa fa-check\"> Aplicar Prova</i></button> "." </a>";
                          }else{
                            echo "<a href=\"".base_url('prova/aplicar').'/'.$value->idprovas."\" data-toggle=\"modal\"><button type=\"button\" class=\"btn btn-success\"><i class=\"fa fa-check\"> Aplicar Prova</i></button></a>";
                          }
          
                          ?>
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

     