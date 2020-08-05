<?php   include 'conexion.php';
        include 'librerias.php';
        $obj  = new librerias;
		$datos="";
		$pa   =array(); 
		$sql  = "SELECT 
						chat_id
		               ,chat_usuario
		               ,chat_mensaje
		               ,DATE_FORMAT(chat_fecha, '%d-%m-%Y')  AS chat_fecha
		               ,CONCAT(HOUR(chat_fecha),':',MINUTE(chat_fecha),':',SECOND(chat_fecha))   AS chat_hora
		          FROM 
		          		chat
		          WHERE
                  		DATE_FORMAT(chat_fecha, '%d-%m-%Y')=DATE_FORMAT(NOW(), '%d-%m-%Y')";
		$res  =mysqli_query($con, $sql);
		while($fila=mysqli_fetch_assoc($res)){
          $fila['chat_id']      =$fila['chat_id']; 
          $fila['chat_usuario'] =$fila['chat_usuario'];  
          $fila['chat_mensaje'] =$fila['chat_mensaje'];
          $fila['chat_fecha']   =$obj->nombre_fecha_espaniol($fila['chat_fecha']);  
		  $fila['chat_hora']    =$fila['chat_hora']; 
          $pag[]=$fila;
		}
		echo json_encode(array("datos" => $pag));
?>