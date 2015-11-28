      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height: 946px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Periodo
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Periodo</li>
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
                  <h3 class="box-title">Periodo</h3>
                </div><!-- /.box-header -->
                <div class="box-body">     
                  
                  <?php echo form_open('periodo/update/'.$editar->idperiodo); ?>
                  <?php echo validation_errors(); ?>
                  
                    <!-- text input -->
                    <div class="form-group">
                      <label>Descrição</label>
                      <input type="text" class="form-control" name="descricao" value="<?php echo $editar->descricao; ?>" placeholder="Entre com a descrição ...">
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