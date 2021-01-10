<?php

//Bar Chart

$dataPoints1 = array(
    array("label"=> "Temperatura>37", "y"=> 0),
    array("label"=> "Tosse", "y"=> 0),
    array("label"=> "Dor de Garganta", "y"=> 0),
    array("label"=> "Fraqueza", "y"=> 0),
    array("label"=> "Sonolência", "y"=> 0),
    array("label"=> "Dor no Peito", "y"=> 0),
    array("label"=> "Perda de Apetite", "y"=> 0),
    array("label"=> "Perda de Olfato", "y"=> 0)
  );
  
  $dataPoints2 = array(
    array("label"=> "Temperatura>37", "y"=> 0),
    array("label"=> "Tosse", "y"=> 0),
    array("label"=> "Dor de Garganta", "y"=> 0),
    array("label"=> "Fraqueza", "y"=> 0),
    array("label"=> "Sonolência", "y"=> 0),
    array("label"=> "Dor no Peito", "y"=> 0),
    array("label"=> "Perda de Apetite", "y"=> 0),
    array("label"=> "Perda de Olfato", "y"=> 0)
  );
  
  //Pie Charts

  $dataPointsTosse = array(
    array("label"=> "Idade>50", "y"=> 0),
    array("label"=> "Idade<50", "y"=> 0),
  );
  $dataPointsGarganta = array(
    array("label"=> "Idade>50", "y"=> 0),
    array("label"=> "Idade<50", "y"=> 0),
  );
  $dataPointsFraqueza = array(
    array("label"=> "Idade>50", "y"=> 0),
    array("label"=> "Idade<50", "y"=> 0),
  );
  $dataPointsSono = array(
    array("label"=> "Idade>50", "y"=> 0),
    array("label"=> "Idade<50", "y"=> 0),
  );
  $dataPointsPeito = array(
    array("label"=> "Idade>50", "y"=> 0),
    array("label"=> "Idade<50", "y"=> 0),
  );
  $dataPointsOlfato = array(
    array("label"=> "Idade>50", "y"=> 0),
    array("label"=> "Idade<50", "y"=> 0),
  );

  //Statistics

  $fetch_symptoms = "SELECT temp_corporal, tosse_seca, dor_garganta, fraqueza, prob_respiratorio, sonolencia, dor_peito, perda_apetite, perda_olfato, genero, idade FROM FATORES_RISCO 
                        LEFT JOIN GENERO ON FATORES_RISCO.id_genero = GENERO.id_genero 
                            LEFT JOIN IDADE ON FATORES_RISCO.id_idade = IDADE.id_idade";
  $result = mysqli_query($connect, $fetch_symptoms) or die (mysqli_error($connect));
  $symptoms_list = mysqli_fetch_all($result, MYSQLI_ASSOC);
  
  $n_male = 0;
  $n_female = 0;
  
  foreach($symptoms_list as $symptoms){
    if($symptoms['genero'] == 1){
      $n_male += 1;
      if($symptoms['temp_corporal'] > 37) $dataPoints1[0]['y'] = $dataPoints1[0]['y'] + 1; 
      if($symptoms['tosse_seca'] == 1)    $dataPoints1[1]['y'] = $dataPoints1[1]['y'] + 1; 
      if($symptoms['dor_garganta'] == 1)  $dataPoints1[2]['y'] = $dataPoints1[2]['y'] + 1;
      if($symptoms['fraqueza'] == 1)      $dataPoints1[3]['y'] = $dataPoints1[3]['y'] + 1; 
      if($symptoms['sonolencia'] == 1)    $dataPoints1[4]['y'] = $dataPoints1[4]['y'] + 1;
      if($symptoms['dor_peito'] == 1)     $dataPoints1[5]['y'] = $dataPoints1[5]['y'] + 1;
      if($symptoms['perda_apetite'] == 1) $dataPoints1[6]['y'] = $dataPoints1[6]['y'] + 1; 
      if($symptoms['perda_olfato'] == 1)  $dataPoints1[7]['y'] = $dataPoints1[7]['y'] + 1;  
    }
    if($symptoms['genero'] == 0){
      $n_female += 1;
      if($symptoms['temp_corporal'] > 37) $dataPoints2[0]['y'] = $dataPoints2[0]['y'] + 1; 
      if($symptoms['tosse_seca'] == 1)    $dataPoints2[1]['y'] = $dataPoints2[1]['y'] + 1; 
      if($symptoms['dor_garganta'] == 1)  $dataPoints2[2]['y'] = $dataPoints2[2]['y'] + 1;
      if($symptoms['fraqueza'] == 1)      $dataPoints2[3]['y'] = $dataPoints2[3]['y'] + 1; 
      if($symptoms['sonolencia'] == 1)    $dataPoints2[4]['y'] = $dataPoints2[4]['y'] + 1;
      if($symptoms['dor_peito'] == 1)     $dataPoints2[5]['y'] = $dataPoints2[5]['y'] + 1;
      if($symptoms['perda_apetite'] == 1) $dataPoints2[6]['y'] = $dataPoints2[6]['y'] + 1; 
      if($symptoms['perda_olfato'] == 1)  $dataPoints2[7]['y'] = $dataPoints2[7]['y'] + 1;  
    }
  }

  foreach($symptoms_list as $symptoms){
    $from = new DateTime($symptoms['idade']);
    $to   = new DateTime('today');
    $idade =  $from->diff($to)->y;
    if($idade > 50){
      if($symptoms['tosse_seca'] == 1)      $dataPointsTosse[0]['y']    = $dataPointsTosse[0]['y'] + 1; 
      if($symptoms['dor_garganta'] == 1)    $dataPointsGarganta[0]['y'] = $dataPointsGarganta[0]['y'] + 1; 
      if($symptoms['fraqueza'] == 1)        $dataPointsFraqueza[0]['y'] = $dataPointsFraqueza[0]['y'] + 1;
      if($symptoms['sonolencia'] == 1)      $dataPointsSono[0]['y']     = $dataPointsSono[0]['y'] + 1; 
      if($symptoms['dor_peito'] == 1)       $dataPointsPeito[0]['y']    = $dataPointsPeito[0]['y'] + 1;
      if($symptoms['perda_olfato'] == 1)    $dataPointsOlfato[0]['y']   = $dataPointsOlfato[0]['y'] + 1;

    }
    if($idade < 50){
        if($symptoms['tosse_seca'] == 1)     $dataPointsTosse[1]['y']    = $dataPointsTosse[1]['y'] + 1; 
        if($symptoms['dor_garganta'] == 1)   $dataPointsGarganta[1]['y'] = $dataPointsGarganta[1]['y'] + 1; 
        if($symptoms['fraqueza'] == 1)       $dataPointsFraqueza[1]['y'] = $dataPointsFraqueza[1]['y'] + 1;
        if($symptoms['sonolencia'] == 1)     $dataPointsSono[1]['y']     = $dataPointsSono[1]['y'] + 1; 
        if($symptoms['dor_peito'] == 1)      $dataPointsPeito[1]['y']    = $dataPointsPeito[1]['y'] + 1;
        if($symptoms['perda_olfato'] == 1)   $dataPointsOlfato[1]['y']   = $dataPointsOlfato[1]['y'] + 1;
    }
  }
    //Normalize the values  - gender
    $dataPoints1[0]['y'] = $dataPoints1[0]['y']/ $n_male;
    $dataPoints1[1]['y'] = $dataPoints1[1]['y']/ $n_male;
    $dataPoints1[2]['y'] = $dataPoints1[2]['y']/ $n_male;
    $dataPoints1[3]['y'] = $dataPoints1[3]['y']/ $n_male;
    $dataPoints1[4]['y'] = $dataPoints1[4]['y']/ $n_male;
    $dataPoints1[5]['y'] = $dataPoints1[5]['y']/ $n_male;
    $dataPoints1[6]['y'] = $dataPoints1[6]['y']/ $n_male;
    $dataPoints1[7]['y'] = $dataPoints1[7]['y']/ $n_male;

    $dataPoints2[0]['y'] = $dataPoints2[0]['y']/ $n_female;
    $dataPoints2[1]['y'] = $dataPoints2[1]['y']/ $n_female;
    $dataPoints2[2]['y'] = $dataPoints2[2]['y']/ $n_female;
    $dataPoints2[3]['y'] = $dataPoints2[3]['y']/ $n_female;
    $dataPoints2[4]['y'] = $dataPoints2[4]['y']/ $n_female;
    $dataPoints2[5]['y'] = $dataPoints2[5]['y']/ $n_female;
    $dataPoints2[6]['y'] = $dataPoints2[6]['y']/ $n_female;
    $dataPoints2[7]['y'] = $dataPoints2[7]['y']/ $n_female;
  
  
    //Normalize the values  - age
    $dataPointsTosse[0]['y']    = $dataPointsTosse[0]['y']    / ($dataPointsTosse[0]['y'] + $dataPointsTosse[1]['y']) * 100; 
    $dataPointsGarganta[0]['y'] = $dataPointsGarganta[0]['y'] / ($dataPointsGarganta[0]['y'] + $dataPointsGarganta[1]['y'])* 100; 
    $dataPointsFraqueza[0]['y'] = $dataPointsFraqueza[0]['y'] / ($dataPointsFraqueza[0]['y'] + $dataPointsFraqueza[1]['y'])* 100;
    $dataPointsSono[0]['y']     = $dataPointsSono[0]['y']     / ($dataPointsSono[0]['y'] + $dataPointsSono[1]['y']) * 100; 
    $dataPointsPeito[0]['y']    = $dataPointsPeito[0]['y']    / ($dataPointsPeito[0]['y'] + $dataPointsPeito[1]['y']) * 100;
    $dataPointsOlfato[0]['y']   = $dataPointsOlfato[0]['y']   / ($dataPointsOlfato[0]['y'] + $dataPointsOlfato[1]['y']) * 100;

    $dataPointsTosse[1]['y']    = $dataPointsTosse[1]['y'] / ($dataPointsTosse[0]['y'] + $dataPointsTosse[1]['y']) * 100;  
    $dataPointsGarganta[1]['y'] = $dataPointsGarganta[1]['y'] / ($dataPointsGarganta[0]['y'] + $dataPointsGarganta[1]['y']) * 100; 
    $dataPointsFraqueza[1]['y'] = $dataPointsFraqueza[1]['y'] / ($dataPointsFraqueza[0]['y'] + $dataPointsFraqueza[1]['y']) * 100;
    $dataPointsSono[1]['y']     = $dataPointsSono[1]['y'] /   ($dataPointsSono[0]['y'] + $dataPointsSono[1]['y'])* 100; 
    $dataPointsPeito[1]['y']    = $dataPointsPeito[1]['y'] /  ($dataPointsPeito[0]['y'] + $dataPointsPeito[1]['y'])* 100;
    $dataPointsOlfato[1]['y']   = $dataPointsOlfato[1]['y'] / ($dataPointsOlfato[0]['y'] + $dataPointsOlfato[1]['y']) * 100;
?>

<script>
window.onload = function () {
 
var chart1 = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Distribuição dos Sintomas Por Género"
	},
	axisY:{
		includeZero: true
	},
	legend:{
		cursor: "pointer",
		verticalAlign: "center",
		horizontalAlign: "right",
		itemclick: toggleDataSeries
	},
	data: [{
        color: "blue",
		type: "column",
		name: "Masculino",
		indexLabel: "{y}",
		yValueFormatString: "#%",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	},{
        color: "pink",
		type: "column",
		name: "Feminino",
		indexLabel: "{y}",
		yValueFormatString: "#%",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});

var chart_tosse = new CanvasJS.Chart("chartContainer_tosse", {
	animationEnabled: true,
	title: {
		text: "Sintoma: Tosse"
	},
	data: [{
		type: "pie",
		yValueFormatString: "#,##0.00\"%\"",
        indexLabelPlacement: "inside",
		indexLabelFontColor: "#36454F",
		indexLabelFontSize: 14,
		indexLabelFontWeight: "bolder",
		showInLegend: true,
		legendText: "{label}",
		dataPoints: <?php echo json_encode($dataPointsTosse, JSON_NUMERIC_CHECK); ?>
	}]
});

var chart_garganta = new CanvasJS.Chart("chartContainer_garganta", {
	animationEnabled: true,
	title: {
		text: "Sintoma: Dor de Garganta"
	},
	data: [{
		type: "pie",
        yValueFormatString: "#,##0.00\"%\"",
		indexLabelPlacement: "inside",
		indexLabelFontColor: "#36454F",
		indexLabelFontSize: 14,
		indexLabelFontWeight: "bolder",
		showInLegend: true,
		legendText: "{label}",
		dataPoints: <?php echo json_encode($dataPointsGarganta, JSON_NUMERIC_CHECK); ?>
	}]
});

var chart_fraqueza = new CanvasJS.Chart("chartContainer_fraqueza", {
	animationEnabled: true,
	title: {
		text: "Sintoma: Fraqueza"
	},
	data: [{
		type: "pie",
        yValueFormatString: "#,##0.00\"%\"",
		indexLabelPlacement: "inside",
		indexLabelFontColor: "#36454F",
		indexLabelFontSize: 14,
		indexLabelFontWeight: "bolder",
		showInLegend: true,
		legendText: "{label}",
		dataPoints: <?php echo json_encode($dataPointsFraqueza, JSON_NUMERIC_CHECK); ?>
	}]
});

var chart_sono = new CanvasJS.Chart("chartContainer_sono", {
	animationEnabled: true,
	title: {
		text: "Sintoma: Sonolência"
	},
	data: [{
		type: "pie",
        yValueFormatString: "#,##0.00\"%\"",
		indexLabelPlacement: "inside",
		indexLabelFontColor: "#36454F",
		indexLabelFontSize: 14,
		indexLabelFontWeight: "bolder",
		showInLegend: true,
		legendText: "{label}",
		dataPoints: <?php echo json_encode($dataPointsSono, JSON_NUMERIC_CHECK); ?>
	}]
});

var chart_peito = new CanvasJS.Chart("chartContainer_peito", {
	animationEnabled: true,
	title: {
		text: "Sintoma: Dor no Peito"
	},
	data: [{
		type: "pie",
        yValueFormatString: "#,##0.00\"%\"",
		indexLabelPlacement: "inside",
		indexLabelFontColor: "#36454F",
		indexLabelFontSize: 14,
		indexLabelFontWeight: "bolder",
		showInLegend: true,
		legendText: "{label}",
		dataPoints: <?php echo json_encode($dataPointsPeito, JSON_NUMERIC_CHECK); ?>
	}]
});

var chart_olfato = new CanvasJS.Chart("chartContainer_olfato", {
	animationEnabled: true,
	title: {
		text: "Sintoma: Perda do Olfato"
	},
	data: [{
		type: "pie",
        yValueFormatString: "#,##0.00\"%\"",
		indexLabelPlacement: "inside",
		indexLabelFontColor: "#36454F",
		indexLabelFontSize: 14,
		indexLabelFontWeight: "bolder",
		showInLegend: true,
		legendText: "{label}",
		dataPoints: <?php echo json_encode($dataPointsOlfato, JSON_NUMERIC_CHECK); ?>
	}]
});

chart1.render();
chart_tosse.render();
chart_garganta.render();
chart_fraqueza.render();
chart_sono.render();
chart_peito.render();
chart_olfato.render();
 
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart1.render();
}
 
}
</script>