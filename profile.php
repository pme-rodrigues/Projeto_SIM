<?php
    if(!isset($_SESSION['authuser'])) header('location: index.php?page=sign');
    else if(isset($_SESSION['authuser']) AND $_SESSION['type'] == 1 AND $_SESSION['user_ID'] != $user_ID) header('location: index.php?page=homepage');
    else if(isset($_SESSION['authuser']) AND $_SESSION['type'] == 3 AND $_SESSION['user_ID'] != $user_ID) header('location: index.php?page=homepage');
?>

<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <?php if($_GET['op'] == 'mar'):?>
                <h4 class="modal-title">Registo Realizado com Sucesso<i class="fas fa-check-circle ml-2 text-success"></i></h4>
            <?php endif; ?>
            <?php if($_GET['op'] == 'des'):?>
                <h4 class="modal-title">Consulta Desmarcada<i class="fas fa-check-circle ml-2 text-success"></i></h4>
            <?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div id="deleteModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pretende desmarcar a consulta?</h5>
            </div>
            <div class="modal-footer">
                <a href="index.php?page=profile&user_ID=<?= $user_ID;?>&desmarcar"><button type="button" class="btn btn-danger">Desmarcar</button></a>
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>


<section id="profile">
<div class="container">
<div class="row">
	<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
		<div class="card h-100">
			<div class="card-body">
				<div class="account-settings">
					<div class="user-profile">
						<div class="user-avatar">
							<img src="<?= $fotosrc ?>" alt="...">
						</div>
                        <h5 class="user-name"><?= $fullname ?></h5>

                        <?php if($_SESSION['type'] == 0 OR $_SESSION['user_ID'] == $user_ID):?>
                        <div class="edit-profile">
                        <a href="index.php?page=editprofile&user_ID=<?= $user_ID; ?>"><button class="btn btn-light"><i class="fas fa-cog mr-2"></i>Editar Perfil</button></a>
                        </div>
                        <?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12">
		<div class="card h-100">
			<div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h2>Perfil</h2>
                </div>
                </div>
                    <div class="table-responsive">
                        <table class="table table-user-information">
                        <tbody>
                            <tr>        
                                <td>
                                    <strong>
                                    <i class="fas fa-user mr-2"></i>Nome                                           
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    <?= $fullname ?>    
                                </td>
                            </tr>
                            <tr>    
                                <td>
                                    <strong>  
                                    <i class="fas fa-envelope mr-2"></i>Email                                               
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    <?= $email ?>  
                                </td>
                            </tr>
                            <tr>        
                                <td>
                                    <strong>
                                        <i class="fas fa-phone-alt mr-2"></i>Contacto                                                
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    <?= $phone ?> 
                                </td>
                            </tr>
                            <tr>        
                                <td>
                                    <strong>
                                    <i class="fas fa-id-card-alt mr-2"></i>Cargo                                                
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    <?= $status ?> 
                                </td>
                            </tr>
                            <?php if($status == "Utente" ): ?>
                            <tr>        
                                <td>
                                    <strong> 
                                    <i class="far fa-calendar-check mr-2"></i>Marcações                                               
                                    </strong>
                                </td>
                                <td class="text-primary">
                                <?= $appointments ?> 
                                <?php if($appointments != 0):?>
                                    <a class="text-success text-decoration-none" data-toggle="modal" href="#deleteModal"><i class="far fa-times-circle mr-1"></i>Desmarcar Consulta</a>
                                <?php endif; ?>      
                                </td>
                            </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
			</div>
		</div>
	</div>
</div>
</div>
</section>



<?php if($_SESSION['type'] == 2 AND !($_SESSION['user_ID'] == $user_ID)): //its a doctor and its not on a patient profile ?>   
<section class="consult">
    <div class="container">
        <div class="card-deck">                     
            <div class="card">
                <div class="card-body text-center">
                <a href="index.php?page=formcovid&user_ID=<?= $user_ID;?>"><button class="btn btn-lg btn-primary mt-4"><i class="fas fa-laptop-medical"></i> Realizar Teste de Diagnóstico</button></a>
                <p class="card-text mt-3"><i>powered by <strong><a class="text-decoration-none" href="#">COVYDSYM</a></strong></i></p>
                </div>
            </div>
    </div>

<?php endif; ?>
    
<!--  Só deve aparecer se o paciente não possuir consultas pendentes  -->
<?php if($_SESSION['type'] == 1  AND $appointments == 0): ?>
<section class="consult">
    <div class="container">
        <div class="card-deck">                     
            <div class="card">
                <div class="card-body text-center">
                <button class="btn btn-lg btn-primary mt-4" data-toggle="collapse" href="#collapse"><i class="fas fa-laptop-medical mr-2"></i> Marcar Diagnóstico</button>
                <p class="card-text mt-3 text-decoration-none"><i>powered by <strong><a class="text-decoration-none" href="#">COVYDSYM</a></strong></i></p>
                </div>
            </div>
        </div>
        <div class="collapse tbl1" id="collapse">
        <div class="card filterable">
                <div class="card-header">
                    <div class="float-right">
                        <button class="btn btn-light btn-xs btn-filter mb-1"><i class="fas fa-filter mr-1"></i>Filtro</button>
                    </div>
                </div>
                <table class="table">
                    <thead class="tablehead">
                        <tr class="filters">
                            <th><input type="text" class="form-control" placeholder="Nome" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Lista de Espera" disabled></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($doctors_list as $doctor): ?>
                        <tr>
                            <td><i class="fas fa-user-md mr-2"></i><?= $doctor['nome'] ?></td>
                            <td><?= $doctor['Total'] ?></td>
                            <td><a class="text-decoration-none" href="index.php?page=profile&user_ID=<?= $_SESSION['user_ID'];?>&medic_id=<?= $doctor['id_user'];?>">Marcar Consulta<i class="fas fa-notes-medical ml-2"></i></a></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>        
    </div>
</section>
<?php endif; ?>

<!--  Só deve aparecer caso se trate de um médico   -->
<?php if($_SESSION['type'] == 2 AND $_SESSION['user_ID']== $user_ID):?>
<section class="consult">
    <div class="container tbl">
        <h3>Consultas Pendentes</h3>
            <hr>
            <div class="row">
            <div class="card filterable">
                <div class="card-header">
                    <div class="float-right">
                        <button class="btn btn-light btn-xs btn-filter mb-1"><i class="fas fa-filter mr-1"></i>Filtro</button>
                    </div>
                </div>
                <table class="table">
                    <thead class="tablehead">
                        <tr class="filters">
                            <th><input type="text" class="form-control" placeholder="Nome" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Data da Marcação" disabled></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($appointments_list as $appointment): ?>
                        <tr>
                            <td><?= $appointment['nome'] ?></td>
                            <td><?= $appointment['data'] ?></td>
                            <td><a class="text-decoration-none" href="index.php?page=profile&user_ID=<?= $appointment['id_user'];?>"> Realizar Consulta</a></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>               
     </div>
</div>
<div class="container tbl">
        <h3>Consultas Finalizadas</h3>
            <hr>
            <div class="row">
            <div class="card filterable">
                <div class="card-header">
                    <div class="float-right">
                        <button class="btn btn-light btn-xs btn-filter mb-1"><i class="fas fa-filter mr-1"></i>Filtro</button>
                    </div>
                </div>
                <table class="table">
                    <thead class="tablehead">
                        <tr class="filters">
                            <th><input type="text" class="form-control" placeholder="Nome" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Diagnóstico" disabled></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($diagn_list as $diag): ?>
                        <tr>
                            <td><?= $diag['nome'] ?></td>
                            <td><?php if($diag['diagnostico_md'] == "Realizar") echo 'Realizar Teste COVID-19'; else echo 'Não Realizar Teste COVID-19'; ?></td>
                            <td><a href="index.php?page=diagnostic_data&id=<?= $diag['id_user'];?>"> Ver mais</a></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>               
     </div>
</div>
<?php endif; ?>
</section>

<?php if(isset($_GET['success']) AND $_GET['success']==true):?> 
<script>
    $(document).ready(function(){
        $("#myModal").modal('show');
        });
</script>
<?php endif;?>

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