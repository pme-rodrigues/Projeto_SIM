
<section class="editprofile">
    <div class="container-fluid light-style flex-grow-1 container-p-y">

        <h4 class="font-weight-bold py-3 mb-4">
        Dados Estatísticos
        </h4>

        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <p class="h5 pl-3 pt-4 ">Gráficos e Tabelas</p>
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-estatisticas">Género e Idade</a>
                        <hr class="border-light my-4">
                        <p class="h5 pl-3 pt-4 ">Consultar Dados</p>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-utente">Utentes</a>           
                    </div>
                </div>               
            <div class="col-md-9">


                <div class="tab-content">
                     <!-- Inicio da Tab -->
                    <div class="tab-pane fade active show" id="account-estatisticas">
                        <div class="card-body">
                            <p class="h3 pl-3 pt-4 ">Estatística: Género e Idade</p>
                        </div>

                        <hr class="border-light m-0">
                        <div class="card-body m-auto" id="chartContainer1" style="height: 370px; width: 70%;">
                            
                        </div>

                        <div class="card-body mt-3 text-center">
                            <h5 class="mt-2">Distribuição dos Sintomas Por Género</h5>
                            <div class="row p-2 m-1 bg-white">
                                <div class="container">
                        
                                    <div class="row tb1">
                                        <div class="card filterable">
                                            <div class="card-header">
                                                <div class="float-right">
                                                    <button class="btn btn-default btn-xs btn-filter mb-1"><span class="glyphicon glyphicon-filter"></span> Filtro</button>
                                                </div>
                                            </div>
                                            <table class="table">
                                                <thead class="tablehead">
                                                    <tr class="filters">
                                                        <th><input type="text" class="form-control" placeholder="Temperatura" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Tosse" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Dor de Garganta" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Fraqueza" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Sonolência" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Perda de Apetite" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Perda de Olfato" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Género" disabled></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($symptoms_list as $symptoms): ?>   
                                                    <tr>
                                                        <td><?= $symptoms['temp_corporal']; ?></td>
                                                        <td><?php if($symptoms['tosse_seca']== 1) echo 'Sim'; else echo'Não';?></td>
                                                        <td><?php if($symptoms['dor_garganta']== 1) echo 'Sim'; else echo'Não';?></td>
                                                        <td><?php if($symptoms['fraqueza']== 1) echo 'Sim'; else echo'Não';?></td>
                                                        <td><?php if($symptoms['sonolencia']== 1) echo 'Sim'; else echo'Não';?></td>
                                                        <td><?php if($symptoms['perda_apetite']== 1) echo 'Sim'; else echo'Não';?></td>
                                                        <td><?php if($symptoms['perda_olfato']== 1) echo 'Sim'; else echo'Não';?></td>
                                                        <td><?php if($symptoms['genero']== 1) echo 'Masculino'; else echo'Feminino';?></td>
                                                    </tr>
                                                    <?php endforeach; ?>  
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="border-light mt-2">
                        <div class="album py-5 bg-white">
                            <div class="container text-center">
                            <h2 class="my-3">Distribuição dos Sintomas Por Idade</h2>  
                            <div class="row">
                                <div class="col-md-4">
                                <div class="card mb-4 box-shadow">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <div id="chartContainer_tosse" style="height: 300px; width: 100%;" ></div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-4">
                                <div class="card mb-4 box-shadow">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <div id="chartContainer_garganta" style="height: 300px; width: 100%;" ></div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-4">
                                <div class="card mb-4 box-shadow">  
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <div id="chartContainer_fraqueza" style="height: 300px; width: 100%;" ></div> 
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-4">
                                <div class="card mb-4 box-shadow">  
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <div id="chartContainer_sono" style="height: 300px; width: 100%;" ></div> 
                                        </div>
                                    </div>
                                </div>
                                </div>                       
                                
                                <div class="col-md-4">
                                <div class="card mb-4 box-shadow">  
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <div id="chartContainer_peito" style="height: 300px; width: 100%;" ></div> 
                                        </div>
                                    </div>
                                </div>
                                </div>

                                <div class="col-md-4">
                                <div class="card mb-4 box-shadow">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <div id="chartContainer_olfato" style="height: 300px; width: 100%;" ></div>                  
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        

                    </div>
                <!-- Fim da Tab -->
                 <!-- Inicio da Tab -->
                <div class="tab-pane fade" id="account-utente">
                        <div class="card-body">
                            <p class="h3 pl-3 pt-4 ">Relatório das Consultas Realizadas</p>
                        </div>

                        <hr class="border-light m-0">

                        <div class="card-body mt-3 text-center">
                            <div class="row p-2 m-1 bg-white">
                                <div class="container">
                                    <div class="row tb1">
                                        <div class="card filterable expand">
                                            <div class="card-header">
                                                <div class="float-right">
                                                    <button class="btn btn-default btn-xs btn-filter mb-1"><span class="glyphicon glyphicon-filter"></span> Filtro</button>
                                                </div>
                                            </div>
                                            <table class="table" style="width:100%;">
                                                <thead class="tablehead">
                                                    <tr class="filters">
                                                        <th><input type="text" class="form-control" placeholder="Data da Consulta" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Resultado" disabled></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($userdata_list as $userdata): ?>   
                                                    <tr>
                                                        <td><?= $userdata['data']; ?></td>
                                                        <td><?php if($userdata['diagnostico_md'] == "Realizar") echo 'Realizar Teste'; else echo'Não Realizar Teste';?></td>
                                                        <td><a class="text-decoration-none" href="index.php?page=research_data&id_f=<?= $userdata['id_fatores_risco']; ?>">Consultar Dados</a></td> 
                                                    </tr>
                                                    <?php endforeach; ?>  
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="border-light mt-2">
                    </div>
                <!-- Fim da Tab -->
                </div>
            </div>
            </div>
        </div>
    </div>
</section>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
$(document).ready(function(){
    $('.filterable .btn-filter').click(function(){
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">Nenhum resultado encontrado</td></tr>'));
        }
    });
});
</script>         