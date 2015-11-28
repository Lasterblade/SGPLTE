<?php if($perfil == 1): ?>
        <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height: 946px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Página Inicial
            <small>Home</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard active" ></i> Página Inicial</a></li>
          </ol>
        </section>
          <?php //print_r($usuario); ?>
        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>5</h3>
                  <p>Disciplinas</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Saber Mais <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">%</sup></h3>
                  <p>Provas</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Saber Mais <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>260</h3>
                  <p>Usuarios</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Saber Mais <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>65</h3>
                  <p>Relatorios</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Saber Mais <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
           
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Status Provas</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Prova</th>
                    <th>Status</th>
                    <th>Disciplina</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  <?php foreach ($conteudo as $value): ?>
                  <tr>
                    <td><a href="<?php echo base_url('aluno/prova/'.$value->idprovas);?>"><?php echo $value->nome; ?></a></td>
                    <td><?php echo $value->nome; ?></td>
                    <td><span class="label label-<?php echo $this->Realiza_model->Validacao($value->idprovas) ? "success" : "danger" ?>"><?php echo $this->Realiza_model->Validacao($value->idprovas) ? "Realizado" : "Em andamento" ?></span></td>
                    <td>
                    <a href="<?php echo base_url('aluno/tarefas/'.$value->iddisciplina)?>"><?php echo $value->disciplina; ?></a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              
            </div>
            <!-- /.box-footer -->
          </div>


            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">

         
            <div id="fb-root"></div>
              <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5";
                fjs.parentNode.insertBefore(js, fjs);
              }(document, 'script', 'facebook-jssdk'));</script>
              <div class="fb-page" data-href="https://www.facebook.com/UniabeuRJ/?fref=ts" data-width="500" data-height="70" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/UniabeuRJ/?fref=ts"><a href="https://www.facebook.com/UniabeuRJ/?fref=ts">Uniabeu Centro Universitário</a></blockquote></div></div>


            </section><!-- right col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
    
<?php endif; ?>

<?php if($perfil == 2): ?>
        <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height: 946px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Página Inicial
            <small>Home</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard active" ></i> Página Inicial</a></li>
          </ol>
        </section>
          <?php //print_r($usuario); ?>
        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>20</h3>
                  <p>Tarefas</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Saber Mais <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">%</sup></h3>
                  <p>Provas</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Saber Mais <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>260</h3>
                  <p>Usuarios</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Saber Mais <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>65</h3>
                  <p>Relatorios</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Saber Mais <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
           
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Status Provas</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Prova</th>
                    <th>Status</th>
                    <th>Disciplina</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  <?php foreach ($conteudo as $value): ?>
                  <tr>
                    <td><a href="<?php echo base_url('aluno/prova/'.$value->idprovas);?>"><?php echo $value->nome; ?></a></td>
                    <td><?php echo $value->nome; ?></td>
                    <td><span class="label label-<?php echo $this->Realiza_model->Validacao($value->idprovas) ? "success" : "danger" ?>"><?php echo $this->Realiza_model->Validacao($value->idprovas) ? "Realizado" : "Em andamento" ?></span></td>
                    <td>
                    <a href="<?php echo base_url('aluno/tarefas/'.$value->iddisciplina)?>"><?php echo $value->disciplina; ?></a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
    
            <!-- /.box-footer -->
          </div>


            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">


          <div id="fb-root"></div>
              <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5";
                fjs.parentNode.insertBefore(js, fjs);
              }(document, 'script', 'facebook-jssdk'));</script>
              <div class="fb-page" data-href="https://www.facebook.com/UniabeuRJ/?fref=ts" data-width="500" data-height="70" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/UniabeuRJ/?fref=ts"><a href="https://www.facebook.com/UniabeuRJ/?fref=ts">Uniabeu Centro Universitário</a></blockquote></div></div>

            </section><!-- right col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
    
<?php endif; ?>

<?php if($perfil == 3): ?>
        <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height: 946px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Página Inicial
            <small>Home</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard active"></i> Página Inicial</a></li>
          </ol>
        </section>
          <?php //print_r($usuario); ?>
        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>20</h3>
                  <p>Disciplinas</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Saber Mais <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">%</sup></h3>
                  <p>Provas</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="prova" class="small-box-footer">Saber Mais <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>260</h3>
                  <p>Usuarios</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Saber Mais <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>65</h3>
                  <p>Relatorios</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Saber Mais <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
           
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Provas Aplicadas</h3>

            
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Prova</th>
                    <th>Status</th>
                    <th>Disciplina</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  <?php $i=1; foreach ($conteudo as $value): ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><a href="<?php echo base_url('aluno/prova/'.$value->idprovas);?>"><?php echo $value->nome; ?></a></td>
                    <td><span class="label label-success">Aplicada</span></td>
                    <td>
                    <a href="<?php echo base_url('aluno/tarefas/'.$value->iddisciplina)?>"><?php echo $value->disciplina; ?></a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
              <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div>
            <!-- /.box-footer -->
          </div>


            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">
              
              <div id="fb-root"></div>
              <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5";
                fjs.parentNode.insertBefore(js, fjs);
              }(document, 'script', 'facebook-jssdk'));</script>
              <div class="fb-page" data-href="https://www.facebook.com/UniabeuRJ/?fref=ts" data-width="500" data-height="70" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/UniabeuRJ/?fref=ts"><a href="https://www.facebook.com/UniabeuRJ/?fref=ts">Uniabeu Centro Universitário</a></blockquote></div></div>
         
            </section><!-- right col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
    
<?php endif; ?>


