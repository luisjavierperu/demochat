<?php 
class librerias{
	function nombre_fecha_espaniol($fecha1){
		$numeroDia = date('d', strtotime($fecha1));
		$dia = date('l', strtotime($fecha1));
		$mes = date('F', strtotime($fecha1));
		$anio = date('Y', strtotime($fecha1));
		$dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
		$dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
		$nombredia = str_replace($dias_EN, $dias_ES, $dia);
		$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
		$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		$nombreMes = str_replace($meses_EN, $meses_ES, $mes);
	  	return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
	}
	function solo_iniciales_mayusculas($nombre){
	    $nombre = explode(" ",$nombre);
	    foreach ($nombre as $v){
	        $letras .= $v[0];
	    }
	    return  strtoupper($letras);
	}
	function solo_iniciales_minusculas($nombre){
	    $nombre = explode(" ",$nombre);
	    foreach ($nombre as $v){
	        $letras .= $v[0];
	    }
	    return  strtolower($letras);
	}

	function primeras_letras_mayusculas($cadena){
	    return  ucwords(strtolower($cadena));
	}
	function primera_letra_mayuscula($cadena){
	    return  ucfirst(strtolower($cadena));
	}
	function todo_letras_mayusculas($cadena){
	    return  strtoupper($cadena);
	}
}
?>