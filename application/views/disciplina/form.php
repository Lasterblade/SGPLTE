      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height: 946px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Disciplina
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Disciplina</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            
            
            <div class="col-md-12">
              <!-- Horizontal Form -->
              
              <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Cadastro de Disciplina</h3>
                </div><!-- /.box-header -->
                <div class="box-body">     
                  
                  <?php echo form_open('Disciplina/insert'); ?>
                  <?php echo validation_errors(); ?>
                  
                    <!-- text input -->

                    <div class="form-group">
                      <label>Nome da Disciplina:</label>
                      <input type="text" class="form-control" name="descricao" placeholder="Descriçao da Disciplina">
                    </div>
                    
                    <div class="form-group" class="radio">
                      <label>Natureza: </label>
                          <input type="radio" name="natureza" id="natureza1" value="option1" checked="">Teórica
                          <input type="radio" name="natureza" id="natureza2" value="option2">Prática
                    </div>
                    
                    <div class="form-group has-warning">
                      <label>Turma</label>
                      <select name="turma" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" >
                        <option selected="selected" value="0">Selecione...</option>
                        <?php foreach($turma as $value): ?>
                        <option value="<?php echo $value->idturma; ?>"><?php echo $value->descricao; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    
                    <!--
                    <div  class="row">
                      <div class="box-header">
                        <h3>Carga Horária</h3>
                        <hr></hr>
                      </div>
                     <div class="col-xs-3">
                        <div class="input-group">
                        <span class="input-group-addon">Total:</span>
                        <input type="text" name="total" class="form-control" placeholder="Ex: 380h">
                        </div>
                     </div>
                    
                    <div class="col-xs-3">
                        <div class="input-group">
                        <span class="input-group-addon">Teorica:</span>
                        <input type="text" name="teorica" class="form-control" placeholder="Ex: 180h">
                        </div>
                     </div>

                   
                     <div class="col-xs-3">
                        <div class="input-group">
                        <span class="input-group-addon">Prática:</span>
                        <input type="text" name="teorica" class="form-control" placeholder="Ex: 160h">
                        </div>
                     </div>
                     <br>
                     
                  </div>-->
                    
                    
                    
                    <!--<div class="form-group">
                      <label>Date range:</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="reservation">
                      </div>
                   </div>-->
                    
                  
                    </div>

                   <div class="box-footer">
                    <button type="limpar" name="limpar" class="btn btn-default">Cancelar</button>
                    <button type="submit" name="submit" class="btn btn-info pull-right">Enviar</button>
                  </div>

                  <?php form_close(); ?>
                  
                        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->