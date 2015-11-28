      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height: 946px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Prova
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
              
              <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Acrescentar Novo Questionario</h3>
                </div><!-- /.box-header -->
                <div class="box-body">     
                  <pre><?php //print_r($disciplina); ?></pre>
                  <?php echo form_open('prova/insert'); ?>
                  <?php echo validation_errors(); ?>
                  
                    <div class="row">
                    <div class="col-md-5 form-group has-warning">
                      <label>Turma</label>
                      <select name="turma"  class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" >
                            <option selected value="0">Selecione...</option>
                            <?php foreach($turma as $value): ?>
                                <option value="<?php echo $value->idturma; ?>"><?php echo $value->descricao; ?></option>
                            <?php endforeach; ?>
                      </select>
                    </div><!-- / Coluna 4 input -->
                     
                    <div class="col-md-5 form-group has-warning">
                        <label>Disciplina:</label>
                        
                        <select name="disciplina" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" >
                            <option selected value="0">Selecione...</option>
                            <?php foreach($disciplina as $value): ?>
                                <option data-turma="<?php echo $value->turma_idturma;?>" value="<?php echo $value->iddisciplina; ?>"><?php echo $value->descricao; ?></option>
                            <?php endforeach; ?>
                      </select>
                    </div><!-- / Coluna 4 input -->
                     
                  </div><!-- / Titulo div -->
                    
                  <!-- Titulo div -->
                  <div class="row">
                     <div class="col-xs-5">
                        <label>Nome:</label>
                        <input type="nome" name="nome" class="form-control" placeholder="Titulo do Questionario...">
                     </div><!-- / Coluna 4 input -->
                  </div><!-- / Titulo div -->
                  
                  <!-- Descriçao input -->  
                  <div class="form-group" >
                    <label>Introdução:</label>
                    <textarea id="introducao" name="introducao" rows="10" cols="80" style="visibility: hidden; display: none;">Por favor, informe descrição da prova</textarea>
                  </div><!-- / Descriçao input -->
                  
                   <!-- Titulo div -->
          
                  
                   <!-- Encerrar question div -->
                  <div class="row">
                     
                     <div class="col-xs-4">
                        <label>Abrir Questionário:</label>
                        <input type="datetime-local" name="inicio" value="<?php echo date("Y-m-d\TH:i:s",time()); ?>" class="form-control" placeholder="Titulo do Questionário...">
                     </div><!-- / Coluna 4 input --> 
                     
                     <div class="col-xs-4">
                        <label>Encerrar Questionário:</label>
                        <input type="datetime-local" name="termino" value="<?php echo date("Y-m-d\TH:i:s",time()); ?>" class="form-control" placeholder="Titulo do Questionário...">
                     </div><!-- / Coluna 4 input -->
                  </div><!-- / Titulo div -->
                  
                   <!-- Numero de Tentativas div -->
                  <label>Numero de Tentativas</label>
                  <div class="row">
                     <div class="col-md-1">
                            <select name="tentativas" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" >
                           <?php for($i=1; $i <= 10; $i++){echo '<option value="'.$i.'">'.$i.'</option>';} ?>
                          </select>
                     </div><!-- / Coluna 4 input -->
                  </div><!-- / Numero de Tentativas div -->
                  
                  <div class="box-footer">
                    <button type="reset" name="limpar" class="btn btn-default">Cancelar</button>
                    <button type="submit" name="submit" class="btn btn-info pull-right">Enviar</button>
                  </div>

                  <?php form_close(); ?>
                  
                        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
       