
<?php if($this->session->userdata('perfil') == 1): ?>  
   <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">        <!-- Logo -->
        <a href="<?php echo base_url();?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>S</b>GP</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SGP</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
            
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-red"></i> 5 new members joined
                        </a>
                      </li>

                      <li>
                        <a href="#">
                          <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-user text-red"></i> You changed your username
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url('public/dist/img/user2-160x160.jpg')?>" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php $nome = explode(' ', $this->session->userdata('nome'), 2); echo $this->session->userdata('nome');?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url('public/dist/img/user2-160x160.jpg')?>" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $this->session->userdata('nome'); ?>
                    </p>
                  </li>
                 
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Perfil</a>
                    </div>
                    <div class="pull-right">
                      <a href="https://sgplte-lasterblade1.c9.io/Sair" class="btn btn-default btn-flat">Sair</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      
      
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url('public/dist/img/user2-160x160.jpg')?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $nome[0]; ?></p>


              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Painel de controle</li>
            <li class="treeview">
              <a href="<?php echo base_url();?>">
                <i class="fa fa-dashboard"></i> <span>Home</span> 
              </a>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Aluno</span>
                <span class="label label-primary pull-right"> 
                
                <?php 
                
                // Trazer aqui quantidade de alunos.
                $quantidadeAlunos = 50;
                echo($quantidadeAlunos);
                
                ?>
                
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('/Aluno/Disciplinas');?>"><i class="fa fa-circle-o"></i> Disciplinas</a></li>
              </ul>
            </li>
            
            
            
            <li class="treeview">
              <a href="<?php echo base_url('/aluno/Disciplinas');?>">
                <i class="fa fa-pie-chart"></i>
                <span>Disciplinas</span>
                  <span class="label pull-right bg-green"> 
                
                <?php 
                
                // Trazer aqui quantidade de professor
                $tarefas = 6;
                echo($tarefas);
                
                ?>
                
                </span>
                
              </a>
            </li>

      
      
           
          
          
        </section>
        <!-- /.sidebar -->
      </aside>
<?php endif; ?>  


<?php if($this->session->userdata('perfil') == 2): ?>  
   <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">        <!-- Logo -->
        <a href="<?php echo base_url();?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>S</b>GP</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SGP</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
            
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-red"></i> 5 new members joined
                        </a>
                      </li>

                      <li>
                        <a href="#">
                          <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-user text-red"></i> You changed your username
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url('public/dist/img/user2-160x160.jpg')?>" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">Usuario Exemplo</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url('public/dist/img/user2-160x160.jpg')?>" class="img-circle" alt="User Image" />
                    <p>
                      Usuario Exemplo - Web Developer
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                 
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Perfil</a>
                    </div>
                    <div class="pull-right">
                      <a href="https://sgplte-lasterblade1.c9.io/Sair" class="btn btn-default btn-flat">Sair</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      
      
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url('public/dist/img/user2-160x160.jpg')?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('nome'); ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Painel de controle</li>
            <li class="treeview">
              <a href="<?php echo base_url();?>">
                <i class="fa fa-dashboard"></i> <span>Home</span> 
              </a>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Aluno</span>
                <span class="label label-primary pull-right"> 
                
                <?php 
                
                // Trazer aqui quantidade de alunos.
                $quantidadeAlunos = 50;
                echo($quantidadeAlunos);
                
                ?>
                
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('/Aluno/');?>"><i class="fa fa-circle-o"></i> Consultar</a></li>
                <li><a href="<?php echo base_url('/Aluno/insert');?>"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
                <li><a href="<?php echo base_url('/Aluno/Disciplinas');?>"><i class="fa fa-circle-o"></i> Disciplinas</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Professor</span>
                <span class="label pull-right bg-green"> 
                
                <?php 
                
                // Trazer aqui quantidade de professor
                $quantidadeProfessores = 10;
                echo($quantidadeProfessores);
                
                ?>
                
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('/Professor/');?>"><i class="fa fa-circle-o"></i> Consultar</a></li>
                <li><a href="<?php echo base_url('/Professor/insert');?>"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Provas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('/Prova/');?>"><i class="fa fa-circle-o"></i> Consultar</a></li>
                <li><a href="<?php echo base_url('/Prova/insert');?>"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Relatorios</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('/Relatorios/Provas');?>"><i class="fa fa-circle-o"></i> Provas</a></li>
                <li><a href="<?php echo base_url('/Relatorios/Professor');?>"><i class="fa fa-circle-o"></i> Professor</a></li>
                <li><a href="<?php echo base_url('/Relatorios/Aluno');?>"><i class="fa fa-circle-o"></i> Aluno</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Disciplinas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('/Disciplina/');?>"><i class="fa fa-circle-o"></i> Consultar</a></li>
                <li><a href="<?php echo base_url('/Disciplina/insert');?>"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Turmas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('/Turma/');?>"><i class="fa fa-circle-o"></i> Consultar</a></li>
                <li><a href="<?php echo base_url('/Turma/insert');?>"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
              </ul>
            </li>
            <li>
              <a href="<?php echo base_url('/Curso/');?>">
                <i class="fa fa-calendar"></i> <span>Curso</span>
                <small class="label pull-right bg-red">3</small>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url('/Periodo/');?>">
                <i class="fa fa-envelope"></i> <span>Periodo</span>
                <small class="label pull-right bg-yellow">12</small>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Usuarios</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('/Usuario/');?>"><i class="fa fa-circle-o"></i> Consultar</a></li>
                <li><a href="<?php echo base_url('/Usuario/insert');?>"><i class="fa fa-circle-o"></i> Relatorios</a></li>               
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Multilevel</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                    <li>
                      <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                      <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
              </ul>
            </li>
            
            <li class="header">LEGENDA</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Importante</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Atenção</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Infomação</span></a></li>
          </ul>
          
        </section>
        <!-- /.sidebar -->
      </aside>
<?php endif; ?>  

<?php if($this->session->userdata('perfil') == 3): ?>  
   <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">        <!-- Logo -->
        <a href="<?php echo base_url();?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>S</b>GP</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SGP</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
            
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-red"></i> 5 new members joined
                        </a>
                      </li>

                      <li>
                        <a href="#">
                          <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-user text-red"></i> You changed your username
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url('public/dist/img/user2-160x160.jpg')?>" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $this->session->userdata('nome'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url('public/dist/img/user2-160x160.jpg')?>" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $this->session->userdata('nome'); ?> - Coordenador
                      <small>Membro desde Nov. 2015</small>
                    </p>
                  </li>
                 
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Perfil</a>
                    </div>
                    <div class="pull-right">
                      <a href="https://sgplte-lasterblade1.c9.io/Sair" class="btn btn-default btn-flat">Sair</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      
      
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url('public/dist/img/user2-160x160.jpg')?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Usuario Exemplo</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Painel de controle</li>
            <li class="treeview">
              <a href="<?php echo base_url();?>">
                <i class="fa fa-dashboard"></i> <span>Home</span> 
              </a>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Aluno</span>
                <span class="label label-primary pull-right"> 
                
                <?php 
                
                // Trazer aqui quantidade de alunos.
                $quantidadeAlunos = 50;
                echo($quantidadeAlunos);
                
                ?>
                
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('/Aluno/');?>"><i class="fa fa-circle-o"></i> Consultar</a></li>
                <li><a href="<?php echo base_url('/Aluno/insert');?>"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
                
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Professor</span>
                <span class="label pull-right bg-green"> 
                
                <?php 
                
                // Trazer aqui quantidade de professor
                $quantidadeProfessores = 10;
                echo($quantidadeProfessores);
                
                ?>
                
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('/Professor/');?>"><i class="fa fa-circle-o"></i> Consultar</a></li>
                <li><a href="<?php echo base_url('/Professor/insert');?>"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Provas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('/Prova/');?>"><i class="fa fa-circle-o"></i> Consultar</a></li>
                <li><a href="<?php echo base_url('/Prova/insert');?>"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Relatorios</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('/Relatorios/Provas');?>"><i class="fa fa-circle-o"></i> Provas</a></li>
                <li><a href="<?php echo base_url('/Relatorios/Professor');?>"><i class="fa fa-circle-o"></i> Professor</a></li>
                <li><a href="<?php echo base_url('/Relatorios/Aluno');?>"><i class="fa fa-circle-o"></i> Aluno</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Disciplinas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('/Disciplina/');?>"><i class="fa fa-circle-o"></i> Consultar</a></li>
                <li><a href="<?php echo base_url('/Disciplina/insert');?>"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Turmas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('/Turma/');?>"><i class="fa fa-circle-o"></i> Consultar</a></li>
                <li><a href="<?php echo base_url('/Turma/insert');?>"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
              </ul>
            </li>
            <li>
              <a href="<?php echo base_url('/Curso/');?>">
                <i class="fa fa-calendar"></i> <span>Curso</span>
                <small class="label pull-right bg-red">3</small>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url('/Periodo/');?>">
                <i class="fa fa-envelope"></i> <span>Periodo</span>
                <small class="label pull-right bg-yellow">12</small>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Usuarios</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('/Usuario/');?>"><i class="fa fa-circle-o"></i> Consultar</a></li>
                <li><a href="<?php echo base_url('/Usuario/insert');?>"><i class="fa fa-circle-o"></i> Cadastrar</a></li>                    
              </ul>
            </li>
            
            <li class="header">LEGENDA</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Importante</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Atenção</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Infomação</span></a></li>
          </ul>
          
        </section>
        <!-- /.sidebar -->
      </aside>
<?php endif; ?>  