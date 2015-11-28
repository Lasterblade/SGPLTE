      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height: 946px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Aluno / Tarefas
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li><a href="#">Aluno</a></li>
            <li class="active">Tarefas</li>
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
                  
                  <h3 class="box-title"><a href="#"><?php if($conteudo != null) echo  $conteudo[0]->descricao; else redirect('aluno/disciplinas'); ?></a></h3>
                </div><!-- /.box-header -->
                <div class="box-body" >    
                
              <?php echo form_open('aluno/tarefas'); ?>
              <?php echo validation_errors(); ?>
              
                  <?php $i=1; foreach($conteudo as $value):
                     $dataFuturo = $value->inicio;
                     $dataAtual = $value->termino;
                    
                     $date_time  = new DateTime($dataAtual);
                     $diff       = $date_time->diff( new DateTime($dataFuturo));
                  ?>
                  
                  <div style="border-width:1px;padding:10px;box-shadow:0 1px 4px 0 rgba(0,0,0,0.37);">
                    <h3 style="border-bottom: 2px solid #000;">Prova <?php echo $i; ?></h3>
                      <p><a class="" onclick="" href="<?php echo base_url('aluno/prova').'/'.$value->idprovas; ?>"><img src="http://academico.uniabeu.edu.br/theme/image.php/evolved/assign/1445185257/icon" alt=" " role="presentation">
                      <span><?php echo $value->nome; ?></span></a> <span style="font-size:12px">Tempo estimado: <?php echo $diff->format('%m mês(s), %d dia(s), %H hora(s), %i minuto(s) e %s segundo(s)'); ?></span></p>
                  </div>
                  <hr>
                 <?php $i++; ?>
                  
                  <?php endforeach;  ?>
                  
                  <div class="form-group has-warning">
                  </div>
                  
                  </div>
                   <div class="box-footer">
                    <button type="limpar" name="limpar" class="btn btn-default">Cancelar</button>
                    <button type="submit" name="submit" class="btn btn-info pull-right">Confirmar</button>
                  </div>

                  <?php form_close(); ?>
                  
                </div><!-- /.box-body -->
                
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->