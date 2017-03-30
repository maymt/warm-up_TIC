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

$apv = $saldo_actual + $ahorro
$ahorro = 0;
$acum = 0;
$i=0;

while ($i<$periodos){
	$ahorro = ($aporte_mensual + $acum)*((1+$interes_mensual)^($periodos-$i));
}

echo $ahorro;
?>