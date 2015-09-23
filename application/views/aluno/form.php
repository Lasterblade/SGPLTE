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
            <li class="active">Aluno</li>
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
                  <h3 class="box-title">Aluno</h3>
                </div><!-- /.box-header -->
                <div class="box-body">     
                  
                  <?php echo form_open('usuario/insert'); ?>
                  <?php echo validation_errors(); ?>
                  
                    <!-- text input -->
                    <div class="form-group" action="insert">
                      <label>Id</label>
                      <input type="text" class="form-control" name="id" placeholder="Numero ..." disabled="">
                    </div>
                    <div class="form-group">
                      <label>Nome:</label>
                      <input type="text" class="form-control" name="login" placeholder="Entre com o nome ...">
                    </div>
                    <div class="form-group">
                    <label>Date masks:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                    </div><!-- /.input group -->
                  </div>
                   
                  <div class="row">
                   
                     <div class="col-xs-5">
                        <div class="input-group">
                        <span class="input-group-addon">@</span>
                        <input type="text" class="form-control" placeholder="Nome">
                        </div>
                     </div>
                    
                     <div class="col-xs-3">
                        <div class="input-group">
                          <span class="input-group-addon">Sexo: </span>  
                          
                          <select name="perfilusuario" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" >
                            <option selected="selected" value="0">Selecione...</option>
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                          </select>
                      </div>
                    </div>
                   
                    <div class="col-xs-2">
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                        </div>
                    </div>
                  </div>
               
                  
                    <div class="form-group has-warning">
                    <label>Perfil de Usuario</label>
                    <select name="perfilusuario" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" >
                      <option selected="selected" value="0">Selecione...</option>
                      <?php foreach($pessoa as $value): ?>
                      <option value="<?php echo $value->idpessoa; ?>"><?php echo $value->nome; ?></option>
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