<section id='report'>
    <div class="container light-style flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-4">
       Relatório de Dados
    </h4>
        <div class="card overflow-hidden border-0">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-12 pt-0">
                    <div class="card-body ">
                            <h4 class="pb-2">Informações do Utente</h4>
                            <p>Género: <?= $gender; ?></p>
                            <p>Idade: <?= $idade; ?></p>
                            <p>Cidade: <?= $user_info['Cidade']; ?></p>
                            <p>Distrito: <?= $user_info['distrito']; ?></p>
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
                            <p><?= $user_test_answers['temp_corporal']; ?></p>
                            <p><?php if($user_test_answers['tosse_seca'] == 1) echo 'Sim'; else echo'Não';?></p>
                            <p><?php if($user_test_answers['dor_garganta'] == 1) echo 'Sim'; else echo'Não';?></p>
                            <p><?php if($user_test_answers['fraqueza'] == 1) echo 'Sim'; else echo'Não';?></p>
                            <p><?php if($user_test_answers['prob_respiratorio'] == 1) echo 'Sim'; else echo'Não';?></p>
                            <p><?php if($user_test_answers['sonolencia'] == 1) echo 'Sim'; else echo'Não';?></p>
                            <p><?php if($user_test_answers['dor_peito'] == 1) echo 'Sim'; else echo'Não';?></p>
                            <p><?php if($user_test_answers['viagens'] == 1) echo 'Sim'; else echo'Não';?></p>
                            <p><?php if($user_test_answers['diabetes'] == 1) echo 'Sim'; else echo'Não';?></p>
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
                            
                            </div>
                            <div class="col-2">
                            <p><?php if($user_test_answers['doenca_cardiaca'] == 1) echo 'Sim'; else echo'Não';?></p>
                            <p><?php if($user_test_answers['doenca_pulmonar'] == 1) echo 'Sim'; else echo'Não';?></p>
                            <p><?php if($user_test_answers['prog_sintomas'] == 1) echo 'Sim'; else echo'Não';?></p>
                            <p><?php if($user_test_answers['press_arterial'] == 1) echo 'Sim'; else echo'Não';?></p>
                            <p><?php if($user_test_answers['doenca_renal'] == 1) echo 'Sim'; else echo'Não';?></p>
                            <p><?php if($user_test_answers['perda_apetite'] == 1) echo 'Sim'; else echo'Não';?></p>
                            <p><?php if($user_test_answers['perda_olfato'] == 1) echo 'Sim'; else echo'Não';?></p>
                            <p><?php if($user_test_answers['avc'] == 1) echo 'Sim'; else echo'Não';?></p>
                            </div>
                        </div>
                    </div>
                    <div class="text-left my-3 mr-2">
                    <h5><a class="ml-4 text-decoration-none" href="index.php?page=researcher#account-estatisticas">Voltar</a></h5>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</section>

