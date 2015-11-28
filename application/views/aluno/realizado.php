      
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height: 946px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            GABARITO
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li><a href="#">Aluno</a></li>
            <li class="active">Tarefas</li>
          </ol>
        </section>
        
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
             
            <div class="col-md-12">
              
              
              <?php echo validation_errors(); ?>
              <!-- Horizontal Form -->
              
             <?php $radio=1; $i=1;  ?>
             <?php foreach ($questoes as $value): ?>
              <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">
                   Questão <?php echo $i; ?> </h3>
                    <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
                </div><!-- /.box-header -->
                <div class="box-body" >    
              
                    
                  <div id="q1" class="que"><div class="info">
                    <h3 class="no">Questão <span class="qno"><?php echo $i; ?></span></h3><div class="state">Livre</div>
                    <div class="grade">Valor 1,00 ponto(s).</div>
                  </div>
                  <div class="content formulation">
                    <div class="" >
                      <p><?php echo $value->pergunta; ?><strong>$NOTA</strong>.</p>
                      <p>&nbsp;</p>
                    </div>
                   <!-- radio -->
                     
                    
                      <input type="hidden"  name="<?php echo 'questao'.$i; ?>" value="<?php echo $value->idperguntas; ?>" />
                      <p>
                      <input type="radio" id="<?php echo 'r'.$radio; ?>" name="<?php echo 'rr'.$i; ?>" <?php echo $value->resposta == 'A' ? "checked":" "; ?> disabled  value="A" />A)
                      <label for="<?php echo 'r'.$radio; $radio++; ?>"><span></span><?php echo $value->respostaA; ?></label>
                      <p>
                      <input type="radio" id="<?php echo 'r'.$radio; ?>" name="<?php echo 'rr'.$i; ?>" <?php echo $value->resposta == 'B' ? "checked":" ";  ?> disabled value="B" />B)
                      <label for="<?php echo 'r'.$radio; $radio++; ?>"><span></span><?php echo $value->respostaB; ?></label>
                      <p>
                      <input type="radio" id="<?php echo 'r'.$radio; ?>" name="<?php echo 'rr'.$i; ?>" <?php echo $value->resposta == 'C' ? "checked":" ";  ?> disabled value="C" />C)
                      <label for="<?php echo 'r'.$radio; $radio++; ?>"><span></span><?php echo $value->respostaC; ?></label>
                      <p>
                      <input type="radio" id="<?php echo 'r'.$radio; ?>" name="<?php echo 'rr'.$i; ?>" <?php echo $value->resposta == 'D' ? "checked":" ";  ?> disabled value="D" />D)
                      <label for="<?php echo 'r'.$radio; $radio++; ?>"><span></span><?php echo $value->respostaD; ?></label>
                   <br>
                  
                   <div class="callout callout-<?php echo $value->resposta == $value->respostaCorreta  ? "success" : "danger";  ?>">
                      <h4>Resposta Certa</h4>
                      <?php
                       switch ($value->respostaCorreta) {
                        case 'A':
                           echo '<p>'.$value->respostaCorreta.') '.$value->respostaA.'</p>';
                           break;
                        case 'B':
                           echo '<p>'.$value->respostaCorreta.') '.$value->respostaB.'</p>';
                           break;
                        case 'C':
                           echo '<p>'.$value->respostaCorreta.') '.$value->respostaC.'</p>';
                           break;   
                        case 'D':
                           echo '<p>'.$value->respostaCorreta.') '.$value->respostaD.'</p>';
                           break;
                        
                        default:
                          echo 'Nào respondido';                        
                           break;
                       }
                      ?>
                      <?php echo $value->respostaA == $value->respostaCorreta ? "checked" : ""; ?>
                  </div>

                    </div><!-- /.box-body -->
                  </div><!-- /.box -->
                  
                  
                  </div>
                   </div>
                   
                    
                                      
                  <?php $i++; endforeach; ?>      
                
                  </div>
                  
                    <div class="form-group has-warning">
                  </div>
                  </div>
                  
                </div><!-- /.box-body -->
                
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->