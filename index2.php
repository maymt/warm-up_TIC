<?php
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
$remuneracion_mensual = $_POST['remuneracion_mensual'];
$pension_esperada = $_POST['pension_esperada'];
$edad_jubilacion = $_POST['edad_jubilacion'];
$saldo_disponible = $_POST['saldo_actual'];
$interes_anual = $_POST['interes_anual'];

$interes_mensual = ($interes_anual/100)/12;

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

$periodos = ($edad_jubilacion-$edad)*12;
$esperanza_vida_hombres = 79;
$esperanza_vida_mujeres = 83;

/*Ahorro Mensual Total (incluye descuento legal)*/
$R1 = (($monto_jubilacion-$saldo_disponible*(1+$interes_mensual)*$periodos)*($interes_mensual))/((1+$interes_mensual)*$periodos);
$R2 = $R1*$periodos;
$R3 = $monto_jubilacion - $R2;

/*APV mensual sin descuento legal*/
$apv_mensual = $R3 - (($remuneracion_mensual*0.1)*$periodos);

?>