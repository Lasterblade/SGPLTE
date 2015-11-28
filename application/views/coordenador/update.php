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
            <!-- left column -->
            
            <div class="col-md-12">
              <!-- Horizontal Form -->
              
              <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Coordenador</h3>
                </div><!-- /.box-header -->
                <div class="box-body">     
                  
                  <?php echo form_open('Coordenador/update/'.$editar->idcoordenador); ?>
                  <?php echo validation_errors(); ?>
                  <!-- <? // php print_r($editar);?> !-->
                
                    <!-- text input -->
                    <div class="form-group">
                      <input type="hidden" name="idpessoa" class="form-control" name="idpessoa" placeholder="Numero..."  value="<?php echo $editar->idpessoa; ?>">
                    </div>
                   
                  <div class="row">
                   
                     <div class="col-xs-5">
                        <div class="input-group">
                        <span class="input-group-addon">Nome:</span>
                        <input type="text" name="nome" class="form-control" placeholder="Digite seu nome..." value="<?php echo $editar->nome; ?>">
                        </div>
                     </div>
                    
                     <div class="col-xs-2" style="width:200px">
                        <div class="input-group">
                          <span class="input-group-addon">Sexo: </span>  
                          <select name="sexo" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" >
                            <option  value="0">Selecione...</option>
                            <option <?php echo($editar->sexo == 'M' ? 'selected' : ' '); ?> value="M">Masculino</option>
                            <option <?php echo($editar->sexo == 'F' ? 'selected' : ' '); ?> value="F">Feminino</option>
                          </select>
                      </div>
                    </div>
                   
                    <div class="col-xs-2">
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="date" name="data_nascimento" class="form-control" placeholder="Data de Nascimento..."  value="<?php echo $editar->data_nascimento;?>">
                        </div>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                   
                     <div class="col-xs-4">
                        <div class="input-group">
                        <span class="input-group-addon">Email:</span>
                        <input type="email" name="email" class="form-control" placeholder="Digite seu email..." value="<?php echo $editar->email;?>">
                        </div>
                     </div>
                    
                     <div class="col-xs-2">
                        <div class="input-group">
                          <span class="input-group-addon">CPF: </span>  
                          <input type="text"  name="cpf"class="form-control" placeholder="Digite seu CPF..."data-inputmask="'mask': '999.999.999-99'" data-mask value="<?php echo $editar->cpf;?>" style="width:114px"  >
                      </div>
                    </div>
                    
                     <div class="col-xs-2" style="margin-left:2%">
                        <div class="input-group">
                          <span class="input-group-addon">RG: </span>  
                          <input type="text" name="rg" class="form-control" placeholder="Digite seu RG..."data-inputmask="'mask': '99.999.999-99'" data-mask value="<?php echo $editar->rg;?>" style="width:114px" >
                      </div>
                    </div>
                  </div>
                  
                   <br>
                  <div class="row">
                   
                     <div class="col-xs-2">
                        <div class="input-group">
                        <span class="input-group-btn"><button type="button" class="btn btn-success">Buscar CEP</button></span>
                        <input type="text" id="cep"  name="cep" class="form-control" placeholder="Digite seu cep..." value="<?php echo $editar->cep;?>" style="width:120px" >
                        </div>
                     </div>
                    
                     <div class="col-xs-3" style="margin-left:7%">
                        <div class="input-group">
                          <span class="input-group-addon">Bairro: </span>  
                          <input type="text" id="bairro"  name="bairro" class="form-control" placeholder="Digite seu bairro..." data-cep="bairro" value="<?php echo $editar->bairro;?>" >
                      </div>
                    </div>
                    
                     <div class="col-xs-3">
                        <div class="input-group">
                          <span class="input-group-addon">Rua: </span>  
                          <input type="text" id="rua" name="rua" class="form-control" placeholder="Digite sua rua..." data-cep="logradouro" value="<?php echo $editar->rua;?>">
                      </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="input-group">
                          <span class="input-group-addon">Nº: </span>  
                          <input type="text" name="numero" class="form-control" placeholder="Numero..." value="<?php echo $editar->numero;?>">
                      </div>
                    </div>
                  </div>
                  
                   <br>
                  <div class="row">
                   
                     <div class="col-xs-2" style="width:200px">
                        <div class="input-group">
                        <span class="input-group-addon">Cidade:</span>
                        <input type="text" id="cidade" name="cidade" class="form-control" placeholder="Digite Sua Cidade"  data-cep="cidade" value="<?php echo $editar->cidade;?>" style="width:200px">
                        </div>
                     </div>
                    
                     <div class="col-xs-2" style="margin-left:14%">
                        <div class="input-group">
                          <span class="input-group-addon">UF: </span>  
                          <input type="text" id="uf" name="uf" class="form-control" data-inputmask="'mask': 'AA'" data-mask value="<?php echo $editar->uf;?>">
                      </div>
                    </div>
                    
                     <div class="col-xs-3" style="margin-left:2%">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-phone"></i> Telefone:</span>  
                          <input type="text" name="telefone" class="form-control" placeholder="Digite seu Telefone..." data-inputmask="'mask': '(99) 99999-9999'" data-mask  value="<?php echo $editar->telefone;?>" style="width:160px">
                      </div>
                    </div>
                  </div>
                  
                  
                    <div class="form-group has-warning">
                  </div>

                   <div class="box-footer">
                    <button type="limpar" name="limpar" class="btn btn-default">Cancelar</button>
                    <button type="submit" name="submit" class="btn btn-info pull-right">Confirmar</button>
                  </div>

                  <?php form_close(); ?>
                  
                        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->