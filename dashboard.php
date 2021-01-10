<?php
    include('errors.php');
?>
<!------ Modal box for user registration and deleting---------->
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <?php if($_GET['op'] == 'reg'):?>
                <h5 class="modal-title">Registo Realizado com Sucesso</h5>
            <?php endif; ?>
            <?php if($_GET['op'] == 'del'):?>
                <h5 class="modal-title">Ficha de Utilizador Eliminada</h5>
            <?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<section class="editprofile">
    <div class="container-fluid light-style flex-grow-1 container-p-y">

        <h4 class="font-weight-bold py-3 mb-4">
        Painel de Administrador
        </h4>

        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <p class="h5 pl-3 pt-4 ">Gestão de Utilizadores</p>
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-utente">Utentes</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-profissional">Profissionais</a>
                        <hr class="border-light my-4">
                        <p class="h5 pl-3 pt-4 ">Registo de Utilizadores</p>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#registo-paciente">Registar Utente</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#registo-profissional">Registar Profissional</a>              
                    </div>
                </div>
            <div class="col-md-9">
                <div class="tab-content">

                    <div class="tab-pane fade active show" id="account-utente">
                        <div class="card-body">
                            <p class="h3 pl-3 pt-4 ">Gestão de Utentes</p>
                        </div>

                        <hr class="border-light m-0">

                        <div class="card-body">
                            <div class="row p-2 m-1 bg-light">

                                

                                <div class="container">
                        
                                    <div class="row">
                                        <div class="panel panel-primary filterable">
                                            <div class="panel-heading">
                                                <div class="pull-right">
                                                    <button class="btn btn-default btn-xs btn-filter mb-1"><span class="glyphicon glyphicon-filter"></span> Filtro</button>
                                                </div>
                                            </div>
                                            <table class="table">
                                                <thead class="tablehead">
                                                    <tr class="filters">
                                                        <th><input type="text" class="form-control" placeholder="ID" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Nome" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Data de Nascimento" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="NIF" disabled></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($users as $user): ?> 
                                                    <tr>
                                                        <td><a href="index.php?page=profile&user_ID=<?= $user['id_user'];?>"><?= $user['id_user']; ?></a></td>
                                                        <td><?= $user['nome']; ?></td>
                                                        <td><?= $user['idade']; ?></td>
                                                        <td><?= $user['nif']; ?></td>
                                                        <td><a href="index.php?page=editprofile&user_ID=<?= $user['id_user'];?>"> Editar</a></td>
                                                    </tr>
                                                    <?php endforeach; ?> 
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <!-----------------           ------------------>                     
                            </div>
                            </div>                                       
                            <div class="tab-pane fade" id="account-profissional">
                                <div class="card-body">
                                    <p class="h3 pl-3 pt-4 ">Gestão de Profissionais</p>
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body">
                                    <div class="row p-2 m-1 bg-light">
                                        <div class="container">
                                            <div class="row">
                                                <div class="panel panel-primary filterable">
                                                    <div class="panel-heading">
                                                        <div class="pull-right">
                                                            <button class="btn btn-default btn-xs btn-filter mb-1"><span class="glyphicon glyphicon-filter"></span> Filtro</button>
                                                        </div>
                                                    </div>
                                                    <table class="table">
                                                        <thead class="tablehead">
                                                            <tr class="filters">
                                                                <th><input type="text" class="form-control" placeholder="ID" disabled></th>
                                                                <th><input type="text" class="form-control" placeholder="Nome" disabled></th>
                                                                <th><input type="text" class="form-control" placeholder="Email" disabled></th>
                                                                <th><input type="text" class="form-control" placeholder="Estatuto" disabled></th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($users_pro as $user_pro): ?> 
                                                            <tr>
                                                                <td><a href="index.php?page=profile&user_ID=<?= $user_pro['id_user'];?>"> <?= $user_pro['id_user']; ?></a></td>
                                                                <td><?= $user_pro['nome']; ?></td>
                                                                <td><?= $user_pro['email']; ?></td>
                                                                <td>
                                                                    <?php 
                                                                    $nlist = array(
                                                                        0  => "Administrador",
                                                                        2  => "Médico",
                                                                        3  => "Investigador",
                                                                    );
                                                                    echo $nlist[$user_pro['tipo']];
                                                                    ?>
                                                                </td>
                                                                <td><a href="index.php?page=editprofile&user_ID=<?= $user_pro['id_user'];?>"> Editar</a></td>
                                                            </tr>
                                                            <?php endforeach; ?> 
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                   
                            </div>

<!-----------------   Formulário de Registo de Utente  ------------------> 

                            <div class="tab-pane fade" id="registo-paciente">
                                <div class="card-body">
                                    <p class="h3 pl-3 pt-4 ">Formulário de Registo de Utente</p>
                                </div>
                                <hr class="border-light m-0">
                                <form action="index.php?page=editprofile" method="POST">
                                        <div class="card-body">
                                            <p class="h4 py-4 ">Informações Pessoais</p>
                                            <div class="form-row">
                                                <div class="form-group col-6">
                                                <label class="form-label">Nome</label>
                                                <input type="text" class="form-control mb-1" name="firstname" required>
                                                </div>
                                                <div class="form-group col-6">
                                                <label class="form-label">Sobrenome</label>
                                                <input type="text" class="form-control" name="lastname" required> 
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="form-label">Género</label>
                                                <select name="gender" class="form-control" required>
                                                    <option value="" hidden selected disabled>Género</option>
                                                    <option value="1">Masculino</option>
                                                    <option value="0">Feminino</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                            <label class="form-label">Data de Nascimento</label>
                                                <input name="birthdate" type="date" class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                            <label class="form-label">Número de Identificação Fiscal</label>
                                                <input name="nif" class="form-control" type="text" required>
                                            </div>

                                            <div class="form-group">
                                            <label class="form-label">Número do Cartão de Saúde</label>
                                                <input name="seguro" class="form-control" type="text" required>
                                            </div>
                                            
                                            <hr class="border-light my-4">
                                            <p class="h4 py-4 ">Informações de Contacto</p>
                                            <div class="form-group">
                                            <label class="form-label">Morada</label>
                                                <input name="adress1" class="form-control" type="text" required>
                                            </div>
                                            
                                            <div class="form-row">
                                                <div class="form-group col-6">
                                                <label class="form-label">Distrito</label>
                                                <input type="text" class="form-control mb-1" name="district" required>
                                                </div>
                                                <div class="form-group col-6">
                                                <label class="form-label">Cidade</label>
                                                <input type="text" class="form-control" name="city" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="form-label">Contacto Telefónico</label>
                                                <input class="form-control" type="tel"  name="phone" required>
                                            </div>
                                            
                                            <hr class="border-light my-4">
                                            <p class="h4 py-4 ">Informações da Conta</p>                            
                                            <div class="form-group">
                                            <label class="form-label">Email</label>
                                                <input class="form-control" type="email"  name="email" required>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-6">
                                                <label class="form-label">Password</label>
                                                <input class="form-control" type="password"  name="password1" required>
                                                </div>
                                                <div class="form-group col-6">
                                                <label class="form-label">Confirmação da Password</label>
                                                <input class="form-control" type="password"  name="password2" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right my-3 mr-2">
                                        <button type="submit" name="signUp_patient" class="btn btn-primary">Guardar Alterações</button>&nbsp;
                                        </div>
                                </form>                  
                            </div>
                            
<!-----------------   Formulário de Registo de Profissional  ------------------> 
                            <div class="tab-pane fade" id="registo-profissional">
                                <div class="card-body">
                                    <p class="h3 pl-3 pt-4 ">Formulário de Registo de Profissional</p>
                                </div>
                                <hr class="border-light m-0">
                                <form action="index.php?page=editprofile" method="POST">
                                        <div class="card-body">
                                            <p class="h4 py-4 ">Informações Pessoais</p>
                                            <div class="form-row">
                                                <div class="form-group col-6">
                                                <label class="form-label">Nome</label>
                                                <input type="text" class="form-control mb-1" name="firstname" required>
                                                </div>
                                                <div class="form-group col-6">
                                                <label class="form-label">Sobrenome</label>
                                                <input type="text" class="form-control" name="lastname" required> 
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                            <label class="form-label">Estatuto Profissional</label>
                                            <select name="type" class="form-control" required>
                                                <option value="" hidden selected disabled>Estatuto</option>
                                                <option value="2"> Médico </option>
                                                <option value="3"> Investigador </option>
                                                <option value="0"> Administrador </option>
                                            </select>
                                            </div>

                                            <hr class="border-light my-4">
                                            <p class="h4 py-4 ">Informações de Contacto</p>
                                            <div class="form-group">
                                            <label class="form-label">Morada</label>
                                                <input name="adress1" class="form-control" type="text" required>
                                            </div>
                
                                            <div class="form-group">
                                            <label class="form-label">Contacto Telefónico</label>
                                                <input class="form-control" type="tel"  name="phone" required>
                                            </div>
                                            
                                            <hr class="border-light my-4">
                                            <p class="h4 py-4 ">Informações da Conta</p>                            
                                            <div class="form-group">
                                            <label class="form-label">Email</label>
                                                <input class="form-control" type="email"  name="email" required>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-6">
                                                <label class="form-label">Password</label>
                                                <input class="form-control" type="password"  name="password1" required>
                                                </div>
                                                <div class="form-group col-6">
                                                <label class="form-label">Confirmação da Password</label>
                                                <input class="form-control" type="password"  name="password2" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right my-3 mr-2">
                                        <button type="submit" name="signUp_pro" class="btn btn-primary">Guardar Alterações</button>&nbsp;
                                        </div>
                                </form>                  
                            </div>
                </div> 
            </div>
         </div>
             
    </div>
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


</section>