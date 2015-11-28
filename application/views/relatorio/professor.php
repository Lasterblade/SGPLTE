
<?php $this->load->view('/template/header_data'); ?>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
               
                <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Relatorio de Alunos</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                          <table class="table table-striped">
                            <tbody><tr>
                              <th style="width: 20px">#</th>
                              <th>Matricula</th>
                              <th>Nome</th>
                              <th>Email</th>
                              <th>Disciplina</th>
                            </tr>
                            
                           <?php $i=1; foreach ($conteudo as $value): ?>
                           
                            <tr>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $value->matricula_idmatricula; ?></td>
                              <td><?php echo $value->nome; ?></td>
                              <td><?php echo $value->email; ?></td>
                              <td><?php echo $value->disciplina; ?></td>
                            </tr>
                            
                            <?php endforeach; ?>
                            
                          </tbody></table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        </div></div>

