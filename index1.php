<?php
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
$remuneracion_mensual = $_POST['remuneracion_mensual'];
$aporte_mensual = $_POST['aporte_mensual'];
$edad_jubilacion = $_POST['edad_jubilacion'];
$saldo_disponible = $_POST['saldo_actual'];
$interes_anual = $_POST['interes_anual'];

$interes_mensual = ($interes_anual/100)/12;

if($sexo == 'femenino'){
	if(is_null($edad_jubilacion)){
		$edad_jubilacion = 60;
	}
}elseif($sexo == 'masculino'){
	if(is_null($edad_jubilacion)){
		$edad_jubilacion = 65;
	}
}

$periodos = ($edad_jubilacion-$edad)*12;
$esperanza_vida_hombres = 79;
$esperanza_vida_mujeres = 83;
$ahorro = 0;
$i = 0;

/*Calcular APV total*/
while ($i<$periodos){
	$ahorro = ($aporte_mensual + $ahorro)*pow((1+$interes_mensual),($periodos-$i));
	$i++;
}

$apv = $saldo_actual + $ahorro;

/*Calcular Pensión con APV (sin intereses)*/
if($sexo == 'femenino'){
	$pension_apv = ($apv + (($remuneracion_mensual*0.1)*$periodos))/(($esperanza_vida_mujeres-$edad_jubilacion)/12);
}elseif($sexo == 'masculino'){
	$pension_apv = ($apv + (($remuneracion_mensual*0.1)*$periodos))/(($esperanza_vida_hombres-$edad_jubilacion)/12);
}
?>