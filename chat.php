<?php session_start();
      if(empty($_SESSION['usuario'])){  header('Location:index.html'); }
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
body{
    overflow: hidden;
}
#footer-chat{
    height: 60px;
}
.mb-100px{
    margin-bottom: 70px !important;
}
</style>
<script src="js/bootstrap.min.js"                   integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/jquery-3.3.1.slim.min.js"           integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="js/popper.min.js"                      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="js/googleapis/jquery.min.js"></script>
<script>
$(document).ready(function() {  
    lista_mensaje();
    setInterval(function(){ lista_mensaje(); }, 15000);
    $("#txt_mensaje").keypress(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if(code==13){
            $('#btn_grabar').focus();
        }
    });
    $("#btn_grabar").on("click", function() { inserta_mensaje(); });
}); 
function inserta_mensaje() {
    if ($('#txt_mensaje').val()==='') {return;}
    var data={ txt_mensaje:$('#txt_mensaje').val() };
    $.ajax({
            url :'inserta_mensaje.php',
            type:'POST',
            data:data,
            success: function(valores){
                var datos = eval(valores);
                lista_mensaje();
                $('#txt_mensaje').val(''); 
            }
     });
}
function lista_mensaje(){
    $.ajax({
              url: "lista_mensaje.php",
              type:"POST",
              //data:data,
              success: function(valores){ 
                    var json = JSON.parse(valores);
                    var contador=0;
                    $("#chat-list-group").html("");
                    $.each(json.datos, function(ind, elem){
                            contador=contador+1;
                          $(
                            '<li id="'+contador+'" class="list-group-item" style="margin-bottom:6px;">'+
                                '<div class="media">'+
                                    '<div class="media-body">'+
                                        '<div class="media" style="overflow:visible;">'+
                                            '<div class="media-body" style="overflow:visible;">'+
                                                '<div class="row">'+  
                                                    '<div class="col-md-12">'+
                                                    '<small>'+
                                                            '<strong>'+
                                                                    '<a href="#">'+elem.chat_usuario+':</a>'+
                                                            '</strong>&nbsp;&nbsp;'+elem.chat_mensaje+
                                                    '</small>'+
                                                    '<br>'+
                                                    '<small class="text-muted">'+elem.chat_fecha+' '+elem.chat_hora+'</small>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</li>'
                           ).appendTo($("#chat-list-group"));
                    }); 
                    $('#chat-list-group').animate({opacity: 0.3}, 100);
                    $('#chat-list-group').animate({opacity: 1}, 100);
                    $('#txt_mensaje').focus();
                    $('#'+contador).addClass("mb-100px");  
                    // Scrollea hasta abajo de la página 
                    $("html, body").animate({ scrollTop: $(document).height() }, 1000); 
                    
                }
            });
}
</script>
</head>
<body>
<nav class="navbar fixed-top navbar-light bg-dark text-white">
  <h6>Bienvenido al chat   <?php echo $_SESSION['usuario'];  ?></h6>
  <a href="salir.php">Salir</a>
</nav>
<br>
<div class="card-body" style="height:233px;">
    <ul id="chat-list-group" class="list-group">
    </ul>
</div>

<div id="footer-chat" class="navbarx fixed-bottom navbar-light bg-dark">
        <div class="container-fluid">
            <div class="row p-3">
                    <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                        <div class="form-group">
                          <input type="text" id="txt_mensaje" class="form-control form-control-sm" placeholder="Escribir mensaje aqui ...">
                        </div>
                    </div>
                    <div class="col-2  col-sm-2  col-md-2  col-lg-2  col-xl-2">
                        <div class="form-group">
                              <button id="btn_grabar" class="btn btn-primary btn-sm btn-block">Enviar</button>
                        </div>
                    </div>
            </div>
        </div>
</div>
</body>
</html>
