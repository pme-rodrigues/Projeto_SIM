<?php
    include('server.php');
    include('errors.php');
?>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Alterações Realizadas com Sucesso</h5>
            </div>
            <div class="modal-footer">
            <a href="index.php?page=profile&user_ID=<?= $user_ID?>"><button type="button" class="btn btn-primary">Perfil</button></a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


<!------ Modal box for user drop/delete ---------->
<div id="deleteModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar a Ficha de Utilizador</h5>
            </div>
            <div class="modal-footer">
                <a href="index.php?page=editprofile&delete_id=<?=$user_ID ?>"><button type="button" class="btn btn-danger">Eliminar</button></a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<section class="editprofile">
    <div class="container light-style flex-grow-1 container-p-y">

        <h4 class="font-weight-bold py-3 mb-4">
        Definições da Conta
        </h4>

        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
                        <?php if($_SESSION['type']==0):?>
                        <a class="list-group-item list-group-item-action mt-4" data-toggle="modal" href="#deleteModal">Delete User</a>
                        <?php endif;?>
                    </div>
                </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="account-general">
                        
                    <form action="index.php?page=editprofile" method="POST" enctype="multipart/form-data">
                        <div class="card-body media align-items-center">
                            <img src="<?= $fotosrc ?>" alt="" class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                <label class="btn btn-outline-primary">
                                    Carregar nova foto
                                    <input type="file" name="foto" class="account-settings-fileinput">
                                </label> &nbsp;
                                </div>
                        </div>
                        <hr class="border-light m-0">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-6">
                                <label class="form-label">Nome</label>
                                <input type="text" class="form-control mb-1" name="firstname" value="<?=$firstname ?>" required>
                                </div>
                                <div class="form-group col-6">
                                <label class="form-label">Sobrenome</label>
                                <input type="text" class="form-control" name="lastname" value="<?=$lastname ?>" required> 
                                </div>
                            </div>
                            <?php if($type == 1): ?>
                            <div class="form-group">
                                <label class="form-label">Género</label>
                                <select name="gender" class="form-control" required>
                                    <option value="1" <?php if($gender == 1) echo 'selected';?>>Masculino</option>
                                    <option value="0" <?php if($gender == 0) echo 'selected';?>>Feminino</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                            <label class="form-label">Data de Nascimento</label>
                                <input name="birthdate" type="date" class="form-control" value="<?= $birthdate ?>" required>
                            </div>

                            <div class="form-group">
                            <label class="form-label">Número de Identificação Fiscal</label>
                                <input name="nif" class="form-control" type="text" value="<?= $nif ?>" required>
                            </div>

                            <div class="form-group">
                            <label class="form-label">Número do Cartão de Saúde</label>
                                 <input name="seguro" class="form-control" type="text" value="<?= $seguro ?>" required>
                            </div>
                            <?php endif; ?>
                            <hr class="border-light my-4">
                            
                            <div class="form-group">
                            <label class="form-label">Morada</label>
                                 <input name="adress1" class="form-control" type="text" value="<?= $adress ?>" required>
                            </div>
                            <?php if($type == 1): ?>
                            <div class="form-row">
                                <div class="form-group col-6">
                                <label class="form-label">Distrito</label>
                                <input type="text" class="form-control mb-1" name="district" value="<?= $distrito ?>" required>
                                </div>
                                <div class="form-group col-6">
                                <label class="form-label">Cidade</label>
                                <input type="text" class="form-control" name="city" value="<?= $cidade ?>" required>
                                </div>
                            </div>
                            <?php endif; ?>
                            <hr class="border-light my-4">

                            <div class="form-group">
                            <label class="form-label">Email</label>
                                <input class="form-control" type="tel"  name="email" value="<?= $email ?>" required>
                            </div>

                            <div class="form-group">
                            <label class="form-label">Contacto Telefónico</label>
                                <input class="form-control" type="tel"  name="phone" value="<?= $phone ?>" required>
                            </div>
                            <input type="hidden" name="user_ID" value="<?=$user_ID?>">
                            <input type="hidden" name="tipo" value="<?= $type ?>">
                            <input type="hidden" name="currentfoto" value="<?= $fotosrc ?>">
                        </div>
                        <div class="text-right my-3 mr-2">
                        <button type="submit" name="updateprofile" class="btn btn-primary">Guardar Alterações</button>&nbsp;
                        <a href="index.php?page=profile&user_ID=<?= $user_ID?>"><button type="button" class="btn btn-default">Voltar</button></a>
                        </div>
                    </form>
                    </div>

                    <div class="tab-pane fade" id="account-change-password">
                        <form action="">
                        <div class="card-body pb-2">

                                <div class="form-group">
                                <label class="form-label">Current password</label>
                                <input type="password" class="form-control">
                                </div>

                                <div class="form-group">
                                <label class="form-label">New password</label>
                                <input type="password" class="form-control">
                                </div>

                                <div class="form-group">
                                <label class="form-label">Repeat new password</label>
                                <input type="password" class="form-control">
                                </div>
                        
                        </div>
                        <div class="text-right my-3 mr-2">
                        <input type="hidden" name="user_ID" value="<?= $user_ID?>">
                        <button type="submit" name="changepassword" class="btn btn-primary">Save changes</button>&nbsp;
                        <a href="index.php?page=profile&user_ID=<?= $user_ID?>"><button type="button" class="btn btn-default">Voltar</button></a>
                        </div>
                        </form>
                    </div> 
                </div>
            </div>
        </div> 
    </div>

</section>

<?php if(isset($_GET['success']) AND $_GET['success']==true){
echo '<script>';
    echo '$(document).ready(function(){';
        echo '$("#myModal").modal(\'show\');';
        echo'});';
echo '</script>';
}
?>