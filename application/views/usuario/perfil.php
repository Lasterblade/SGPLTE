  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height: 946px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Disciplina
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Disciplina</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
               <?php echo $this->session->flashdata('sucesso'); ?>
                <a href="<?php echo base_url('disciplina/insert')?>"><button type="button" class="btn btn-success "><i class="fa fa-save"> Cadastrar nova Disciplina</i></button></a><br /><br />
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Consulta de Perfis</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Disciplina</th>
                        <th>Turma</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php
                     $total = count($conteudo);
                     //echo $total;
             
                     /*while($conteudo[$i] <= $total ){ 
                        
                        echo($conteudo[$i]->disciplina);
                       $i++;
                     }*/
                     ?>
                      <?php foreach($conteudo as $value): ?>
                      <input class="form-control input-lg" type="text" placeholder=".input-lg">    
                  
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

     


