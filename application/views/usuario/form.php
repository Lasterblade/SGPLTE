      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height: 946px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Usuário
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Usuário</li>
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
                  <h3 class="box-title">Usuário</h3>
                </div><!-- /.box-header -->
                <div class="box-body">     
                  
                  <?php echo form_open('usuario/insert'); ?>
                  <?php echo validation_errors(); ?>
                  

                    <div class="form-group">
                      <label>Login</label>
                      <input type="text" class="form-control" name="login" placeholder="Entre com o login ...">
                    </div>
                    <div class="form-group">
                      <label>Senha</label>
                      <input type="password" class="form-control" name="senha" placeholder="Entre com a senha...">
                    </div>
                    <div class="form-group has-warning">
                    <label>Perfil de Usuario</label>
                    <select name="perfilusuario" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" >
                      <option selected="selected" value="0">Selecione...</option>
                      <?php foreach($perfilusuario as $value): ?>
                      <option value="<?php echo $value->idperfilusuario; ?>"><?php echo $value->descricao; ?></option>
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