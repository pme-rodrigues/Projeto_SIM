<?php
    include('server.php');
    include('errors.php');
?>

<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Criação de Cliente Bem-Sucedida</h5>
            </div>
            <div class="modal-footer">
                <a href="index.php?page=homepage"><button type="button" class="btn btn-primary">Homepage</button></a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<section class="sign-form">
    <div class="error-container">
    <?php                      
    errors_print($errors_signup);                 
    errors_print($errors_signin);
    ?>
    </div>

    <!-- Checks for admin privileges-->
    <?php if(isset($_SESSION['type']) AND $_SESSION['type']== 0):?>
    <div class="btn-container hidden" id="btn-container">
        <div class="btn-group">
           <button class="btn btn-primary active" id="btn-patient" onclick="addpro('remove')" >Para Pacientes</button> 
           <button class="btn btn-primary" id="btn-pro" onclick="addpro('add')" >Para Profissionais</button>    
        </div> 
    </div>
    <?php endif; ?> 
    <!-- Form for Patients-->
    <div class="container" id="container">
        <div class="sign-up-container visible" id="sign-up-container">         
        <form action="index.php?page=sign" method="post">
                 <h1 class="pb-2">Sign up</h1>
                 <label for="p-info">Informação Pessoal</label>
                 <div class="form-row" id="p-info">
                    <div class="form-group col-6">
                        <input class="form-control" type="text" name="firstname" placeholder="Nome" required>
                    </div>
                    <div class="form-group col-6">
                        <input class="form-control" type="text" name="lastname" placeholder="Sobrenome" required>
                    </div>
                 </div>
                 <div class="form-row">
                    <div class="form-group col-3">
                        <select name="gender" class="form-control" required>
                            <option value="" hidden selected disabled>Género</option>
                            <option value="1">Masculino</option>
                            <option value="0">Feminino</option>
                        </select>
                    </div>
                    <div class="form-group col-3">
                    </div>
                    <div class="form-group col-3 pt-3">
                        <label for="bdate">Data de Nascimento:</label>
                    </div>
                    <div class="form-group col-3">
                        <input name="birthdate" type="date" class="form-control" id="bdate" required>
                    </div>
                 </div>
                 <div class="form-row">
                    <div class="form-group col-4">
                        <input name="nif" class="form-control" type="text" placeholder="NIF" required>
                    </div>
                    <div class="form-group col-4">
                        <input name="seguro" class="form-control" type="text" placeholder="Nº Cartão Saúde">
                    </div>
                 </div>
                 <label for="c-info">Informação de Contacto</label>
                 <div class="form-row" id="c-info">
                    <div class="form-group col-6">
                        <input name="adress1" class="form-control" type="text" placeholder="Endereço 1 - Rua ..." required>
                    </div>
                    <div class="form-group col-6">
                        <input name="city" class="form-control" type="text" placeholder="Cidade" required>
                    </div>
                 </div>
                 <div class="form-row">
                    <div class="form-group col-6">
                        <input name="district" class="form-control" type="text" placeholder="Distrito" required>
                    </div>
                    <div class="form-group col-4">
                        <input class="form-control" type="tel"  name="phone" placeholder="Contacto telefónico" required>
                    </div>
                 </div>
                 <label for="a-info">Informação da Conta</label>
                 <div class="form-row" id="a-info">
                    <div class="form-group col-6">
                        <input class="form-control" type="email"  name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group col-3">
                        <input class="form-control" type="password"  name="password1" placeholder="Password" required>
                    </div>
                    <div class="form-group col-3">
                        <input class="form-control" type="password"  name="password2" placeholder="Confirme a Password" required>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input " type="checkbox" id="Check" required>
                            <label class="form-check-label ml-3 mt-1" for="Check">Li e Aceito os Termos e Condições</label>
                        </div>
                    </div>
                 </div>   
                <button type="submit" name="signUp_patient">Sign Up</button>
            </form>            
        </div>

        <?php if(isset($_SESSION['type']) AND $_SESSION['type']== 0):?>
        <!-- Form for Medic, Investigator and Admnin-->
        <div class="form-container sign-up-container-pro hidden" id="sign-up-container-pro">
                <form action="index.php?page=sign" method="post">
                 <h1>Create User Account</h1>
                    <label for="ainfo">Informações Conta</label>
                    <div class="form-row" id="ainfo">
                        <div class="form-group col-12">
                            <input class="form-control" type="email" name='email' placeholder="Email" required/>
                        </div>
                        <div class="form-group col-12">
                            <input class="form-control" type="password" name='password1' placeholder="Password" required/>
                        </div>
                        <div class="form-group col-12">
                            <input class="form-control" type="password" name='password2' placeholder="Confirm Password" required/>
                        </div>
                    </div>
                    <label for="cinfo">Informações Contacto</label>
                    <div class="form-row" id="cinfo">
                        <div class="form-group col-12">
                            <input class="form-control" type="text" name='adress1' placeholder="Endereço 1 - Rua ..." required/>
                        </div>
                        <div class="form-group col-12">
                            <input class="form-control" type="text" name='phone' placeholder="Contacto telefónico" required/>
                        </div>
                    </div>
                    <label for="pinfo">Informações Pessoais</label>
                    <div class="form-row" id="pinfo">
                        <div class="form-group col-4">
                            <input class="form-control" type="text" name="firstname" placeholder="Nome" required>
                        </div>
                        <div class="form-group col-4">
                            <input class="form-control" type="text" name="lastname" placeholder="Sobrenome" required>
                        </div>
                        <div class="form-group col-4">
                            <select name="type" class="form-control" required>
                                <option value="" hidden selected disabled>Estatuto</option>
                                <option value="2"> Médico </option>
                                <option value="3"> Investigador </option>
                                <option value="0"> Administrador </option>
                            </select>
                        </div>
                    </div>          
                  <button type="submit" name="signUp_pro">Sign Up</button>
            </form>            
        </div>
        <?php endif; ?> 

        <!-- Sign in form -->
        <div class="form-container sign-in-container">
                <form action="index.php?page=sign" method="post">
                 <h1 class="pb-4">Sign in</h1>
                  <input class="form-control" type="email" name='email' placeholder="Email" required/>
                  <input class="form-control" type="password" name='password' placeholder="Password" required/> 
                  <a href="#">Esqueceu-se da password?</a>
                <button type="submit" name="signIn">Sign Up</button>
            </form>            
        </div>


        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Bem-vindo de novo!</h1>
                    <p>Para se manter conectado a nós, faça o login com suas informações pessoais</p>
                    <button class="ghost" onclick="sign('signIn')">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Não possui conta?</h1>
                    <p>Crie uma conta para poder usufruir dos serviços de um dos nossos profissionais</p>
                    <button class="ghost" onclick="sign('signUp')">Sign Up</button>
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

<script src="app.js"></script>
