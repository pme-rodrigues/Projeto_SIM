<?php
//get gender
$query_select_genero="SELECT genero FROM genero WHERE id_genero = '$id_genero'";
$results_genero = mysqli_query($connect, $query_select_genero);
$genero = mysqli_fetch_assoc($results_genero);

//get birthdate
$query_select_data_nascimento="SELECT idade FROM idade WHERE id_idade = '$id_idade'";
$results_data = mysqli_query($connect, $query_select_data_nascimento);
$data_nascimento = mysqli_fetch_assoc($results_data);
$data = $data_nascimento['idade'];

//get patient age
# object oriented
$from = new DateTime($data);
$to   = new DateTime('today');
$idade =  $from->diff($to)->y;

	
$AGE = $idade;                     // age
$GENDER   = $genero['genero'];     // gender 0-> masculino, 1-> feminino
$BODY_TEM = $temperatura;          // body temperature (em Fahrenheit (°F)) 
$DRY_COUG = $tosse;                // dry cough 
$SORE_THR = $garganta;             // sore throat
$WEAKNESS = $fraqueza;             // weakness 
$BREATHIN = $prob_r;               // breathing problem
$DROWSINE = $sonolencia;           // drowsiness 
$PAIN_IN  = $dor_peito;            // pain in chest 
$TRAVEL_H = $viagens;              // travel history to infected countries 
$DIABETES = $diabetes;             // diabetes
$HEART_DI = $coracao;              // heart disease
$LUNG_DIS = $pulmao;               // lung disease
$STROKE_O = $avc;                  // stroke or reduced immunity
$SYMPTOMS = $sintomas;             // symptoms progressed
$HIGH_BLO = $press;                // high blood pressure
$KIDNEY_D = $renal;                // kidney disease
$CHANGE_I = $apetite;              // change in appetite
$LOSS_OF  = $olfato;               // loss of sense of smell
$class;                            // corona result 0-> baixo risco, 1-> médio risco, 2-> elevado risco
$diagnostico;

/*Terminal Node 1*/
if   
(
  (
      $DIABETES == 1 
  ) &&
  (
       $SYMPTOMS == 1 
  ) &&
  (
       $TRAVEL_H == 1 
  ) 
)
{
    $class = 2;
}

/*Terminal Node 2*/
if
(
  (
       $GENDER == 1 
  ) &&
  (
       $DRY_COUG == 1 
  ) &&
  (
       $BREATHIN == 1 
  ) &&
  (
       $DIABETES == 0 
  ) &&
  (
       $SYMPTOMS == 1 
  ) &&
  (
       $TRAVEL_H == 1 
  ) 
)
{
    $class = 1;
}

/*Terminal Node 3*/
if
(
  (
       $GENDER == 0 
  ) &&
  (
       $DRY_COUG == 1 
  ) &&
  (
       $BREATHIN == 1 
  ) &&
  (
       $DIABETES == 0 
  ) &&
  (
       $SYMPTOMS == 1 
  ) &&
  (
       $TRAVEL_H == 1 
  ) 
)
{
     $class = 2;
}

/*Terminal Node 4*/
if
(
  (
       $DRY_COUG == 0 
  ) &&
  (
       $BREATHIN == 1 
  ) &&
  (
       $DIABETES == 0 
  ) &&
  (
       $SYMPTOMS == 1 
  ) &&
  (
       $TRAVEL_H == 1 
  ) 
)
{
      $class = 2;
}

/*Terminal Node 5*/
if
(
  (
       $BREATHIN == 0 
  ) &&
  (
       $DIABETES == 0 
  ) &&
  (
       $SYMPTOMS == 1 
  ) &&
  (
       $TRAVEL_H == 1 
  ) &&
    $BODY_TEM <= 102.6 
)
{
    $class = 1;
}

/*Terminal Node 6*/
if
(
  (
       $BREATHIN == 0 
  ) &&
  (
       $DIABETES == 0 
  ) &&
  (
       $SYMPTOMS == 1 
  ) &&
  (
       $TRAVEL_H == 1 
  ) &&
    $BODY_TEM > 102.6 
)
{
    $class = 2;
}

/*Terminal Node 7*/
if
(
  (
       $DROWSINE == 1 
  ) &&
  (
       $SYMPTOMS == 0 
  ) &&
  (
       $TRAVEL_H == 1 
  ) 
)
{
    $class = 1;
}

/*Terminal Node 8*/
if
(
  (
       $LOSS_OF == 1 
  ) &&
  (
      $DROWSINE == 0 
  ) &&
  (
       $SYMPTOMS == 0 
  ) &&
  (
       $TRAVEL_H == 1 
  ) 
)
{
    $class = 2;
}

/*Terminal Node 9*/
if
(
  (
       $LOSS_OF == 0 
  ) &&
  (
       $DROWSINE == 0 
  ) &&
  (
       $SYMPTOMS == 0 
  ) &&
  (
       $TRAVEL_H == 1 
  ) &&
    $BODY_TEM <= 98.7 
)
{
    $class = 1;
}

/*Terminal Node 10*/
if
(
  (
       $LOSS_OF == 0 
  ) &&
  (
       $DROWSINE == 0 
  ) &&
  (
       $SYMPTOMS == 0 
  ) &&
  (
       $TRAVEL_H == 1 
  ) &&
    $BODY_TEM > 98.7 &&
    $BODY_TEM <= 101.3 
)
{
     $class = 0;
}

/*Terminal Node 11*/
if
(
  (
       $LOSS_OF == 0 
  ) &&
  (
       $DROWSINE == 0 
  ) &&
  (
       $SYMPTOMS == 0 
  ) &&
  (
       $TRAVEL_H == 1 
  ) &&
    $BODY_TEM > 101.3 
)
{
    $class = 2;
}

/*Terminal Node 12*/
if
(
  (
       $WEAKNESS == 1 
  ) &&
  (
       $DRY_COUG == 1 
  ) &&
  (
       $PAIN_IN == 1 
  ) &&
  (
       $TRAVEL_H == 0 
  ) 
)
{
    $class = 2;
}

/*Terminal Node 13*/
if
(
  (
       $WEAKNESS == 0 
  ) &&
  (
       $DRY_COUG == 1 
  ) &&
  (
       $PAIN_IN == 1 
  ) &&
  (
       $TRAVEL_H == 0 
  ) 
)
{
    $class = 0;
}

/*Terminal Node 14*/
if
(
  (
       $DRY_COUG == 0 
  ) &&
  (
       $PAIN_IN == 1 
  ) &&
  (
       $TRAVEL_H == 0 
  ) &&
    $BODY_TEM <= 101.65 
)
{
    $class = 1;
}

/*Terminal Node 15*/
if
(
  (
       $DRY_COUG == 0 
  ) &&
  (
       $PAIN_IN == 1 
  ) &&
  (
       $TRAVEL_H == 0 
  ) &&
    $BODY_TEM > 101.65 
)
{
    $class = 0;
}

/*Terminal Node 16*/
if
(
  (
       $STROKE_O == 1 
  ) &&
  (
       $PAIN_IN == 0 
  ) &&
  (
       $TRAVEL_H == 0 
  ) &&
    $BODY_TEM <= 96.25 
)
{
    $class = 0;
}

/*Terminal Node 17*/
if
(
  (
       $STROKE_O == 1 
  ) &&
  (
       $PAIN_IN == 0 
  ) &&
  (
       $TRAVEL_H == 0 
  ) &&
    $BODY_TEM > 96.25 
)
{
    $class = 1;
}

/*Terminal Node 18*/
if
(
  (
       $GENDER == 1 
  ) &&
  (
       $DIABETES == 1 
  ) &&
  (
       $STROKE_O == 0 
  ) &&
  (
       $PAIN_IN == 0 
  ) &&
  (
       $TRAVEL_H == 0 
  ) &&
    $BODY_TEM <= 99.3 
)
{
    $class = 2;
}

/*Terminal Node 19*/
if
(
  (
       $GENDER == 0 
  ) &&
  (
       $DIABETES == 1 
  ) &&
  (
       $STROKE_O == 0 
  ) &&
  (
       $PAIN_IN == 0 
  ) &&
  (
       $TRAVEL_H == 0 
  ) &&
    $BODY_TEM <= 98.75 
)
{
    $class = 0;
}

/*Terminal Node 20*/
if
(
  (
       $GENDER == 0 
  ) &&
  (
       $DIABETES == 1 
  ) &&
  (
       $STROKE_O == 0 
  ) &&
  (
       $PAIN_IN == 0 
  ) &&
  (
       $TRAVEL_H == 0 
  ) &&
    $BODY_TEM > 98.75 &&
    $BODY_TEM <= 99.3 
)
{
    $class = 2;
}

/*Terminal Node 21*/
if
(
  (
       $DIABETES == 1 
  ) &&
  (
       $STROKE_O == 0 
  ) &&
  (
       $PAIN_IN == 0 
  ) &&
  (
       $TRAVEL_H == 0 
  ) &&
    $BODY_TEM > 99.3 
)
{
    $class = 1;
}

/*Terminal Node 22*/
if
(
  (
       $LOSS_OF == 1 
  ) &&
  (
       $GENDER == 1 
  ) &&
  (
       $BREATHIN == 1 
  ) &&
  (
       $DIABETES == 0 
  ) &&
  (
       $STROKE_O == 0 
  ) &&
  (
       $PAIN_IN == 0 
  ) &&
  (
       $TRAVEL_H == 0 
  ) 
)
{
    $class = 1;
}

/*Terminal Node 23*/
if
(
  (
       $LOSS_OF == 0 
  ) &&
  (
       $GENDER == 1 
  ) &&
  (
       $BREATHIN == 1 
  ) &&
  (
       $DIABETES == 0 
  ) &&
  (
       $STROKE_O == 0 
  ) &&
  (
       $PAIN_IN == 0 
  ) &&
  (
       $TRAVEL_H == 0 
  ) 
)
{
    $class = 0;
}

/*Terminal Node 24*/
if
(
  (
       $GENDER == 0 
  ) &&
  (
       $BREATHIN == 1 
  ) &&
  (
       $DIABETES == 0 
  ) &&
  (
       $STROKE_O == 0 
  ) &&
  (
       $PAIN_IN == 0 
  ) &&
  (
       $TRAVEL_H == 0 
  ) 
)
{
    $class = 1;
}

/*Terminal Node 25*/
if
(
  (
       $BREATHIN == 0 
  ) &&
  (
       $DIABETES == 0 
  ) &&
  (
       $STROKE_O == 0 
  ) &&
  (
       $PAIN_IN == 0 
  ) &&
  (
       $TRAVEL_H == 0 
  ) 
)
{
    $class = 0;
}

	if($class == 0){
	   $diagnostico = 'Baixo';
     }
	else if($class == 1){
	  $diagnostico = 'Medio';
     }	
	else if($class == 2){
	  $diagnostico = 'Elevado';
     }

?>