<?php
    include('server.php');
    include('errors.php');
?>

<section class="sign-form">
    <div class="btn-container hidden" id="btn-container">
        <div class="btn-group">
           <button class="btn btn-primary active" id="btn-patient" onclick="addpro('remove')" >Para Pacientes</button> 
           <button class="btn btn-primary" id="btn-pro" onclick="addpro('add')" >Para Profissionais</button>    
        </div> 
    </div>
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
                 <div class="form-row" id="profile">
                    <div class="form-group col-3">
                        <select name="gender" class="form-control">
                            <option value="" hidden selected disabled>Sexo</option>
                            <option value="Male">Masculino</option>
                            <option value="Female">Feminino</option>
                        </select>
                    </div>
                    <div class="form-group col-3 pt-3">
                        <label for="bdate">Data de Nascimento:</label>
                    </div>
                    <div class="form-group col-3">
                        <input name="birthdate" type="date" class="form-control" id="bdate">
                    </div>
                 </div>
                 <label for="c-info">Informação de Contacto</label>
                 <div class="form-row" id="c-info">
                    <div class="form-group col-6">
                        <input name="adress1" class="form-control" type="text" placeholder="Endereço 1 - Rua ...">
                    </div>
                    <div class="form-group col-6">
                        <input name="adress2" class="form-control" type="text" placeholder="Endereço 2 - Apartamento, andar, ... ">
                    </div>
                 </div>
                 <div class="form-row">
                    <div class="form-group col-6">
                        <input name="city" class="form-control" type="text" placeholder="Cidade">
                    </div>
                    <div class="form-group col-3">
                        <input name="district" class="form-control" type="text" placeholder="Distrito">
                    </div>
                    <div class="form-group col-3">
                        <input name="zipcode" class="form-control" type="text" placeholder="Código-Postal">
                    </div>
                 </div>
                 <div class="form-row">
                    <div class="form-group col-4">
                        <input name="telnumber" class="form-control" type="tel"  name="phone" placeholder="Contacto telefónico" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}">
                    </div>
                    <div class="form-group col-3">
                        <select name="teltype" class="form-control">
                            <option>Móvel</option>
                            <option>Fixo</option>
                        </select>
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
                    <?php  
                        errors_print($errors_signup);
                    ?>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input " type="checkbox" id="Check" required>
                            <label class="form-check-label ml-3 mt-1" for="Check">Li e Aceito os Termos e Condições</label>
                        </div>
                    </div>
                 </div>   
                <button type="submit" name="signUp">Sign Up</button>
            </form>            
        </div>
        <div class="form-container sign-up-container-pro hidden" id="sign-up-container-pro">
                <form action="index.php?page=sign" method="post">
                 <h1>Sign up</h1>
                   <div class="form-social">
                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-google"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i> </a>         
                   </div>
                  <span>ou utilize o seu email para se registar</span>
                  <input class="form-control" type="text" name='name' placeholder="Nome" value="<?php echo $fullname;?>" required/>
                  <input class="form-control" type="email" name='email'placeholder="Email" value="<?php echo $email;?>" required/>
                  <input class="form-control" type="password" name='password1' placeholder="Password" required/>
                  <input class="form-control" type="password" name='password2' placeholder="Confirme a Password" required/> 
                    <?php  
                        errors_print($errors_signup);
                    ?>
                  <button type="submit" name="signUp">Sign Up</button>
            </form>            
        </div>
        <div class="form-container sign-in-container">
                <form action="index.php?page=sign" method="post">
                 <h1 class="pb-4">Sign in</h1>
                  <input class="form-control" type="email" name='email' placeholder="Email" value="<?php echo $email;?>" required/>
                  <input class="form-control" type="password" name='password' placeholder="Password" required/> 
                    <?php 
                        errors_print($errors_signin); 
                    ?>
                  <a href="#">Esqueceu-se da password?</a>
                  <button type="submit" name="signIn">Sign In</button>
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
                    <p>Crie uma conta para poder usufruir dos seviços de um dos nossos professionais</p>
                    <button class="ghost" onclick="sign('signUp')">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="app.js"></script>
