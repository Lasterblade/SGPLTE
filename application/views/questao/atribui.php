      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height: 946px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Questões
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
              
              <?php echo form_open('prova/questao/'.$id.'/'.$questoes); ?>
              <?php echo validation_errors(); ?>
              <?php for( $i = 1; $i <= $questoes; $i++ ): ?>
              <!-- general form elements disabled -->
              
              <input type="hidden" name="id" value="<?php echo $id; ?>">
              <input type="hidden" name="questoes" value="<?php echo $questoes; ?>">
              
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">
                    Questão <?php echo $i;?></h3>
                    <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
                </div><!-- /.box-header -->
                
                <div class="box-body">     
                  
                 
                  <!-- Titulo div -->
                  <div class="row">
                     <div class="col-xs-5">
                        <label>Nome de Pesquisa:</label>
                        <input type="text" name="<?php echo 'titulo'.$i;?>" class="form-control" placeholder="Ex.:Estudo da Arte...">
                     </div><!-- / Coluna 4 input -->
                  </div><!-- / Titulo div -->
                  
                  <!-- Descriçao input -->  
                  <div class="form-group" >
                    <label>Descricao da Questão:</label>
                    <textarea id="pergunta" name="<?php echo 'pergunta'.$i;?>" rows="10" cols="80" style="visibility: hidden; display: none;">Por favor, escreva aqui a sua pergunta</textarea>
                  </div><!-- / Descriçao input -->
                  
                  
                  <div class="row">
                    <!-- Resposta A div --> 
                    <div class="col-xs-4">
                        <div class="input-group">
                        <span class="input-group-addon">A)</span>
                        <input type="text" name="<?php echo 'respostaA'.$i;?>" class="form-control" placeholder="Resposta 'A'.">
                        </div>
                    </div><!-- /.Resposta A  div -->
                    
                    <!-- Resposta B div --> 
                    <div class="col-xs-4">
                        <div class="input-group">
                        <span class="input-group-addon">B)</span>
                        <input type="text" name="<?php echo 'respostaB'.$i;?>" class="form-control" placeholder="Resposta 'B'.">
                        </div>
                    </div>
                  </div><br><!-- /.Resposta B  div -->
                  
                  
                    <div class="row">
                    <!-- Resposta A div --> 
                    <div class="col-xs-4">
                        <div class="input-group">
                        <span class="input-group-addon">C)</span>
                        <input type="text" name="<?php echo 'respostaC'.$i;?>" class="form-control" placeholder="Resposta 'C'.">
                        </div>
                    </div><!-- /.Resposta A  div -->
                    
                    <!-- Resposta B div --> 
                    <div class="col-xs-4">
                        <div class="input-group">
                        <span class="input-group-addon">D)</span>
                        <input type="text" name="<?php echo 'respostaD'.$i;?>" class="form-control" placeholder="Resposta 'D'.">
                        </div>
                    </div>
                  </div><!-- /.Resposta B  div -->
                  <br>

                 <!-- radio -->
                 <h3>
                  <div class="form-group text-muted">
                    <label>
                      Resposta Certa: 
                      <input type="radio" name="<?php echo 'respostaCerta'.$i;?>" value="A" class="minimal" checked> A)
                    </label>
                    <label>
                      <input type="radio" name="<?php echo 'respostaCerta'.$i;?>" value="B" class="minimal"> B)
                    </label>
                    <label>
                      <input type="radio" name="<?php echo 'respostaCerta'.$i;?>" value="C" class="minimal"> C)
                    </label>
                    <label>
                      <input type="radio" name="<?php echo 'respostaCerta'.$i;?>" value="D" class="minimal"> D)
                    </label>
                  </div>
                  </h3>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <?php endfor; // ENCERRA O LOOP DAS QUESTÕES ?>
              <div class="box-footer">
                    <button type="reset" name="limpar" class="btn btn-default">Cancelar</button>
                    <button type="submit" name="submit" class="btn btn-info pull-right">Enviar</button>
              </div>
              <?php form_close(); ?>
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->