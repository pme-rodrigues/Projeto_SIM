<?php
    include('server.php');
    include('errors.php');
?>

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
                        <a href="index.php?page=editprofile&user_ID=<?= $user_ID; ?>"><button class="btn btn-light">Editar Perfil</button></a>
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
                                        Nome                                           
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    <?= $fullname ?>    
                                </td>
                            </tr>
                            <tr>    
                                <td>
                                    <strong>  
                                        Email                                               
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    <?= $email ?>  
                                </td>
                            </tr>
                            <tr>        
                                <td>
                                    <strong>
                                        <span class="glyphicon glyphicon-cloud text-primary"></span>  
                                        Contacto                                                
                                    </strong>
                                </td>
                                <td class="text-primary">
                                    <?= $phone ?> 
                                </td>
                            </tr>
                            <tr>        
                                <td>
                                    <strong>
                                        <span class="glyphicon glyphicon-bookmark text-primary"></span> 
                                        Cargo                                                
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
                                        <span class="glyphicon glyphicon-bookmark text-primary"></span> 
                                        Consultas Realizadas                                                
                                    </strong>
                                </td>
                                <td class="text-primary">
                                <?= $consultas ?>
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
<section class="consult">
 <div class="container">
    <div class="card-deck">
        <div class="card">
            <div class="card-body text-center">
            <button class="btn btn-lg btn-primary mt-4"><i class="fas fa-laptop-medical"></i> Realizar Teste de Diagnóstico</button>
            <p class="card-text mt-3"><i>powered by <strong><a href="">COVYDSYM</a></strong></i></p>
            </div>
        </div>
        <div class="card">
        <div class="card-body text-center">
            <button class="btn btn-lg btn-info mt-4"><i class="fas fa-notes-medical"></i> Resultados do Teste</button>
            <p class="card-text mt-3"><i>powered by <strong><a href="">COVYDSYM</a></strong></i></p>    
        </div>
        </div>
    </div>
</div>
</section>