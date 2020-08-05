<?php     session_start();
          include 'conexion.php';
          $usuario=$_SESSION['usuario'];
          $mensaje='Salio de la sala';
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

          mysqli_query($con, $sqL);
          session_start();
          session_destroy();
          header('Location:index.php'); 
?>