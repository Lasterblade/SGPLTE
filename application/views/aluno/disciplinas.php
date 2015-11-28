      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height: 946px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Aluno
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li><a href="#">Aluno</a></li>
            <li class="active">Cadastro Disciplina</li>
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
                  <h3 class="box-title">Disciplinas</h3>
                </div><!-- /.box-header -->
                <div class="box-body">     
                  
                  <?php echo form_open('aluno/disciplinas'); ?>
                  <?php echo validation_errors(); ?>
                  
              
                  <?php foreach ($conteudo as $value): ?>
                  <h3><a href="<?php echo base_url('aluno/tarefas').'/'.$value->iddisciplina ?>"><?php echo strtoupper($value->descricao).'(I332)'; ?>  <span class="label label-primary"><?php echo substr(str_shuffle(str_repeat('AEIU',1)),0,1).substr(str_shuffle(str_repeat('0123456789',3)),0,3); ?></span></a></h3>
                 
                  <hr>
                  <?php endforeach; ?>
                    <div class="form-group has-warning">
                  </div>
                  </div>


                  <?php form_close(); ?>
                  
                        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->