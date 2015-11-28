      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height: 946px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Turma
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Turma</li>
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
                  <h3 class="box-title">Turma</h3>
                </div><!-- /.box-header -->
                <div class="box-body">     
                  
                  <?php echo form_open('turma/update/'.$editar->idturma); ?>
                  <?php echo validation_errors(); ?>
                  
                    <!-- text input -->
                    <div class="form-group">
                      <label>Descriçao da Turma</label>
                      <input type="text" class="form-control" name="descricao" placeholder="Descriçao da Turma" value="<?php echo $editar->descricao; ?>">
                    </div>
                    
                     <div class="form-group has-warning">
                      <label>Curso</label>
                      <select name="curso" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" >
                        <option selected="selected" value="0">Selecione...</option>
                        <?php foreach($curso as $value): ?>
                        <option <?php echo($value->idcurso == $editar->curso_idcurso ? 'selected' : ' '); ?> value="<?php echo $value->idcurso; ?>"><?php echo $value->descricao; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    
                    <div class="form-group has-warning">
                      <label>Periodo</label>
                      <select name="periodo" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" >
                        <option selected="selected" value="0">Selecione...</option>
                        <?php foreach($periodo as $value): ?>
                        <option <?php echo($value->idperiodo == $editar->periodo_idperiodo ? 'selected' : ' '); ?> value="<?php echo $value->idperiodo; ?>"><?php echo $value->descricao; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>                    
                    
                    <div class="form-group has-warning">
                      <label>Turno</label>
                      <select name="turno" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" >
                        <option selected="selected" value="0">Selecione...</option>
                        <?php foreach($turno as $value): ?>
                        <option <?php echo($value->idturno == $editar->turno_idturno ? 'selected' : ' '); ?> value="<?php echo $value->idturno; ?>"><?php echo $value->descricao; ?></option>
                        <?php endforeach; ?>
                      </select>
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