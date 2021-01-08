<?php
    include('server.php');
?>
<?php if(!isset($report)):?>
<section id="covidform">
    <div class="container">
        <h4 class=" display-5 font-weight-bold py-3 mb-4 text-center">
            Formulário de Registo de Indicadores e Sintomas para Diagnóstico de COVID-19
        </h4>
    <div class="row align-items-stretch justify-content-around">                                    
        <form  action="index.php?page=formcovid" method="post">

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Temperatura Corporal:</label>
                <div class="col-sm-2">
                    <input name="temperatura" class="form-control temp_in" type="text" value="" required>
                </div>
            </div>
            
			<div class="row">
 			 <div class="col">
            <fieldset class="form-group" id="DRY_COUG">
                <div class="row">
                    <legend class="col-form-label col-sm-5 pt-0">Tosse Seca:</legend>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="DRY_COUG" id="inlineRadio1" value="1" required>
                        <label class="form-check-label" for="inlineRadio1">Sim</label>
					</div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="DRY_COUG" id="inlineRadio2" value="0">
                        <label class="form-check-label" for="inlineRadio2">Não</label>
                    </div>
                </div>
            </fieldset>
				</div>
			 <div class="col">
            <fieldset class="form-group" id="SORE_THR">
                <div class="row">
                    <legend class="col-form-label col-sm-5 pt-0">Dor de Garganta:</legend>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="SORE_THR" id="inlineRadio1" value="1" required>
                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="SORE_THR" id="inlineRadio2" value="0">
                        <label class="form-check-label" for="inlineRadio2">Não</label>
                    </div>
                </div>
            </fieldset>
			</div></div>
			<div class="row">
 			<div class="col">
            <fieldset class="form-group" id="WEAKNESS">
                <div class="row">
                    <legend class="col-form-label col-sm-5 pt-0">Fraqueza:</legend>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="WEAKNESS" id="inlineRadio1" value="1" required>
                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="WEAKNESS" id="inlineRadio2" value="0">
                        <label class="form-check-label" for="inlineRadio2">Não</label>
                    </div>
                </div>
            </fieldset> </div>
			<div class="col">
            <fieldset class="form-group" id="BREATHIN">
                <div class="row">
                    <legend class="col-form-label col-sm-5 pt-0">Problemas Respiratórios:</legend>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="BREATHIN" id="inlineRadio1" value="1" required>
                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="BREATHIN" id="inlineRadio2" value="0">
                        <label class="form-check-label" for="inlineRadio2">Não</label>
                    </div>
                </div>
			</fieldset> 
			</div></div>

			<div class="row">
 			<div class="col">
            <fieldset class="form-group" id="DROWSINE">
                <div class="row">
                    <legend class="col-form-label col-sm-5 pt-0">Sonolência:</legend>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="DROWSINE" id="inlineRadio1" value="1" required>
                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="DROWSINE" id="inlineRadio2" value="0">
                        <label class="form-check-label" for="inlineRadio2">Não</label>
                    </div>
                </div>
            </fieldset> </div>
			<div class="col">
            <fieldset class="form-group" id="PAIN_IN">
                <div class="row">
                    <legend class="col-form-label col-sm-5 pt-0">Dor no Peito:</legend>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="PAIN_IN" id="inlineRadio1" value="1" required>
                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="PAIN_IN" id="inlineRadio2" value="0">
                        <label class="form-check-label" for="inlineRadio2">Não</label>
                    </div>
                </div>
            </fieldset> </div></div>

			<div class="row">
 			<div class="col">
            <fieldset class="form-group" id="TRAVEL_H">
                <div class="row">
                    <legend class="col-form-label col-sm-5 pt-0">Viajou para Países Infetados:</legend>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="TRAVEL_H" id="inlineRadio1" value="1" required>
                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="TRAVEL_H" id="inlineRadio2" value="0">
                        <label class="form-check-label" for="inlineRadio2">Não</label>
                    </div>
                </div>
            </fieldset> </div>
			<div class="col">
            <fieldset class="form-group" id="DIABETES">
                <div class="row">
                    <legend class="col-form-label col-sm-5 pt-0">Diabetes:</legend>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="DIABETES" id="inlineRadio1" value="1" required>
                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="DIABETES" id="inlineRadio2" value="0">
                        <label class="form-check-label" for="inlineRadio2">Não</label>
                    </div>
                </div>
            </fieldset> </div></div>

			<div class="row">
 			<div class="col">
            <fieldset class="form-group" id="HEART_DI">
                <div class="row">
                    <legend class="col-form-label col-sm-5 pt-0">Doença Cardíaca:</legend>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="HEART_DI" id="inlineRadio1" value="1" required>
                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="HEART_DI" id="inlineRadio2" value="0">
                        <label class="form-check-label" for="inlineRadio2">Não</label>
                    </div>
                </div>
            </fieldset></div>
			<div class="col">
            <fieldset class="form-group" id="LUNG_DIS">
                <div class="row">
                    <legend class="col-form-label col-sm-5 pt-0">Doença Pulmonar:</legend>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="LUNG_DIS" id="inlineRadio1" value="1" required>
                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="LUNG_DIS" id="inlineRadio2" value="0">
                        <label class="form-check-label" for="inlineRadio2">Não</label>
                    </div>
                </div>
            </fieldset></div></div>

			<div class="row">
 			<div class="col">
            <fieldset class="form-group" id="STROKE_O">
                <div class="row">
                    <legend class="col-form-label col-sm-5 pt-0">AVC ou Imunidade Reduzida:</legend>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="STROKE_O" id="inlineRadio1" value="1" required>
                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="STROKE_O" id="inlineRadio2" value="0">
                        <label class="form-check-label" for="inlineRadio2">Não</label>
                    </div>
                </div>
            </fieldset></div>

			<div class="col">
            <fieldset class="form-group" id="SYMPTOMS">
                <div class="row">
                    <legend class="col-form-label col-sm-5 pt-0">Progressão nos Sintomas:</legend>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="SYMPTOMS" id="inlineRadio1" value="1" required>
                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="SYMPTOMS" id="inlineRadio2" value="0">
                        <label class="form-check-label" for="inlineRadio2">Não</label>
                    </div>
                </div>
            </fieldset>  </div></div>

			<div class="row">
 			<div class="col">
            <fieldset class="form-group" id="HIGH_BLO">
                <div class="row">
                    <legend class="col-form-label col-sm-5 pt-0">Pressão Arterial Elevada:</legend>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="HIGH_BLO" id="inlineRadio1" value="1" required>
                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="HIGH_BLO" id="inlineRadio2" value="0">
                        <label class="form-check-label" for="inlineRadio2">Não</label>
                    </div>
                </div>
            </fieldset> </div>

			<div class="col">
            <fieldset class="form-group" id="KIDNEY_D">
                <div class="row">
                    <legend class="col-form-label col-sm-5 pt-0">Doença Renal:</legend>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="KIDNEY_D" id="inlineRadio1" value="1" required>
                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="KIDNEY_D" id="inlineRadio2" value="0">
                        <label class="form-check-label" for="inlineRadio2">Não</label>
                    </div>
                </div>
            </fieldset></div></div>

			<div class="row">
 			<div class="col">
            <fieldset class="form-group" id="CHANGE_I">
                <div class="row">
                    <legend class="col-form-label col-sm-5 pt-0">Perda de Apetite:</legend>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="CHANGE_I" id="inlineRadio1" value="1" required>
                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="CHANGE_I" id="inlineRadio2" value="0">
                        <label class="form-check-label" for="inlineRadio2">Não</label>
                    </div>
                </div>
            </fieldset></div>
			
			<div class="col">
            <fieldset class="form-group" id="LOSS_OF">
                <div class="row">
                    <legend class="col-form-label col-sm-5 pt-0">Perda de Olfato:</legend>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="LOSS_OF" id="inlineRadio1" value="1" required>
                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="LOSS_OF" id="inlineRadio2" value="0">
                        <label class="form-check-label" for="inlineRadio2">Não</label>
                    </div>
                </div>
            </fieldset></div></div>
            <div class="col-sm-10 text-right">
            <div class="form-group row">
                <input type='hidden' name="user_ID" value="<?= $user_ID?>">
                <div class="col-12 text-right">
                    <button type="submit" name="diagnostic" class="btn btn-primary">Submeter</button>
                </div>
            </div>
        </form>
    </div>
    </div>
</section>
<?php endif; ?>

<?php if(isset($report)) include('report.php'); ?>
