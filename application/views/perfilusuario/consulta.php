  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height: 946px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Perfil de Usuario
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Perfil de Usuario</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
               <?php echo $this->session->flashdata('sucesso'); ?>
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Consulta de Perfis</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                 
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Descrição</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($conteudo as $value):?>
                      <tr>
                        <td><?php echo $value->idperfilusuario ?></td>
                        <td><?php echo $value->descricao ?>
                        <div  class="btn-group" style="float: right;">
                          <a href="<?php echo base_url('perfilusuario/atualizar').'/'.$value->idperfilusuario; ?>"><button type="button" class="btn btn-primary "><i class="fa fa-edit">Editar</i></button></a>
                           <a href="<?php echo base_url('perfilusuario/excluir').'/'.$value->idperfilusuario; ?>"><button type="button" class="btn btn-danger"><i class="fa fa-close "> Excluir</i></button></a>
                        </div></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th></th>
                        
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        </div></div>

     