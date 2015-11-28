  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height: 946px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Coordenador
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Coordenador</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
               <?php echo $this->session->flashdata('sucesso'); ?>
                <a href="<?php echo base_url('Coordenador/insert')?>"><button type="button" class="btn btn-success "><i class="fa fa-save"> Cadastrar novo Coordenador</i></button></a><br /><br />
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Consulta de Coordenador</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nome Coordenador</th> 
                        <th>CPF Coordenador</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                      <?php foreach($conteudo as $value): ?>
                      
                      <!-- Modal HTML -->
                      <div id="myModal<?php echo $value->idcoordenador ?>" class="modal modal-danger">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Atenção!</h4>
                              </div>
                              <div class="modal-body">
                                <p>Deseja realmente excluir este Coordenador?</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Fechar</button>
                                <a href="<?php echo base_url('Coordenador/excluir').'/'.$value->idcoordenador; ?>"><button type="button" class="btn btn-outline">Salvar</button></a>
                              </div>
                            </div><!-- /.modal-content -->
                          </div><!-- /.modal-dialog -->
                        </div><!-- /.mymodal -->
                      <!--Fim Modal HTML -->
                      
                      <tr>
                        <td><?php echo $value->idcoordenador; ?></td>
                       <td><?php echo $value->nome; ?>
                        <td><?php echo $value->cpf; ?></td> 
                        <td>
                        
                        <div  class="btn-group" style="float: right;">
                           <a href="<?php echo base_url('Coordenador/update').'/'.$value->idcoordenador; ?>"><button  type="button" class="btn btn-primary "><i class="fa fa-edit">Editar</i></button></a>
                           <a href="#myModal<?php echo $value->idcoordenador ?>" data-toggle="modal"><button   type="button" class="btn btn-danger"><i class="fa fa-close "> Excluir</i></button></a>
                        </div>
                        </td>
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

     