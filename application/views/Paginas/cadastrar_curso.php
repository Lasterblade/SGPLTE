
      <div class="content-wrapper" style="min-height: 946px;">

        <section class="content-header">
          <h1>
           Cadastro de Curso
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Cadastro de Curso</li>
          </ol>
        </section>

        <section class="content">
          <div class="row">

            
            <div class="col-md-12">
              <!-- Horizontal Form -->
              
              <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Cadastro de Curso</h3>
                </div>
                <div class="box-body">     
                  
                  <!-- Formulário que irá chamar. !-->
                  <?php echo form_open('Curso/insert'); ?>
                  <?php echo validation_errors(); ?>
                  
                    <!-- Campos -->
                    <div class="form-group" action="insert">
                      <label>Id do Curso</label>
                      <input type="text" class="form-control" name="id" placeholder="Id ..." disabled >
                    </div>
                    
                    
                    <div class="form-group" action="insert">
                      <label>Descrição do curso</label>
                      <input type="text" class="form-control" name="descricao" placeholder="Descrição ..." >
                    </div>
                   

                   <div class="box-footer">
                    <button type="limpar" name="limpar" class="btn btn-default">Cancelar</button>
                    <button type="submit" name="submit" class="btn btn-info pull-right">Enviar</button>
                  </div>

                  <?php form_close(); ?>
                  
                    </div>
              </div>
            </div>
          </div>
        </section>