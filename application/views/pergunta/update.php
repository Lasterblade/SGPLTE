      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height: 946px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Perguntas
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Prova</li>
          </ol>
        </section>
        

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            
            <div class="col-md-12">
              <!-- Horizontal Form -->
              
              <?php echo form_open('pergunta/update/'.$editar->idperguntas); ?>
              <?php echo validation_errors(); ?>
              <!-- general form elements disabled -->
             
              
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">
                   Adicionar Pergunta </h3>
                    <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
                </div><!-- /.box-header -->
                
                <div class="box-body">     
                  
                 
                  <!-- Titulo div -->
                  <div class="row">
                     <div class="col-xs-5">
                        <label>Titulo da Pergunta:</label>
                        <input type="text" name="titulo" class="form-control" value="<?php echo $editar->titulo;?>" placeholder="Ex.:Estudo da Arte...">
                     </div><!-- / Coluna 4 input -->
                  </div><!-- / Titulo div -->
                  
                  <!-- Descriçao input -->  
                  <div class="form-group" >
                    <label>Descrição da Pergunta:</label>
                    <textarea id="pergunta" name="pergunta" rows="10" cols="80" style="visibility: hidden; display: none;"><?php echo $editar->pergunta;?></textarea>
                  </div><!-- / Descriçao input -->
                  
                  
                  <div class="row">
                    <!-- Resposta A div --> 
                    <div class="col-xs-4">
                        <div class="input-group">
                        <span class="input-group-addon">A)</span>
                        <input type="text" name="respostaA" class="form-control" placeholder="Resposta 'A'" value="<?php echo $editar->respostaA;?>">
                        </div>
                    </div><!-- /.Resposta A  div -->
                    
                    <!-- Resposta B div --> 
                    <div class="col-xs-4">
                        <div class="input-group">
                        <span class="input-group-addon">B)</span>
                        <input type="text" name="respostaB" class="form-control" placeholder="Resposta 'B'" value="<?php echo $editar->respostaB;?>">
                        </div>
                    </div>
                  </div><br><!-- /.Resposta B  div -->
                  
                  
                    <div class="row">
                    <!-- Resposta A div --> 
                    <div class="col-xs-4">
                        <div class="input-group">
                        <span class="input-group-addon">C)</span>
                        <input type="text" name="respostaC" class="form-control" placeholder="Resposta 'C'" value="<?php echo $editar->respostaC;?>">
                        </div>
                    </div><!-- /.Resposta A  div -->
                    
                    <!-- Resposta B div --> 
                    <div class="col-xs-4">
                        <div class="input-group">
                        <span class="input-group-addon">D)</span>
                        <input type="text" name="respostaD" class="form-control" placeholder="Resposta 'D'" value="<?php echo $editar->respostaD;?>">
                        </div>
                    </div>
                  </div><!-- /.Resposta B  div -->
                  <br>

                 <!-- radio -->
                 <h3>
                  <div class="form-group text-muted">
                    <label>
                      Resposta Certa:
                      
                      <input type="radio" name="respostaCorreta" value="A" class="minimal" <?php echo($editar->respostaCorreta == 'A' ? 'checked' : ' '); ?> > A)
                    </label>
                    <label>
                      <input type="radio" name="respostaCorreta" value="B" class="minimal" <?php echo($editar->respostaCorreta == 'B' ? 'checked' : ' '); ?>> B)
                    </label>
                    <label>
                      <input type="radio" name="respostaCorreta" value="C" class="minimal" <?php echo($editar->respostaCorreta == 'C' ? 'checked' : ' '); ?>> C)
                    </label>
                    <label>
                      <input type="radio" name="respostaCorreta" value="D" class="minimal" <?php echo($editar->respostaCorreta == 'D' ? 'checked' : ' '); ?>> D)
                    </label>
                  </div>
                  </h3>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              
              <div class="box-footer">
                    <button type="reset" name="limpar" class="btn btn-default">Cancelar</button>
                    <button type="submit" name="submit" class="btn btn-info pull-right">Enviar</button>
              </div>
              <?php form_close(); ?>
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->