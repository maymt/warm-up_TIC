<?php
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
$remuneracion_mensual = $_POST['remuneracion_mensual'];
$saldo_actual = $_POST['saldo_actual'];
$interes_anual = $_POST['interes_anual'];
$pension_esperada = $_POST['pension_esperada'];
$edad_jubilacion = $_POST['edad_jubilacion'];
$aporte_mensual = $_POST['aporte_mensual'];

$interes_mensual = ($interes_anual/100)/12;
$periodos = ($edad_jubilacion-$edad)*12;
$esperanza_vida_hombres = 79;
$esperanza_vida_mujeres = 83;

$ahorro = 0;
$i = 0;

if($sexo == 'femenino'){
	$monto_jubilacion = $pension_esperada*($esperanza_vida_mujeres-$edad_jubilacion);
	if(is_null($edad_jubilacion)){
		$edad_jubilacion = 60;
	}
}else{
	$monto_jubilacion = $pension_esperada*($esperanza_vida_hombres-$edad_jubilacion);
	if(is_null($edad_jubilacion)){
		$edad_jubilacion = 65;
	}
}

/*Calcular APV total*/
while ($i<$periodos){
	$ahorro = ($aporte_mensual + $ahorro)*pow((1+$interes_mensual),($periodos-$i));
	$i++;
}

$apv = $saldo_actual + $ahorro;

/*Calcular Pensión con APV (sin intereses)*/
$pension_apv = $apv + (($remuneracion_mensual*0.1)*$periodos);

/*Ahorro Mensual Total (incluye descuento legal)*/
$R1 = (($monto_jubilacion-$saldo_actual*(1+$interes_mensual)*$periodos)*($interes_mensual))/((1+$interes_mensual)*$periodos);
$R2 = $R1*$periodos;
$R3 = $monto_jubilacion - $R2;

/*APV mensual din descuento legal*/
$apv_mensual = $R3 - (($remuneracion_mensual*0.1)*$periodos);

?>