
<section id='report'>
    <div class="container light-style flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-4">
        Diagnóstico
    </h4>
        <div class="card overflow-hidden border-0">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-12 pt-0">
                    <div class="card-body media align-items-center">
                        <img src="<?= $user_info_list['foto']; ?>" alt="" class="d-block ui-w-80">
                        <div class="media-body ml-4">
                            <h4> <?= $user_info_list['nome']; ?></h4>
                            <p>Email: <?= $user_info_list['email']; ?> (Send Report)</p>
                        </div>
                    </div>
                    <hr class="border-light my-1">
                    <div class="card-body text-left">
                        <h4 class="pb-3">Respostas ao Inquérito</h4>
                        <div class="row d-flex flex-row align-items-stretch text-justify">
                            <div class="col-4">
                            <p>Temperatura Corporal:</p>
                            <p>Sintomas de Tosse Seca: </p>
                            <p>Dor de Garganta: </p>
                            <p>Fraqueza:</p>
                            <p>Dificuldade a Respirar:</p>
                            <p>Sonolência: </p>
                            <p>Dor de Peito: </p>
                            <p>Histórico de Viagens para Países Infetados: </p>
                            <p>Diabetes:</p>
                            </div>
                            <div class="col-2">
                            <p><?= $temperatura; ?>&#8451;</p>
                            <p><?php if($tosse == 1) echo 'Sim'; else echo'Não'?></p>
                            <p><?php if($garganta == 1) echo 'Sim'; else echo'Não'?></p>
                            <p><?php if($fraqueza == 1) echo 'Sim'; else echo'Não'?></p>
                            <p><?php if($prob_r == 1) echo 'Sim'; else echo'Não'?></p>
                            <p><?php if($sonolencia == 1) echo 'Sim'; else echo'Não'?></p>
                            <p><?php if($dor_peito == 1) echo 'Sim'; else echo'Não'?></p>
                            <p><?php if($viagens == 1) echo 'Sim'; else echo'Não'?></p>
                            <p><?php if($diabetes == 1) echo 'Sim'; else echo'Não'?></p>
                            </div>
                            <div class="col-4">
                            <p>Doença Cardíaca:</p>
                            <p>Doença Pulmonar:</p>
                            <p>Progresso de Sintomas:</p>
                            <p>Elevada Pressão Arterial: </p>
                            <p>Doença Renal: </p>
                            <p>Perda de Apetite: </p>
                            <p>Perda do Olfato: </p>
                            <p>Histórico de AVC ou Imunidade Reduzida:</p>
                            <strong><p>Resultado do Diagnóstico - Risco:</p></strong>
                            </div>
                            <div class="col-2">
                            <p><?php if($coracao == 1) echo 'Sim'; else echo'Não'?></p>
                            <p><?php if($pulmao == 1) echo 'Sim'; else echo'Não'?></p>
                            <p><?php if($avc == 1) echo 'Sim'; else echo'Não'?></p>
                            <p><?php if($sintomas == 1) echo 'Sim'; else echo'Não'?></p>
                            <p><?php if($press == 1) echo 'Sim'; else echo'Não'?></p>
                            <p><?php if($renal == 1) echo 'Sim'; else echo'Não'?></p>
                            <p><?php if($apetite == 1) echo 'Sim'; else echo'Não'?></p>
                            <p><?php if($olfato == 1) echo 'Sim'; else echo'Não'?></p>
                              <?php switch($diagnostico){
                                  case 'Baixo':
                                  echo ' <p class="text-success">Baixo</p>';
                                  break;

                                  case 'Medio':
                                  echo ' <p class="text-warning">Médio</p>';
                                  break;

                                  case 'Elevado':
                                  echo ' <p class="text-danger">Elevado</p>';
                                  break;        
                              }
                              ?>
                            </div>
                        </div>
                    </div>
                    <hr class="border-light my-1">
                    <div class="card-body">
                        <h4 class="py-3">Diagnóstico Médico</h4>
                        <form action="index.php?page=formcovid" method="POST">
                            <div class="form-group pt-2 pb-4">
                                <select name="diag_med" class="form-control" required>
                                    <option value="" hidden selected disabled>Diagnóstico</option>
                                    <option value="Realizar">Realizar Teste COVID-19</option>
                                    <option value="Nao Realizar">Não Realizar Teste COVID-19</option>
                                </select>   
                            </div>
                            <div class="form-group">
                                <label class="form-label"> Observações</label>
                                <textarea class="form-control" name="obs"></textarea> 
                            </div>
                            <input type = "hidden" name="id_paciente" value = "<?= $id_paciente; ?>">
                            <input type = "hidden" name="id_fatores" value = "<?= $id_fatores; ?>">
                            <input type = "hidden" name="diag_site" value = "<?= $diagnostico; ?>">
                            <div class="text-right my-3 mr-2">
                                <button type="submit" name="finish_appointment" class="btn btn-primary">Concluir Diagnóstico</button>&nbsp;
                            </div>
                        </form>                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

