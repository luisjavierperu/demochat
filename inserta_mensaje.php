<?php     session_start();
          include 'conexion.php';
          $usuario=$_SESSION['usuario'];
          $mensaje=$_POST['txt_mensaje'];
          $sqL = "INSERT INTO chat (
                                      chat_usuario,
                                      chat_mensaje,
                                      chat_fecha
                                    ) 
                            VALUES (
                                       upper('$usuario'),
                                       '$mensaje',
                                       now()
                                    );";

          mysqli_query($con, $sqL)
?>