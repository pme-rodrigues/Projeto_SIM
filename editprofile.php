<?php
    include('server.php');
    include('errors.php');
?>

<section id="editprofile">
    <div class="container light-style flex-grow-1 container-p-y">

        <h4 class="font-weight-bold py-3 mb-4">
        Account settings
        </h4>

        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
                    </div>
                </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="account-general">
                        
                    <form action="">
                        <div class="card-body media align-items-center">
                            <img src="images\profile.png" alt="" class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                <label class="btn btn-outline-primary">
                                    Carregar nova foto
                                    <input type="file" class="account-settings-fileinput">
                                </label> &nbsp;
                                </div>
                        </div>
                        <hr class="border-light m-0">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-6">
                                <label class="form-label">Nome</label>
                                <input type="text" class="form-control mb-1" value="<?=$firstname ?>" required>
                                </div>
                                <div class="form-group col-6">
                                <label class="form-label">Sobrenome</label>
                                <input type="text" class="form-control" value="<?=$lastname ?>" required> 
                                </div>
                            </div>

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

                            <hr class="border-light my-4">
                            
                            <div class="form-group">
                            <label class="form-label">Morada</label>
                                 <input name="adress1" class="form-control" type="text" value="<?= $adress ?>" required>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-6">
                                <label class="form-label">Distrito</label>
                                <input type="text" class="form-control mb-1" value="<?= $distrito ?>" required>
                                </div>
                                <div class="form-group col-6">
                                <label class="form-label">Cidade</label>
                                <input type="text" class="form-control" value="<?= $cidade ?>" required>
                                </div>
                            </div>
                            
                            <hr class="border-light my-4">

                            <div class="form-group">
                            <label class="form-label">Email</label>
                                <input class="form-control" type="tel"  name="phone" value="<?= $email ?>" required>
                            </div>

                            <div class="form-group">
                            <label class="form-label">Contacto Telefónico</label>
                                <input class="form-control" type="tel"  name="phone" value="<?= $phone ?>" required>
                            </div>
                        </div>
                        <div class="text-right my-3 mr-2">
                        <button type="submit" name="updateprofile" class="btn btn-primary">Save changes</button>&nbsp;
                        <a href="index.php?page=profile&user_ID=<?= $_GET['user_ID']?>"><button type="button" class="btn btn-default">Voltar</button></a>
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
                        <button type="submit" name="changepassword" class="btn btn-primary">Save changes</button>&nbsp;
                        <a href="index.php?page=profile&user_ID=<?= $_GET['user_ID']?>"><button type="button" class="btn btn-default">Voltar</button></a>
                        </div>
                        </form>
                    </div> 
                </div>
            </div>
        </div> 
    </div>

</section>